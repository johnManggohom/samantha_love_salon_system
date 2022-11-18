<x-admin-layout>
  
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                   <div class="flex justify-end p-2">
                    <a href="{{ route('admin.permissions.index') }}" class="px-4 py-2 bg-green-700 hover:bg-green-500 rounded-md text-white ">Role Index</a>
                </div>
               <div class="flex flex-col">
               <!-- component -->
<div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2">
     <form method="POST" action="{{ route('admin.roles.update', $role->id) }}">
                            @csrf
                            @method('PUT')
                          <div class="sm:col-span-6">
                            <label for="name" class="block text-sm font-medium text-gray-700"> Role name </label>
                            <div class="mt-1">
                              <input type="text" id="name" name="name" class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" value="{{ $role->name }}"
                               />
                            </div>
                            @error('name') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                          </div>
                          <div class="sm:col-span-6 pt-5">
                            <button type="submit" class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-md text-white">Update</button>
                          </div>
                        </form>
               </div>
            </div>
        </div>
{{-- 
        sfffdf --}}
{{-- 
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2">
           <div class="mt-5 p-2">
                          <h2 class="text-2xl semibold">Role Permission</h2>
                         <div class="flex space-x-2 mt-4 p-2">
                          @if ($role->permissions)
                            @foreach ($role->permissions as $role_permission)
                             <form  method="POST" action="{{ route('admin.roles.permissions.revoke', [$role->id, $role_permission->id]) }}" onsubmit="return confirm('are you sure')">
                                        @csrf
                                        @method('DELETE')
                                    <button type="submit" class="bg-red-500 p-2 text-white hover:shadow-lg text-xs font-thin ">{{ $role_permission->name }}</button>
                                    </form>
                            @endforeach
                          @endif
                         </div>
                         <div>
                               <form method="POST" action="{{ route('admin.roles.permissions', $role->id) }}">
                            @csrf
                              <div class="sm:col-span-6">
                                <label for="permission"
                                    class="block text-sm font-medium text-gray-700">Permission</label>
                                <select id="permission" name="permission" autocomplete="permission-name"
                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                  
                                    @foreach ($permissions as $permission )
                                       <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                                    @endforeach
                                       
                                        
                                  
                                  
                                </select>
                              </div>

                              <div class="sm:col-span-6 pt-5">
                                <button type="submit" class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-md text-white">Assign</button>
                              </div>
                            </form>
                        
                         </div>
                        </div>
        </div> --}}
    </div>
</x-admin-layout>
