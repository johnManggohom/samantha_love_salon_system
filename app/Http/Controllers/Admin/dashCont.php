<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class dashCont extends Controller
{
    public function index(){

         if(Auth::user()->hasRole('admin')){
            return view('admin.index');
         }elseif(Auth::user()->hasRole('cashier')){
            return view('cashier.index');
         }

    }
         
}
