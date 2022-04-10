<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditEmployeePostRequest;
use App\Http\Requests\StoreEmployeePostRequest;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::select(['id', 'company_id', 'first_name', 'last_name', 'phone', 'email'])->with('company:id,name')->latest()->paginate(10);
        return view('employees', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::select('name', 'id')->get();
        return view('employees-create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeePostRequest $request)
    {
        $employee = Employee::create([
           'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'company_id' => $request->company,
            'phone'=>$request->phone
        ]);

        return redirect(route('employees.index'))->with('success', 'Employee created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $companies = Company::select(['id', 'name'])->get();
        return view('employees-edit', compact('employee', 'companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(EditEmployeePostRequest $request, Employee $employee)
    {
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->email = $request->email;
        $employee->company_id = $request->company;
        $employee->phone = $request->phone;

        if($employee->save()){
            return redirect(route('employees.index'))->with('success', 'Employee updated successfully.');
        }
        return redirect(route('employees.index'))->with('success', 'Error while updating employee.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        if($employee->delete()){
            return redirect(route('employees.index'))->with('success', 'Employee deleted successfully.');
        }

        return redirect(route('employees.index'))->with('success', 'Can`t delete this employee');
    }
}
