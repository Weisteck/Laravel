<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Organisation;

class OrganisationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): Application|Factory|View
    {
        return view('organisation.index', ['organisations' => Organisation::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        Organisation::query()->create([
            'id' => Str::uuid(),
            'slug' => $request->slug,
            'name' => $request->name,
            'email' => $request->email,
            'tel' => $request->tel,
            'address' => $request->address,
            'type' => $request->type
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return View|Factory|Application
     *
     */
    public function show(int $id): View|Factory|Application
    {
        $organisation = DB::table('organisations')->where('id', $id)->first();

    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param string $id
     * @return \Illuminate\Database\Query\Builder|Model|object
     */
    public function update(Request $request, string $id)
    {
        $organisation = Organisation::find($id);

        $organisation->slug = $request->slug;
        $organisation->name = $request->name;
        $organisation->email = $request->email;
        $organisation->tel = $request->tel;
        $organisation->address = $request->address;
        $organisation->type = $request->type;

        $organisation->save();

        return view('organisation.index', ['organisations' => Organisation::find($id)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
