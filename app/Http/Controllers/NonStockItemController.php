<?php

namespace App\Http\Controllers;

use App\Models\NonStockItem;
use Illuminate\Http\Request;

class NonStockItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $item=NonStockItem::where('is_active',1)->get();
        return response()->json($item);
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
        $seq=NonStockItem::distinct()->count('item_code');
        $itemseq=0;
        if(!$seq){
            $itemseq=1;
        }else{
            $itemseq=$seq+1;
        }
        $item_code='I'.sprintf('%08d', $itemseq);
        $item=new NonStockItem([
            'item_code'=>$item_code,
            'name'=>$request->name,
            'remark'=>$request->remark
        ]);
        $item->save();

        return response()->json($item);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NonStockItem  $nonStockItem
     * @return \Illuminate\Http\Response
     */
    public function show(NonStockItem $nonStockItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NonStockItem  $nonStockItem
     * @return \Illuminate\Http\Response
     */
    public function edit(NonStockItem $nonStockItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NonStockItem  $nonStockItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $stock=NonStockItem::find($id);
        $stock->is_active=0;
        $stock->save();

        $stocknew=new NonStockItem([
            'item_code'=>$stock->item_code,
            'name'=>$request->name,
            'remark'=>$request->remark
        ]);
        $stocknew->save();

        return response()->json($stocknew);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NonStockItem  $nonStockItem
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $stock=NonStockItem::find($id);
        $stock->is_active=0;
        $stock->save();

        return response()->json(["msg"=>"Data telah dihapus"]);
    }
}
