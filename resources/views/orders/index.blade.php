@extends('layouts.app')
@section('title', 'Заказы - Управление товарами и заказами')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Заказы</h1>
        <a href="{{ route('orders.create') }}" class="btn btn-success">Создать заказ</a>
    </div>
    <div class="card">
        <div class="card-body">
            @if($orders->isEmpty())
                <p class="text-center">Заказы не найдены.</p>
            @else
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Покупатель</th>
                                <th>Товар</th>
                                <th>Количество</th>
                                <th>Итоговая цена</th>
                                <th>Статус</th>
                                <th>Дата создания</th>
                                <th>Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->customer_name }}</td>
                                    <td>{{ $order->product->name }}</td>
                                    <td>{{ $order->quantity }}</td>
                                    <td>{{ number_format($order->total_price, 2, '.', ' ') }} ₽</td>
                                    <td>
                                        <span class="badge {{ $order->status === 'новый' ? 'bg-primary' : 'bg-success' }}">
                                            {{ $order->status }}
                                        </span>
                                    </td>
                                    <td>{{ $order->created_at->format('d.m.Y') }}</td>
                                    <td class="d-flex">
                                        <a href="{{ route('orders.show', $order) }}" class="btn btn-sm btn-info me-2">Просмотр</a>
                                        <a href="{{ route('orders.edit', $order) }}" class="btn btn-sm btn-primary me-2">Редактировать</a>
                                        @if($order->status === 'новый')
                                            <form action="{{ route('orders.complete', $order) }}" method="POST" class="me-2">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-sm btn-success">Выполнен</button>
                                            </form>
                                        @endif
                                        <form action="{{ route('orders.destroy', $order) }}" method="POST" onsubmit="return confirm('Вы уверены, что хотите удалить этот заказ?');">
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