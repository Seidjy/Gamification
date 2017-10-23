<?php

namespace App\Http\Controllers;

use App\RulesToAward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RulesToAwardsController extends Controller
{
	//index
	protected function index()
    {
	        $data = RulesToAward::latest()->paginate(5);
	        return view('awards.index',compact('data'));

	}
	//create
    protected function create()
    {
        return view('awards.create');
    }
    //store
    protected function store(Request $request)
    {
	        RulesToAward::create($request->all());
	        return redirect()->route('awards.index')
	                        ->with('success','rulesToAwards created successfully');

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
