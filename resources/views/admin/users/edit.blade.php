@extends('adminlte::page')

@section('title', 'Редактировать администратора')

@section('content_header')
    <h1>Редактировать администратора</h1>
@endsection

@section('content')
    <form action="{{ route('admins.update', $admin->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Имя</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                   value="{{ old('name', $admin->name) }}" required>
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror"
                   value="{{ old('email', $admin->email) }}" required>
            @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="password">Пароль</label>
            <input type="password" name="password" id="password"
                   class="form-control @error('password') is-invalid @enderror">
            <small class="form-text text-muted">Оставьте поле пустым, если не хотите менять пароль.</small>
            @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="status">Статус</label>
            <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                <option value="active" {{ $admin->status->value == 'active' ? 'selected' : '' }}>Активный</option>
                @if (auth()->user()->id !== $admin->id)
                    <option value="inactive" {{$admin->status->value == 'inactive' ? 'selected' : '' }}>Неактивный
                    </option>
                @else
                    <option value="inactive" disabled>Неактивный</option>
                @endif
            </select>
            @error('status')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="input-group">
           <span class="input-group-btn">
             <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
               <i class="fa fa-picture-o"></i> Choose
             </a>
           </span>
            <input id="thumbnail" class="form-control" type="text" name="avatar_path"
                   value="{{ old('avatar_path', $admin->avatar_path) }}">
        </div>
        <div id="holder" style="margin-top:15px;max-height:100px;">
            @if(!empty($admin->avatar_path))
                <img src="{{$admin->avatar_path}}" style="height: 5rem;">
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
@endsection
@section('js')
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script>
        $('#lfm').filemanager('image');    </script>
@endsection
