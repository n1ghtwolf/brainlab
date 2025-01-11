@extends('adminlte::page')

@section('title', 'Список администраторов')

@section('content_header')
    <h1>Список администраторов</h1>
    <a href="{{ route('admins.create') }}" class="btn btn-primary">Добавить администратора</a>
@endsection

@section('content')
    <form action="{{ route('admins.index') }}" method="GET" class="form-inline mb-3">
        <div class="form-group mr-2">
            <input type="text" name="search" class="form-control" placeholder="Имя или Email"
                   value="{{ request('search') }}">
        </div>
        <div class="form-group mr-2">
            <select name="status" class="form-control">
                <option value="">Все</option>
                <option value="active" {{ request('status') === 'active' ? 'selected' : '' }}>Активные</option>
                <option value="inactive" {{ request('status') === 'inactive' ? 'selected' : '' }}>Неактивные</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Фильтровать</button>
        <a href="{{ route('admins.index') }}" class="btn btn-secondary ml-2">Сбросить</a>
    </form>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Имя</th>
            <th>Email</th>
            <th>Статус</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($admins as $admin)
            <tr>
                <td>{{ $admin->name }}</td>
                <td>{{ $admin->email }}</td>
                <td>{{ $admin->status }}</td>
                <td>
                    <div style="display: flex"><a href="{{ route('admins.edit', $admin->id) }}"
                                                  style="margin-left: 5px;margin-right: 5px"
                                                  class="btn btn-sm btn-warning">Редактировать</a>
                        <form action="{{ route('admins.destroy', $admin->id) }}" method="POST"
                              onsubmit="return confirm('Вы уверены, что хотите удалить администратора?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="margin-left: 5px;margin-right: 5px"
                                    class="btn btn-sm btn-danger">Удалить
                            </button>
                        </form>
                    </div>
                </td>

            </tr>
        @empty
            <tr>
                <td colspan="4">Нет администраторов.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
@endsection
