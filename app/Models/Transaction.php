<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
        protected $table = 'transaction';
    use HasFactory;

       public function appointment(){
        return $this->HasOne(Appointment::class);
    }

        public function user(){
        return $this->belongsTo(User::class);
    }

           
    public function service(){
        return $this->belongsTo(Services::class);
    }
}
