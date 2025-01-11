@extends('adminlte::page')

@section('title', 'Добавить администратора')

@section('content_header')
    <h1>Добавить администратора</h1>
@endsection

@section('content')
    <form action="{{ route('admins.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Имя</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                   value="{{ old('name') }}" required>
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror"
                   value="{{ old('email') }}" required>
            @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="password">Пароль</label>
            <input type="password" name="password" id="password"
                   class="form-control @error('password') is-invalid @enderror" required>
            @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="status">Статус</label>
            <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                <option value="active" {{ request('status') === 'active' ? 'selected' : '' }}>Активный</option>
                <option value="inactive" {{ request('status') === 'inactive' ? 'selected' : '' }}>Неактивный</option>
            </select>
            @error('status')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">Создать</button>
        <a href="{{ route('admins.index') }}" class="btn btn-secondary ml-2">Отмена</a>
    </form>
@endsection
