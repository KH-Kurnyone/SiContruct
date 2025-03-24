<?php

namespace App\Http\Controllers;

use App\Models\Payments;
use App\Models\Projects;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payments = Payments::paginate(10);
        return view('pages.payment.index', compact('payments'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dataProyek = Projects::all();
        return view('pages.payment.create' , compact('dataProyek'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'project_id'  => 'required',
            'amount'  => 'required',
            'method'  => 'required',
            'payment_date'  => 'required',
            'description'  => 'required',
        ]);
        Payments::create($data);
        return redirect()->route('payment.index')
            ->with('success', 'Payment has been add successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
