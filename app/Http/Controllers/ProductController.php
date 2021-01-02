<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
Use App\User;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        return view('products', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::all();

        return view("admin.products.create", compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $request->validate([
            //"user_id" => "required|exists:usersid",
            "nome" => "required|max:255",
            /*"photo1" => "nullable|max:200",
            "photo2" => "nullable|max:200",
            "photo3" => "nullable|max:200",
            "photo4" => "nullable|max:200",
            "photo5" => "nullable|max:200",*/
            "categoria" => "required|max:50",
            "genere" => "required|max:10",
            "taglia" => "nullable|max:10",
            "description" => "nullable|max:2000",
            "colore" => "required|max:20",
            "brand" => "required|max:50",
            "amount" => "required|numeric",
            "availability" => "required|boolean",
            "valutazione" => "nullable|numeric",
            //"slug" => "required|unique:posts",
        ]);

        /*
        $table->string('nome', 50);
        $table->string('photo1', 150)->nullable();
        $table->string('photo2', 150)->nullable();
        $table->string('photo3', 150)->nullable();
        $table->string('photo4', 150)->nullable();
        $table->string('photo5', 150)->nullable();
        $table->string('categoria', 50);
        $table->string('genere', 10);
        $table->string('taglia', 10);
        $table->text('description', 2000);
        $table->string('colore', 20);
        $table->string('brand', 50);
        $table->float('amount', 6, 2);
        $table->SmallInteger('availability')->default(1);
        $table->SmallInteger('valutazione');
        */

        $newProduct = new Product;
        $newProduct->fill($data);
        $newProduct->save();

        return redirect()->route("home");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $newproduct = Product::find($id);

        return view('item-details', ['product'=>$newproduct]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
