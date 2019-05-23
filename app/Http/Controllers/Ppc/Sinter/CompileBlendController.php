<?php

namespace App\Http\Controllers\Ppc\Sinter;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Ppc\Sinter\CompileBlend;

class CompileBlendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = CompileBlend::paginate(5);
        $route = 'sinter_blend';
        $judul = 'Sinter Compile Blending';
        $material = [];

        $jumlah_data =  $data->total();
        return view('ppc.bf.index_bf_blend', compact('data', 'jumlah_data', 'route', 'judul', 'material'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $parens = CompileBlend::find($id);
        $view   = view('ppc.showParen_blend', compact('parens'))->render();
        return response()->json(['html' => $view]);
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
