<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session()->has('success'))
                    <div class="p-6 border-b border-gray-200 bg-green-200 rounded mb-2">
                        {{ session()->get('success') }}
                    </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Companies
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-2 p-4">
                <a href="{{route('companies.create')}}" class="bg-green-500 hover:bg-green-400 text-white font-semibold rounded p-2">
                    Create new company
                </a>

                @if (count($companies))
                    <div class="border rounded grid grid-cols-5 mt-4">
                        <div class="font-semibold p-4 border bg-gray-100">
                            Logo
                        </div>
                        <div class="font-semibold p-4 border bg-gray-100">
                            Name
                        </div>
                        <div class="font-semibold p-4 border bg-gray-100">
                            Email
                        </div>
                        <div class="font-semibold p-4 border bg-gray-100">
                            Website
                        </div>
                        <div class="font-semibold p-4 border bg-gray-100">
                            Manage
                        </div>

                        @foreach ($companies as $company)
                            <div class="p-4 border">
                                <img src="{{$company['logo']}}" alt="Logo of {{$company['name']}}">
                            </div>
                            <div class="p-4 border">
                                {{$company['name']}}
                            </div>
                            <div class="p-4 border">
                                {{$company['email']}}
                            </div>
                            <div class="p-4 border">
                                {{$company['website']}}
                            </div>
                            <div class="p-4 border">
                                <a href="{{route('companies.edit', ['company'=>$company['id']])}}">
                                    Edit
                                </a>
                                <form action="{{ route('companies.destroy', $company['id']) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button>Delete</button>
                                </form>
                            </div>
                        @endforeach


                    </div>

                    <div class="mt-4">
                        {{ $companies->links() }}
                    </div>
                    @endif

            </div>
        </div>
    </div>
</x-app-layout>
