@extends('layouts.app')

@section('content')
<?php $total = 0 ?>
    <div class="container">
        <h2>Cart</h2>
        <div class="row">
            @if (session()->has('success_message'))
                <div class="alert alert-success">
                    {{ session()->get('success_message') }}
                </div>
            @endif

            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (Cart::count() > 0)
                <h2>{{ Cart::count() }} item(s) in Shopping Cart</h2>

                @foreach( Cart::content() as $item )

                    <div class="col-lg-12">
                        <img id="" src="" alt="item-pitcure" />
                        <h4>{{$item->model->nome}}</h4>
                        <span>{{$item->model->taglia}}</span>
                        <select class="quantity">
                            <option selected="">1</option>
                            <option>2</option>
                            <option>3</option> 
                            <option>4</option>
                            <option>5</option>
                        </select>
                        <span>{{$item->model->amount}}</span>

                        <form action="{{ route('cart.destroy', $item->rowId) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="cart-option">Remove Item</button>
                        </form>
                    </div>
                <?php $total += $item->model->amount * $item->model->quantity ?>

                @endforeach
                
                <div class="total">
                    <h3>Total: € {{Cart::total()}}</h3>
                    <a href="{{ route('order.create') }}" class="">Check-out</a>
                </div>
                <div class="">
                    <a href="{{ url('/') }}">Continue Shopping</a>
                </div>

            @else

                <h3>No items in Cart!</h3>
            
            @endif
            
    </div>
@endsection