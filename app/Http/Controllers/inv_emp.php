<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Inventory;
use DB;

class inv_emp extends Controller
{
  function index()
  {
    $data = DB::table('inventory')
        ->join('employee','inventory.id_emp','=','employee.id_emp')
        ->where('inventory.id_inv','=',100003)
        ->select('inventory.*','employee.*')
        ->get();
        return view('admin.inventories.inv_emp',compact('data'));
  }
}
