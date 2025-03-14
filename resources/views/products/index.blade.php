@extends('layouts.app')
@section('title', 'Товары - Управление товарами и заказами')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Товары</h1>
        <a href="{{ route('products.create') }}" class="btn btn-success">Добавить товар</a>
    </div>
    <div class="card">
        <div class="card-body">
            @if($products->isEmpty())
                <p class="text-center">Товары не найдены.</p>
            @else
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Название</th>
                                <th>Категория</th>
                                <th>Цена</th>
                                <th>Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->category->name }}</td>
                                    <td>{{ number_format($product->price, 2, '.', ' ') }} ₽</td>
                                    <td class="d-flex">
                                        <a href="{{ route('products.show', $product) }}" class="btn btn-sm btn-info me-2">Просмотр</a>
                                        <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-primary me-2">Редактировать</a>
                                        <form action="{{ route('products.destroy', $product) }}" method="POST" onsubmit="return confirm('Вы уверены, что хотите удалить этот товар?');">
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