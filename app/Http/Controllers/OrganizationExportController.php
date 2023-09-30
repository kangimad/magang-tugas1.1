<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\OrganizationExport;
use Maatwebsite\Excel\Facades\Excel;

class OrganizationExportController extends Controller
{
    public function exportExcel()
    {
        return Excel::download(new OrganizationExport, "Organizations.xlsx");
    }

    public function exportPDF()
    {
        $organizations = Organization::orderBy('name', 'asc')->get();

        $pdf = Pdf::loadView('organization.table', ['organizations' => $organizations]);
        return $pdf->stream('Organizations.pdf');
    }
}
