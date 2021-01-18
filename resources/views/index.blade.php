@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="hero col-lg-12" style="background-image: url('{{ asset('img/dolomiti.jpg') }}');background-size:cover;background-position:0 -100px" >
                {{-- <div class="op"></div> --}}
                <div class="hero-text">
                    <h2>Noleggia i tuoi sci e li ricevi a casa tua</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row top-product">
                @foreach($products as $product)
                    @if($product->appView == 'home')
                    <div class="col-lg-4 top-product-box">
                        <img src="{{ asset('storage/'.$product->photo1) }}" alt="product image">
                    </div>
                    @endif
                @endforeach
        </div>
    </div>

@endsection 