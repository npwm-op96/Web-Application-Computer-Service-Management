<?php

namespace App\Http\Controllers;

use App\Store;
use App\Employee;
use Illuminate\Http\Request;
use Validator;

class StoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax())
        {
            return datatables()->of(Store::latest()->with('emps')->with('dep')->get())
                    ->addColumn('action', function($data){

                        $button = '<button type="button" name="delete" id="'.$data->id.'" class="delete btn  btn-danger btn-sm "><span class="
                  fas fa-trash-alt"></button>';
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.stores.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'id_emp'     =>  'required',
            'computer_name'     =>  'required',
            'brand'     =>  'required',
            'model'     =>  'required',
            'servicetag'         =>  'required'
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }
        $form_data = array(
            'id_emp'   =>  $request->id_emp,
            'computer_name'   =>  $request->computer_name,
            'brand'            =>  $request->brand,
            'model'            =>  $request->model,
            'servicetag'       =>  $request->servicetag,
        );

        Store::create($form_data);

        return response()->json(['success' => 'Data Added successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Store::findOrFail($id);
        $data->delete();
    }
}
