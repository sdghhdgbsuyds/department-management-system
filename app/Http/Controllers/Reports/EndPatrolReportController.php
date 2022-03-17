<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use App\Models\Patrol;
use App\Models\Report;
use App\Models\ReportForm;
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

    public function store(ReportForm $reportForm, Patrol $patrol, Request $request)
    {
        $questions = json_decode($reportForm->questions);

        $rules = [];

        foreach ($questions as $question) {
            $rules[$question->name] = $question->rules;
        }


        $answers = $request->validate($rules);

        $id = 'EP' . date("mdY-His");

        $input['user_steam_hex'] = Auth::user()->steam_hex;
        $input['questions'] = json_encode($answers);
        $input['report_form_id'] = $reportForm->id;
        $input['id'] = $id;



        $uptest = $patrol->update([
            'report_id' => $id,
        ]);



        dd($patrol);

        Report::create($input);

        return redirect()->route('portal.home')->with('success', 'Report Submitted.');
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
