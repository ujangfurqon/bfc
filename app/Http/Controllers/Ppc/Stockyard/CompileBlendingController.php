<?php

namespace App\Http\Controllers\Ppc\Stockyard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Ppc\Stockyard\CompileBlending;
use App\Models\Ppc\CompileBlend;
use App\Models\Ppc\DetailBlend;



class CompileBlendingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = CompileBlending::paginate(5);
        $route = 'yard_blend';
        $judul = 'Stock Yard Compile Blending';
        $material = [];

        $jumlah_data =  $data->total();
        return view('ppc.bf.index_bf_blend', compact('data', 'jumlah_data', 'route', 'judul', 'material'));
    }

    public function mydetail($father_seq)
    {
        $blends = DetailBlend::where('father_seq', $father_seq)
            ->with('compileBlend:seq,pbd_no')
            ->get();


        $data = $blends->map(function ($item) {
            return [
                'data' => $item,
                'detail_link' => route('bf_compile_prod.show', $item->seq),
                'edit_link' => route('bf_compile_prod.edit', $item->seq),
                'destroy_link' =>  route('bf_compile_prod.destroy', ['id' => $item->seq]),
            ];
        });

        return response()
            ->json($data);
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
