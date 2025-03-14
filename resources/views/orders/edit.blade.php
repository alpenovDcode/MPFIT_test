@extends('layouts.app')
@section('title', 'Редактирование заказа - Управление товарами и заказами')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Редактирование заказа</h1>
        <a href="{{ route('orders.index') }}" class="btn btn-secondary">Назад к списку</a>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('orders.update', $order) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="customer_name" class="form-label">ФИО покупателя</label>
                    <input type="text" class="form-control @error('customer_name') is-invalid @enderror" id="customer_name" name="customer_name" value="{{ old('customer_name', $order->customer_name) }}" required>
                    @error('customer_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="product_id" class="form-label">Товар</label>
                    <select class="form-select @error('product_id') is-invalid @enderror" id="product_id" name="product_id" required>
                        <option value="">Выберите товар</option>
                        @foreach($products as $product)
                            <option value="{{ $product->id }}" {{ (old('product_id', $order->product_id) == $product->id) ? 'selected' : '' }}>
                                {{ $product->name }} ({{ number_format($product->price, 2, '.', ' ') }} ₽)
                            </option>
                        @endforeach
                    </select>
                    @error('product_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="quantity" class="form-label">Количество</label>
                    <input type="number" min="1" class="form-control @error('quantity') is-invalid @enderror" id="quantity" name="quantity" value="{{ old('quantity', $order->quantity) }}" required>
                    @error('quantity')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Статус</label>
                    <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                        <option value="новый" {{ (old('status', $order->status) == 'новый') ? 'selected' : '' }}>Новый</option>
                        <option value="выполнен" {{ (old('status', $order->status) == 'выполнен') ? 'selected' : '' }}>Выполнен</option>
                    </select>
                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="comment" class="form-label">Комментарий</label>
                    <textarea class="form-control @error('comment') is-invalid @enderror" id="comment" name="comment" rows="3">{{ old('comment', $order->comment) }}</textarea>
                    @error('comment')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Обновить</button>
            </form>
        </div>
    </div>
@endsection 