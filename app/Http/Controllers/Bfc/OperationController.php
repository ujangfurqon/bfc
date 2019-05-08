<?php

namespace App\Http\Controllers\Bfc;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Bfc\Operation;
use App\Models\Bfc\Ladle;

// use App\Http\Requests\

class OperationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $po    = trim($request->input('prod_order'));
        $d1 = str_replace('-', '', $request->input('tgl1'));
        $d2 = str_replace('-', '', $request->input('tgl2'));

        $data = null;

        if (($po != "") && ($d1 != "") && ($d2 != "")) {
            $data = Operation::findTapping($po)->findPeriod($d1, $d2)->paginate(5);
        } elseif ($po != "") {
            $data = Operation::findTapping($po)->paginate(5);
        } elseif (($d1 != "") && ($d2 != "")) {
            $data = Operation::findPeriod($d1, $d2)->paginate(5);
        }

        if ($data == null) {
            $data   = Operation::perdana()
                ->paginate(5);
        }
        $id = null;
        $dtLadleIn = Ladle::ladleInOne($id)->get();

        $jumlah_data = $data->total();
        return view('blast_furnace.opr.index', compact('data', 'jumlah_data', 'dtLadleIn'));
    }

    public function showLadleIn($id)
    {
        $dtLadleIn = Ladle::ladleInOne($id)->get();
        return view('blast_furnace.ladle.index', compact('dtLadleIn'));
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
        //
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
