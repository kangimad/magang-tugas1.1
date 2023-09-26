{{-- @dd($organizations) --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Group Detail') }}
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
        <div class="w-1/3 mx-auto sm:px-6 lg:px-8">
            <div class="relative bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="absolute top-4 left-4 px-3 py-1 bg-gray-200 rounded-l-full hover:bg-gray-300">
                    <a href="{{ route('group.all') }}">
                        <i class="bi bi-arrow-left"></i>
                    </a>
                </div>
                <div class="flex-row py-4 bg-white border-b">
                    <div class="flex w-1/2 mx-auto justify-center">
                        <p class="font-semibold text-lg">{{ $groups->name }}</p>
                    </div>
                </div>
                <div class="flex-row py-4 bg-white border-b">
                    <div class="flex w-1/2 mx-auto justify-evenly">
                        <div>
                            <p>Name</p>
                            <p>Date Created</p>
                            <p>Date Updated</p>
                        </div>
                        <div>
                            <p>:</p>
                            <p>:</p>
                            <p>:</p>
                        </div>
                        <div>
                            <p>{{ $groups->name }}</p>
                            <p>{{ $groups->created_at }}</p>
                            <p>{{ $groups->updated_at }}</p>
                        </div>
                    </div>
                </div>
                <div class="flex w-1/2 mx-auto justify-center py-4">
                    <a href="/admin/group/{{ $groups->id }}/edit"
                        class="px-3 py-1 mx-1 bg-blue-400 rounded hover:bg-blue-600 hover:text-white">
                        <i class="bi bi-pencil"></i></a>
                    <form action="/admin/group/{{ $groups->id }}/delete" method="post" class="inline">
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
