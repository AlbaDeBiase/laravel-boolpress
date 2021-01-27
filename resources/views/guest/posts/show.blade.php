@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>{{ $post->title }}</h1>
                <div>
                    {{ $post->text }}
                </div>
                <p>Categoria: {{ $post->category ? $post->category->name : '-' }}</p>
            </div>
        </div>
    </div>
@endsection
