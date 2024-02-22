@extends('layouts.main')
@section('container')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="mb-3">{{ $post->title }}</h2>

                <p>By. <a class="text-decoration-none"
                        href="/posts?author={{ $post->author->username }}">{{ $post->author->name }}</a> in
                    <a href="/posts?categories={{ $post->category->slug }}">{{ $post->category->name }}</a>
                </p>
                @if ($post->image)
                    <div style="max-height: 350px; overflow: hidden;">
                        <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top"
                            alt="{{ $post->category->name }}" class="img-fluid mt-3">
                    </div>
                @else
                    <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" class="card-img-top"
                        alt="{{ $post->category->name }}" class="img-fluid mt-3">
                @endif


                <article class="my-3 fs-5">

                    {!! $post->body !!} <a class="d-block mt-2" href="/posts">kembali</a>
                </article>
            </div>
        </div>
    </div>
@endsection
