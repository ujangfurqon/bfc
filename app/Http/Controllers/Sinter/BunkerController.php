<?php

namespace App\Http\Controllers\Sinter;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Sinter\Bunker;
use Carbon\Carbon;

class BunkerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bunkers = Bunker::orderBy('rec_date', 'desc')
            ->paginate(10);
        $jumlah_data = $bunkers->count();
        return view('sinter.bunker.index',compact('bunkers','jumlah_data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sinter.bunker.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($bunker)
    {
        $bunker = Bunker::find($bunker);
        $view   = view('sinter.bunker.detail', compact('bunker'))->render();
        return response()->json(['html'=>$view]);
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
