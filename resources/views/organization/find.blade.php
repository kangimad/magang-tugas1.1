{{-- @dd($organizations) --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Organizations Detail') }}
        </h2>
    </x-slot>

    {{-- USER CONTENT --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <div class="flex-row  px-5 py-4 bg-white rounded shadow">
                    <div class="mt-5 bg-white rounded">
                        @if (session('success'))
                            <div
                                class=" w-1/2 mx-auto p-2 mb-4 font-semibold text-center text-white text-sm bg-teal-700 rounded-lg ">
                                <p>{{ session('success') }}</p>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="flex-row  px-5 py-4 bg-white rounded shadow">
                    <div class="mt-5 bg-white rounded">
                        <div>
                            <ul>
                                <li>Code : {{ $organizations->code }}</li>
                                <li>Name : {{ $organizations->name }}</li>
                                <li>Group : {{ $organizations->group->name }}</li>
                                <li>Type : {{ $organizations->type->name }}</li>
                                <li>Class : {{ $organizations->class }}</li>
                                <li>Address : {{ $organizations->address }}</li>
                                <li>Phone : {{ $organizations->phone }}</li>
                                <li>Province : {{ $organizations->province->name }}</li>
                                <li>Regency : {{ $organizations->regency->name }}</li>
                                <li>District : {{ $organizations->district->name }}</li>
                                <li>Village : {{ $organizations->village->name }}</li>
                                <li>Created Date : {{ $organizations->created_at }}</li>
                                <li>Updated Date : {{ $organizations->updated_at }}</li>
                                <li>Creator : {{ $organizations->user->name }}</li>
                            </ul>
                        </div>
                        <div>
                            <a href="/admin/organization/edit/{{ $organizations->id }}"
                                class="px-3 py-1 mx-1 bg-yellow-400 rounded hover:bg-yellow-600">
                                <i class="bi bi-pencil"></i></a>
                            <a href="/admin/organization/delete/{{ $organizations->id }}"
                                class="px-3 py-1 mx-1 bg-red-400 rounded hover:bg-red-600">
                                <i class="bi bi-trash"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- USER CONTENT --}}

</x-app-layout>
