<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use App\Firm;
use Validator;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filter = $request->get('filter', '');
        $sort = $request->get('sort', '');
        $firms = Firm::all();

        if ($sort == 'a-z') {
            $customers = Customer::orderBy('surname')->get();
        } else if ($sort == 'z-a') {
            $customers = Customer::orderBy('surname', 'desc')->get();
        } else if ($filter) {
            $customers = Customer::where('firm_id', $filter)->get();
        } else {
            $customers = Customer::all();
        }


        return view('customer.index', [
            'customers' => $customers,
            'firms' => $firms,
            'filter' => $filter ?? 0

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $firms = Firm::all();
        return view('customer.create', ['firms' => $firms]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'customer_name' => ['required', 'min:3', 'max:32'],
                'customer_surname' => ['required', 'min:3', 'max:32'],
                'customer_phone' => ['required', 'digits_between:3,24'],
                'customer_email' => ['required', 'email', 'min:3', 'max:64'],
            ]
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->route('customer.create')->withErrors($validator);
        }


        $customer = new Customer;
        $customer->name = $request->customer_name;
        $customer->surname = $request->customer_surname;
        $customer->phone = $request->customer_phone;
        $customer->email = $request->customer_email;
        $customer->about = $request->customer_about;
        $customer->firm_id = $request->firm_id;
        $customer->save();
        return redirect()->route('customer.index')->with('success_message', 'Sekmingai įrašytas.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        $firms = Firm::all();
        return view('customer.edit', ['customer' => $customer, 'firms' => $firms]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'customer_name' => ['required', 'min:3', 'max:32'],
                'customer_surname' => ['required', 'min:3', 'max:32'],
                'customer_phone' => ['required', 'digits_between:3,24'],
                'customer_email' => ['required', 'email', 'min:3', 'max:64'],
            ]
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->route('customer.edit', ['customer' => $customer])->withErrors($validator);
        }

        $customer->name = $request->customer_name;
        $customer->surname = $request->customer_surname;
        $customer->phone = $request->customer_phone;
        $customer->email = $request->customer_email;
        $customer->about = $request->customer_about;
        $customer->firm_id = $request->firm_id;
        $customer->save();
        return redirect()->route('customer.index')->with('success_message', 'Sėkmingai pakeistas.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('customer.index')->with('success_message', 'Sekmingai ištrintas.');
    }
}
