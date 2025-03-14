@extends('layouts.app')
@section('title', 'Категории - Управление товарами и заказами')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Категории</h1>
        <a href="{{ route('categories.create') }}" class="btn btn-success">Добавить категорию</a>
    </div>
    <div class="card">
        <div class="card-body">
            @if($categories->isEmpty())
                <p class="text-center">Категории не найдены.</p>
            @else
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Название</th>
                                <th>Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td class="d-flex">
                                        <a href="{{ route('categories.show', $category) }}" class="btn btn-sm btn-info me-2">Просмотр</a>
                                        <a href="{{ route('categories.edit', $category) }}" class="btn btn-sm btn-primary me-2">Редактировать</a>
                                        <form action="{{ route('categories.destroy', $category) }}" method="POST" onsubmit="return confirm('Вы уверены, что хотите удалить эту категорию?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Удалить</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
@endsection 