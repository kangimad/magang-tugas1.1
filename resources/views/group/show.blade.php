@dd($groups)
@extends('user.partials.user-layout')
@section('user-content')
    <div class="mx-3 py-5 font-serif">
        {{-- @if (session('success'))
            <div class=" w-3/12 mx-auto p-2 mb-4 font-semibold text-center text-sm text-green-800 rounded-lg bg-green-50">
                <p>{{ session('success') }}</p>
            </div>
        @endif --}}
        {{-- ROW 1 --}}
        <div class="flex flex-row justify-center items-center">
            <p class="text-2xl font-bold font-serif">Group of Organizations</p>
        </div>
        {{-- END ROW 1 --}}

        {{-- ROW 2 --}}
        {{-- <div class="flex flex-row mt-3 justify-center items-center w-full gap-x-5">
            <div class="flex flex-col w-2/6"></div>
            <div class="flex flex-col w-2/6 justify-center">
                <form action="/organizations" method="get">
                    <div class="flex group">
                        <input type="search" name="search"
                            class="block px-3 shadow-lg rounded-l-lg w-5/6 text-sm outline-none"
                            placeholder="input your keywords" value="{{ request('search') }}">
                        <button type="submit"
                            class="w-1/7 inline-block px-3 py-1 rounded-r-lg bg-teal-500 hover:rounded-r-lg hover:bg-teal-600 outline-none font-semibold text-gray-300 text-sm">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </form>
            </div>
            <div class="flex flex-col justify-end w-2/6">
                <p class="ml-auto block"><a href="/organizations/create"
                        class="px-3 py-2 font-semibold text-gray-300 bg-teal-700 hover:bg-teal-800 rounded-lg shadow-lg text-sm">
                        Create
                    </a></p>
            </div>
        </div> --}}
        {{-- END ROW 2 --}}

        {{-- ROW 3 --}}
        <div class="flex flex-row mt-5 justify-evenly items-center font-mono">
            <table class="table-auto border-spacing-2 w-full wrapper bg-gray-200 rounded shadow-lg">
                <thead class="border-b border-gray-300">
                    <tr class="text-md">
                        <th>#</th>
                        <th>Name</th>
                        <th>Group</th>
                        <th>Type</th>
                        <th>Class</th>
                        <th>Address</th>
                        <th>Phone</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        // $i = ($groups->currentPage() - 1) * $groups->perPage() + 1;
                        $i = 1;
                    @endphp
                    @foreach ($groups as $group)
                        <tr class="text-md">
                            <td class="text-center">{{ $i++ }}</td>
                            <td class="px-3 py-1">{{ $group->name }}</td>
                            {{-- <td class="px-3 py-1">{{ $group->name }}</td> --}}
                            {{-- <td class="px-3 py-1">{{ $group->organization->name }}</td> --}}
                            {{-- <td class="px-3 py-1">{{ $group }}</td>
                            <td class="px-3 py-1">{{ $group }}</td>
                            <td class="px-3 py-1">{{ $group }}</td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="flex flex-row mx-auto w-fit mt-3 font-mono font-semibold">
            {{-- {{ $groups->links() }} --}}
        </div>
        {{-- END ROW 3 --}}

    </div>
@endsection
