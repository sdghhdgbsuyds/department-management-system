<?php

namespace App\Http\Controllers\Apply;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\ApplicationForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ApplicationForm $applicationForm)
    {
        $questions = json_decode($applicationForm->questions);

        // foreach ($questions as $question) {
        //     print_r($question->title);
        //     echo "<br>";
        // }

        return view('apply.application.create', compact('applicationForm', 'questions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ApplicationForm $applicationForm, Request $request)
    {
        $questions = json_decode($applicationForm->questions);

        $rules = [];

        foreach ($questions as $question) {
            $rules[$question->name] = $question->rules;
        }

        $questions = $request->validate($rules, ['messages' => ['required' => '']]);
        $input['user_steam_hex'] = Auth::user()->steam_hex;
        $input['questions'] = json_encode($questions);
        $input['application_form_id'] = $applicationForm->id;

        Application::create($input);

        return redirect()->route('auth.account.show', Auth::user())->with('success', 'Application Submitted.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
