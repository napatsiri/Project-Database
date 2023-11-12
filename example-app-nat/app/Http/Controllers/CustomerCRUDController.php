<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerCRUDController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['customers'] = Customer::orderBy('id', 'desc')->paginate(5);
        return view('customers.index', $data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customers.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) //store a newly created customer in the database.
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'address' => 'required|string'
        ]);
        $Customer = new Customer;
        $Customer->name = $request->name;
        $Customer->email = $request->email;
        $Customer->address = $request->address;
        $Customer->save();
        return redirect()->route('customers.index')
            ->with('success', 'Customer has been created successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $Customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $Customer) //display the specified customer
    {
        return view('customers.show', compact('Customer'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $Customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $Customer)
    {
        return view('customers.edit', compact('Customer'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $Customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'address' => 'required|string'
        ]);
        $Customer = Customer::find($id);
        $Customer->name = $request->name;
        $Customer->email = $request->email;
        $Customer->address = $request->address;
        $Customer->save();
        return redirect()->route('customers.index')
            ->with('success', 'Customer Has Been updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $Customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $Customer)
    {
        $Customer->delete();
        return redirect()->route('customers.index')
            ->with('success', 'Customer has been deleted successfully');
    }

    public function fetchTaxByCustID($id)
    {
        $taxid = Customer::find($id)->taxid->taxid; 
        return view('show_tax', compact('taxid')); 
    }

}
