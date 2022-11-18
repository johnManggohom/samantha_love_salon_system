<?php

namespace App\Http\Controllers\Admin;

use App\Models\Services;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $services = Services::all();
        return view('admin.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.services.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
           
         $validated = $request->validate(['name'=>['required', 'min:3'],
        'price'=>['required', 'min:1']]);

    
           Services::create([
            'name' => $validated['name'],
            'prices' => $validated['price'],
             'comission' => 40
            ]);
      

        return to_route('admin.services.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Services $service)
    {

          return view('admin.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Services $service)
    {


                $request->validate(
            [
                'name'=>'required',
                'price' => 'required'
            ]
            );
        
        $service->update([
            'name'=> $request->name,
            'prices'=> $request->price,
        ]);

         return to_route('admin.services.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Services $service)
    {
         $service->delete();
           return to_route('admin.services.index');
        //
    }
}
