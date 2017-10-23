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
        return view('goals.index',compact('members'));
    }

    //create
    protected function create(){
        return view('goals.create');
    }

     //store
    protected function store(Request $request)
    {
        $goal = Goal::create($request->all());

        $customers = DB::table('customers')->get();

        foreach ($customers as $customer) {
           DB::table('users')->insert([
                'idGoals' => $goal->id,
                'idCustomers' => $customer->id,
                'amountRestrict' => 0,
                'amountStored' => 0,
            ]
            );
        }

        return redirect()->route('goals.index')
                ->with('success','goals created successfully');
    }
    
    //show
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
    //destroy
    protected function destroy($id)
    {
        Goal::find($id)->delete();
        return redirect()->
        route('goals.index')->
        with('success','goals deleted successfully');
    }
}
