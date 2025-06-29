<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{
    //fungsi index
    public function index()
    {
        return view('admin.blog.index' ,[
            'artikels' => Blog::orderBy('id', 'desc')->get()
        ]);
        
    }

    //halaman create
    public function create(){
        return view('admin.blog.create');
    }

        //halaman create
    public function store(Request $request){
        $rules = [
            'judul' => 'required',
            'image' => 'required|max:1000|mimes:jpg,jpeg,png,webp',
            'desc' => 'required|min:20',
        ];

        $massage = [
            'judul.required' => 'Judul Wajib diisi',
            'image.required' => 'Image Wajib diisi',
            'desc.required' => 'Deskripsi Wajib diisi',
        ];

        $this->validate($request, $rules, $massage);

        // Image
        $fileName = time() . '-' . $request->image->extension();
        $request->file('image')->storeAs('public/artikel' , $fileName);
        
        // Artikel
        $storage = "storage/content-artikel";
        $dom = new \DOMDocument();
        // You may want to continue your logic here or remove this section if not needed.

        
        # untuk menonaktifkan kesalahan libxml standar dan memungkinkan penanganan kesalahan pengguna
        libxml_use_internal_errors (true);
        $dom->loadHTML($request->desc, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NOIMPLIED);

        #Menghapus buffer kesalahan libxml
        libxml_clear_errors();

        # Baca di https://doseoit.com/php/fungsi-libxml-php $dom→getElementsByTagName('img');
        $images = $dom->getElementsByTagName('img');
        
        foreach ($images as $img) {
        $src = $img->getAttribute('src');
        if (preg_match('/data:image/', $src)) {
            preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
            $mimetype = $groups['mime'];
            $fileNameContent = uniqid();
            $fileNameContentRand = substr(md5($fileNameContent), 6, 6) . '_' . time();
            $filePath=("$storage/$fileNameContentRand. $mimetype");
            $image = Image::make($src)->resize(1440, 720)->encode($mimetype, 100)->save(public_path($filePath));
            $new_src = asset($filePath);
            $img->removeAttribute('src');
            $img->setAttribute('src', $new_src);
            $img->setAttribute('class', 'img-responsive');
        }
    }
    
        Blog::create([
                'judul' => $request->judul,
                'slug' => Str::slug($request->judul, '-'),
                'image' => $fileName,
                'desc' => $dom->saveHTML(),
        ]);
            return redirect(route('blog'))->with('success', 'data berhasil di simpan');
}

        //halaman create
    public function edit($id){
        $artikel = Blog::find($id);
        return view('admin.blog.edit', [
        'artikel' => $artikel
        ]);
    }

            //halaman create
    public function update(Request $request, $id){
        
        $artikel = Blog::find($id);
        
        #Jika ada image baru
        if ($request->hasFile('image')) {
            $fileCheck = 'required|max:1000|mimes:jpg,jpeg,png';
        } else {
            $fileCheck = '';
        }
            $rules = [
                'judul'=>'required',
                'image'=> $fileCheck,
                'desc'=>'required|min:20',
            ];
            $messages = [
                'judul.required'=>'Judul wajib diisi!',
                'image.required'=>'Image wajib diisi!',
                'desc.required'=>'Desc wajib diisi!',
            ];

        $this->validate($request, $rules, $messages);
        // Cek jika ada image baru
        if ($request->hasFile('image')) {
        if (File::exists(public_path('storage/artikel/' . $artikel->image))) {
            File::delete(public_path('storage/artikel/' . $artikel->image));
        }
    
        $fileName = time() . '.' . $request->image->extension();
        $request->file('image')->storeAs('public/artikel', $fileName);
}

        
        if ($request->hasFile('image')) {
            $checkFileName = $fileName;
        } else {
            $checkFileName = $request->old_image;
        }

        // Artikel
        $storage = "storage/content-artikel";
        $dom = new \DOMDocument();
        libxml_use_internal_errors (true);
        $dom->loadHTML($request->desc, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NOIMPLIED);
        libxml_clear_errors();

        $images = $dom->getElementsByTagName('img');

        foreach ($images as $img) {
            $src= $img->getAttribute('src');
            if (preg_match('/data:image/', $src)) {
                preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                $mimetype= $groups['mime'];
                $fileNameContent = uniqid();
                $fileNameContentRand = substr(md5($fileNameContent), 6, 6)  . '.' . time();
                $filePath = ("$storage/$fileNameContentRand. $mimetype");
                $image = Image:: make($src)->resize(1200, 1200)->encode($mimetype, 100)->save(public_path($filePath));
                $new_src = asset($filePath);
                $img->removeAttribute('src');
                $img->setAttribute('src', $new_src);
                $img->setAttribute('class', 'img-responsive');
            }
        }
        $artikel->update([
            'judul' => $request->judul,
            'image' => $checkFileName,
            'desc' => $dom->saveHTML(),
        ]);
        return redirect(route('blog'))->with('success', 'data berhasil di update');
    }

    //halaman delate
    public function destroy($id)
    {    
        $artikel = Blog::find($id);
        
        if (File::exists(public_path('storage/artikel/' . $artikel->image))) {
        File::delete(public_path('storage/artikel/' . $artikel->image));
        }
        
        $artikel->delete();
        
        return redirect(route('blog'))->with('success', 'data berhasil di hapus');
        
    }
}
