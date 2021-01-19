@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <h2>Shipping Details</h2>

        <form action="#{{-- route('order.store') --}}" method="post">
            @csrf

            <div class='form-row row'>
                <div class='col-xs-12 form-group required'>
                    <label class='control-label'>Nome</label> <input name="firstname"
                        class='form-control' size='20' type='text'>
                </div>
            </div>

            <div class='form-row row'>
                <div class='col-xs-12 form-group required'>
                    <label class='control-label'>Cognome</label> <input name="lastname"
                        class='form-control' size='20' type='text'>
                </div>
            </div>

            <div class='form-row row'>
                <div class='col-xs-12 form-group required'>
                    <label class='control-label'>E-mail Address</label> <input name="email"
                        class='form-control' size='20' type='text'>
                </div>
            </div>

        </form>
    </div>
</div>

@endsection