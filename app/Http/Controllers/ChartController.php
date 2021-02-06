<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Charts;
use App\Ticket;
use App\User;
use DB;
use Auth;

class ChartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }   

    //
    public function index()
    {
        $id = Auth::user()->id_emp;
        //Function Admin
        if(Auth::user()->isAdmin()){

        //แจ้งซ่อม
        
    	$ticket= Ticket::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))
                    ->get();
        $chart = Charts::database($ticket, 'line', 'highcharts')
                  ->title("การแจ้งซ่อมทั้งหมด")
                  ->colors(['#1abc9c', '#2c3e50','#e67e22'])
                  ->elementLabel("จำนวนทั้งหมด")
			      ->dimensions(300, 250)
			      ->responsive(true)
                  ->groupByMonth(date('Y'), true);

        //รายงานรายเดือน
        $Ticket_D = Charts::database(Ticket::all(), 'line', 'highcharts')
                ->title("การแจ้งซ่อม")
                ->elementLabel("ทั้งหมด")
                ->dimensions(350, 250)
                ->responsive(true)
                ->groupByDay();

        //รายงานผล
           $success= Ticket::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))->where('status','success')
                    ->get();
           $failed= Ticket::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))->where('status','failed')
                    ->get();
                     $data = User::all();
        $chart_status = Charts::create('line', 'chartjs')
                  ->title("การแจ้งซ่อมทั้งหมด")
                  ->colors(['#1abc9c', '#2c3e50','#e67e22'])
                  ->values($data->pluck('lowerbloodpressure'))
			      ->elementLabel("จำนวนทั้งหมด")
			      ->dimensions(300, 250)
			      ->responsive(true);
      

        // ประเภท
                    $NameType = DB::table('type_problem')->select('name_type')->get();
                    $Network = DB::table('ticket')->where('problem_type','Network')->count();
                    $Hardware = DB::table('ticket')->where('problem_type','Hardware')->count();
                    $Printer = DB::table('ticket')->where('problem_type','Printer')->count();


		$pie  =	 Charts::create('bar', 'highcharts')
            ->title('ประเภท')
            ->colors(['#1abc9c', '#8e44ad','#f1c40f','#bdc3c7','#3498db'])
            ->labels(['Network', 'Hardware', 'Printer','Software','Server','Other'])
            ->values([$Network,$Hardware,$Printer])
            ->dimensions(350,350)
            ->responsive(true);
            

            //Status
                         
                    $success = DB::table('ticket')->where('status','success')->count();
                    $failed = DB::table('ticket')->where('status','failed')->count();
                	$pie_status  =	 Charts::create('donut', 'highcharts')
                            ->title('สถานะ')
                            ->colors(['#bdc3c7','#1abc9c','#8e44ad','#f1c40f'])
                            ->labels(['สำเร็จ', 'ล้มเหลว'])
                            ->values([$success,$failed])
                            ->dimensions(400,400)
                         ->responsive(true);
        }else{




             // Function User
             $ticket= Ticket::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))->where('id_emp',$id)
                    ->get();
        $chart = Charts::database($ticket, 'line', 'highcharts')
                  ->title("การแจ้งซ่อมทั้งหมด")
                  ->colors(['#1abc9c', '#2c3e50','#e67e22'])
                  ->elementLabel("จำนวนทั้งหมด")
			      ->dimensions(300, 250)
			      ->responsive(true)
                  ->groupByMonth(date('Y'), true);

        //รายงานรายเดือน
        $Ticket_D = Charts::database(Ticket::all(), 'line', 'highcharts')
                ->title("การแจ้งซ่อม")
                ->elementLabel("ทั้งหมด")
                ->dimensions(350, 250)
                ->responsive(true)
                ->groupByDay();

        //รายงานผล
           $success= Ticket::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))->where('id_emp',$id)->where('status','success')
                    ->get();
           $failed= Ticket::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))->where('id_emp',$id)->where('status','failed')
                    ->get();
                     $data = User::all();
        $chart_status = Charts::create('line', 'chartjs')
                  ->title("การแจ้งซ่อมทั้งหมด")
                  ->colors(['#1abc9c', '#2c3e50','#e67e22'])
                  ->values($data->pluck('lowerbloodpressure'))
			      ->elementLabel("จำนวนทั้งหมด")
			      ->dimensions(300, 250)
			      ->responsive(true);
      

        // ประเภท
                    $NameType = DB::table('type_problem')->select('name_type')->get();
                    $Network = DB::table('ticket')->where('problem_type','Network')->where('id_emp',$id)->count();
                    $Hardware = DB::table('ticket')->where('problem_type','Hardware')->where('id_emp',$id)->count();
                    $Printer = DB::table('ticket')->where('problem_type','Printer')->where('id_emp',$id)->count();


		$pie  =	 Charts::create('bar', 'highcharts')
            ->title('ประเภท')
            ->colors(['#1abc9c', '#8e44ad','#f1c40f','#bdc3c7','#3498db'])
            ->labels(['Network', 'Hardware', 'Printer','Software','Server','Other'])
            ->values([$Network,$Hardware,$Printer])
            ->dimensions(350,350)
            ->responsive(true);
            

            //Status
                         
                    $success = DB::table('ticket')->where('status','success')->where('id_emp',$id)->count();
                    $failed = DB::table('ticket')->where('status','failed')->where('id_emp',$id)->count();
                	$pie_status  =	 Charts::create('donut', 'highcharts')
                            ->title('สถานะ')
                            ->colors(['#bdc3c7','#1abc9c','#8e44ad','#f1c40f'])
                            ->labels(['สำเร็จ', 'ล้มเหลว'])
                            ->values([$success,$failed])
                            ->dimensions(400,400)
                         ->responsive(true);
        }

                        


                  

        return view('admin.index',compact('chart','chart_status','pie','Ticket_D','chart_status','pie_status'));
    }
}