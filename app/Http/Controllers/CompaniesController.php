<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employe;
use App\Models\Company;
use Illuminate\Support\Facades\DB;
use function PHPUnit\Framework\isEmpty;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::OrderBy('created_at', 'desc')->paginate(10);
        return view('companies.index')->with('company',$companies);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create');
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
            'pavadinimas' => 'required',
            'epastas' => 'required|email',
            'svetaine' => 'required|url',
            'image' => 'nullable|max:2040'
        ]);
        
        $image = $request->file('image');

        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('storage'),$new_name);
        $form_data = array (
            'pavadinimas' => $request->pavadinimas,
            'epastas' => $request->epastas,
            'svetaine' => $request->svetaine,
            'image' => $new_name
        );
        
        Company::create($form_data);

        return redirect('/companies')->with('success', 'Company Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $companies = Company::find($id);
        return view('companies.show')->with('company', $companies);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $companies = Company::find($id);
        return view('companies.edit')->with('company', $companies);
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
        $image_name = $request->hidden_image;
        $image = $request->file('image');
        if ($image != '') {
            $request->validate([
                'pavadinimas' => 'required',
                'epastas' => 'required|email',
                'svetaine' => 'required|url',
                'image' => 'nullable|max:2040'
            ]);
            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image ->move(public_path('storage'), $image_name);
        }else{
            $request->validate([
                'pavadinimas' => 'required',
                'epastas' => 'required',
                'svetaine' => 'required'
            ]);
        }
            $form_data = array(
                'pavadinimas' => $request->pavadinimas,
                'epastas' => $request->epastas,
                'svetaine' => $request->svetaine,
                'image' => $image_name
            );

            $currentName = DB::table('companies')->select('pavadinimas')->where('id', $id)->first();

            DB::table('employes')->where('imone', $currentName->pavadinimas)->update([
                 'imone' => $request->pavadinimas,
            ]);

            Company::whereId($id)->update($form_data);

        return redirect('/companies')->with('success', 'Company updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $companies = Company::find($id);

        $employesCount = DB::table('employes')->where('imone', $companies->pavadinimas)->get();

        $employesCount = count($employesCount);

        if ($employesCount == 0) {
            $companies->delete();
            return redirect('/companies')->with('success', 'Company deleted');
        }else {
            return redirect()->back()->with('error', 'Sorry company has employees');
        }
    }
}
