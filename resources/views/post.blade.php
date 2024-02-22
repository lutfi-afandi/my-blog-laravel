@extends('layouts.main')
@section('container')
    <h1 class="mb-2 text-center">{{ $title }}</h1>



    @if ($posts->count())
        <style>
            .gbr:hover {
                /* scale: 1.05;
                                    animation: slide 2s linear; */
                transform: scale(1.1);
                animation: 500ms;
            }
        </style>
        <div class="card mb-3 ">
            @if ($posts[0]->image)
                <div style="max-height: 540px; overflow: hidden;">
                    <img src="{{ asset('storage/' . $posts[0]->image) }}" class="card-img-top"
                        alt="{{ $posts[0]->category->name }}" class="img-fluid mt-3 gbr">
                </div>
            @else
                <img src="https://source.unsplash.com/1200x400?{{ $posts[0]->category->name }}" class="card-img-top"
                    alt="...">
            @endif

            <div class="card-body text-center">
                <h3 class="card-title"> <a class="text-decoration-none"
                        href="/posts/{{ $posts[0]->slug }}">{{ $posts[0]->title }}</a>
                </h3>

                <p>By. <a class="text-decoration-none"
                        href="/posts?author={{ $posts[0]->author->username }}">{{ $posts[0]->author->name }}</a>
                    in
                    <a class="text-decoration-none"
                        href="/posts?category={{ $posts[0]->category->slug }}">{{ $posts[0]->category->name }}</a>
                    {{ $posts[0]->created_at->diffForHumans() }}
                </p>
                <p class="card-text">{{ $posts[0]->excerpt }}</p>
                <a class="btn btn-primary" href="/posts/{{ $posts[0]->slug }}">read more ...</a>
            </div>
        </div>
        <div class="row justify-content-center mb-3">
            <div class="col-md-6">
                <form action="/posts">
                    @if (request('category'))
                        <input type="hidden" name="category" value="{{ request('category') }}">
                    @endif
                    @if (request('author'))
                        <input type="hidden" name="author" value="{{ request('author') }}">
                    @endif
                    <div class="input-group mb-3">
                        <input type="text" name="search" class="form-control" placeholder="cari postingan..."
                            value="{{ request('search') }}">
                        <button class="btn btn-dark" type="submit">Cari</button>
                    </div>
                </form>
            </div>
        </div>


        <div class="container">
            <div class="row">
                @foreach ($posts->skip(1) as $post)
                    <div class="col-sm-4 mb-3">
                        <div class="card">
                            <div class="position-absolute px-3 py-2" style="background-color: rgba(0, 0, 0, 0.7)"> <a
                                    class="text-decoration-none text-white"
                                    href="/posts?category={{ $post->category->slug }}">
                                    {{ $post->category->name }}</a>

                            </div>
                            @if ($post->image)
                                <div>
                                    <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top"
                                        alt="{{ $post->category->name }}" class="img-fluid mt-3">
                                </div>
                            @else
                                <img src="https://source.unsplash.com/500x400?{{ $post->category->name }}"
                                    class="card-img-top" alt="{{ $post->author->name }}">
                            @endif

                            <div class="card-body">
                                <h5 class="card-title">{{ $post->title }}</h5>
                                <p>By. <a class="text-decoration-none"
                                        href="/posts?author={{ $post->author->username }}">{{ $post->author->name }}</a>
                                    {{ $post->created_at->diffForHumans() }}
                                </p>
                                <p class="card-text">{{ $posts[0]->excerpt }}</p>
                                <a href="/posts/{{ $post->slug }}" class="btn btn-primary">Read More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @else
        <div class="text-center fs-3">Postingan tidak tersedia</div>
    @endif

    <div class="d-flex justify-content-end">

        {{ $posts->links() }}
    </div>
@endsection
