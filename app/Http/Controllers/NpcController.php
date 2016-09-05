<?php

namespace LoreBot\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use LoreBot\Http\Requests;

use LoreBot\Npc as Npc;

class NpcController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of NPC Names.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Npc::paginate(10);

        return view('npc/index')->with('list', $list);
    }

    /**
     * Show the form for creating a new NPC.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $npcs = DB::table('npcs')->select('name')->distinct()->get();
        
        return view('npc/create')->with('npcs', $npcs);
    }

    /**
     * Store a newly created NPC in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'quote'=> 'required',
            'tags' => 'required'
        ]);
        
        $npc = new Npc;
        $npc->name = $request->input('name');
        $npc->quote = $request->input('quote');
        $npc->tags = $request->input('tags');
        $npc->save();

        return redirect()->route('npc.index');

    }

    /**
     * Display the specified NPC.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $entry = Npc::find($id);

        return view('npc/show')->with('entry', $entry);
    }

    /**
     * Show the form for editing the specified NPC.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $entry = Npc::find($id);

        return view('npc/show')->with('entry', $entry);
    }

    /**
     * Update the specified NPC in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $edit = Npc::find($id);

        $this->validate($request, [
            'name' => 'required',
            'quote'=> 'required',
            'tags' => 'required'
        ]);

        $edit->name = $request->input('name');
        $edit->quote = $request->input('quote');
        $edit->tags = $request->input('tags');
        $edit->save();

        return redirect()->route('npc.index');
    }

    /**
     * Remove the specified NPC from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
