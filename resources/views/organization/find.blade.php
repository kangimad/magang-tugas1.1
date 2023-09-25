{{-- @dd($organizations) --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Organizations Detail') }}
        </h2>
    </x-slot>

    {{-- USER CONTENT --}}
    <div class="py-12">
        @if (session('edit-success'))
            <div
                class="w-1/2 p-3 mb-7 mx-auto font-semibold text-center text-white text-sm bg-teal-700 rounded-lg shadow">
                <p>{{ session('edit-success') }}</p>
            </div>
        @endif
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="relative bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="absolute top-4 left-4 px-3 py-1 bg-gray-200 rounded-l-full hover:bg-gray-300">
                    <a href="{{ route('organization.all') }}">
                        <i class="bi bi-arrow-left"></i>
                    </a>
                </div>
                <div class="flex-row py-4 bg-white border-b">
                    <div class="flex w-1/2 mx-auto justify-center">
                        <p class="font-semibold text-lg">{{ $organizations->name }}</p>
                    </div>
                </div>
                <div class="flex-row py-4 bg-white border-b">
                    <div class="flex w-1/2 mx-auto justify-evenly">
                        <div>
                            <p>Code</p>
                            <p>Name</p>
                            <p>Group</p>
                            <p>Type</p>
                            <p>Class</p>
                            <p>Addres</p>
                            <p>Phone</p>
                            <p>Province</p>
                            <p>Regency</p>
                            <p>District</p>
                            <p>Village</p>
                            <p>Date Created</p>
                            <p>Date Updated</p>
                            <p>Created By</p>
                        </div>
                        <div>
                            <p>:</p>
                            <p>:</p>
                            <p>:</p>
                            <p>:</p>
                            <p>:</p>
                            <p>:</p>
                            <p>:</p>
                            <p>:</p>
                            <p>:</p>
                            <p>:</p>
                            <p>:</p>
                            <p>:</p>
                            <p>:</p>
                            <p>:</p>
                        </div>
                        <div>
                            <p>{{ $organizations->code }}</p>
                            <p>{{ $organizations->name }}</p>
                            <p>{{ $organizations->group->name }}</p>
                            <p>{{ $organizations->type->name }}</p>
                            <p>{{ $organizations->class }}</p>
                            <p>{{ $organizations->address }}</p>
                            <p>{{ $organizations->phone }}</p>
                            <p>{{ $organizations->province->name }}</p>
                            <p>{{ $organizations->regency->name }}</p>
                            <p>{{ $organizations->district->name }}</p>
                            <p>{{ $organizations->village->name }}</p>
                            <p>{{ $organizations->created_at }}</p>
                            <p>{{ $organizations->updated_at }}</p>
                            <p>{{ $organizations->user->name }}</p>
                        </div>
                    </div>
                </div>
                <div class="flex w-1/2 mx-auto justify-center py-4">
                    <a href="/admin/organization/{{ $organizations->id }}/edit"
                        class="px-3 py-1 mx-1 bg-blue-400 rounded hover:bg-blue-600 hover:text-white">
                        <i class="bi bi-pencil"></i></a>
                    <form action="/admin/organization/{{ $organizations->id }}/delete" method="post" class="inline">
                        @csrf
                        @method('delete')
                        <button class="px-3 py-1 mx-1 bg-red-400 rounded hover:bg-red-600 outline-none hover:text-white"
                            onclick="return confirm('Are you sure ?')">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    {{-- USER CONTENT --}}

</x-app-layout>
