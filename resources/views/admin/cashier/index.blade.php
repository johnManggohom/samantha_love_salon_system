<x-admin-layout>
    <div class="py-12 w-full">

   <livewire:cart-counter>
        @if (session('message'))
        <div>{{ session('message') }}</div>
            
        @endif

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="table w-full p-2">

                    <livewire:service-table>

                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
