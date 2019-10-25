<?php

namespace App\Http\Controllers;

use App\Firm;
use Illuminate\Http\Request;

class FirmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $firms = Firm::all();
        return view('firm.index', ['firms' => $firms]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('firm.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $firm = new Firm;
        $firm->name = $request->firm_name;
        $firm->address = $request->firm_address;
        $firm->save();
        return redirect()->route('firm.index')->with('success_message', 'Sekmingai įrašytas.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Firm  $firm
     * @return \Illuminate\Http\Response
     */
    public function show(Firm $firm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Firm  $firm
     * @return \Illuminate\Http\Response
     */
    public function edit(Firm $firm)
    {
        return view('firm.edit', ['firm' => $firm]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Firm  $firm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Firm $firm)
    {
        $firm->name = $request->firm_name;
        $firm->address = $request->firm_address;
        $firm->save();
        return redirect()->route('firm.index')->with('success_message', 'Sėkmingai pakeistas.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Firm  $firm
     * @return \Illuminate\Http\Response
     */
    public function destroy(Firm $firm)
    {
        if ($firm->firmCustomers->count()) {
            return redirect()->route('firm.index')->with('info_message', 'Trinti negalima, nes yra klientų.');
        }

        $firm->delete();
        return redirect()->route('firm.index')->with('success_message', 'Sekmingai ištrintas.');
    }
}
