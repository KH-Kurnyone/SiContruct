<?php

namespace App\Http\Controllers;

use App\Models\Companies;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Companies::when(request()->search, function ($companies) {
            $companies = $companies->where('company_name', 'like', '%' . request()->search . '%');
        })->paginate(10);
        return view('pages.company.index', compact('companies'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.company.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'company_name'  => 'required|unique:companies',
            'address'  => 'required',
            'contact'  => 'required',
            'email'  => 'required',
        ]);
        Companies::create($data);
        return redirect()->route('company.index')
            ->with('success', 'Company ' . $request->company_name . ' has been add successfully!');
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
