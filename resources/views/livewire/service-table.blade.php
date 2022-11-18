<div>
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
                            
                            
                            @forelse ($services as  $service)
                                <tr class="bg-gray-100 text-center border-b text-sm text-gray-600">
                                <td class="p-2 border-r">{{  $service->name}}</td>
                                 <td class="p-2 border-r">  ${{ ($service->prices) }}</td>
                                
                               <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-sm leading-5">

                                @if ($cart->where('id', $service->id)->count())
                                in cart
                                                <form wire:submit.prevent="removeToCart({{ $service->id }})"  action="{{ route('admin.cashier.store') }}" method="POST">
                                    @csrf

                                    <button type="submit"
                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                        Remove to Cart
                                    </button>
                                </form> 
                                @else
                                    <form wire:submit.prevent="addToCart({{ $service->id }})"  action="{{ route('admin.cashier.store') }}" method="POST">
                        @csrf

                        <input type="hidden" name="service_id" value="{{ $service->id }}">
                        <input  wire:model="quantity.{{ $service->id }}" 
                               class="text-sm sm:text-base px-2 pr-2 rounded-lg border border-gray-400 py-1 focus:outline-none focus:border-blue-400"
                               style="width: 50px"/>
                        <button type="submit"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Add to Cart
                        </button>
                    </form> 
                                @endif
                    
            </td>
        </tr> 
    @empty 
        <tr>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-sm leading-5" colspan="3">No
                products found.
            </td>
        </tr> 
    @endforelse
    </tbody>
</table>
           
</div>
