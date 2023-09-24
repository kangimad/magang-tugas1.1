{{-- @dd($organizations) --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Organizations Edit') }}
        </h2>
    </x-slot>

    {{-- USER CONTENT --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex-row py-5 bg-white border-b">
                    <div class="flex w-1/2 mx-auto justify-center">
                        <p class="font-semibold text-lg">{{ $organizations->name }}</p>
                    </div>
                </div>
                <form action="{{ route('organization.update') }}" method="post">
                    @method('put')
                    @csrf
                    <div class="grid grid-cols-2 gap-6  px-10 py-4 bg-white rounded shadow">
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
                                <x-input-label for="group_id" class="w-full font-bold text-lg">Group</x-input-label>
                                <div class="relative">
                                    <select
                                        class="block appearance-none w-full border border-gray-400 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm @error('group_id') ring-2 ring-red-600 @enderror"
                                        id="group_id" name="group_id">
                                        <option>{{ $organizations->group->name }}</option>
                                        @foreach ($groups as $group)
                                            <option value="{{ $group->id }}" name="group_id">
                                                {{ $group->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('group_id')
                                        <div class="mt-2 text-xs text-red-600">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <x-input-label for="type_id" class="w-full font-bold text-lg">Type</x-input-label>
                                <div class="relative">
                                    <select
                                        class="block appearance-none w-full border border-gray-400 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm @error('type_id') ring-2 ring-red-600 @enderror"
                                        id="group_id" name="group_id">
                                        <option>{{ $organizations->type->name }}</option>
                                        @foreach ($types as $type)
                                            <option value="{{ $type->id }}" name="type_id">
                                                {{ $type->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('type_id')
                                        <div class="mt-2 text-xs text-red-600">{{ $message }}</div>
                                    @enderror
                                </div>
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
                                <x-input-label for="province_id" class="w-full font-bold text-lg">Province</x-input-label>
                                <div class="relative">
                                    <select
                                        class="block appearance-none w-full border border-gray-400 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm @error('province_id_id') ring-2 ring-red-600 @enderror"
                                        id="province_id_id" name="province_id_id">
                                        <option>{{ $organizations->province->name }}</option>
                                        @foreach ($provinces as $province)
                                            <option value="{{ $province->id }}" name="province_id">
                                                {{ $province->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('province_id_id')
                                        <div class="mt-2 text-xs text-red-600">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <x-input-label for="regency_id" class="w-full font-bold text-lg">Regency</x-input-label>
                                <div class="relative">
                                    <select
                                        class="block appearance-none w-full border border-gray-400 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm @error('group_id') ring-2 ring-red-600 @enderror"
                                        id="regency_id" name="regency_id">
                                        <option>{{ $organizations->regency->name }}</option>
                                        @foreach ($regencies as $regency)
                                            <option value="{{ $regency->id }}" name="regency_id">
                                                {{ $regency->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('regency_id')
                                        <div class="mt-2 text-xs text-red-600">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <x-input-label for="district_id" class="w-full font-bold text-lg">District</x-input-label>
                                <div class="relative">
                                    <select
                                        class="block appearance-none w-full border border-gray-400 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm @error('group_id') ring-2 ring-red-600 @enderror"
                                        id="district_id" name="district_id">
                                        <option>{{ $organizations->district->name }}</option>
                                        @foreach ($districts as $district)
                                            <option value="{{ $district->id }}" name="district_id">
                                                {{ $district->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('district_id')
                                        <div class="mt-2 text-xs text-red-600">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <x-input-label for="village_id" class="w-full font-bold text-lg">Village</x-input-label>
                                <div class="relative">
                                    <select
                                        class="block appearance-none w-full border border-gray-400 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm @error('group_id') ring-2 ring-red-600 @enderror"
                                        id="village_id" name="village_id">
                                        <option>{{ $organizations->village->name }}</option>
                                        @foreach ($villages as $village)
                                            <option value="{{ $village->id }}" name="village_id">
                                                {{ $village->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('village_id')
                                        <div class="mt-2 text-xs text-red-600">{{ $message }}</div>
                                    @enderror
                                </div>
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
