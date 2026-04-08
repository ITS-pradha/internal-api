<?php

namespace App\Http\Controllers;

use App\Models\Notifhrd;
use Illuminate\Http\Request;

class NotifhrdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Notifhrd::where('status', '-')->get();
        Notifhrd::where('status', '-')->update(['status' => 'WA Sent']);
        return response()->json($data);
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
        $training = new Notifhrd([
            'title' => $request->title,
            'content' => $request->content,
            'status' => '-'
        ]);

        $training->save();

        return response()->json('Notifhrd created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Notifhrd  $notifhrd
     * @return \Illuminate\Http\Response
     */
    public function show(Notifhrd $notifhrd)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Notifhrd  $notifhrd
     * @return \Illuminate\Http\Response
     */
    public function edit(Notifhrd $notifhrd)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Notifhrd  $notifhrd
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Notifhrd $notifhrd)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Notifhrd  $notifhrd
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notifhrd $notifhrd)
    {
        //
    }
}
