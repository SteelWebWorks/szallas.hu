<?php

namespace App\Http\Controllers;

use App\Http\Resources\CompanyResource;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = CompanyResource::collection(Company::all());
        return response()->json([
            'data' => $companies,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $params = $request->all();
        $exist = Company::where('companyRegistrationNumber', $params['companyRegistrationNumber'])->get();
        if ($exist) {
            return response()->json([
                'message' => 'Company already exists',
            ], 400);
        }
        $company = Company::create($params);
        return response()->json([
            'data' => new CompanyResource($company),
        ], 201);
    }

    /**
     * Display the specified resources.
     */
    public function show(Request $request, Company $company)
    {
        if ($request->get('id')) {
            return CompanyResource::collection(Company::find(explode(',', $request->get('id'))));
        }
        return new CompanyResource($company);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Company $company)
    {
        $company->update($request->all());
        return response()->json([
            'data' => $company,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        $company->delete();
        return response()->json(null, 204);
    }
}
