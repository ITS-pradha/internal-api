<?php

namespace App\Http\Controllers;

use App\Models\StockMovement;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class StockMovementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stock=DB::table('vstockmovement')->get();
        return response()->json($stock);
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
        $seq=StockMovement::distinct()->count('movement_code');
        $mvseq=0;
        if(!$seq){
            $mvseq=1;
        }else{
            $mvseq=$seq+1;
        }
        $movement_code='MV'.sprintf('%08d', $mvseq);
        $item=new StockMovement([
            'movement_code'=>$movement_code,
            'customer'=>$request->customer,
            'item'=>$request->item,
            'gross'=>$request->gross,
            'netto'=>$request->netto,
            'remark'=>$request->remark,
            'result'=>$request->result,
            'status'=>$request->status
        ]);
        $item->save();

        return response()->json($item);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StockMovement  $stockMovement
     * @return \Illuminate\Http\Response
     */
    public function show(StockMovement $stockMovement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StockMovement  $stockMovement
     * @return \Illuminate\Http\Response
     */
    public function edit(StockMovement $stockMovement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StockMovement  $stockMovement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $stock=StockMovement::find($id);
        $stock->is_active=0;
        $stock->save();

        $stocknew=new StockMovement([
            'movement_code'=>$stock->movement_code,
            'customer'=>$request->customer,
            'item'=>$request->item,
            'gross'=>$request->gross,
            'netto'=>$request->netto,
            'remark'=>$request->remark,
            'result'=>$request->result,
            'status'=>$request->status
        ]);
        $stocknew->save();

        return response()->json($stocknew);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StockMovement  $stockMovement
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $stock=StockMovement::find($id);
        $stock->is_active=0;
        $stock->save();

        return response()->json(["msg"=>"Data telah dihapus"]);
    }
}
