@extends('layouts.main')

@section('container')
    <div class="row justify-content-center">
        <div class="col-md-6 image-container">
            <img src="/img/bg2.png" alt="Logo" class="mb-6">
        </div>
        <div class="col-md-5">
            <main class="form-signin">
                <h1 class="h3 mb-3 fw-normal">Registration Form</h1>

                <form action="/register" class="signin-form" method="post">
                    @csrf
                    <div class="mb-3">
                    <select name="role" id="role" hidden>
                        <option value="user">User</option>
                    </select>
                    </div>
                    
                    <div class="mb-3">
                        <label for="name" class="form-label visually-hidden">Nama</label>
                        <input type="text" class="form-control rounded-top @error('name') is-invalid @enderror" id="name" name="name" placeholder="Nama" required value="{{ old('name') }}">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="username" class="form-label visually-hidden">Username</label>
                        <input type="text" class="form-control rounded-top @error('username') is-invalid @enderror" id="username" name="username" placeholder="Username" required value="{{ old('username') }}">
                        @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label visually-hidden">Email</label>
                        <input type="text" class="form-control rounded-top @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email" required value="{{ old('email') }}">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label visually-hidden">Password</label>
                        <input type="password" class="form-control rounded-top @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password" required>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <button class="w-100 btn btn-lg btn-primary" type="submit">Registration</button>
                </form>

                <small class="d-block text-center register-link">Already registered? <a href="/login">Login</a></small>
            </main>
        </div>
    </div>
@endsection
