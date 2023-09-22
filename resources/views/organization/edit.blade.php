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
                <form action="{{ route('organization.update') }}" method="post">
                    @method('put')
                    @csrf
                    <div class="grid grid-cols-2 gap-6  px-5 py-4 bg-white rounded shadow">
                        <div class="mt-5 bg-white rounded ">
                            <div class="mb-3 hidden">
                                <x-input-label for="id" class="w-full font-bold text-lg">ID</x-input-label>
                                <x-text-input type="text" name="id" id="id"
                                    value="{{ old('id', $organizations->id) }}" class="mt-2 w-full"></x-text-input>
                            </div>
                            <div class="mb-3">
                                <x-input-label for="code" class="w-full font-bold text-lg">Code</x-input-label>
                                <x-text-input disabled type="text" name="code" id="code"
                                    value="{{ old('code', $organizations->code) }}" class="mt-2 w-full"></x-text-input>
                            </div>
                            <div class="mb-3">
                                <x-input-label for="name" class="w-full font-bold text-lg">Name</x-input-label>
                                <x-text-input type="text" name="name" id="text"
                                    value="{{ old('name', $organizations->name) }}" class="mt-2 w-full"></x-text-input>
                            </div>
                            <div class="mb-3">
                                <x-input-label for="group" class="w-full font-bold text-lg">Group</x-input-label>
                                <x-text-input type="text" name="group" id="text"
                                    value="{{ old('group', $organizations->group->name) }}"
                                    class="mt-2 w-full"></x-text-input>
                            </div>
                            <div class="mb-3">
                                <x-input-label for="type" class="w-full font-bold text-lg">Type</x-input-label>
                                <x-text-input type="text" name="type" id="text"
                                    value="{{ old('type', $organizations->type->name) }}"
                                    class="mt-2 w-full"></x-text-input>
                            </div>
                            <div class="mb-3">
                                <x-input-label for="class" class="w-full font-bold text-lg">Class</x-input-label>
                                <x-text-input type="text" name="class" id="text"
                                    value="{{ old('class', $organizations->class) }}"
                                    class="mt-2 w-full"></x-text-input>
                            </div>
                            <div class="mb-3">
                                <x-input-label for="address" class="w-full font-bold text-lg">Address</x-input-label>
                                <x-text-input type="text" name="address" id="text"
                                    value="{{ old('address', $organizations->address) }}"
                                    class="mt-2 w-full"></x-text-input>
                            </div>
                            <div class="mb-3">
                                <x-input-label for="phone" class="w-full font-bold text-lg">Phone</x-input-label>
                                <x-text-input type="text" name="phone" id="text"
                                    value="{{ old('phone', $organizations->phone) }}"
                                    class="mt-2 w-full"></x-text-input>
                            </div>
                        </div>
                        <div class="mt-5 bg-white rounded ">
                            <div class="mb-3">
                                <x-input-label for="province" class="w-full font-bold text-lg">Province</x-input-label>
                                <x-text-input type="text" name="province" id="text"
                                    value="{{ old('province', $organizations->province->name) }}"
                                    class="mt-2 w-full"></x-text-input>
                            </div>
                            <div class="mb-3">
                                <x-input-label for="regency" class="w-full font-bold text-lg">Regency</x-input-label>
                                <x-text-input type="text" name="regency" id="text"
                                    value="{{ old('regency', $organizations->regency->name) }}"
                                    class="mt-2 w-full"></x-text-input>
                            </div>
                            <div class="mb-3">
                                <x-input-label for="district" class="w-full font-bold text-lg">District</x-input-label>
                                <x-text-input type="text" name="district" id="text"
                                    value="{{ old('district', $organizations->district->name) }}"
                                    class="mt-2 w-full"></x-text-input>
                            </div>
                            <div class="mb-3">
                                <x-input-label for="village" class="w-full font-bold text-lg">Village</x-input-label>
                                <x-text-input type="text" name="village" id="text"
                                    value="{{ old('village', $organizations->village->name) }}"
                                    class="mt-2 w-full"></x-text-input>
                            </div>
                            <div class="mb-3">
                                <x-input-label for="created_at" class="w-full font-bold text-lg">Date
                                    Created</x-input-label>
                                <x-text-input disabled type="text" name="created_at" id="text"
                                    value="{{ old('created_at', $organizations->created_at) }}"
                                    class="mt-2 w-full"></x-text-input>
                            </div>
                            <div class="mb-3">
                                <x-input-label for="updated_at" class="w-full font-bold text-lg">Date
                                    Updated</x-input-label>
                                <x-text-input disabled type="text" name="updated_at" id="text"
                                    value="{{ old('updated_at', $organizations->updated_at) }}"
                                    class="mt-2 w-full"></x-text-input>
                            </div>
                            <div class="mb-3">
                                <x-input-label for="created_by"
                                    class="w-full font-bold text-lg">Creator</x-input-label>
                                <x-text-input disabled type="text" name="created_by" id="text"
                                    value="{{ old('created_by', $organizations->user->name) }}"
                                    class="mt-2 w-full"></x-text-input>
                            </div>
                            <div class="text-end">
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
