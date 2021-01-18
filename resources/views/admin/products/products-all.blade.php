@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="page-title col-lg-12">
            <h2>All Products</h2>
        </div>
    </div>
    <div class="row">
    <ul>
        @foreach($products as $product)
        <li>
            {{-- @if ($product->genere=='Dr.') {{-- Qua inserire la categoria del prodotto in modo da filtrare --}}  
            <div class="item col-lg-12">
                <a href='#' class="btn btn-warning btn-block text-center" role="button">
                <div class="item-picture">
                    <img src="{{$product->photo1}}" alt="item picture" />
                </div>
                <div class="item-text">
                    <h4>{{$product->nome}}</h4>
                    <h6>€ {{$product->amount}}</h6>
                </div>
                </a>
                <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-block text-center" role="button">
                    EDIT
                </a>
                <a href="{{ route('admin.products.create') }}" class="btn btn-block text-center" role="button">
                    CREATE NEW 
                </a>
            </div>
        </li>
    {{-- @endif --}}
    @endforeach
    </ul>
    </div>
</div>

@endsection