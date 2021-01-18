@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <ul>
                <li>
                    <a href="{{ route('admin.products.all') }}">Products</a>
                    <a href="{{ route('admin.products.create') }}">Create A New Product</a>

                </li>
            </ul>
        </div>
    </div>

@endsection