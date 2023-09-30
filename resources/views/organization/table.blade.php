<table class="table-autoborder-spacing-2 w-full wrapper text-sm">
    <thead class="border-b border-gray-300">
        <tr>
            <th class="text-md pb-2">#</th>
            <th class="text-md pb-2">Name</th>
            <th class="text-md pb-2">Group</th>
            <th class="text-md pb-2">Type</th>
            <th class="text-md pb-2">Class</th>
            <th class="text-md pb-2">Phone</th>
            <th class="text-md pb-2">Address</th>
            <th class="text-md pb-2">Province</th>
            <th class="text-md pb-2">Regency</th>
            <th class="text-md pb-2">District</th>
            <th class="text-md pb-2">Village</th>
            <th class="text-md pb-2">Created Date</th>
            <th class="text-md pb-2">Updated Date</th>
            <th class="text-md pb-2">Created By</th>
        </tr>
    </thead>
    <tbody class="border-b border-gray-300">
        @php
            $i = 1;
        @endphp
        @foreach ($organizations as $org)
            <tr class="text-md">
                <td class="text-center">{{ $i++ }}</td>
                <td class="px-3 py-1">{{ $org->name }}</td>
                <td class="px-3 py-1">{{ $org->group->name ?? 'Ra metu' }}</td>
                <td class="px-3 py-1">{{ $org->type->name ?? 'Ra metu' }}</td>
                <td class="px-3 py-1">{{ $org->class }}</td>
                <td class="px-3 py-1">{{ $org->phone }}</td>
                <td class="px-3 py-1">{{ $org->address }}</td>
                <td class="px-3 py-1">{{ $org->province->name ?? 'Ra metu' }}</td>
                <td class="px-3 py-1">{{ $org->regency->name ?? 'Ra metu' }}</td>
                <td class="px-3 py-1">{{ $org->district->name ?? 'Ra metu' }}</td>
                <td class="px-3 py-1">{{ $org->village->name ?? 'Ra metu' }}</td>
                <td class="px-3 py-1">{{ $org->created_at ?? 'Ra metu' }}</td>
                <td class="px-3 py-1">{{ $org->updated_at ?? 'Ra metu' }}</td>
                <td class="px-3 py-1">{{ $org->user->name ?? 'Ra metu' }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
