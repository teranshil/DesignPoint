<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductCollection;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class HomeController extends Controller
{
    public function index()
    {
        $userID  = Auth::id();
        $products = DB::table('product_user')
                ->join('products', 'products.id', 'product_user.product_id')
                ->where('product_user.user_id', $userID)
                ->get();
        $sortFields = Product::getSortFields();

        return view('public.home', compact('products', 'sortFields'));
    }

    public function filter(Request $request)
    {
        $user = Auth::user();
        $sortFields = Product::getSortFields();
        array_push($sortFields, "none");

        $validatedData = $request->validate([
            'filterOne' => ['required', Rule::in($sortFields)],
            'filterTwo' => ['sometimes', Rule::in($sortFields)]
        ]);

        $order = $validatedData['filterOne'] == 'heading' ? 'desc' : 'asc';
        $query = $user->products()
            ->orderBy($validatedData['filterOne'], $order);

        $order = $validatedData['filterTwo'] == 'heading' ? 'desc' : 'asc';
        if($validatedData['filterTwo'] !== "none")
        {
            $query->orderBy($validatedData['filterTwo'], $order);
        }
        $products = $query->get();

        return new ProductCollection($products);
    }
}
