<div class="col-lg-12 col-sm-12 col-12 main-section">
    <div class="dropdown">
        <button type="button" class="btn ">
            <a href="{{ route('cart.index') }}">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i> 
                @if(Cart::instance('default')->count() > 0)
                    <div class="notifica">
                        <span class="badge badge-pill badge-danger">
                            {{ Cart::instance('default')->count() }}
                        </span>
                    </div>
                @endif
            </a>
        </button>
    </div>
</div>