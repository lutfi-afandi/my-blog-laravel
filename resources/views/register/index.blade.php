@extends('layouts.main')
@section('container')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <main class="form-signin">
                <h1 class="h3 mb-3 fw-normal text-center">Silahkan Registrasi</h1>
                <form action="/register" method="POST">
                    @csrf
                    <div class="form-floating mt-1">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            placeholder="masukan nama" required value="{{ old('name') }}">
                        <label>Nama</label>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating mt-1">
                        <input type="text" class="form-control @error('username') is-invalid @enderror" name="username"
                            placeholder="masukan username" required value="{{ old('username') }}">
                        <label>Username</label>
                        @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating mt-1">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                            placeholder="masukan email" required value="{{ old('email') }}">
                        <label>E-Mail</label>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating mt-1">
                        <input type="text" class="form-control @error('password') is-invalid @enderror" name="password"
                            placeholder="masukan password" required>
                        <label>Password</label>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Register</button>

                </form>
                <small class="d-block text-center mt-3">Sudah mendaftar? <a href="/login"
                        class="text-decoration-none">silahkan login</a></small>
            </main>
        </div>
    </div>
@endsection
