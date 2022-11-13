@extends('layouts.app')

@section('titulo')
    Crear una nueva Publicación
@endsection

@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@section('contenido')
    <div class="md:flex md:items-center">
        <div class="md:w-1/2 px-10">
            <form id="dropzone" class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center" action="{{ route('imagenes.store') }}" method="POST" enctype="multipart/">
                @csrf
            </form>
        </div>
        <div class="md:w-1/2 p-10 bg-white rounded-lg shadow-xl mt-10 md:mt-0">
            <form action="{{ route('register') }}"  method="POST">
                @csrf
                <div class="mb-5">
                    <label for="titulo" class="mb-2 block uppercase text-gray-500 font-bold">Nombre</label>
                    <input
                        id="titulo"
                        {{-- lo que lee el php 'name' --}}
                        name="titulo" 
                        type="text"
                        placeholder="Titulo de la Publicación"
                        class="border p-3 w-full rounded-lg @error('titulo') border-red-500 @enderror"   
                        value="{{ old('titulo') }}"
                    >
                    @error('titulo')
                        <p class="text-sm text-red-500 px-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="descripcion" class="mb-2 block uppercase text-gray-500 font-bold">Descripción</label>
                    <textarea
                        id="descripcion"
                        {{-- lo que lee el php 'name' --}}
                        name="descripcion" 
                        placeholder="Descripción de la Publicación"
                        class="border p-3 w-full rounded-lg @error('descripcion') border-red-500 @enderror"   
                    >{{ old('descripcion') }}</textarea>

                    @error('descripcion')
                        <p class="text-sm text-red-500 px-1">{{ $message }}</p>
                    @enderror
                </div>

                <input 
                type="submit" 
                value="Crear Publicación"
                class="bg-sky-600 hover:bg-sky-700 text-white w-full cursor-pointer transition-colors rounded-lg p-3 font-bold uppercase" 
                >
            </form>
        </div>
    </div>
@endsection