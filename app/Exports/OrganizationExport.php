<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use App\Models\Organization;
use Maatwebsite\Excel\Concerns\FromView;

class OrganizationExport implements FromView
{
    public function view():View
    {
        $organizations = Organization::orderBy('name', 'asc')->get();
        // dd($organizations);
        return view('organization.table', ['organizations' => $organizations]);
    }
}
