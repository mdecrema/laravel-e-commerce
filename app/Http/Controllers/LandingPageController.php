<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
Use App\User;

class LandingPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        return view('index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

    public function homeUpdate() 
    {
        $user = User::all();

        return view('admin.products.home-update', compact('user'));
    }   

    public function homeUpdateStore(Request $request)
    {
        $data = $request->all();

        $request->validate([
            'product1' => "required|numeric",
            'product2' => "required|numeric"
        ]);

        $showProduct = new Product;
        //$newProduct->fill($data);

        $showProduct->product1 = $data['product1'];
        $showProduct->product2 = $data['product2'];

        $showProduct->save();

        return view('index', compact('showProduct'));
    }
}
