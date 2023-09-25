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
            <div class="relative bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="absolute top-4 left-4 px-3 py-1 bg-gray-200 rounded-l-full hover:bg-gray-300">
                    <a href="{{ route('organization.find', [$organizations->id]) }}">
                        <i class="bi bi-arrow-left"></i>
                    </a>
                </div>
                <div class="flex-row py-5 bg-white border-b">
                    <div class="flex w-1/2 mx-auto justify-center">
                        <p class="font-semibold text-lg">{{ $organizations->name }}</p>
                    </div>
                </div>
                <form action="/admin/organization/{{ $organizations->id }}/update" method="post">
                    @method('PUT')
                    @csrf
                    <div class="grid grid-cols-2 gap-6 px-10 py-4">
                        <div class="mt-5">
                            <div class="mb-3">
                                <x-input-label for="code" class="w-full font-bold text-lg">Code</x-input-label>
                                <x-text-input type="text" name="code" id="code"
                                    value="{{ old('code', $organizations->code) }}"
                                    class="mt-2 w-full" />
                                @error('code')
                                    <div class="mt-2 text-xs text-red-600">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <x-input-label for="name" class="w-full font-bold text-lg">Name</x-input-label>
                                <x-text-input type="text" name="name" id="text"
                                    value="{{ old('name', $organizations->name) }}" class="mt-2 w-full"></x-text-input>
                            </div>
                            <div class="mb-3">
                                <x-input-label for="group_id" class="w-full font-bold text-lg">Group</x-input-label>
                                <div class="relative mt-2">
                                    <select
                                        class="block appearance-none w-full border border-gray-400 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm @error('group_id') ring-2 ring-red-600 @enderror"
                                        id="group_id" name="group_id">
                                        @foreach ($groups as $group)
                                            @if (old('group_id', $organizations->group->id) == $group->id)
                                                <option value="{{ old('group_id', $group->id) }}" selected>
                                                    {{ $group->name }} </option>
                                            @else
                                                <option value="{{ old('group_id', $group->id) }}"> {{ $group->name }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('group_id')
                                        <div class="mt-2 text-xs text-red-600">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <x-input-label for="type_id" class="w-full font-bold text-lg">Type</x-input-label>
                                <div class="relative mt-2">
                                    <select
                                        class="block appearance-none w-full border border-gray-400 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm @error('type_id') ring-2 ring-red-600 @enderror"
                                        id="type_id" name="type_id">
                                        @foreach ($types as $type)
                                            @if (old('type_id', $organizations->type->id) == $type->id)
                                                <option value="{{ old('type_id', $type->id) }}" selected>
                                                    {{ $type->name }} </option>
                                            @else
                                                <option value="{{ old('type_id', $type->id) }}"> {{ $type->name }}
                                                </option>
                                            @endif
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
                                    class="mt-2 w-full" />
                                @error('address')
                                    <div class="mt-2 text-xs text-red-600">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                        <div class="mt-5">
                            <div class="mb-3">
                                <x-input-label for="phone" class="w-full font-bold text-lg">Phone</x-input-label>
                                <x-text-input type="text" name="phone" id="text"
                                    value="{{ old('phone', $organizations->phone) }}"
                                    class="mt-2 w-full" />
                                @error('phone')
                                    <div class="mt-2 text-xs text-red-600">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <x-input-label for="province_id"
                                    class="w-full font-bold text-lg">Province</x-input-label>
                                <div class="relative mt-2">
                                    <select
                                        class="block appearance-none w-full border border-gray-400 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm @error('province_id_id') ring-2 ring-red-600 @enderror"
                                        id="province_id" name="province_id">
                                        @foreach ($provinces as $province)
                                            @if (old('province_id', $organizations->province->id) == $province->id)
                                                <option value="{{ old('province_id', $province->id) }}" selected>
                                                    {{ $province->name }} </option>
                                            @else
                                                <option value="{{ old('province_id', $province->id) }}">
                                                    {{ $province->name }} </option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('province_id')
                                        <div class="mt-2 text-xs text-red-600">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <x-input-label for="regency_id" class="w-full font-bold text-lg">Regency</x-input-label>
                                <div class="relative mt-2">
                                    <select
                                        class="block appearance-none w-full border border-gray-400 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm @error('group_id') ring-2 ring-red-600 @enderror"
                                        id="regency_id" name="regency_id">
                                        @foreach ($regencies as $regency)
                                            @if (old('regency_id', $organizations->regency->id) == $regency->id)
                                                <option value="{{ old('regency_id', $regency->id) }}" selected>
                                                    {{ $regency->name }} </option>
                                            @else
                                                <option value="{{ old('regency_id', $regency->id) }}">
                                                    {{ $regency->name }} </option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('regency_id')
                                        <div class="mt-2 text-xs text-red-600">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <x-input-label for="district_id"
                                    class="w-full font-bold text-lg">District</x-input-label>
                                <div class="relative mt-2">
                                    <select
                                        class="block appearance-none w-full border border-gray-400 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm @error('group_id') ring-2 ring-red-600 @enderror"
                                        id="district_id" name="district_id">
                                        @foreach ($districts as $district)
                                            @if (old('district_id', $organizations->district->id) == $district->id)
                                                <option value="{{ old('district_id', $district->id) }}" selected>
                                                    {{ $district->name }} </option>
                                            @else
                                                <option value="{{ old('district_id', $district->id) }}">
                                                    {{ $district->name }} </option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('district_id')
                                        <div class="mt-2 text-xs text-red-600">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <x-input-label for="village_id"
                                    class="w-full font-bold text-lg">Village</x-input-label>
                                <div class="relative mt-2">
                                    <select
                                        class="block appearance-none w-full border border-gray-400 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm @error('group_id') ring-2 ring-red-600 @enderror"
                                        id="village_id" name="village_id">
                                        @foreach ($villages as $village)
                                            @if (old('village_id', $organizations->village->id) == $village->id)
                                                <option value="{{ old('village_id', $village->id) }}" selected>
                                                    {{ $village->name }} </option>
                                            @else
                                                <option value="{{ old('village_id', $village->id) }}">
                                                    {{ $village->name }} </option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('village_id')
                                        <div class="mt-2 text-xs text-red-600">{{ $message }}</div>
                                    @enderror
                                </div>
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
