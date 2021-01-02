 @extends('layouts.app')

 @section('content')

<div class="container">
    <div class="row">
        <h2>Create New Product</h2>
        
        <form action="{{ route("admin.products.store") }}" method="post">
            @csrf
            @method("POST")

            <div class="form-group">
                <label for="title">Titolo</label>
                <input type="text" class="form-control" id="title" name="nome" placeholder="Titolo" value="{{old("title")}}">
            </div>

            <div class="form-group">
                <label for="content">Contenuto</label>
                <textarea class="form-control" name="description" id="content" cols="30" rows="10" placeholder="Contenuto"> {{old("content")}} </textarea>
            </div>

            <div class="form-group">
                <label for="published">Availabity</label>
                <input style="width:auto" type="checkbox" class="form-control" id="published" name="availability" value="1" {{old("published") == 1 ? "checked" : "" }}>
            </div>

            <div class="form-group">
                <label for="title">Colore</label>
                <input type="text" class="form-control" id="title" name="colore" placeholder="Titolo" value="{{old("title")}}">
            </div>

            <div class="form-group">
                <label for="title">Amount</label>
                <input type="text" class="form-control" id="title" name="amount" placeholder="Titolo" value="{{old("title")}}">
            </div>

            <div class="form-group">
                <label for="title">categoria</label>
                <input type="text" class="form-control" id="title" name="categoria" placeholder="Titolo" value="{{old("title")}}">
            </div>

            <div class="form-group">
                <label for="title">Brand</label>
                <input type="text" class="form-control" id="title" name="brand" placeholder="Titolo" value="{{old("title")}}">
            </div>

            <div class="form-group">
                <label for="title">Valutazione</label>
                <input type="text" class="form-control" id="title" name="valutazione" placeholder="Titolo" value="{{old("title")}}">
            </div>

            <div class="form-group">
                <label for="title">Taglia</label>
                <input type="text" class="form-control" id="title" name="taglia" placeholder="Titolo" value="{{old("title")}}">
            </div>

            <div class="form-group">
                <label for="title">Genere</label>
                <input type="text" class="form-control" id="title" name="genere" placeholder="Titolo" value="{{old("title")}}">
            </div>
            {{-- <div class="form-group">
                <label for="user">User</label>
                <select name="user_id" id="user" class="form-control">
                    @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ old("user_id") == $user->id ? 'selected' : '' }} > {{ $user->name }} </option>
                    @endforeach
                </select>
            </div> --}}

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
        @endif
    </div>
</div>

 @endsection