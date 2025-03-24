<?php

namespace App\Http\Controllers;

use App\Models\Companies;
use App\Models\Projects;
use App\Models\User;
use App\Models\Workers;
use Illuminate\Http\Request;

class WorkerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $workers = Workers::paginate(10);
        return view('pages.worker.index', compact('workers'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dataUser = User::all();
        $dataProyek = Projects::all();
        $dataCompany = Companies::all();
        return view('pages.worker.create', compact('dataUser', 'dataProyek', 'dataCompany'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id'  => 'required',
            'project_id'  => 'required',
            'company_id'  => 'required',
            'position'  => 'required',
            'status'  => 'required',
        ]);
        Workers::create($data);
        return redirect()->route('worker.index')
            ->with('success', 'Worker has been add successfully!');
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
