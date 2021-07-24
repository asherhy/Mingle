<?php

namespace App\Http\Controllers;

use App\Group;
use App\Module;
use App\ModuleMatch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ModuleMatchController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

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
        if (isset($request->telegram) && count($request->telegram) != $request->members) {
            return redirect()->back()->withErrors("Please key in your friend's telegram");
            //add error message;
        }

        $request->validate([
            'modules' => ['required', 'string'],
            'detail' => ['required', 'string'],
          ]);

        $m = ModuleMatch::find(1);
        $allDatas = ($m->match_data);
        $number = $request->members + 1;
        $newData = [Auth::user()->name => Auth::user()->telegram];
        for ($i = 0; isset($request->telegram) && $i < count($request->telegram); $i++) {
            $j = $i + 1;
            $newData[Auth::user()->name."'s friend"." ".$j] = ($request->telegram)[$i];
        } 

        $module = Module::where('code_title', $request->modules)->firstOrFail()->code;
        if (isset($allDatas[$module])){
            echo('inside if');
            for($i = 0; $i < count($allDatas[$module]); $i++){
                if(count($allDatas[$module][$i]) + $number <= 6){
                    // there exist a group to fit current request
                    $allDatas[$module][$i] = array_merge($allDatas[$module][$i], $newData);
                    Auth::user()->assignGroup($allDatas[$module][$i][0]);
                    $group = Group::find($allDatas[$module][$i][0]);
                    $group->update([
                        'user_info' => array_merge($group->user_info, $newData)
                    ]);
                    if(count($allDatas[$module][$i]) == 6) {
                        echo('unset');
                        unset($allDatas[$module][$i]);
                        $allDatas[$module] = array_values($allDatas[$module]);
                    }
                    break;
                } else if ($i == count($allDatas[$module]) - 1 ){
                    // there does not exist a group to fit current request
                    $group = $this->createGroup($newData, $module);
                    array_unshift($newData, $group->id);
                    $allDatas[$module][$i + 1] =  $newData;
                    break;
                }
            }
        } else {
            // there is no group created yet
            $group = $this->createGroup($newData, $module);
            array_unshift($newData, $group->id);
            $allDatas[$module][0] = $newData;

                    
        }
        $m->update([
            'match_data' => $allDatas
        ]);

        return redirect(route('group.index'));

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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createGroup($array, $module)
    { 
        $group = Group::create([
            "title" => "quickmatch",
            "modules" => $module,
            'group_type' => 'module group',
            'user_info' => $array
        ]);
        Auth::user()->assignGroup($group);

        return $group;

    }
}
