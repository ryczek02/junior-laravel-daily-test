<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyEditPostRequest;
use App\Http\Requests\CompanyStorePostRequest;
use App\Models\Company;
use App\Helper\ImageFileUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    use ImageFileUpload;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::select(['id', 'name', 'logo', 'email', 'website'])->get();
        return view('companies', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CompanyStorePostRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyStorePostRequest $request)
    {
        if( $file = $request->file('logo') ) {
            $path = 'companies/company';
            $url = $this->file($file,$path,100, 100);
        }

        $company = Company::create([
            'name' => $request->name,
            'email' => $request->email,
            'website' => $request->website,
            'logo' => $url
        ]);

        return redirect(route('companies.index'))->with('success', 'Company created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('companies-edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\CompanyEditPostRequest  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyEditPostRequest $request, Company $company)
    {
        $company->name = $request->name;
        $company->email = $request->email;
        $company->website = $request->website;

        if( $file = $request->file('logo') ) {
            $path = 'companies/company';
            $url = $this->file($file,$path,100, 100);
            $company->logo = $url;
        }

        if($company->save()){
            return redirect(route('companies.index'))->with('success', 'Company updated succesfully!');
        }
        return redirect(route('companies.index'))->with('success', 'Error while updating!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->employees()->delete();
        Storage::disk('public')->delete($company->logo);
        $company->delete();

        return back()->with('success', 'Company and employees related to it is succesfully deleted.');
    }
}
