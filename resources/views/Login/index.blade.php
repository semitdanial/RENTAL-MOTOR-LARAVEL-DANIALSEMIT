@extends('layouts.main')

@section('container')
    <div class="row justify-content-center">
        <div class="col-md-10">
            @if(session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(session()->has('loginError'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('loginError') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="row">
                <div class="col-md-6 image-container">
                    <img src="/img/bg2.png" alt="Logo" class="mb-6">
                </div>
                <div class="col-md-6">
                    <main class="form-signin">
                        <h1 class="h3 mb-3 fw-normal">Please Sign In</h1>

                        <form action="/login" class="signin-form" method="post">
                            @csrf

                            <div class="mb-3">
                                <label for="email" class="form-label visually-hidden">Email</label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email" autofocus required value="{{ old('email') }}" name="email">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label visually-hidden">Password</label>
                                <input type="password" class="form-control" id="password" placeholder="Password" required name="password">
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Sign In</button>
                            </div>

                            <div class="mb-3 forgot-password">
                                <a href="#">Forgot Password</a>
                            </div>
                        </form>

                        <small class="d-block text-center register-link">Not registered? <a href="/register">Register Now!</a></small>
                    </main>
                </div>
            </div>
        </div>
    </div>
@endsection
