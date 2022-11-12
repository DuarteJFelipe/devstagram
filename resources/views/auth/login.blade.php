@extends('layouts.app')

@section('titulo')
    Inicia Secion en DevStagram
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-10 md:items-center">
        <div class="md:w-6/12 p-5">
            <img src="{{ asset('img/login.jpg') }}" alt="Imagen login de usuarios">
        </div>

        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                @if (session('mensaje'))
                    <p class="bg-red-500 text-white my-2 rounded-lg p-2 text-sm text-center">{{ session('mensaje') }}</p>
                @endif

                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">Email</label>
                    <input
                        id="email"
                        name="email"
                        type="email"
                        placeholder="Tu Email"
                        class="border p-3 w-full rounded-lg @error('email') border-red-500 @enderror"
                        value="{{ old('email') }}"  
                    >
                    @error('email')
                        <p class="text-sm text-red-500 px-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">Password</label>
                    <input
                        id="password"
                        name="password"
                        type="password"
                        placeholder="Password"
                        class="border p-3 w-full rounded-lg @error('password') border-red-500 @enderror"  
                    >
                    @error('password')
                        <p class="text-sm text-red-500 px-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5 select-none">
                    <input type="checkbox" name="remember" id="remember"> <label for="remember" class="text-gray-500 text-sm">Mantener mi sesion abierta</label>
                </div>

                <input 
                    type="submit" 
                    value="Iniciar Sesion"
                    class="bg-sky-600 hover:bg-sky-700 text-white w-full cursor-pointer transition-colors rounded-lg p-3 font-bold uppercase" 
                >
            </form>
        </div>
    </div>
@endsection