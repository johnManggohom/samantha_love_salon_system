<x-admin-layout>
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-end p-2">
                    <a href="{{ route('admin.appointment.create') }}" class="px-4 py-2 bg-green-700 hover:bg-green-500 rounded-md text-white ">Book Appointment</a>
                </div>

                <div>
        <div class="table w-full p-2">
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
                                        Service 
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
                            </tr>
                        </thead>
                        <tbody>
            
                         @foreach ($transactions  as  $transaction)
                         <tr class="bg-gray-100 text-center border-b text-sm text-gray-600">
                               <td class="p-2 border-r">{{  $transaction->user->name}}</td>
                                  <td class="p-2 border-r">{{  $transaction->service->name}}</td>
                                  <td class="p-2 border-r">{{  $transaction->service->prices}}</td>
                                  <td class="p-2 border-r">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $transaction->created_at)->format('M d Y g:i A')}}</td>
                                </tr>
                                           
                            @endforeach
                        </tbody>
                    </table>

                </div>
</div>

            </div>
        </div>
    </div>
</x-admin-layout>
