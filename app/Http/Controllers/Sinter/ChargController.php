<?php

namespace App\Http\Controllers\Sinter;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Sinter\Charg;
use App\Models\sinter\MaterialCode;
use App\Models\Sinter\Code;
use Carbon\Carbon;

use Illuminate\Support\Facades\DB;
use Yajra\Oci8\Query;
use Yajra\Pdo\Oci8 as PDO;
use Yajra\Oci8\Connectors;
use Yajra\Oci8\Auth\OracleUserProvider;
use Yajra\Pdo\Oci8\Statement;

class ChargController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chargs = Charg::orderBy('seq', 'desc')
            ->paginate(3);
        $jumlah_data = $chargs->count();
        return view('sinter.charg.index',compact('chargs','jumlah_data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $matcds = MaterialCode::all();
        $codes  = Code::where('cd','like','B0%')->get();
        return view('sinter.charg.create',compact('matcds','codes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*
             ITYPE                      IN       VARCHAR2
            ,P_SEQ                      IN       S_TROU_BLANK.SEQ%TYPE
            ,P_TROU_ID                  IN       S_TROU_BLANK.TROU_ID%TYPE
            ,P_TROU_NAME                IN       S_TROU_BLANK.TROU_NAME%TYPE
            ,P_MAT_ID                   IN       S_TROU_BLANK.MAT_ID%TYPE
            ,P_MAT_NAME                 IN       S_TROU_BLANK.MAT_NAME%TYPE
            ,P_WGT                      IN       S_TROU_BLANK.WGT%TYPE
            ,P_UNIT                     IN       S_TROU_BLANK.UNIT%TYPE
            ,P_TIME_FROM                IN       S_TROU_BLANK.TIME_FROM%TYPE
            ,P_TIME_TO                  IN       S_TROU_BLANK.TIME_TO%TYPE
            ,P_REC_EMP                  IN       S_TROU_BLANK.REC_EMP%TYPE
            ,P_REC_DATE                 IN       S_TROU_BLANK.REC_DATE%TYPE
            ,P_SHIFT                    IN       S_TROU_BLANK.SHIFT%TYPE
            ,P_CREW                     IN       S_TROU_BLANK.CREW%TYPE
            ,P_DATA_SOURCE              IN       S_TROU_BLANK.DATA_SOURCE%TYPE
            ,P_E_CODE                   OUT      NUMBER
            ,P_E_MSG                    OUT      VARCHAR2
        */
        $dateNow        = Carbon::now()->toDateTimeString();
        $date           = Carbon::parse($dateNow)->format('YmdHis');

        $itype          = 'I';
        $p_trou_id      = $request->input('bunker_code');
        $p_trou_name    = $request->input('bunker_name');
        $p_mat_id       = $request->input('material_code');
        $p_mat_name     = $request->input('mat_name');
        $p_wgt          = $request->input('charging_amount');
        $p_unit         = $request->input('uom');
        $p_time_from    = Carbon::parse($request->input('start_time'))->format('YmdHis');
        $p_time_to      = Carbon::parse($request->input('end_time'))->format('YmdHis');
        $p_rec_emp      = 'X000006';
        $p_rec_date     = $date;
        $p_shift        = $request->input('shift');
        $p_crew         = $request->input('group');
        $p_data_source  = 'MES';
        $p_e_code       = 0;
        $p_e_msg        = '';

        //dd($p_time_from);

        $pdo = DB::getPdo();

        $stmt = $pdo->prepare("begin PKG_ASA0020C.p_smodify(:itype, :p_seq, :p_trou_id, :p_trou_name, :p_mat_id, :p_mat_name, :p_wgt,:p_unit, :p_time_from, :p_time_to, :p_rec_emp, :p_rec_date, :p_shift, :p_crew, :p_data_source, :p_e_code, :p_e_msg); end;");
        $stmt->bindParam(':itype', $itype, PDO::PARAM_STR, 200);
        $stmt->bindParam(':p_seq', $p_seq, PDO::PARAM_INT);
        $stmt->bindParam(':p_trou_id', $p_trou_id, PDO::PARAM_STR, 200);
        $stmt->bindParam(':p_trou_name', $p_trou_name, PDO::PARAM_STR, 200);
        $stmt->bindParam(':p_mat_id', $p_mat_id, PDO::PARAM_STR, 200);
        $stmt->bindParam(':p_mat_name', $p_mat_name, PDO::PARAM_STR, 200);
        $stmt->bindParam(':p_wgt', $p_wgt, PDO::PARAM_INT);
        $stmt->bindParam(':p_unit', $p_unit,PDO::PARAM_STR, 200);
        $stmt->bindParam(':p_time_from', $p_time_from, PDO::PARAM_STR, 200);
        $stmt->bindParam(':p_time_to', $p_time_to, PDO::PARAM_STR, 200);
        $stmt->bindParam(':p_rec_emp', $p_rec_emp, PDO::PARAM_STR, 200);
        $stmt->bindParam(':p_rec_date', $p_rec_date, PDO::PARAM_STR, 200);
        $stmt->bindParam(':p_shift', $p_shift, PDO::PARAM_STR, 200);
        $stmt->bindParam(':p_crew', $p_crew, PDO::PARAM_STR, 200);
        $stmt->bindParam(':p_data_source', $p_data_source, PDO::PARAM_STR, 200);
        $stmt->bindParam(':p_e_code', $p_e_code, PDO::PARAM_INT);
        $stmt->bindParam(':p_e_msg', $p_e_msg, PDO::PARAM_STR, 200);
        $stmt->execute();

        if(is_null($p_e_msg))
        {
            return redirect()
                ->route('charging.index')
                ->with('flash-message', ['Data berhasil disimpan!', 'success']);
        }
        else
        {
            return redirect()
                ->route('charging.create')
                ->with('flash-message', ['Error:!'.$p_e_msg, 'success']);
        }
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
    public function edit($charging)
    {
        $matcds = MaterialCode::all();
        $codes  = Code::where('cd','like','B0%')->get();
        $charg  = Charg::where('seq', $charging)->first();
        return view('sinter.charg.edit',compact('charging','matcds','codes','charg'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $charging)
    {
        /*
             ITYPE                      IN       VARCHAR2
            ,P_SEQ                      IN       S_TROU_BLANK.SEQ%TYPE
            ,P_TROU_ID                  IN       S_TROU_BLANK.TROU_ID%TYPE
            ,P_TROU_NAME                IN       S_TROU_BLANK.TROU_NAME%TYPE
            ,P_MAT_ID                   IN       S_TROU_BLANK.MAT_ID%TYPE
            ,P_MAT_NAME                 IN       S_TROU_BLANK.MAT_NAME%TYPE
            ,P_WGT                      IN       S_TROU_BLANK.WGT%TYPE
            ,P_UNIT                     IN       S_TROU_BLANK.UNIT%TYPE
            ,P_TIME_FROM                IN       S_TROU_BLANK.TIME_FROM%TYPE
            ,P_TIME_TO                  IN       S_TROU_BLANK.TIME_TO%TYPE
            ,P_REC_EMP                  IN       S_TROU_BLANK.REC_EMP%TYPE
            ,P_REC_DATE                 IN       S_TROU_BLANK.REC_DATE%TYPE
            ,P_SHIFT                    IN       S_TROU_BLANK.SHIFT%TYPE
            ,P_CREW                     IN       S_TROU_BLANK.CREW%TYPE
            ,P_DATA_SOURCE              IN       S_TROU_BLANK.DATA_SOURCE%TYPE
            ,P_E_CODE                   OUT      NUMBER
            ,P_E_MSG                    OUT      VARCHAR2
        */

        $dateNow        = Carbon::now()->toDateTimeString();
        $date           = Carbon::parse($dateNow)->format('YmdHis');

        $itype          = 'U';
        $p_seq          = $charging;
        $p_trou_id      = $request->input('bunker_code');
        $p_trou_name    = $request->input('bunker_name');
        $p_mat_id       = $request->input('material_code');
        $p_mat_name     = $request->input('mat_name');
        $p_wgt          = $request->input('charging_amount');
        $p_unit         = $request->input('uom');
        $p_time_from    = Carbon::parse($request->input('start_time'))->format('YmdHis');
        $p_time_to      = Carbon::parse($request->input('end_time'))->format('YmdHis');
        $p_rec_emp      = 'X000006';
        $p_rec_date     = $date;
        $p_shift        = $request->input('shift');
        $p_crew         = $request->input('group');
        $p_data_source  = 'MES';
        $p_e_code       = 0;
        $p_e_msg        = '';

        // dd($p_time_from);

        $pdo = DB::getPdo();

        $stmt = $pdo->prepare("begin PKG_ASA0020C.p_smodify(:itype, :p_seq, :p_trou_id, :p_trou_name, :p_mat_id, :p_mat_name, :p_wgt,:p_unit, :p_time_from, :p_time_to, :p_rec_emp, :p_rec_date, :p_shift, :p_crew, :p_data_source, :p_e_code, :p_e_msg); end;");
        $stmt->bindParam(':itype', $itype, PDO::PARAM_STR, 200);
        $stmt->bindParam(':p_seq', $p_seq, PDO::PARAM_INT);
        $stmt->bindParam(':p_trou_id', $p_trou_id, PDO::PARAM_STR, 200);
        $stmt->bindParam(':p_trou_name', $p_trou_name, PDO::PARAM_STR, 200);
        $stmt->bindParam(':p_mat_id', $p_mat_id, PDO::PARAM_STR, 200);
        $stmt->bindParam(':p_mat_name', $p_mat_name, PDO::PARAM_STR, 200);
        $stmt->bindParam(':p_wgt', $p_wgt, PDO::PARAM_INT);
        $stmt->bindParam(':p_unit', $p_unit,PDO::PARAM_STR, 200);
        $stmt->bindParam(':p_time_from', $p_time_from, PDO::PARAM_STR, 200);
        $stmt->bindParam(':p_time_to', $p_time_to, PDO::PARAM_STR, 200);
        $stmt->bindParam(':p_rec_emp', $p_rec_emp, PDO::PARAM_STR, 200);
        $stmt->bindParam(':p_rec_date', $p_rec_date, PDO::PARAM_STR, 200);
        $stmt->bindParam(':p_shift', $p_shift, PDO::PARAM_STR, 200);
        $stmt->bindParam(':p_crew', $p_crew, PDO::PARAM_STR, 200);
        $stmt->bindParam(':p_data_source', $p_data_source, PDO::PARAM_STR, 200);
        $stmt->bindParam(':p_e_code', $p_e_code, PDO::PARAM_INT);
        $stmt->bindParam(':p_e_msg', $p_e_msg, PDO::PARAM_STR, 200);
        $stmt->execute();

        if(is_null($p_e_msg))
        {
            return redirect()
                ->route('charging.index')
                ->with('flash-message', ['Data berhasil disimpan!', 'success']);
        }
        else
        {
            return redirect()
                ->route('charging.create')
                ->with('flash-message', ['Error:!'.$p_e_msg, 'success']);
        }
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
