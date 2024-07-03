<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;

class ManagerProducts extends Component
{
    public $products;

    public function mount()
    {
        $this->products = Product::all();
    }
    
    public function editProduct(Product $product)
    {
        if(Gate::allows('update',$product)){
            abort(403);
        }
    
    }
    public function deleteProduct(Product $product)
    {
        $this->authorize('delete', $product);
    }
    public function render()
    {
        return view('livewire.manager-products')
        ->extends("layouts.principal")
        ->section("contenu");
    }
}
