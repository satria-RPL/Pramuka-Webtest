@extends('layouts.layouts')

@section('content')
    <style>
        body {
            background: #f0f2f5;
        }
        .login-bg {
            min-height: 100vh;
            background: #e0e4f0;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-container {
            width: 100%;
            max-width: 400px;
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.15);
            padding: 32px 28px 24px 28px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .login-container .login-icon {
            margin-bottom: 10px;
        }
        .login-container .login-icon img {
            width: 56px;
            height: 56px;
            object-fit: contain;
        }
        .login-container h3 {
            font-weight: 700;
            margin-bottom: 18px;
            color: #0e2a47;
            text-align: center;
        }
        .login-container .form-control {
            background: #f5f6fa;
            border: none;
            border-radius: 6px;
            margin-bottom: 16px;
            padding: 14px 16px;
            font-size: 1.05rem;
        }
        .login-container .form-control:focus {
            box-shadow: 0 0 0 2px #0e2a4733;
            border: none;
        }
        .login-container .btn-login {
            width: 100%;
            background: #22334a;
            color: #fff;
            font-weight: 600;
            border: none;
            border-radius: 6px;
            padding: 12px 0;
            margin-bottom: 10px;
            transition: background 0.2s;
        }
        .login-container .btn-login:hover {
            background: #0e2a47;
        }
        .login-container .register-link {
            font-size: 1rem;
            color: #888;
            text-align: center;
        }
        .login-container .register-link a {
            color: #22334a;
            text-decoration: underline;
            margin-left: 2px;
        }
        @media (max-width: 600px) {
            .login-container {
                max-width: 96vw;
                padding: 20px 8px 16px 8px;
            }
            .login-container .login-icon img {
                width: 44px;
                height: 44px;
            }
        }
    </style>
    <div class="login-bg">
        <div class="login-container">
            <div class="login-icon">
                <img src="{{ asset('assets/icons/logo-ambalan.png') }}" alt="Logo Ambalan">
            </div>
            <h3>Login</h3>
            <form action="/login" method="POST" style="width:100%;">
                @csrf
                <input type="email" name="email" class="form-control" placeholder="Username" required>
                <input type="password" name="password" class="form-control" placeholder="Password" required>
                <button type="submit" class="btn btn-login">LOGIN</button>
            </form>
            <div class="register-link">
                Not registered?
                <a href="/register">Create an account</a>
            </div>
        </div>
    </div>
@endsection