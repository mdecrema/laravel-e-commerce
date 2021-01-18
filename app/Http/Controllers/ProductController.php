<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
        return view('admin.dashboard');
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
            "photo1" => "image|nullable|max:1000",
            "photo2" => "image|nullable|max:1000",
            "photo3" => "image|nullable|max:1000",
            "photo4" => "image|nullable|max:1000",
            "photo5" => "image|nullable|max:1000",
            "categoria" => "required|max:50",
            "genere" => "required|max:10",
            "taglia" => "nullable|max:10",
            "description" => "nullable|max:2000",
            "colore" => "required|max:20",
            "brand" => "required|max:50",
            "amount" => "required|numeric",
            "availability" => "required|boolean",
            "valutazione" => "nullable|numeric",
            "appView" => "nullable|max:100"
            //"slug" => "required|unique:posts",
        ]);

        $path1 = Storage::disk('public')->put('productImages', $data['photo1']);
        $path2 = Storage::disk('public')->put('productImages', $data['photo2']);
        $path3 = Storage::disk('public')->put('productImages', $data['photo3']);
        $path4 = Storage::disk('public')->put('productImages', $data['photo4']);
        $path5 = Storage::disk('public')->put('productImages', $data['photo5']);


        $newProduct = new Product;
        //$newProduct->fill($data);

        $newProduct->nome = $data['nome'];
        $newProduct->categoria = $data['categoria'];
        $newProduct->taglia = $data['taglia'];
        $newProduct->genere = $data['genere'];
        $newProduct->description = $data['description'];
        $newProduct->colore = $data['colore'];
        $newProduct->brand = $data['brand'];
        $newProduct->valutazione = $data['valutazione'];
        $newProduct->amount = $data['amount'];
        $newProduct->availability = $data['availability'];    
        $newProduct->appView = $data['appView'];

        $newProduct->photo1 = $path1;
        $newProduct->photo2 = $path2;
        $newProduct->photo3 = $path3;
        $newProduct->photo4 = $path4;
        $newProduct->photo5 = $path5;

        $newProduct->save();

        return redirect()->route("index");
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
        $product = Product::find($id); 

        return view("admin.products.edit", ["product" => $product]);
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
        $data = $request->all();

        $product = Product::where('id', $id)->first();

        $request->validate([
            //"user_id" => "required|exists:usersid",
            "nome" => "required|max:255",
            "photo1" => "image|nullable|max:300",
            "photo2" => "image|nullable|max:300",
            "photo3" => "image|nullable|max:300",
            "photo4" => "image|nullable|max:300",
            "photo5" => "image|nullable|max:300",
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

        $path1 = Storage::disk('local')->put('productImages', $data['photo1']);
        $path2 = Storage::disk('local')->put('productImages', $data['photo2']);
        $path3 = Storage::disk('local')->put('productImages', $data['photo3']);
        $path4 = Storage::disk('local')->put('productImages', $data['photo4']);
        $path5 = Storage::disk('local')->put('productImages', $data['photo5']);


        $product = Product::where('id', $id)->first();
        //$product->fill($data);

        $product->nome = $data['nome'];
        $product->categoria = $data['categoria'];
        $product->taglia = $data['taglia'];
        $product->genere = $data['genere'];
        $product->description = $data['description'];
        $product->colore = $data['colore'];
        $product->brand = $data['brand'];
        $product->valutazione = $data['valutazione'];
        $product->amount = $data['amount'];
        $product->availability = $data['availability'];    

        $product->photo1 = $path1;
        $product->photo2 = $path2;
        $product->photo3 = $path3;
        $product->photo4 = $path4;
        $product->photo5 = $path5;

        $product->update();

        return view('admin.dashboard')->with('message', 'Product Updated!');
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

    public function productsAll()
    {

        $products = Product::all();

        return view('admin.products.products-all', compact('products'));
    }
}
