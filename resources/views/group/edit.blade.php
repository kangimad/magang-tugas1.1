{{-- @dd($groups) --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Group Edit') }}
        </h2>
    </x-slot>

    {{-- USER CONTENT --}}
    <div class="py-12">
        <div class="w-1/3 mx-auto sm:px-6 lg:px-8">
            <div class="relative bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="absolute top-4 left-4 px-3 py-1 bg-gray-200 rounded-l-full hover:bg-gray-300">
                    <a href="{{ route('group.find', [$groups->id]) }}">
                        <i class="bi bi-arrow-left"></i>
                    </a>
                </div>
                <div class="flex-row py-5 bg-white border-b">
                    <div class="flex w-1/2 mx-auto justify-center">
                        <p class="font-semibold text-lg">{{ $groups->name }}</p>
                    </div>
                </div>
                <form action="/admin/group/{{ $groups->id }}/update" method="post">
                    @method('PUT')
                    @csrf
                    <div class="flex px-10 py-4">
                        <div class="mt-5 w-full">
                            <div class="mb-3">
                                <x-input-label for="name" class="w-full font-bold text-lg">Name</x-input-label>
                                <x-text-input type="text" name="name" id="text"
                                    value="{{ old('name', $groups->name) }}" class="mt-2 w-full"></x-text-input>
                            </div>
                            <div class="text-end py-3">
                                <button type="reset" class="px-3 py-1 mx-1 bg-slate-200 rounded hover:bg-slate-300">
                                    <i class="bi bi-arrow-repeat"></i></button>
                                <button type="submit" class="px-3 py-1 mx-1 bg-teal-400 rounded hover:bg-teal-600">
                                    <i class="bi bi-send"></i></button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
    </div>
    {{-- USER CONTENT --}}

</x-app-layout>
