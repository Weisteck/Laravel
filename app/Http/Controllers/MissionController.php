<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mission;
use App\Models\Organisation;
use App\Models\MissionLine;

class MissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(Request $request, Organisation $organisation)
    {
        return view('mission/create', ['organisation' => $organisation]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, Organisation $organisation)
    {
//        dd($request);
        /**
         * @var Mission $mission
         */
        $mission = $organisation->missions()->create([
            'reference' => $request->input('reference'),
            'title' => $request->input('title'),
            'comment' => $request->input('comment'),
            'deposit' => $request->input('deposit'),
            'ended_at' => $request->input('ended_at')
        ]);

        $mission->lines()->createMany($request->mission_lines);
        // a modifier ou pas a voir
        return redirect()->route('organisations.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $mission = Mission::find($id);

        $mission->reference = $request->reference;
        $mission->title = $request->title;
        $mission->comment = $request->comment;
        $mission->deposit = $request->deposit;

        $mission->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id, Organisation $organisation)
    {
        Mission::delete();
    }
}
