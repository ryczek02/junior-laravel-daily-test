<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Companies
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-2 p-4">
                <button class="bg-green-500 hover:bg-green-400 text-white font-semibold rounded p-4">
                    Create new company
                </button>

                <div class="border rounded grid grid-cols-4 mt-4">
                    <div class="font-semibold p-4 border bg-gray-100">
                        Name
                    </div>
                    <div class="font-semibold p-4 border bg-gray-100">
                        Address
                    </div>
                    <div class="font-semibold p-4 border bg-gray-100">
                        Website
                    </div>
                    <div class="font-semibold p-4 border bg-gray-100">
                        Email
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
