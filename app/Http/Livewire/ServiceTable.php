<?php

namespace App\Http\Livewire;

use App\Models\Services;
use Livewire\Component;

class ServiceTable extends Component
{     

    public  $services;

    public array $quantity = [];

    public function mount(){

        $this->services = Services::all();
        foreach($this->services as $service){
            $this->quantity[$service->id]= 1;
        }


    }
    public function render()
    {
        
    $cart = Cart::content();
    $services= Services::all();
        return view('livewire.service-table', compact('cart'));
    }


    public function addToCart($service_id){
        $service = Services::findOrFail($service_id);
        Cart::add($service->id, $service->name,$this->quantity[$service_id], $service->prices);

        $this->emit('cart_updated');
    }

       public function removeToCart($service_id){
        Cart::remove($this->cart['rowID']);

        $this->emit('cart_updated');
    }
}
