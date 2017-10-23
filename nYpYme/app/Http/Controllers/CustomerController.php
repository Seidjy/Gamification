<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    protected function index()
    {
        $members = Customer::latest()->paginate(10);
        return view('customers.index',compact('members'));
    }
    //create
    protected function create()
    {
        return view('customers.create');
    }
     //store
    protected function store(Request $request)
    {
        Customer::create($request->all());

        $goals = DB::table('goals')->get();

        foreach ($goals as $goal) {
           DB::table('users')->insert([
                'idGoals' => $goal->id,
                'idCustomers' => $customer->id,
                'amountRestrict' => 0,
                'amountStored' => 0,
            );
        }
        return redirect()->route('customers.index')
                ->with('success','customers created successfully');
    }
    //show
    protected function show($id)
    {
        $members = Customer::find($id);
        return view('customers.show',compact('members'));
    }
    //edit
    public function edit($id)
    {
        $members = Customer::find($id);
        return view('customers.edit',compact('members'));
    }
    //update
    public function update(Request $request, $id)
    {
        Customer::find($id)->update($request->all());
        return redirect()->route('customers.index')
                        ->with('success','goals updated successfully');
    }
    //destroy
    protected function destroy($id)
    {
        Customer::find($id)->delete();
        return redirect()->
        route('customers.index')->
        with('success','goals deleted successfully');
    }
}
