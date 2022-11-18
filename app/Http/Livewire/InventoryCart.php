<?php

namespace App\Http\Livewire;

use App\Models\Inventory;
use Livewire\Component;

class InventoryCart extends Component
{
  public  $editedInventoryIndex = null;
    public $inventories= [];

    // public function mount(){
    //     $this->inventories = Inventory::all();
    // }
    public function render()
    {
        $this->inventories = Inventory::all()->toArray();
        return view('livewire.inventory-cart', [
            'inventories' => $this->inventories
        ]);


    }

    protected $rules = [
        'inventories.*.name' => 'required',
        'inventories.*.quantity' => 'required',

    ];

        protected $validationAttributes = [
        'inventories.*.name' => 'name',
        'inventories.*.quantity' => 'price',

    ];


    public function editProduct($productIndex){


        $this->editedInventoryIndex = $productIndex;
    }

    public function saveProduct($productIndex){
        $product = $this->inventories[$productIndex] ?? NULL;

        if(!is_null($product)){

            $this->validate();

            $editedProduct = Inventory::find($product['id']);
            if($editedProduct){
                $editedProduct->update($product);
            }
            $this->editedInventoryIndex  = NULL;
        }
    }
}
