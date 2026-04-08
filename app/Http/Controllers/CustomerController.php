<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer=Customer::where('is_active',1)->get();
        return response()->json($customer);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {



    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $seq=Customer::distinct()->count('customer_code');
        $cusseq=0;
        if(!$seq){
            $cusseq=1;
        }else{
            $cusseq=$seq+1;
        }
        $customer_code='C'.sprintf('%08d', $cusseq);


        $customer=new Customer([
            'customer_code'=>$customer_code,
            'name'=>$request->name,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'remark'=>$request->remark
        ]);
        $customer->save();

        return response()->json($customer);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $customer=Customer::find($id);
        $customer->is_active=0;
        $customer->save();

        $customernew=new Customer([
            'customer_code'=>$customer->customer_code,
            'name'=>$request->name,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'remark'=>$request->remark
        ]);
        $customernew->save();

        return response()->json($customernew);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer=Customer::find($id);
        $customer->is_active=0;
        $customer->save();

        return response()->json(["msg"=>"Data telah dihapus"]);
    }
}
