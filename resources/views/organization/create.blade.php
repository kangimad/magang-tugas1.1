{{-- @dd($groups) --}}
<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Organizations - Form') }}
        </h2>
    </x-slot>

    {{-- USER CONTENT --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="relative bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="absolute top-5 left-4 px-3 py-1 bg-gray-200 rounded-l-full hover:bg-gray-300">
                    <a href="{{ route('organization.all') }}">
                        <i class="bi bi-arrow-left"></i>
                    </a>
                </div>
                <div class="flex-row py-5 bg-white border-b">
                    <div class="flex w-1/2 mx-auto justify-center">
                        <p class="font-semibold text-lg">Create New Organization</p>
                    </div>
                </div>

                <div class="flex-row mt-3 w-full px-5 py-4 bg-white rounded">
                    <form class="w-full" action="/admin/organization" method="post">
                        @csrf
                        {{-- CODE, NAME --}}
                        <div class="flex flex-wrap mb-3 gap-y-3">
                            <div class="w-full lg:w-1/3 px-3 mb-3 md:mb-0">
                                <label class="block tracking-wide text-gray-700 text-xs font-bold mb-2" for="code">
                                    Code
                                </label>
                                <input
                                    class="appearance-none block w-full text-gray-700 border border-gray-400 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm @error('code') ring-2 ring-red-600 @enderror"
                                    id="code" name="code" type="text" placeholder="code (4 digit)"
                                    value="{{ old('code') }}">
                                @error('code')
                                    <div class="mt-2 text-xs text-red-600">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="w-full hidden lg:w-1/3 px-3 mb-3 md:mb-0">
                                <label class="block tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="created_by">
                                    Username
                                </label>
                                <input
                                    class="appearance-none block w-full text-gray-700 border border-gray-400 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm @error('code') ring-2 ring-red-600 @enderror"
                                    id="created_by" name="created_by" type="text"
                                    placeholder="{{ Auth::user()->name }}" value="{{ Auth::user()->id }}">
                                @error('created_by')
                                    <div class="mt-2 text-xs text-red-600">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="w-full lg:w-2/3 px-3">
                                <label class="block tracking-wide text-gray-700 text-xs font-bold mb-2" for="name">
                                    Name
                                </label>
                                <input
                                    class="appearance-none block w-full text-gray-700 border border-gray-400 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm @error('name') ring-2 ring-red-600 @enderror"
                                    id="name" name="name" type="text" placeholder="name"
                                    value="{{ old('name') }}">
                                @error('name')
                                    <div class="mt-2 text-xs text-red-600">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        {{-- TYPE, GROUP, CLASS --}}
                        <div class="flex flex-wrap  gap-y-3 pb-3">
                            <div class="w-full lg:w-1/3 px-3 mb-3 md:mb-0">
                                <label class="block tracking-wide text-gray-700 text-xs font-bold mb-2" for="group_id">
                                    Group
                                </label>
                                <div class="relative">
                                    <select
                                        class="block appearance-none w-full border border-gray-400 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm @error('group_id') ring-2 ring-red-600 @enderror"
                                        id="group_id" name="group_id">
                                        @foreach ($groups as $group)
                                            @if (old('group_id' == $group->id))
                                                <option value="{{ $group->id }}" selected>
                                                    {{ $group->name }}
                                                </option>
                                            @else
                                            @endif
                                            <option value="{{ $group->id }}">
                                                {{ $group->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('group_id')
                                        <div class="mt-2 text-xs text-red-600">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="w-full lg:w-1/3 px-3">
                                <label class="block tracking-wide text-gray-700 text-xs font-bold mb-2" for="type_id">
                                    Type
                                </label>
                                <div class="relative">
                                    <select
                                        class="block appearance-none w-full border border-gray-400 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm @error('type_id') ring-2 ring-red-600 @enderror"
                                        id="type_id" name="type_id">
                                        @foreach ($types as $type)
                                            @if (old('type_id' == $type->id))
                                                <option value="{{ $type->id }}" selected>
                                                    {{ $type->name }}
                                                </option>
                                            @else
                                            @endif
                                            <option value="{{ $type->id }}">
                                                {{ $type->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('type_id')
                                        <div class="mt-2 text-xs text-red-600">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="w-full lg:w-1/3 px-3">
                                <label class="block tracking-wide text-gray-700 text-xs font-bold mb-2" for="class">
                                    Class
                                </label>
                                <input
                                    class="appearance-none block w-full text-gray-700 border border-gray-400 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm @error('class') ring-2 ring-red-600 @enderror"
                                    id="class" name="class" type="text" placeholder="class"
                                    value="{{ old('class') }}">
                                @error('class')
                                    <div class="mt-2 text-xs text-red-600">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        {{-- ADDRESS, PHONE --}}
                        <div class="flex flex-wrap  gap-y-3">
                            <div class="w-full px-3 lg:w-2/3">
                                <label class="block tracking-wide text-gray-700 text-xs font-bold mb-2" for="address">
                                    Address
                                </label>
                                <input
                                    class="appearance-none block w-full text-gray-700 border border-gray-400 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm @error('address') ring-2 ring-red-600 @enderror"
                                    id="address" name="address" type="text" placeholder="Address"
                                    value="{{ old('address') }}">
                                @error('address')
                                    <div class="mt-2 text-xs text-red-600">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="w-full lg:w-1/3 px-3">
                                <label class="block tracking-wide text-gray-700 text-xs font-bold mb-2" for="phone">
                                    Phone
                                </label>
                                <input
                                    class="appearance-none block w-full text-gray-700 border border-gray-400 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm @error('phone') ring-2 ring-red-600 @enderror"
                                    id="phone" name="phone" type="text" placeholder="Phone"
                                    value="{{ old('phone') }}">
                                @error('phone')
                                    <div class="mt-2 text-xs text-red-600">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        {{-- PROVINCE, REGENCY, DISTRICT, VILLAGE --}}
                        <div class="flex flex-wrap  gap-y-3 pb-3">
                            <div class="w-full lg:w-1/4 px-3 mb-3 md:mb-0">
                                <label class="block tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="province_id">
                                    Province
                                </label>
                                <div class="relative">
                                    <select
                                        class="block appearance-none w-full border border-gray-400 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm"
                                        id="province_id" name="province_id">
                                        @foreach ($provinces as $province)
                                            @if (old('province_id' == $province->id))
                                                <option value="{{ $province->id }}" selected>
                                                    {{ $province->name }}
                                                </option>
                                            @else
                                            @endif
                                            <option value="{{ $province->id }}">
                                                {{ $province->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="w-full lg:w-1/4 px-3 mb-3 md:mb-0">
                                <label class="block tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="regency_id">
                                    Regency
                                </label>
                                <div class="relative">
                                    <select
                                        class="block appearance-none w-full border border-gray-400 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm"
                                        id="regency_id" name="regency_id">
                                        @foreach ($regencies as $regency)
                                            @if (old('regency_id' == $regency->id))
                                                <option value="{{ $regency->id }}" selected>
                                                    {{ $regency->name }}
                                                </option>
                                            @else
                                            @endif
                                            <option value="{{ $regency->id }}">
                                                {{ $regency->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="w-full lg:w-1/4 px-3 mb-6 md:mb-0">
                                <label class="block tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-zip">
                                    District
                                </label>
                                <div class="relative">
                                    <select
                                        class="block appearance-none w-full border border-gray-400 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm"
                                        id="district_id" name="district_id">
                                        @foreach ($districts as $district)
                                            @if (old('district_id' == $district->id))
                                                <option value="{{ $district->id }}" selected>
                                                    {{ $district->name }}
                                                </option>
                                            @else
                                            @endif
                                            <option value="{{ $district->id }}">
                                                {{ $district->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="w-full lg:w-1/4 px-3 mb-3 md:mb-0">
                                <label class="block tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-zip">
                                    Village
                                </label>
                                <div class="relative">
                                    <select
                                        class="block appearance-none w-full border border-gray-400 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm"
                                        id="village_id" name="village_id">
                                        @foreach ($villages as $village)
                                            @if (old('village_id' == $village->id))
                                                <option value="{{ $village->id }}" selected>
                                                    {{ $village->name }}
                                                </option>
                                            @else
                                            @endif
                                            <option value="{{ $village->id }}">
                                                {{ $village->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
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
