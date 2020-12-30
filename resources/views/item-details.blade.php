@extends('layouts.app')

@section('content')
    <div class="item-view">
        <div class="item-picture">
            <img id="" src="" alt="item pictures" />
        </div>
        <div class="item-details">
            <h3>{{$product->name}}</h3>
            <p>{{$product->description}}</p>
            <span></span>
        </div>
        <div class="item-amount">
            {{$product->amount}}
        </div>
            <form action="{{ route('cart.store') }}" method="POST"> {{--  --}}
                @csrf
                @method('POST')
                <input type="hidden" name="id" value="{{ $product->id }}">
                <input type="hidden" name="nome" value="{{ $product->nome }}">
                <input type="hidden" name="taglia" value="{{ $product->taglia }}">
                <input type="hidden" name="amount" value="{{ $product->amount }}">
                <button type="submit" class="btn btn-holder btn-warning">Add to Cart</button>
            </form>
    </div>

@endsection