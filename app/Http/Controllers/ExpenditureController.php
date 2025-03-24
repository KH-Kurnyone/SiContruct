<?php

namespace App\Http\Controllers;

use App\Models\Expenditures;
use App\Models\Projects;
use Illuminate\Http\Request;

class ExpenditureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $expenditures = Expenditures::paginate(10);
        return view('pages.expenditure.index', compact('expenditures'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dataProyek = Projects::all();
        return view('pages.expenditure.create' , compact('dataProyek'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'project_id'  => 'required',
            'category'  => 'required',
            'amount'  => 'required',
            'description'  => 'required',
            'expenditure_date'  => 'required',
        ]);
        Expenditures::create($data);
        return redirect()->route('expenditure.index')
            ->with('success', 'Expenditure has been add successfully!');
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
