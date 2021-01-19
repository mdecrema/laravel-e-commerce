@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <ul>
                <li>
                    <a href="{{ route('admin.products.all') }}">Products</a>
                </li>
                <li>
                    <a href="{{ route('admin.products.create') }}">Create A New Product</a>
                </li>
                <li>
                    <a href="{{ route('admin.orders.index') }}">Orders</a>
                </li>
            </ul>
        </div>
    </div>

@endsection