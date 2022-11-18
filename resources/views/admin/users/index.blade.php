<x-admin-layout>
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            Clients
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

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
                                        email
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
                            
                            @foreach ($users as  $user)
                                <tr class="bg-gray-100 text-center border-b text-sm text-gray-600">
                                <td class="p-2 border-r">{{  $user->name}}</td>
                                 <td class="p-2 border-r">{{  $user->email}}</td>
                                
                                <td class="flex justify-center">
                                    <a href="{{ route('admin.user.show', $user->id) }}" class="bg-blue-500 p-2 text-white hover:shadow-lg text-xs font-thin">Roles</a>
                                    <form  method="POST" action="{{ route('admin.user.destroy', $user->id) }}" onsubmit="return confirm('are you sure')">
                                        @csrf
                                        @method('DELETE')
                                    <button type="submit" class="bg-red-500 p-2 text-white hover:shadow-lg text-xs font-thin">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            Empl
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

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
                                        email
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
                            
                            @foreach ($employees as  $employee)
                                <tr class="bg-gray-100 text-center border-b text-sm text-gray-600">
                                <td class="p-2 border-r">{{  $employee->name}}</td>
                                 <td class="p-2 border-r">{{  $employee->email}}</td>
                                
                                <td class="flex justify-center">
                                    <a href="{{ route('admin.user.show', $employee->id) }}" class="bg-blue-500 p-2 text-white hover:shadow-lg text-xs font-thin">Roles</a>
                                    <form  method="POST" action="{{ route('admin.user.destroy', $employee->id) }}" onsubmit="return confirm('are you sure')">
                                        @csrf
                                        @method('DELETE')
                                    <button type="submit" class="bg-red-500 p-2 text-white hover:shadow-lg text-xs font-thin">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
