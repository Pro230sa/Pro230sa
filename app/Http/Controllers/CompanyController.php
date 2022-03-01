<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use DB;
class CompanyController extends Controller
{
    public function index() {
        // $companies = DB::table('companies')->get(); طريقة أخرى لجلب البيانات من قاعدة البيانات
        $companies = Company::all();
        // dd($companies); هذا السطر مفيد في ال debug معناها die and dump
        return view('company.index', compact('companies'));
    }

    public function create() {
        return view('company.create');
    }

    public function store(Request $request) {
        $data = $request->validate([
            'name' => 'required',
            'city' => 'max:20',
            'branches_count' => 'numeric'
        ]);

        /* method #1
        $company = new Company();
        $company->name = $request->input('name');
        $company->city = $request->input('city');
        $company->branches_count = $request->input('branches_count');
        $company->save();
        */

        // method #2
        Company::create($data);


        return redirect('companies');
        
    }

    public function edit(Company $company) {
        // $company = Company::find($id); بالإمكان استقبال ال id والبحث عن الشركة
        return view('company.edit', compact('company'));
    }

    public function update(Request $request, Company $company) {
        $data = $request->validate([
            'name' => 'required',
            'city' => 'max:20',
            'branches_count' => 'numeric'
        ]);


        $company->update($data);


        return redirect('companies');
        
    }

    public function destroy(Company $company) {
        $company->delete();
        return redirect('companies');
    }


}
