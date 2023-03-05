@extends('layaouts.master')

@section('content')
<div class="flex justify-center">
    <div class="mt-10">
        <div class="row justify-content-center">
            <div class="col-md-8 bg-gray-100 p-5 rounded-sm">
                <div class="card">
                    <div class="flex justify-center">
                        <p class="card-header text-2xl font-semibold text-gray-700">Recuperar Contraseña</p>
                    </div>
    
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
    
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
    
                            <div class="col-span-1 order-7">
                                <div class="md:mx-3 mx-2 mt-5 md:mt-3">
                                    <div>
                                        <div>
                                            <label class="relative">
                                                <input name="email" value="{{old('email')}}" type="email" class="border-2 rounded-md border-black border-opacity-20 outline-none focus:border-lime-500 w-full py-1.5 px-5 transition duration-200" placeholder=" " @error('email') is-invalid @enderror" name="email" required autocomplete="email" autofocus>
                                                
                                            </label>
                                        </div>
                                        <span class="text-sm" style="color:red"><small>@error('email'){{$message}}@enderror</small></span>
                                    </div>
                                </div>
                            </div>
    
                            <div class="row flex justify-center mt-5">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-tienda">
                                        Enviar Link de Recuperación
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
