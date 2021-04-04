<?php

namespace App\Http\Controllers;
use App\Ticket;
use App\Type_problem;
use Illuminate\Http\Request;
use Auth;

class TicketController extends Controller
{


    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function myPosts()

    {

        return view('admin.ticket.index');

    }




    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()

    {
        $id = Auth::user()->id_emp;
        $type = Type_problem::All();


        if(Auth::user()->isAdmin()){
          $posts = Ticket::orderBy('updated_at','desc')->where('status','!=','success')->with('emps')->with('stores')->with('it')->with('user')->with('type')
          ->paginate(11);
        }
        else {
          $posts = Ticket::orderBy('updated_at','desc')->with('emps')->where('ticket.id_emp',$id)->with('stores')->with('it')->with('type')

          ->paginate(11);

        }



        return response()->json($posts);

    }




    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    public function store(Request $request)

    {

        $post = Ticket::create($request->all());

        return response()->json($post);

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

        $post = Ticket::find($id)->update($request->all());

        return response()->json($post);

    }

    public function satisfaction(Request $request, $id)

    {

              $post = Ticket::find($id)->update($request->all());

              return response()->json($post);

    }




    /**

     * Remove the specified resource from storage.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function destroy($id)

    {

      Ticket::find($id)->delete();

        return response()->json(['done']);

    }

}
