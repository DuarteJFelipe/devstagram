@extends('layouts.app')

@section('titulo')
    {{ $post->titulo }}
@endsection

@section('contenido')
    <div class="container mx-auto md:flex">
        <div class="md:w-6/12">
            <img src="{{ asset('uploads') .'/'. $post->imagen }}" alt="Imagen del post {{ $post->titulo }}">
            <div class="p-3">
                <p>0 Likes</p>
            </div>
            <div class="">
                <p class="font-bold">{{ $post->user->username }}</p>
                <p class="text-sm text-gay-500">{{ $post->created_at->diffForHumans() }}</p>
                <p class="mt-5">{{ $post->descripcion }}</p>
            </div>
        </div>


       
        <div class="md:w-6/12 p-5">
            <div class="shadow bg-white mb-5 p-5">
                @auth
                    <p class="text-xl font-bold text-center mb-4">Agrega un Nuevo Comentario</p>
                        @if (session('mensaje'))
                            <div class="bg-green-500 p-2 rounded-lg mb-6 text-white text-center uppercase font-bold">
                                {{session('mensaje')}}
                            </div>
                        @endif
                    <form action="{{ route('comentarios.store', ['post' => $post, 'user' => $user]) }}" method="POST">
                        @csrf
                        <div class="mb-5">
                            <label for="comentario" class="mb-2 block uppercase text-gray-500 font-bold">Añade un Comentario</label>
                            <textarea
                                id="comentario"
                                {{-- lo que lee el php 'name' --}}
                                name="comentario" 
                                placeholder="Agrega un comentario"
                                class="border p-3 w-full rounded-lg @error('comentario') border-red-500 @enderror"   
                            ></textarea>
        
                            @error('comentario')
                                <p class="text-sm text-red-500 px-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <input 
                            type="submit" 
                            value="Comentar"
                            class="bg-sky-600 hover:bg-sky-700 text-white w-full cursor-pointer transition-colors rounded-lg p-3 font-bold uppercase" 
                        >
                    </form>
                @endauth

                <div class="bg-white shadow mb-5 max-h-96 overflow-y-auto mt-10">
                    @if ($post->comentarios->count() > 0)
                        @foreach ($post->comentarios as $comenatario)
                            <div class="p-5 border-gray-300 border-b">
                                <a href="{{ route('posts.index', $comenatario->user) }}" class="font-bold">
                                    <p>{{ $comenatario->user->username }}</p>
                                </a>
                                <p>{{ $comenatario->comentario }}</p>
                                <p class="text-sm text-gray-500">{{ $comenatario->created_at->diffForHumans() }}</p>
                            </div>
                        @endforeach
                    @else
                        <p class="p-10 text-center">No Hay Comenatarios Aún</p>
                    @endif
                </div>
            
            </div>
        </div>
    </div>
@endsection