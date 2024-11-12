<!DOCTYPE html>
<html>
<head>
    <title>Все заказы</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
<div class="container">
    <h1>Все заказы</h1>
    <ul class="list-group">
        @foreach($orders as $order)
            <li class="list-group-item">
                Номер заказа: {{ $order->id }}

                Дата заказа: {{ $order->created_at }}

                Товары: {{ implode(', ', array_column($order->products, 'name')) }}

                Общая стоимость: {{ $order->total_price }} руб.
            </li>
        @endforeach
    </ul>
    <p class="mt-3">Итоговая стоимость всех заказов: {{ $totalOrdersPrice }} руб.</p>
    <a href="{{ route('products.index') }}" class="btn btn-secondary mt-3">Вернуться к каталогу товаров</a>
</div>
</body>
</html>
