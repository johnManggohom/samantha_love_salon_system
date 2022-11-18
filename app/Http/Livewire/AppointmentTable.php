<?php

namespace App\Http\Livewire;

use App\Models\Appointment;
use Livewire\Component;
use Livewire\WithPagination;

class AppointmentTable extends Component
{

    use WithPagination;

    public $perPage = 10;
    public $search = '';
    public $searchDate = '';
    public $orderByStatus = '';
    public $status;

    public $from;


    public function render()

    
    {

    $pages = Appointment::when($this->status, function($query) {
         $query->where('status', $this->status);
    })->when($this->from, function($query) {
          $query->where('start_time','>=', $this->from);


    })->search(trim($this->search))->paginate($this->perPage);
      

        return view('livewire.appointment-table', [
            'appointments' => $pages
        ]);
    }
}
