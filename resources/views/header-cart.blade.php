<div class="col-lg-12 col-sm-12 col-12 main-section">
    <div class="dropdown">
        <button type="button" class="btn btn-info">
            <a href="{{ route('cart.index') }}">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart 
                @if(Cart::instance('default')->count() > 0)
                    <span class="badge badge-pill badge-danger">
                        {{ Cart::instance('default')->count() }}
                    </span>
                @endif
            </a>
        </button>
    </div>
</div>