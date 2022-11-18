<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Services;
use App\Models\Appointment;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\appointmentStoreRequest;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class appointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {


         $appointments = Appointment::All();

        return view('admin.appointment.index', compact('appointments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user=Auth::user();
        $hairDressers =User::whereHas("roles", function($q){ $q->where("name", "cashier"); })->get();
        $services= Services::all();

        return view('admin.appointment.create', compact('user', 'hairDressers', 'services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(appointmentStoreRequest $request)
    {        
    
        $user = Auth::id();
        $request->time = Carbon::parse( $request->time)->format('H:i:s');
        $datetime = $request->date.' '.$request->time;
        $datetime = \DateTime::createFromFormat('d/m/Y H:i:s', $datetime)->format('Y-m-d H:i:s');
        $request['start_time'] = $datetime;
        $newDateTime = Carbon::parse( $datetime)->addHour();
        $request['end_time'] = $newDateTime->format('Y-m-d H:i:s');
        $price= DB::table('services')->where('id',$request->service_id)->value('prices');
        $request->request->add([
        'user_id'=>$user,   
        'appointment_price'=>$price
    ]);         


$message =   Appointment::create($request->all());
        if ($message->exists) {
        return view('admin.appointment.index')->with('message', 'Appointment finished');
        }else{
           return view('admin.appointment.index')->with('message', 'unsuccesfull. Try again');
        }
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Appointment $appointment)
    {       

         $update= Appointment::find($appointment->id);
        
         $update->status = 'accepted';
          $update->save();



         return to_route('admin.appointment.index');
    }


public function rejectAppointment(Appointment $appointment) {

        $update= Appointment::find($appointment->id);
        

         $update->status = 'rejected';
          $update->save();

         return to_route('admin.appointment.index');
}

public function finishedAppointment(Appointment $appointment) {

        $update= Appointment::find($appointment->id);
        $update->status = 'finished';
    
        if ( !$update->save())
                {
                     return to_route('admin.appointment.index')->with('message', 'failed to update. Try again');
                }else{

         $transaction = new Transaction();
        $transaction->user_id = $update->user_id;
        $transaction->dresser_id = $update->dresser_id; 
        $transaction->service_id =$update->service_id;;
        $transaction->start_time =$update->start_time;
        $transaction->end_time =  $update->end_time;
        $transaction->appointment_price = $update->appointment_price;
        $transaction->save();
return to_route('admin.appointment.index')->with('message', 'Appointment is finished');
                }
    

}
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
      
         $appointment->delete();
           return to_route('admin.appointment.index');
        //
    }
}



