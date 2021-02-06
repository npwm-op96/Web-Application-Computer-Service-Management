<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Ticket;
class ExportExcelController extends Controller
{
    public function index()
    {
        if(request()->ajax())
        {
            return datatables()->of(Ticket::latest()->with('emps')->with('it')->get())
                    ->addColumn('action', function($data){

                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.ticket.export_excel');
    }


}

