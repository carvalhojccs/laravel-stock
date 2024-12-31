<?php

namespace App\Livewire\Products;

use App\Models\Order;
use App\Models\Product;
use Livewire\Component;

class Products extends Component
{
    public $orderProducts = [];
    public $allProducts = [];

    public $customer_name;
    public $customer_email;

    public function mount()
    {
        $this->allProducts = Product::all();
        $this->orderProducts = [
            ['product_id' => '', 'quantity' => 1]
        ];
    }

    public function addProduct()
    {
        $this->orderProducts[] = ['product_id' => '', 'quantity' => 1];
    }

    public function removeProduct($key)
    {
        unset($this->orderProducts[$key]);
        $this->orderProducts = array_values($this->orderProducts);
    }

    public function save()
    {
        $order = Order::create([
            'customer_name' => $this->customer_name,
            'customer_email' => $this->customer_email,
        ]);
        foreach ($this->orderProducts as $product) {
            $order->products()->attach($product['product_id'], ['quantity' => $product['quantity']]);
        }

    }
    public function render()
    {
        return view('livewire.products.products');
    }
}
