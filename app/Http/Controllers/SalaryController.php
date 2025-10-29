<?php

namespace App\Http\Controllers;

use App\Models\Salary;
use App\Models\Employee;
use App\Http\Requests\StoreSalaryRequest;
use App\Http\Requests\UpdateSalaryRequest;

class SalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $salaries = Salary::with('employee')->get();
        return view('salaries.index', compact('salaries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employees = Employee::all();
        return view('salaries.create', compact('employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSalaryRequest $request)
    {
        $request->validate([
            'employee_id' => 'required',
            'bulan' => 'required|max:10',
            'gaji_pokok' => 'required|numeric',
            'tunjangan' => 'numeric',
            'potongan' => 'numeric',
            'total_gaji' => 'required|numeric'
        ]);

        Salary::create($request->all());
        return redirect()->route('salaries.index')->with('success', 'Data gaji berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Salary $salary)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Salary $salary)
    {
        $employees = Employee::all();
        return view('salaries.edit', compact('salary', 'employees'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSalaryRequest $request, Salary $salary)
    {
        $request->validate([
            'employee_id' => 'required',
            'bulan' => 'required|max:10',
            'gaji_pokok' => 'required|numeric',
            'tunjangan' => 'numeric',
            'potongan' => 'numeric',
            'total_gaji' => 'required|numeric'
        ]);

        $salary->update($request->all());
        return redirect()->route('salaries.index')->with('success', 'Data gaji berhasil diperbarui.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Salary $salary)
    {
        $salary->delete();
        return redirect()->route('salaries.index')->with('success', 'Data gaji berhasil dihapus.');
    }
}
