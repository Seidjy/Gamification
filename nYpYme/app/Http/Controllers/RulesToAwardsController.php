<?php

namespace App\Http\Controllers;

use App\RulesToAward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RulesToAwardsController extends Controller
{
	//index
	protected function index()
    {
	   return view('awards.index');

	}
	//create
    protected function create()
    {
        $typeAwards = DB::table('type_awards')->get();
        return view('awards.evento_recompensa', ['awards' => $typeAwards]);
    }

    //store
    protected function store(Request $request)
    {
        $id = md5($request['cnpj']+$request['name']);
	    RulesToAward::create([
            'id' => $id,
            'cnpj' => Auth::user()->cnpj;
            'name' => $request['name'],
            'idTypeAward' => $request['idTypeAward'],
            'amount' => $request['amount'],
        ]);
	    return redirect()->route('home.index');

	}

    //show
    protected function show($id)
    {
        $article = RulesToAward::find($id);
        return view('awards.show',compact('article'));
    }

    //edit
    public function edit($id)
    {
        $article = RulesToAward::find($id);
        return view('awards.edit',compact('article'));
    }

    //update
    public function update(Request $request, $id)
    {
        RulesToAward::find($id)->update($request->all());
        return redirect()->route('awards.index')
                        ->with('success','awards updated successfully');
    }
    //destroy
    protected function destroy($id)
    {
	    RulesToAward::find($id)->delete();
	    return redirect()->route('awards.index')
                    ->with('success','Rule deleted successfully');
    }
}
