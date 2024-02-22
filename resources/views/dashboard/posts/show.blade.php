@extends('dashboard.layout.main')
@section('container')
    <div class="container">
        <div class="row ">
            <div class="col-lg-8">
                <h2 class="my-3">{{ $post->title }}</h2>

                <a href="/dashboard/posts" class="badge bg-success  mb-2"><span data-feather="arrow-left"></span>Kembali ke
                    daftar postingan</a>
                <a href="/dashboard/posts/{{ $post->slug }}/edit" class="badge bg-warning mb-2"><span
                        data-feather="edit"></span>
                    Edit</a>
                <form action="/dashboard/posts/{{ $post->slug }}" method="POST" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="badge bg-danger border-0"
                        onclick="return confirm('apakah anda yakin menghapus postingan ini?')"><span
                            data-feather="x-circle"></span> Hapus</button>
                </form>

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

                    {!! $post->body !!} <a class="d-block mt-2" href="/dashboard/posts">kembali</a>
                </article>
            </div>
        </div>
    </div>
@endsection
