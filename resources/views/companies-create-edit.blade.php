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
                    @if (request()->route()->getName() === 'companies.create')
                        You are creating new company
                    @else
                        You are editing company
                    @endif
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-2 p-4">
                <form method="POST" action="{{ route('companies.store') }}" class="flex flex-col">
                    @csrf
                    <label for="name" class="mb-2">
                        Name:
                    </label>
                    <input placeholder="lukaszryczko.pl" type="text" name="name" id="name" class="rounded border border-gray-400 outline-none"/>
                    <label for="email" class="my-2">
                        Email:
                    </label>
                    <input placeholder="lukaszryczko02@gmail.com" type="email" name="email" id="email" class="rounded border border-gray-400 outline-none"/>
                    <label for="website" class="my-2">
                        Website:
                    </label>
                    <input placeholder="796 871 413" type="text" name="website" id="website" class="rounded border border-gray-400 outline-none"/>
                    <label for="logo" class="my-2">
                        Logo file
                        @if (request()->route()->getName() === 'companies.edit')
                            <span class="text-sm text-gray-400">
                            (If you do not select a new image, the old one will be kept)
                            </span>
                        @else
                            :
                        @endif


                    </label>
                    <input type="file" name="logo">

                    <input type="submit" value="Create company" class="cursor-pointer rounded mt-4 bg-green-500 hover:bg-green-400 text-white font-semibold p-4">
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
