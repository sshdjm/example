<!DOCTYPE html>
<html>
<head>
    <title>Каталог товаров</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
<div class="container">
    <h1>Каталог товаров</h1>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @foreach($products as $product)
        <div class="card mb-3">
            <div class="card-body">
                <h2 class="card-title">{{ $product->name }}</h2>
                <p class="card-text">Цена: {{ $product->price }} руб.</p>
                <form action="{{ route('cart.add') }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <input type="number" name="quantity" value="1" min="1" class="form-control mb-2">
                    <button type="submit" class="btn btn-primary">Добавить в корзину</button>
                </form>
            </div>
        </div>
    @endforeach
</div>
</body>
</html>
