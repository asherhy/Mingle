<?php

namespace App\Http\Controllers;

use App\Module;
use App\ModuleMatch;
use Illuminate\Http\Request;

class ModuleMatchController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modules = Module::all()->pluck('code_title');
        return view('quickmatch.module.create', compact('modules'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
        $m = ModuleMatch::find(1);
        $mm = ($m->match_data);
        $mm['cs2030'] = ['a', 'b', 'c'];
        dd(($mm));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ModuleMatch  $moduleMatch
     * @return \Illuminate\Http\Response
     */
    public function show(ModuleMatch $moduleMatch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ModuleMatch  $moduleMatch
     * @return \Illuminate\Http\Response
     */
    public function edit(ModuleMatch $moduleMatch)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ModuleMatch  $moduleMatch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ModuleMatch $moduleMatch)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ModuleMatch  $moduleMatch
     * @return \Illuminate\Http\Response
     */
    public function destroy(ModuleMatch $moduleMatch)
    {
        //
    }
}
