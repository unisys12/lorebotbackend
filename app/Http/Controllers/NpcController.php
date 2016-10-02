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
    public function create(Request $request)
    {
        $npcs = DB::table('npcs')->select('name')->distinct()->get();

        /*if ($request->session->exists('same_npc') != NULL) {
            $npc_name = $request->session->get('same_npc');
            return view('npc/create')->with('npcs', $npcs)->with('npc_name', $npc_name);
        }*/

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
        
        return redirect()->route('npc.create')->withInput($request->except('quote', 'tags'));
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
     * Display all quotes by single NPC
     * 
     * @param string $npc
     * @return \Illuminate\Http\Response
     */
    public function quoteList($npc)
    {
        $selection = Npc::find($npc);

        return view('npc/$npc');
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
        $npc = Npc::find($id);
        $npc = delete();

        return redirect()->route('npc.index');
    }
}
