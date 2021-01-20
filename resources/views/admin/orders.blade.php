@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <h2>Orders Submited</h2>
        <table class="table table-striped table-dark">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Order ID</th>
                <th scope="col">Nome</th>
                <th scope="col">Cognome</th>
                <th scope="col">E-mail</th>
                <th scope="col">Indirizzo</th>
                <th scope="col">Civico</th>
                <th scope="col">Città</th>
                <th scope="col">Provincia</th>
                <th scope="col">CAP</th>
                <th scope="col">N.Telefono</th>
                <th scope="col">Totale</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
            <?php $count = 0; ?>
            @foreach($orders as $order)
                <?php $count++ ?>
              <tr>
                <th scope="row">{{ $count }}</th>
                <td>{{ $order->id }}</td>
                <td>{{ $order->firstname }}</td>
                <td>{{ $order->lastname }}</td>
                <td>{{ $order->email }}</td>
                <td>{{ $order->address }}</td>
                <td>{{ $order->addressNumber }}</td>
                <td>{{ $order->city }}</td>
                <td>{{ $order->province }}</td>
                <td>{{ $order->postcode }}</td>
                <td>{{ $order->phone }}</td>
                <td>€ {{ $order->total }}</td>
                <td></td>
              </tr>
            @endforeach
            </tbody> 
          </table>
    </div>
</div>

@endsection