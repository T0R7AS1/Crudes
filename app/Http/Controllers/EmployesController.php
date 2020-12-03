<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employe;
use App\Models\Company;
use Illuminate\Support\Facades\DB;
use function PHPUnit\Framework\isEmpty;
use Illuminate\Database\Schema\Blueprint;

class EmployesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employes = Employe::OrderBy('created_at', 'desc')->paginate(10);
        return view('employes.index')->with('employes',$employes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();

        return view ('employes.create')->with('companies',$companies);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(),[
            'vardas' => 'required',
            'e_pastas' => 'required|email',
            'tel' => 'required|between:7,7',
            'imone' => 'required'
        ]);

        $employes = Employe::create([
            'vardas' => request('vardas'),
            'e_pastas' => request('e_pastas'),
            'tel' => '3706' . request('tel'),
            'imone' => request('imone')
        ]);
        return redirect('/employes')->with('success', 'Employee added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employes = Employe::find($id);
        return view('employes.show')->with('employes', $employes);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    $companies = Company::all();
        $employes = Employe::find($id);
        return view('employes.edit')->with('employes', $employes)->with('companies', $companies);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate(request(),[
            'vardas' => 'required',
            'e_pastas' => 'required',
            'tel' => 'required',
            'imone' => 'required'
        ]);
        
        $employes = Employe::find($id);
        $employes->vardas = $request->input('vardas');
        $employes->e_pastas = $request->input('e_pastas');
        $employes->tel = '3706'.$request->input('tel');
        $employes->imone = $request->input('imone');
        $employes->save();


        return redirect('/employes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employes = Employe::find($id);
        $employes->delete();
        return redirect('/employes')->with('success', 'Employee deleted');
    }
}
