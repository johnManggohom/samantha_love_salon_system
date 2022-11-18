<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Appointment extends Model
{
    protected $table = 'appointment';
    use HasFactory;

    protected $fillable = [
        'user_id', 
        'dresser_id', 
        'service_id',
    'appointment_price',
    'start_time',
    'end_time'];

        public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

            public function dresser(){
        return $this->belongsTo(User::class, 'dresser_id');
    }

       public function service(){
        return $this->belongsTo(Services::class);
    }

    public function transaction(){
        return $this->belongsTo(Transaction::class);
    }


    public static function scopeSearch($query, $term){

        $term= "%$term%";

        $query->where(function ($query) use ($term){
            $query->where('appointment_price', 'like', $term )->orWhereHas('service', function($query) use($term) { $query->where('name','LIKE',$term);})->orWhereHas('user', function($query) use($term) { $query->where('name','LIKE',$term);
  })->orWhereHas('dresser', function($query) use($term) {
    $query->where('name','LIKE',$term);
  });
        });



    }

    
}
