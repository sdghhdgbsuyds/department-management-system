<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use App\Http\Requests\EndofPatrolReport;
use App\Models\EndPatrolReport;
use App\Models\Patrol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EndPatrolReportController extends Controller
{
    public function index()
    {
        //
    }

    public function create(Patrol $patrol)
    {
        return view('portal.reports.endpatrol.create', compact('patrol'));
    }

    public function store(Patrol $patrol, EndofPatrolReport $request)
    {
        $id = 'EPR' . $patrol->id;
        $input = $request->validated();
        $input['user_steam_hex'] = Auth::user()->steam_hex;
        $input['patrol_id'] = $patrol->id;
        $input['id'] = $id;

        $patrol->report_id = $id;
        $patrol->save();


        EndPatrolReport::create($input);

        return redirect()->route('portal.index')->with('success', 'Report Submitted.');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
