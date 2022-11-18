<div>
          <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
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
                                        Quantity
                                    </div>
                                </th>
                                {{-- <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                                    <div class="flex items-center justify-center">
                                        Action
                                    </div>
                                </th> --}}
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ( $inventories as  $index=> $inventory)
                                 <tr class="bg-gray-100 text-center border-b text-sm text-gray-600">
                                <td class="p-2 border-r">
                                  @if ($editedInventoryIndex !== $index)
                                  {{ $inventory['name'] }} 
                                  @else
                                  
                                    <input
                                        type="text"
                                        class="
                                            form-control
                                            block
                                            w-full
                                            px-3
                                            py-1.5
                                            text-base
                                            font-normal
                                            text-gray-700
                                            bg-white bg-clip-padding
                                            border border-solid border-gray-300
                                            rounded
                                            transition
                                            ease-in-out
                                            m-0
                                            focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
                                        "
                                        id="exampleFormControlInput1"
                                        placeholder="Example label"
                                         wire:model.defer="inventories.{{ $index }}.name"/>
                                  @if ($errors->has('inventories.' . $index. '.name'))
                                      <div class="text-red-500">{{$errors->first('inventories.' . $index. '.name')  }}</div>
                                  @endif
                                  @endif</td>
                                 <td class="p-2 border-r"> 
                                    @if ($editedInventoryIndex !== $index)
                                  {{ $inventory['quantity'] }}
                                  @else
                                  <input type="number" wire:model.defer="inventories.{{ $index }}.quantity">
                                      
                                  @endif</td>
                                   <td class="p-2 border-r">
                                      @if ($editedInventoryIndex !== $index)
                                  <button wire:click.prevent="editProduct({{$index}})">
                                        Edit
                                  </button> 
                                  @else
                                  <button wire:click.prevent="saveProduct({{$index}})">
                                        Save
                                  </button> @endif</td>
                                   

                            </tr>
                            @endforeach
                            

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
