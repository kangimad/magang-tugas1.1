{{-- @dd($groups) --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Groups') }}
        </h2>
    </x-slot>

    {{-- USER CONTENT --}}
    <div class="py-12">
        @if (session('create-success'))
            <div class="w-1/2 p-3 mb-7 mx-auto font-semibold text-center text-white text-sm bg-teal-400 rounded-lg ">
                <p>{{ session('create-success') }}</p>
            </div>
        @endif
        @if (session('delete-success'))
            <div class="w-1/2 p-3 mb-7 mx-auto font-semibold text-center text-white text-sm bg-pink-400 rounded-lg ">
                <p>{{ session('delete-success') }}</p>
            </div>
        @endif
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex-row  px-5 py-4 bg-white rounded shadow">

                    <div class="mt-5 bg-white rounded">
                        <div class="flex justify-between items-center pb-5 border-b-2 border-gray-300">
                            <p class="block text-xl font-medium">Filters</p>
                            <p class="ml-auto">
                                <a href="{{ route('group.create') }}"
                                    class="px-2 py-1 font-medium text-gray-300 bg-teal-600 hover:text-white hover:bg-teal-700 rounded">
                                    <i class="bi bi-plus-square text-md"></i> Create
                                </a>
                            </p>
                        </div>

                        <div class="py-5 px-4 border-b">
                            <form action="{{ route('group.all') }}" method="get" class="w-full">
                                <div>
                                    <input type="text" name="name" id="name" placeholder="Name"
                                        value="{{ request('name') }}"
                                        class="px-4 py-2 w-full text-small rounded outline-none ring-1 ring-teal-700 border-none">
                                </div>
                                <div class="flex justify-end mt-5">
                                    <button type="submit"
                                        class="w-fit px-3 py-1 rounded-lg bg-teal-500 hover:rounded-r-lg hover:bg-teal-600 outline-none text-gray-300 text-md font-medium">
                                        <i class="bi bi-search"></i> Search
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="mt-5 bg-white rounded">
                        <table class="table-autoborder-spacing-2 w-full wrapper text-sm">
                            <thead class="border-b border-gray-300">
                                <tr>
                                    <th class="text-md pb-2">#</th>
                                    <th class="text-md pb-2">Name</th>
                                    <th class="text-md pb-2">Date Created</th>
                                    <th class="text-md pb-2">Date Updated</th>
                                    <th class="text-md pb-2">Action</th>
                                </tr>
                            </thead>
                            <tbody class="border-b border-gray-300">
                                @php
                                    // $i = ($groups->currentPage() - 1) * $groups->perPage() + 1;
                                    $i = 1;
                                @endphp
                                @foreach ($groups as $group)
                                    <tr class="text-md">
                                        <td class="text-center">{{ $i++ }}</td>
                                        <td class="px-3 py-1">{{ $group->name }}</td>
                                        <td class="px-3 py-1">{{ $group->created_at }}</td>
                                        <td class="px-3 py-1">{{ $group->updated_at }}</td>
                                        <td class="px-3 py-1 flex align-middle justify-center">
                                            <a href="/admin/group/{{ $group->id }}/find"
                                                class="px-3 py-1 mx-1 bg-yellow-400 rounded hover:bg-yellow-600 hover:text-white">
                                                <i class="bi bi-display"></i></a>
                                            <a href="/admin/group/{{ $group->id }}/edit"
                                                class="px-3 py-1 mx-1 bg-blue-400 rounded hover:bg-blue-600 hover:text-white">
                                                <i class="bi bi-pencil"></i></a>
                                            <form action="/admin/group/{{ $group->id }}/delete" method="post"
                                                class="inline">
                                                @csrf
                                                @method('delete')
                                                <button
                                                    class="px-3 py-1 mx-1 bg-red-400 rounded hover:bg-red-600 outline-none hover:text-white"
                                                    onclick="return confirm('Are you sure ?')">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- <div class="flex flex-row mx-auto w-fit mt-5 font-mono font-semibold">
                            {{ $organizations->links() }}
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- USER CONTENT --}}

</x-app-layout>
