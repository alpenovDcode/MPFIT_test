@extends('layouts.app')
@section('title', 'Просмотр заказа - Управление товарами и заказами')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Просмотр заказа 
        <div>
            <a href="{{ route('orders.edit', $order) }}" class="btn btn-primary me-2">Редактировать</a>
            @if($order->status === 'новый')
                <form action="{{ route('orders.complete', $order) }}" method="POST" class="d-inline me-2">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-success">Отметить как выполненный</button>
                </form>
            @endif
            <a href="{{ route('orders.index') }}" class="btn btn-secondary">Назад к списку</a>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">Информация о заказе</h5>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <strong>ID заказа:</strong> {{ $order->id }}
                    </div>
                    <div class="mb-3">
                        <strong>ФИО покупателя:</strong> {{ $order->customer_name }}
                    </div>
                    <div class="mb-3">
                        <strong>Статус:</strong>
                        <span class="badge {{ $order->status === 'новый' ? 'bg-primary' : 'bg-success' }}">
                            {{ $order->status }}
                        </span>
                    </div>
                    <div class="mb-3">
                        <strong>Дата создания:</strong> {{ $order->created_at->format('d.m.Y H:i:s') }}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <strong>Товар:</strong> <a href="{{ route('products.show', $order->product) }}">{{ $order->product->name }}</a>
                    </div>
                    <div class="mb-3">
                        <strong>Категория товара:</strong> {{ $order->product->category->name }}
                    </div>
                    <div class="mb-3">
                        <strong>Цена за единицу:</strong> {{ number_format($order->product->price, 2, '.', ' ') }} ₽
                    </div>
                    <div class="mb-3">
                        <strong>Количество:</strong> {{ $order->quantity }}
                    </div>
                    <div class="mb-3">
                        <strong>Итоговая стоимость:</strong> {{ number_format($order->total_price, 2, '.', ' ') }} ₽
                    </div>
                </div>
            </div>
            @if($order->comment)
                <div class="mb-3">
                    <strong>Комментарий:</strong>
                    <p>{{ $order->comment }}</p>
                </div>
            @endif
        </div>
    </div>
@endsection 