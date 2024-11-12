<!DOCTYPE html>
<html>
<head>
    <title>Корзина</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
<div class="container">
    <h1>Корзина</h1>
    <ul  class="list-group">
        @foreach($cartItems as $id => $item)
            <li class="list-group-item">
                {{ $item['name'] }} - {{ $item['quantity'] }} шт. x {{ $item['price'] }} руб. = {{ $item['quantity'] * $item['price'] }} руб.
            </li>
        @endforeach
    </ul>
    <p>Общая стоимость: {{ $totalPrice }} руб.</p>
    <form action="{{ route('order.create') }}" method="POST">
        @csrf
        <button type="submit">Оформить заказ</button>
    </form>
    <a href="{{ route('products.index') }}">Вернуться к каталогу товаров</a>
</div>
</body>
</html>
