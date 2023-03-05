@extends('layaouts.master')

@section('content')
<div class="flex justify-center mt-10">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card bg-gray-100 p-5 rounded-sm">
                <div class="card-header text-gray-700 flex justify-center mb-5">
                    <h1 class="text-2xl font-bold">{{ __('Reset Password') }}</h1>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="row mb-3">

                            <div class="col-md-6">
                                <input hidden id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                                

                                @error('email')
                                    <span class="invalid-feedback " role="alert">
                                        <small>{{ $message }}</small>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-5">

                            <div class="col-md-6">
                                

                                <div>
                                    <label class="relative">
                                        <input name="password" id="password" type="password" class="border-2 rounded-md border-black border-opacity-20 outline-none focus:border-lime-500 w-full py-1.5 px-5 transition duration-200 @error('password') is-invalid @enderror" placeholder=" " required autocomplete="new-password">
                                        <span class="text-opacity-30 text-black absolute text-xs md:text-sm left-0 top-0 mx-3 px-2 transition duration-200 input-text-password">
                                            Contraseña
                                        </span>
                                    </label>
                                </div>

                                @error('password')
                                    <span class="invalid-feedback text-red-500" role="alert">
                                        <small>{{ $message }}</small>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-5">

                            <div>
                                <label class="relative">
                                    <input name="password_confirmation" id="password-confirm" type="password" class="border-2 rounded-md border-black border-opacity-20 outline-none focus:border-lime-500 w-full py-1.5 px-5 transition duration-200 @error('password') is-invalid @enderror" placeholder=" " required autocomplete="new-password">
                                    <span class="text-opacity-30 text-black absolute text-xs md:text-sm left-0 top-0 mx-3 px-2 transition duration-200 input-text-password">
                                        Confirmar Contraseña
                                    </span>
                                </label>
                            </div>

                        </div>

                        <div class="row mb-0 flex justify-center">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-tienda">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
