<div>
        <div class="table w-full p-2">
         <div class="mt-1">
                                        <input type="datetime-local" id="start_time" name="start_time" wire:model="from"
                                            value=""
                                            class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                    </div>
   <div class="flex mb-5">
              <div class="w-3/6 mx-1">
            <input wire:model.debounce.300ms="search" type="text" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"placeholder="Search users...">
        </div>
               <div class="w-1/6 relative mx-1">
                            <select wire:model="status"  class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                                        <option value=""> No Selection</option>
                                        <option value="finished"> Finished</option>
                                         <option value="reject">Rejected</option>
                                          <option value="pending"> Pending</option>
                                    </select>
                                    {{-- <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                    </div> --}}
                                </div>
                                </div>
            
          {{-- <div class="mt-1">
                                        <input type="datetime-local" wire:model.debounce.300ms="search" id="start_time" name="start_time"
                                            value=""
                                            class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                    </div> --}}
                    <table class="w-full border">
     
                        <thead>
                            <tr class="bg-gray-50 border-b">
                            
                                <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                                    <div class="flex items-center justify-center">
                                        Name
                                    </div>
                                </th>
                                  <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                                    <div class="flex items-center justify-center">
                                        Hair Dresser
                                    </div>
                                </th>
                                <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                                    <div class="flex items-center justify-center">
                                      
                                    </div>
                                </th>
                                <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                                    <div class="flex items-center justify-center">
                                        Price
                                    </div>
                                </th>
                                  <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                                    <div class="flex items-center justify-center">
                                        Date and Time
                                    </div>
                                </th>
                                  <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                                    <div class="flex items-center justify-center">
                                        Status
                                    </div>
                                </th>
                                 <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                                    <div class="flex items-center justify-center">
                                        Actions
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
            
                         @foreach ($appointments as  $appointment)
                                <tr class="bg-gray-100 text-center border-b text-sm text-gray-600">
                                <td class="p-2 border-r">{{  $appointment->user->name}}</td>
                                <td class="p-2 border-r">{{  $appointment->dresser->name}}</td>
                                  <td class="p-2 border-r">{{  $appointment->service->name}}</td>
                                  <td class="p-2 border-r">{{  $appointment->appointment_price}}</td>
                                  <td class="p-2 border-r">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $appointment->start_time)->format('M d Y g:i A')}}</td>

                                  @if ($appointment->status == 'finished')
                                                <td class="p-2 border-r bg-cyan-100 "> {{ $appointment->status}}</td>

                                                <td class="flex justify-center">
                                                <form  method="POST" action="{{ route('admin.appointment.delete', $appointment->id) }}" onsubmit="return confirm('are you sure')">
                                                    @csrf
                                                    @method('DELETE')
                                                <button type="submit" class="bg-red-500 p-2 text-white hover:shadow-lg text-xs font-thin">Delete</button>  
                                            </form>
                                            </td>                                      
                                     @else

                                     
                                     
                                            @if ($appointment->status == 'pending')
                                            <td class="p-2 border-r bg-amber-100 "> {{ $appointment->status}}</td>
                                            @elseif ($appointment->status == 'rejected')
                                                <td class="p-2 border-r bg-orange-100 "> {{ $appointment->status}}</td>
                                                @elseif ($appointment->status == 'accepted')
                                                <td class="p-2 border-r bg-yellow-100 "> {{ $appointment->status}}</td>
                                             @endif
                                            
                                             <td class="flex justify-center">   
                                             <form  method="POST" action="{{ route('admin.appointment.update', $appointment->id) }}" onsubmit="return confirm('are you sure')">
                                                    @csrf
                                                <button type="submit" class="bg-cyan-300 p-2 text-dark hover:shadow-lg text-xs font-thin mr-1">Accept</button>
                                                </form>
                                                <form  method="POST" action="{{ route('admin.appointment.reject.rejectAppointment', $appointment->id) }}" onsubmit="return confirm('are you sure')">
                                                    @csrf   
                                                <button type="submit" class="bg-orange-300 p-2 text-white hover:shadow-lg text-xs font-thin mr-1">Reject</button>
                                                </form>
                                                <form  method="POST" action="{{ route('admin.appointment.finished.finishedAppointment', $appointment->id) }}" onsubmit="return confirm('are you sure')">
                                                    @csrf
                                                <button type="submit" class="bg-yellow-300 p-2 text-dark hover:shadow-lg text-xs font-thin mr-1">Finish</button>

                                                </form>
                                                  <form  method="POST" action="{{ route('admin.appointment.delete', $appointment->id) }}" onsubmit="return confirm('are you sure')">
                                                    @csrf
                                                    @method('DELETE')
                                                <button type="submit" class="bg-red-500 p-2 text-white hover:shadow-lg text-xs font-thin">Delete</button>
                                                 </form>
                                            </td>


                                    @endif
                                    

                                </tr>       
                            @endforeach
                        </tbody>
                    </table>

                    {!! $appointments->links() !!}
                </div>
</div>
