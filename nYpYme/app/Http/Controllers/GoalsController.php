<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Goal;
use Illuminate\Http\Request;

class GoalsController extends Controller
{
    //index
    protected function index()
    {
        $members = Goal::latest()->paginate(10);
        return view('goals.evento_list',compact('members'));
    }

    //create
    
    protected function create(){

        $achieves = DB::table('rules_to_achieves')->get();

        $restricts = DB::table('rules_to_restricts')->get();

        $awards = DB::table('rules_to_awards')->get();

        return view('goals.evento_cadastro',['awards' => $awards,
            'achieves' => $achieves,
            'restricts' => $restricts,
    ]);
    }
    
     //store
    protected function store(Request $request)
    {
        $goal = Goal::create($request->all());

        $customers = DB::table('customers')->get();

        foreach ($customers as $customer) {
           DB::table('customer_goals')->insert([
                'idGoals' => $goal->id,
                'idCustomers' => $customer->id,
                'amountRestrict' => 0,
                'amountStored' => 0,
                'created_at' => strtotime('01-01-2008'),
                'updated_at' => strtotime('01-01-2008'),
            ]
            );
        }

        $goals = DB::table('goals')->get();

        return view('goals.evento_list', ['goals' => $goals]);
    }
    
    //show
    /*
    protected function show($id)
    {
        $members = Goal::find($id);
        return view('goals.show',compact('members'));
    }
    //edit
    public function edit($id)
    {
        $members = Goal::find($id);
        return view('goals.edit',compact('members'));
    }

    //update
    public function update(Request $request, $id)
    {
        Goal::find($id)->update($request->all());
        return redirect()->route('goals.index')
                        ->with('success','goals updated successfully');
    }
    */
    //destroy
    /*
    protected function destroy($id)
    {
        Goal::find($id)->delete();
        return redirect()->
        route('goals.index')->
        with('success','goals deleted successfully');
    }
    */
}
