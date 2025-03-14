@extends('layouts.app')
@section('title', 'Просмотр категории - Управление товарами и заказами')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Просмотр категории</h1>
        <div>
            <a href="{{ route('categories.edit', $category) }}" class="btn btn-primary me-2">Редактировать</a>
            <a href="{{ route('categories.index') }}" class="btn btn-secondary">Назад к списку</a>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">Информация о категории</h5>
            <div class="mb-3">
                <strong>ID:</strong> {{ $category->id }}
            </div>
            <div class="mb-3">
                <strong>Название:</strong> {{ $category->name }}
            </div>
            <div class="mb-3">
                <strong>Дата создания:</strong> {{ $category->created_at->format('d.m.Y H:i:s') }}
            </div>
            <div class="mb-3">
                <strong>Дата обновления:</strong> {{ $category->updated_at->format('d.m.Y H:i:s') }}
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Товары в этой категории</h5>
            @if($category->products->isEmpty())
                <p class="text-center">В этой категории нет товаров.</p>
            @else
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Название</th>
                                <th>Цена</th>
                                <th>Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($category->products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ number_format($product->price, 2, '.', ' ') }} ₽</td>
                                    <td>
                                        <a href="{{ route('products.show', $product) }}" class="btn btn-sm btn-info">Просмотр</a>
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