@extends('layouts.main')
@section('container')
    <div class="row justify-content-center">
        <div class="col-md-5">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            @endif
            @if (session()->has('loginError'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('loginError') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            @endif
        </div>

        <main class="form-signin">
            <h1 class="h3 mb-3 fw-normal text-center">Silahkan Login</h1>

            <form action="/login" method="POST">
                @csrf
                <div class="form-floating">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" autofocus
                        placeholder="name@example.com" required>
                    <label>Email address</label>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control  @error('password') is-invalid @enderror" name="password"
                        placeholder="Password" required>
                    <label>Password</label>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
            </form>
            <small class="d-block text-center mt-3">silahkan registrasi <a href="/register"
                    class="text-decoration-none">disini</a></small>
        </main>
    </div>
    </div>
@endsection
