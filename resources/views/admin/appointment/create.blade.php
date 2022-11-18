<x-admin-layout>
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                   <div class="flex justify-end p-2">
                    <a href="{{ route('admin.roles.index') }}" class="px-4 py-2 bg-green-700 hover:bg-green-500 rounded-md text-white ">Role Index</a>
                </div>
               <div class="flex flex-col">
               <!-- component -->


      <h3>Client Name:  {{ $user->name }}</h3>
     <form method="POST" action="{{ route('admin.appointment.store') }}">
                            @csrf
                        <div class="">
                            <div>
                                <label for="permission"
                                    class="block text-sm font-medium text-gray-700">Hair Dresser</label>
                                <select id="permission" name="dresser_id" autocomplete="permission-name"
                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    @foreach ($hairDressers as $hairDresser)
                                        <option value="{{ $hairDresser->id }}">{{ $hairDresser->name }}</option>
                                    @endforeach
                     
                                </select>
                            </div>
                    </div>
                       <div class="">
                            <div>
                                <label for="permission"
                                    class="block text-sm font-medium text-gray-700">Service</label>
                                <select id="permission" name="service_id" autocomplete="permission-name"
                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                   
                                        @foreach ($services as $service)
                                        <option value="{{ $service->id }}">{{ $service->name }} | Price: {{ $service->prices }}</option>
                                    @endforeach
                     
                                </select>
                            </div>
                    </div>

                                            <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2">

                            <div class="flex justify-center">
                        <div class="timepicker relative form-floating mb-3 xl:w-96">
                            <input type="text" name= "time"
                            class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                            placeholder="Select a date" />
                            <label for="floatingInput" class="text-gray-700">Select a time</label>
                        </div>
                        </div>

                        <div class="flex items-center justify-center">
                        <div class="datepicker relative form-floating mb-3 xl:w-96">
                            <input type="text" name = 'date'
                            class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                            placeholder="Select a date" />
                            <label for="floatingInput" class="text-gray-700">Select a date</label>
                        </div>
                        </div>

                                                    {{-- <div class="sm:col-span-6">
                                    <label for="res_date" class="block text-sm font-medium text-gray-700"> Reservation
                                        Date
                                    </label>
                                    <div class="mt-1">
                                        <input type="datetime-local" id="start_time" name="start_time"
                                            value=""
                                            class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                    </div>
                                    <span class="text-xs">Please choose the time between 17:00-23:00.</span>
                                    @error('res_date')
                                        <div class="text-sm text-red-400">{{ $message }}</div>
                                    @enderror
                                </div> --}}
                
                          <div class="sm:col-span-6 pt-5">
                            <button type="submit" class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-md text-white">Create Role</button>
                          </div>
                        </form>
               </div>
            </div>
        </div>
    </div>
</x-admin-layout>


