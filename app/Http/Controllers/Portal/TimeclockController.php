<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use App\Models\EndPatrolReport;
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

        $patrols = Patrol::where('user_id', auth()->user()->steam_hex)->orderBy('created_at', 'desc')->whereNotNull('end_time')->get();

        $patrols_no_report = $patrols->whereNull('report_id');
        $patrols = $patrols->whereNotNull('report_id')->take(5);

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
        $epr = EndPatrolReport::where('patrol_id', $patrol->id)->get()[0];

        return view('portal.timeclock.show', compact('patrol', 'epr'));
    }
}
