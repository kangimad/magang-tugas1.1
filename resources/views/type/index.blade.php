{{-- @dd($types); --}}
@extends('user.partials.user-layout')
@section('user-content')
    <div class="flex-row mt-5 w-full px-5 py-4 bg-white rounded shadow">
        <table class="table-auto border-spacing-2 w-2/4 wrapperrounded mx-auto">
            <thead class="border-b border-gray-300">
                <tr class="text-md">
                    <th>#</th>
                    <th>Name</th>
                </tr>
            </thead>
            <tbody>
                @php
                    // $i = ($types->currentPage() - 1) * $types->perPage() + 1;
                    $i = 1;
                @endphp
                @foreach ($types as $type)
                    <tr class="text-md">
                        <td class="text-center">{{ $i++ }}</td>
                        <td class="px-3 py-1 hover:bg-slate-300"><a href="/types/{{ $type->name }}">{{ $type->name }}</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- <div class="flex flex-row mx-auto w-fit mt-3 font-mono font-semibold">
            {{ $types->links() }}
        </div> --}}
        {{-- END ROW 2 --}}
    </div>
@endsection
