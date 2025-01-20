@extends('layouts.app')

@section('content')
    <h1>{{ $product->name }}</h1>
    <p><strong>Descrição:</strong> {{ $product->description }}</p>
    <p><strong>Preço:</strong> R$ {{ number_format($product->price, 2, ',', '.') }}</p>
    <p><strong>Quantidade:</strong> {{ $product->quantity }}</p>
    <a href="{{ route('products.index') }}" class="btn btn-secondary">Voltar</a>
@endsection