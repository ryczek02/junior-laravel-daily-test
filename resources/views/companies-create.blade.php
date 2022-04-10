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
                        You are creating new company

                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-2 p-4">
                <form method="POST" action="{{ route('companies.store') }}" class="flex flex-col" enctype="multipart/form-data">
                    @csrf
                    <label for="name" class="mb-2">
                        Name:
                    </label>
                    <input placeholder="lukaszryczko.pl" type="text" name="name" id="name" class="rounded border border-gray-400 outline-none"/>
                    @if ($errors->has('name'))
                        <p class="text-red-600">{{ $errors->first('name') }}</p>
                    @endif
                    <label for="email" class="my-2">
                        Email:
                    </label>

                    <input placeholder="lukaszryczko02@gmail.com" type="email" name="email" id="email" class="rounded border border-gray-400 outline-none"/>
                    @if ($errors->has('email'))
                        <p class="text-red-600">{{ $errors->first('email') }}</p>
                    @endif
                    <label for="website" class="my-2">
                        Website:
                    </label>
                    <input placeholder="https://lukaszryczko.pl" type="text" name="website" id="website" class="rounded border border-gray-400 outline-none"/>
                    @if ($errors->has('website'))
                        <p class="text-red-600">{{ $errors->first('website') }}</p>
                    @endif
                    <label for="logo" class="my-2">
                        Logo file:
                    </label>
                    <input type="file" name="logo">
                    @if ($errors->has('logo'))
                        <p class="text-red-600">{{ $errors->first('logo') }}</p>
                    @endif
                    <input type="submit" value="Create company" class="cursor-pointer rounded mt-4 bg-green-500 hover:bg-green-400 text-white font-semibold p-4">
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
