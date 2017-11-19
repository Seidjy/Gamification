<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Deal;
use App\Http\Controllers\CustomerController;
use Illuminate\Http\Request;
use DateTime;

//Transações

class DealsController extends Controller
{

    public function index()
    {
        $members = Deal::latest()->paginate(10);
        return view('deals.transacao_def',compact('members'));
    }

    protected function store(Request $data)
    {

        //PRECISA PERMITIR COMPLETAR VÁRIAS VEZES A MESMA META
        $cpf = $data->input('cpf');
        $customer = DB::table('customers')->where('cpf', $cpf)->first();
        if (!$customer) {
            $customer = CustomerController::addCustomer($cpf, "");
        }

        $customerPoints = $customer->points;
        $deal = Deal::create([
            'idCustomer' => $customer->id,
            'cnpj' => $request->user()->cnpj,
            'idTypeTransactions' => 1,
            'amount' => $data->input('amount'),
            'updated_at' => $data->input('updated_at'),
            'created_at' => $data->input('created_at'),
        ]);

        $customerGoals = DB::table('customer_goals')->where('idCustomers', '=', $customer->id)->get();

        foreach ($customerGoals as $customerGoal) {
            $customerGoalsAmountRestrict = $customerGoal->amountRestrict;
            $customerGoalsAmountStored = 0;
            $goal = DB::table('goals')->where('id', '=', $customerGoal->idGoals)->first();
         //   foreach ($goals as $goal) {
                $idRuleToRestrict = $goal->idRuleToRestrict;
                $ruleToRestrict = DB::table('rules_to_restricts')->where('id', $idRuleToRestrict)->first();

                $lastDate = new DateTime(@"$customerGoal->updated_at");

                $todays = new DateTime(@"$_SERVER->REQUEST_TIME");
                
                $restriction = $lastDate->diff($todays);
                $days = $restriction->format('%I');
                //var_dump($days);
                if ($days >= $ruleToRestrict->amount) {
                    $idRuleToAchieve = $goal->idRuleToAchieve;
                    $achieve = DB::table('rules_to_achieves')->where('id', $idRuleToAchieve)->first();
                    var_dump($achieve);
                    if ($achieve->gather) {
                        if (($data->input('amount') + $customerGoal->amountStored) >= $achieve->amount) {
                            $customerGoalsAmountRestrict = $customerGoal->amountRestrict + 1;
                            $awards = DB::table('rules_to_awards')
                            ->where('id', $goal->idRuleToAward)
                            ->first();

                            $customerPoints = $customerPoints + $awards->amount;

                            DB::table('customers')
                            ->where('cpf', $cpf)
                            ->update(['points' => $customerPoints]);
                        }else{
                            $customerGoalsAmountStored = $data->input('amount');
                            $todays = $lastDate;
                        }
                        DB::table('customer_goals')
                            ->where('id', "$customerGoal->id")
                            ->update(['amountRestrict' => $customerGoalsAmountRestrict,
                                    'amountStored' => $customerGoalsAmountStored,
                                    'updated_at' => $todays,
                            ]);
                    }else{
                        if ($data->input('amount') >= $achieve->amount) {
                            $awards = DB::table('rules_to_awards')
                            ->where('id', $goal->idRuleToAward)
                            ->first();
                            $customerPoints = $customerPoints + $awards->amount;
                            $customer = DB::table('customers')
                            ->where('cpf', $cpf)
                            ->update(['points' =>  $customerPoints]);

                            $customerGoalsAmountRestrict = $customerGoal->amountRestrict + 1;
                            DB::table('customer_goals')
                            ->where('id', "$customerGoal->id")
                            ->update(['amountRestrict' => $customerGoalsAmountRestrict,
                                'updated_at' => $todays,
                            ]);
                        }
                    }
                }
            //}           
        }
        $customers = DB::table('customers')->get();
        return redirect()->route('customers.index');
    }

    protected function storeCustomer(Request $data){
        $cpf = $data->input('cpf');
        $customer = DB::table('customers')->where('cpf', $cpf)->first();
        if (!$customer) {
            $customer = CustomerController::addCustomer($cpf, "");
        }

        $customerPoints = $customer->points;

        return $customer;
        
    }



    //criar por valor
    protected function create()
    {
        return view('deals.transacao_def');
    }

    //criar por evento

    protected function createbyGoal()
    {
        return view('deals.transacao_def2');
    }

    protected function storeByGoal(Request $request){
        $customer = $this->storeCustomer($request);
    }

    protected function add()
    {
        return view('deals.transacao_def_goals');
    }

    //show
    protected function show($id)
    {
        $members = Deal::find($id);
        return view('deals.show',compact('members'));
    }
    //edit
    public function edit($id)
    {
        $members = Deal::find($id);
        return view('deals.edit',compact('members'));
    }
    //update
    public function update(Request $request, $id)
    {
        Deal::find($id)->update($request->all());
        return redirect()->route('deals.index')
                        ->with('success','deals updated successfully');
    }
    //destroy
    protected function destroy($id)
    {
        return Deal::destroy([
            Deal::find($id)->delete()]);
            return redirect()->route('deals.index')
                            ->with('success','deals deleted successfully');
    }
}
 ?>