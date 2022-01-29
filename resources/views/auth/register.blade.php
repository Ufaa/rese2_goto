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

    .register-title {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        padding: 15px;
    }

    .mt-4 {
        display: flex;
    }

    .register-form {
        padding-top: 60px;
    }


    .register-title {
        background-color: #0033FF;
    }

    .registertitle {
        color: white;
    }

    .user-icon,
    .email-icon,
    .password-icon,
    .passwordconfirm-icon {
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
        <x-auth-card>
            <x-slot name="logo">
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" style="display: none;" />
                </a>
            </x-slot>

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form method="POST" action="{{ route('register') }}" class="register-form">
                @csrf

                <div class="register-title">
                    <p class="registertitle">Registration</p>
                </div>

                <!-- Name -->
                <div class="mt-4">
                    <div class="user-icon">
                        <i class="fas fa-user"></i>
                    </div>
                    <x-label for="name" :value="__('')" />

                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" style="border-style: none; border-bottom: solid 1px; border-radius: 0; padding:0;" placeholder="Name" :value="old('name')" required autofocus />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <div class="email-icon">
                        <i class="fas fa-envelope" style="display: flex;"></i>
                    </div>
                    <x-label for="email" :value="__('')" />

                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" style="border-style: none; border-bottom: solid 1px; border-radius: 0; padding:0;" placeholder="Email" :value="old('email')" required />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <div class="password-icon">
                        <i class="fas fa-lock"></i>
                    </div>
                    <x-label for="password" :value="__('')" />

                    <x-input id="password" class="block mt-1 w-full" type="password" placeholder="Password" name="password" style="border-style: none; border-bottom: solid 1px; border-radius: 0; padding:0;" required autocomplete="new-password" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <div class="passwordconfirm-icon">
                        <i class="fas fa-check-square"></i>
                    </div>
                    <x-label for="password_confirmation" :value="__('')" />

                    <x-input id="password_confirmation" class="block mt-1 w-full" type="password" placeholder="Passwordを再入力" name="password_confirmation" style="border-style: none; border-bottom: solid 1px; border-radius: 0; padding:0;" required />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                        {{ __('登録済みですか?') }}
                    </a>

                    <x-button class="ml-4" style="background-color: #0033FF">
                        {{ __('登録') }}
                    </x-button>
                </div>
            </form>
        </x-auth-card>
    </x-guest-layout>

</body>