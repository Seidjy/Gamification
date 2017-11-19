<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    protected function index()
    {
        $members = DB::table('customers')->where('cnpj',Auth::user()->cnpj)->get();
        return view('customers.index',['clientes' => $members]);
    }
    //create
    protected function create()
    {
        return view('customers.create');
    }
     //store
    protected function store(Request $request)
    {
        $id = md5(($request['cnpj']+$request['name']), ;
        Customer::create([
                'idGoals' => $goal->id,
                'idCustomers' => $customer->id,
                'amountRestrict' => 0,
                'amountStored' => 0,
            ]);

        $goals = DB::table('goals')->where('cnpj',Auth::user()->cnpj)->get();

        foreach ($goals as $goal) {
            DB::table('customer_goals')->insert([
                'idGoals' => $goal->id,
                'idCustomers' => $customer->id,
                'cnpj' => $request->user()->cnpj;
                'amountRestrict' => 0,
                'amountStored' => 0,
                'created_at' => strtotime('01-01-2008'),
                'updated_at' => strtotime('01-01-2008'),
            ]
            );
        }
        return redirect()->route('customers.index')
                ->with('success','customers created successfully');
    }

    public static function addCustomer($cpf, $name){
        $id = md5("($request['cnpj']+$request['name']");
        $customer = Customer::create([
            'id' => $id,
            'cpf' => $cpf,
            'name' => $name,
            'cnpj' => $request->user()->cnpj,
            'amountRestrict' => 0,
            'amountStored' => 0,
        ]);

        $goals = DB::table('goals')->where('cnpj',Auth::user()->cnpj)->get();

        $idCustomerGoal = md5(($request['cnpj']+$request['name']);
        foreach ($goals as $goal) {
            DB::table('customer_goals')->insert([
                'idGoals' => $goal->id,
                'idCustomers' => $customer->id,
                'cnpj' => $request->user()->cnpj;
                'amountRestrict' => 0,
                'amountStored' => 0,
                'created_at' => strtotime('01-01-2008'),
                'updated_at' => strtotime('01-01-2008'),
            ]
            );
        }
        return $customer;
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