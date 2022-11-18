<x-admin-layout>
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                   <div class="flex justify-end p-2">
                    <a href="{{ route('admin.services.index') }}" class="px-4 py-2 bg-green-700 hover:bg-green-500 rounded-md text-white ">Service Index</a>
                </div>
               <div class="flex flex-col">
               <!-- component -->
<div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2">
     <form method="POST" action="{{ route('admin.services.update', $service->id)}}">
                            @csrf
                             @method('PUT')
                          <div class="sm:col-span-6">
                            <label for="name" class="block text-sm font-medium text-gray-700"> Service Name </label>
                            <div class="mt-1">
                              <input type="text" id="name" name="name" class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" value="{{ $service->name }}" />
                            </div>
                            @error('name') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                          </div>
                           <div class="sm:col-span-6">
                            <label for="name" class="block text-sm font-medium text-gray-700"> Price </label>
                            <div class="mt-1">
                              <input type="text" id="name" name="price" class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5"   value="{{ $service->prices }}"/>
                            </div>
                            @error('name') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                          </div>

                          
                          <div class="sm:col-span-6 pt-5">
                            <button type="submit" class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-md text-white">Save</button>
                          </div>
                        </form>
               </div>
            </div>
        </div>
    </div>
</x-admin-layout>
