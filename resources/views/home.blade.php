@extends('layouts.app')
@section('title', 'Главная - Управление товарами и заказами')
@section('content')
    <div class="jumbotron">
        <h1 class="display-4">Управление товарами и заказами</h1>
        <p class="lead">Веб-приложение для управления товарами и заказами на Laravel.</p>
        <hr class="my-4">
        <p>Выберите раздел для работы:</p>
        <div class="row mt-4">
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Категории</h5>
                        <p class="card-text">Управление категориями товаров.</p>
                        <a href="{{ route('categories.index') }}" class="btn btn-primary">Перейти к категориям</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Товары</h5>
                        <p class="card-text">Управление товарами: добавление, редактирование, удаление.</p>
                        <a href="{{ route('products.index') }}" class="btn btn-primary">Перейти к товарам</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Заказы</h5>
                        <p class="card-text">Управление заказами: создание, просмотр, изменение статуса.</p>
                        <a href="{{ route('orders.index') }}" class="btn btn-primary">Перейти к заказам</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection 