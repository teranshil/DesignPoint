<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ProductCart extends Component
{

    public $product;

    /**
     * Create a new component instance.
     *
     * @param $product
     * @param $productID
     */
    public function __construct($product)
    {
        $this->product = $product;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.product-cart');
    }
}
