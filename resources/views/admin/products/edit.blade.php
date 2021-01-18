@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <h2>Update Product No.: {{ $product->id }}</h2>
            
            <form action="{{ route("admin.products.update", $product['id']) }}" method="post">
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
                    <label for="image">Image 1</label>
                    <input style="width:auto" type="file" class="form-control" id="image" name="photo1" accept="image/*">
                </div>
    
                <div class="form-group">
                    <label for="image">Image 2</label>
                    <input style="width:auto" type="file" class="form-control" id="image" name="photo2" accept="image/*">
                </div>
    
                <div class="form-group">
                    <label for="image">Image 3</label>
                    <input style="width:auto" type="file" class="form-control" id="image" name="photo3" accept="image/*">
                </div>
    
                <div class="form-group">
                    <label for="image">Image 4</label>
                    <input style="width:auto" type="file" class="form-control" id="image" name="photo4" accept="image/*">
                </div>
    
                <div class="form-group">
                    <label for="image">Image 5</label>
                    <input style="width:auto" type="file" class="form-control" id="image" name="photo5" accept="image/*">
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

                <div class="form-group">
                    <label for="appView">App View</label>
                    <input type="text" class="form-control" id="appView" name="appView" placeholder="where?">
                </div>
    
                <button type="submit" class="btn btn-primary">Update</button>
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