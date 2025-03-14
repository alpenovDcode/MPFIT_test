@extends('layouts.app')
@section('title', 'Просмотр товара - Управление товарами и заказами')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Просмотр товара</h1>
        <div>
            <a href="{{ route('products.edit', $product) }}" class="btn btn-primary me-2">Редактировать</a>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Назад к списку</a>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">Информация о товаре</h5>
            <div class="mb-3">
                <strong>ID:</strong> {{ $product->id }}
            </div>
            <div class="mb-3">
                <strong>Название:</strong> {{ $product->name }}
            </div>
            <div class="mb-3">
                <strong>Категория:</strong> <a href="{{ route('categories.show', $product->category) }}">{{ $product->category->name }}</a>
            </div>
            <div class="mb-3">
                <strong>Цена:</strong> {{ number_format($product->price, 2, '.', ' ') }} ₽
            </div>
            <div class="mb-3">
                <strong>Описание:</strong>
                <p>{{ $product->description ?: 'Описание отсутствует' }}</p>
            </div>
            <div class="mb-3">
                <strong>Дата создания:</strong> {{ $product->created_at->format('d.m.Y H:i:s') }}
            </div>
            <div class="mb-3">
                <strong>Дата обновления:</strong> {{ $product->updated_at->format('d.m.Y H:i:s') }}
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Заказы с этим товаром</h5>
            @if($product->orders->isEmpty())
                <p class="text-center">Заказы с этим товаром отсутствуют.</p>
            @else
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Покупатель</th>
                                <th>Количество</th>
                                <th>Статус</th>
                                <th>Дата создания</th>
                                <th>Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($product->orders as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->customer_name }}</td>
                                    <td>{{ $order->quantity }}</td>
                                    <td>
                                        <span class="badge {{ $order->status === 'новый' ? 'bg-primary' : 'bg-success' }}">
                                            {{ $order->status }}
                                        </span>
                                    </td>
                                    <td>{{ $order->created_at->format('d.m.Y H:i:s') }}</td>
                                    <td>
                                        <a href="{{ route('orders.show', $order) }}" class="btn btn-sm btn-info">Просмотр</a>
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