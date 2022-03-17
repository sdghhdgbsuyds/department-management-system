<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use App\Models\Patrol;
use Illuminate\Http\Request;

class TimeclockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $patrols = Patrol::where('user_id', auth()->user()->steam_hex)->whereNotNull('end_time')->latest()->take(5)->get();

        $patrols_no_report = $patrols->whereNull('report');

        return view('portal.timeclock.index', compact('patrols', 'patrols_no_report'));
    }

    public function start()
    {
        $patrol_id = date("mdY-His");

        $patrol = Patrol::create([
            'user_id' => auth()->user()->steam_hex,
            'start_time' => now(),
            'id' => $patrol_id,
        ]);

        auth()->user()->update([
            'is_on_duty' => true,
            'last_action' => now(),
            'active_patrol_id' => $patrol_id,
        ]);

        return redirect()->route('portal.timeclock.index');
    }

    public function stop()
    {
        $active_patrol = Patrol::findOrFail(auth()->user()->active_patrol_id);

        $active_patrol->update([
            'end_time' => now(),
        ]);

        auth()->user()->update([
            'is_on_duty' => false,
            'last_action' => now(),
            'active_patrol_id' => null,
        ]);

        return redirect()->route('portal.timeclock.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Patrol $patrol)
    {
        return view('portal.timeclock.show', compact('patrol'));
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
}
