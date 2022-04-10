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
                    Admin panel
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-2 p-4">
                <a href="{{route('companies.index')}}" class="underline text-green-600">Manage companies ({{$companies}})</a>
                <br>
                <a href="{{route('employees.index')}}" class="underline text-green-600">Manage employees ({{$employees}})</a>

            </div>
        </div>
    </div>
</x-app-layout>
