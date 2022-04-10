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
                        You are creating new employee

                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-2 p-4">
                <form method="POST" action="{{ route('employees.store') }}" class="flex flex-col" enctype="multipart/form-data">
                    @csrf
                    <label for="first_name" class="mb-2">
                        Firstname:
                    </label>
                    <input placeholder="Jan" type="text" name="first_name" id="first_name" class="rounded border border-gray-400 outline-none"/>
                    @if ($errors->has('first_name'))
                        <p class="text-red-600">{{ $errors->first('first_name') }}</p>
                    @endif
                    <label for="last_name" class="my-2">
                        Lastname:
                    </label>
                    <input placeholder="Kowalski" type="text" name="last_name" id="last_name" class="rounded border border-gray-400 outline-none"/>
                    @if ($errors->has('last_name'))
                        <p class="text-red-600">{{ $errors->first('last_name') }}</p>
                    @endif
                    <label for="company" class="my-2">
                        Select company for employee:
                    </label>
                    <select name="company">
                        @foreach($companies as $company)
                            <option value="{{$company['id']}}">{{$company['name']}}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('company'))
                        <p class="text-red-600">{{ $errors->first('company') }}</p>
                    @endif
                    <label for="email" class="my-2">
                        Email:
                    </label>
                    <input placeholder="employee@gmail.com" type="email" name="email" id="email" class="rounded border border-gray-400 outline-none"/>
                    @if ($errors->has('email'))
                        <p class="text-red-600">{{ $errors->first('email') }}</p>
                    @endif

                    <label for="phone" class="my-2">
                        Phone:
                    </label>
                    <input placeholder="796874596" type="text" name="phone" id="phone" class="rounded border border-gray-400 outline-none"/>
                    @if ($errors->has('phone'))
                        <p class="text-red-600">{{ $errors->first('phone') }}</p>
                    @endif

                    <input type="submit" value="Create employee" class="cursor-pointer rounded mt-4 bg-green-500 hover:bg-green-400 text-white font-semibold p-4">
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
