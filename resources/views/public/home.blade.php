@extends('layouts.base')
@section('assets')
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
    <link href="{{ asset('css/product-cart.css') }}" rel="stylesheet">
@endsection
@section('content')
   <div class="filter-container">
       <select id="select-one" class="select-filter">
           @foreach($sortFields as $sortField)
               <option>{{ $sortField }}</option>
           @endforeach
       </select>
       <select id="select-two" class="select-filter">
            <option selected> none </option>
            @foreach($sortFields as $sortField)
                <option>{{ $sortField }}</option>
            @endforeach
        </select>
        <button class="apply-filter-btn common-btn">Apply</button>
        <button class="modify-product-btn common-btn" onclick="location.href='/product'">Modify Product</button>
   </div>

   <div id="home-container">
       @foreach($products as $index => $product)
           <x-product-cart :product="$product"></x-product-cart>
       @endforeach
   </div>
@endsection

