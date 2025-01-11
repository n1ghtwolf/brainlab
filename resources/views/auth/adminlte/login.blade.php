@extends('adminlte::auth.auth-page', ['auth_type' => 'login'])

@section('auth_header', 'Войдите, чтобы начать сессию')

@section('auth_body')
    <form action="{{ route('login') }}" method="post">
        @csrf

        @error('status')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="input-group mb-3">
            <input type="email" name="email" class="form-control" placeholder="Email" required
                   value="{{ old('email') }}">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                </div>
            </div>
        </div>
        @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Пароль" required>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
        </div>
        @error('password')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="row">
            <div class="col-8">
            </div>
            <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block">Войти</button>
            </div>
        </div>
    </form>
@endsection

@section('auth_footer')

@endsection
