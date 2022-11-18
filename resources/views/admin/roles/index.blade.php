<x-admin-layout>
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                   <div class="flex justify-end p-2">
                    <a href="{{ route('admin.roles.create') }}" class="px-4 py-2 bg-green-700 hover:bg-green-500 rounded-md text-white ">Create Roles</a>
                </div>
                <div class="table w-full p-2">
                    <table class="w-full border">
                        <thead>
                            <tr class="bg-gray-50 border-b">
                            
                                <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                                    <div class="flex items-center justify-center">
                                        Role Name
                                    </div>
                                </th>
                                <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                                    <div class="flex items-center justify-center">
                                        Action
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            
                         
                
                             
                            
                            @if($roles->count() > 0)
                            @foreach ($roles as  $role)
                                <tr class="bg-gray-100 text-center border-b text-sm text-gray-600">
                                <td class="p-2 border-r">{{  $role->name}}</td>
                                
                                <td class="flex justify-center">
                                    <a href="{{ route('admin.roles.edit', $role->id) }}" class="bg-blue-500 p-2 text-white hover:shadow-lg text-xs font-thin">Edit</a>
                                    <form  method="POST" action="{{ route('admin.roles.destroy', $role->id) }}" onsubmit="return confirm('are you sure')">
                                        @csrf
                                        @method('DELETE')
                                    <button type="submit" class="bg-red-500 p-2 text-white hover:shadow-lg text-xs font-thin">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                               @else
                                    Mentor don't have any intern
                                @endif
                
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
