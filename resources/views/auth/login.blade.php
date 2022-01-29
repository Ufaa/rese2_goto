@extends('layouts.default')
<style>
    body {
        background-color: rgb(230, 230, 230);
    }

    .title {
        font-size: 40px;
        font-weight: bold;
        color: #0033FF;
        margin: 0 0 0 70px;
    }

    .title a {
        text-decoration: none;
        color: #0033FF;
    }

    .min-h-screen {
        background-color: rgb(230, 230, 230);
    }

    .w-full {
        position: relative;
    }

    .login-title {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        padding: 15px;
    }

    .mt-4 {
        display: flex;
    }

    .login-form {
        padding-top: 60px;
    }


    .login-title {
        background-color: #0033FF;
    }

    .logintitle {
        color: white;
    }

    .email-icon,
    .password-icon {
        padding: 10px;
    }
</style>

<head>
    <script src="https://kit.fontawesome.com/eb8d65ab2e.js" crossorigin="anonymous"></script>
</head>



<body>
    <div class="title"><a href="/">Rese</a>
    </div>

    <x-guest-layout>
        <x-auth-card class="auth-card">
            <x-slot name="logo">
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" style="display: none;" />
                </a>
            </x-slot>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form method="POST" action="{{ route('login') }}" class="login-form">
                @csrf
                <div class="login-title">
                    <p class="logintitle">Login</p>
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <div class="email-icon">
                        <i class="fas fa-envelope" style="display: flex;"></i>
                    </div>
                    <x-label for="email" :value="__('')" />

                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" style="border-style: none; border-bottom: solid 1px; border-radius: 0; padding:0;" placeholder="Email" :value="old('email')" required autofocus />
                </div>

                <!-- Password -->

                <div class="mt-4">
                    <div class="password-icon">
                        <i class="fas fa-lock"></i>
                    </div>
                    <x-label for="password" :value="__('')" />

                    <x-input id="password" class="block mt-1 w-full" type="password" placeholder="Password" name="password" style="border-style: none; border-bottom: solid 1px; border-radius: 0; padding:0;" required autocomplete="current-password" />
                </div>

                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                        <span class="ml-2 text-sm text-gray-600">{{ __('入力した値を記憶させる') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-end mt-4">
                    @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('パスワードを忘れた場合') }}
                    </a>
                    @endif

                    <x-button class="ml-3" style="background-color: #0033FF">
                        {{ __('ログイン') }}
                    </x-button>
                </div>
            </form>
        </x-auth-card>
    </x-guest-layout>
</body>