@extends('layouts.base')
@section('assets')
    <link href="{{ asset('css/product.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="product-page-container column">
        <div class="product-table-container">
            <div class="row heading-container">
                <button class="create-btn common-btn">Create</button>
                <h2 class="heading"> Products for {{$username}}</h2>
            </div>
            <table class="product-table">
                <thead class="table-head">
                    <tr>
                        <th class="cell">№</th>
                        <th class="cell">Heading</th>
                        <th class="cell">Price</th>
                        <th class="cell">Description</th>
                        <th class="cell"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $index => $product )
                        <tr class="table-row" data-product-id="{{$product->id}}">
                            <td class="cell">{{ $index + 1 }}</td>
                            <td class="cell" data-product >{{ $product->heading }}</td>
                            <td class="cell" data-product >{{ $product->price }}</td>
                            <td class="cell" data-product >{{ $product->description }}</td>
                                <td class="cell-btn cell row">
                                <button class="edit-btn common-btn">Edit</button>
                                <button class="delete-btn common-btn">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="modal-wrapper">
            <div class="modal-container column">
                @csrf
                <span class="close-btn"><i class="fas fa-times"></i></span>
                <input data-product type="text" name="heading" placeholder="Heading">
                <input data-product type="number" step="0.01" placeholder="Price">
                <textarea data-product cols="30" rows="5"></textarea>
                <button type='submit' class="common-btn save-btn">Save</button>
            </div>
        </div>
    </div>
@endsection
