<?php

namespace App\Http\Controllers;

use App\Courier;
use Illuminate\Http\Request;

class CouriersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $couriers = Courier::all();
        return view('admin.listcourier', compact('couriers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.buatcourier');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'courier' => 'required'
        ]);
        
        Courier::create($request->all());

        return redirect('/listcourier')->with('status', 'Data Courier Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Courier  $courier
     * @return \Illuminate\Http\Response
     */
    public function show(Courier $courier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Courier  $courier
     * @return \Illuminate\Http\Response
     */
    public function edit(Courier $courier)
    {
        return view('admin.editcourier', compact('courier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Courier  $courier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Courier $courier)
    {
        Courier::where('id', $courier->id)
                ->update([
                    'courier' => $request->courier
                ]);
        return redirect('/listcourier')->with('status', 'Data Courier Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Courier  $courier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Courier $courier)
    {
        Courier::destroy($courier->id);
        return redirect('/listcourier')->with('status', 'Data Courier Berhasil Dihapus!');
    }
}
