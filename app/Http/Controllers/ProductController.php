<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductUser;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $products = Auth::user()->products()->get();
        $username = Auth::user()->name;
        return view('public.product', compact('products', 'username'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'heading' => 'required|string|between:5, 10',
            'price' => 'required|numeric',
            'description' => 'required|string'
        ]);
        $product = Product::create([
                'heading' => $validatedData['heading'],
                'price' => $validatedData['price'],
                'description' => $validatedData['description']
            ]);
        $product->save();

//        dd($product->id);
        $product_user = ProductUser::create([
            'product_id' => $product->id,
            'user_id' => Auth::user()->id
        ]);
        $product_user->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return Response
     */
    public function update(Request $request, Product $product)
    {
        $validatedData = $request->validate([
               'id' => 'required|numeric',
               'heading' => 'required|string|between:5, 10',
               'price' => 'required|numeric',
               'description' => 'required|string'
            ]);

        $product = Auth::user()->products()->get()
                    ->first(function($value, $key) use ($validatedData){
                        return $value->id == $validatedData['id'];
                    });

        if(!$product)
            return response('', 404); // not sure for the code status

        $product->heading = $validatedData['heading'];
        $product->price = $validatedData['price'];
        $product->description = $validatedData['description'];
        $product->save();

        return response('', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return Application|ResponseFactory|Response
     */
    public function destroy(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|numeric',
        ]);

        $product = Auth::user()->products()->get()
                    ->first(function($product, $key) use ($validatedData){
                        echo $product->id;
                        return $product->id == $validatedData['id'];
                    });

        $product->delete();
        return response('', 200);
    }
}
