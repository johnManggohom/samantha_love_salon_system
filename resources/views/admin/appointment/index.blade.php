<x-admin-layout>
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-end p-2">
                    <a href="{{ route('admin.appointment.create') }}" class="px-4 py-2 bg-green-700 hover:bg-green-500 rounded-md text-white ">Book Appointment</a>
                </div>

                <livewire:appointment-table/>
             
            </div>
        </div>
    </div>
</x-admin-layout>
