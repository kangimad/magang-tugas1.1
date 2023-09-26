{{-- @dd($types) --}}
<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Type - Form') }}
        </h2>
    </x-slot>

    {{-- USER CONTENT --}}
    <div class="py-12">
        <div class="w-1/3 mx-auto sm:px-6 lg:px-8">
            <div class="relative bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="absolute top-5 left-4 px-3 py-1 bg-gray-200 rounded-l-full hover:bg-gray-300">
                    <a href="{{ route('type.all') }}">
                        <i class="bi bi-arrow-left"></i>
                    </a>
                </div>
                <div class="flex-row py-5 bg-white border-b">
                    <div class="flex w-1/2 mx-auto justify-center">
                        <p class="font-semibold text-lg">Create New Type</p>
                    </div>
                </div>

                <div class="flex-row mt-3 w-full px-5 py-4 bg-white rounded">
                    <form class="w-full" action="{{ route('type.store') }}" method="post">
                        @csrf
                        <div class="flex flex-wrap mb-3 gap-y-3">
                            <div class="w-full px-3 mb-3 md:mb-0">
                                <label class="block tracking-wide text-gray-700 text-xs font-bold mb-2" for="code">
                                    Name
                                </label>
                                <input
                                    class="appearance-none block w-full text-gray-700 border border-gray-400 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm @error('code') ring-2 ring-red-600 @enderror"
                                    id="name" name="name" type="text" placeholder="Input type name"
                                    value="{{ old('name') }}">
                                @error('name')
                                    <div class="mt-2 text-xs text-red-600">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="flex flex-wrapper justify-end py-1 px-3 ">
                            <button type="reset"
                                class="text-gray-400 hover:text-gray-500 font-bold text-sm py-2 px-4 rounded">
                                Reset
                            </button>
                            <button type="submit"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold text-sm py-2 px-4 rounded">
                                Create
                            </button>
                        </div>
                    </form>
                </div>
                {{-- END USER CONTENT --}}
            </div>
        </div>
    </div>
</x-app-layout>
