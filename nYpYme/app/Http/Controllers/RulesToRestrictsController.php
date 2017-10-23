<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RulesToRestrict;
use Illuminate\Support\Facades\DB;

class RulesToRestrictsController extends Controller
{
    //index
	protected function index()
    {
        $data = RulesToRestrict::latest()->paginate(5);
        return view('restricts.index',compact('articles'));
	}
	//create
    protected function create()
    {
        return view('restricts.create');
    }
    //store
    protected function store(Request $request)
    {
	        RulesToRestrict::create($request->all());
	        return redirect()->route('restricts.index')
	                        ->with('success','rulesToRestricts created successfully');

	}
    //show
    protected function show($id)
    {
        $article = RulesToRestrict::find($id);
        return view('restricts.show',compact('article'));
    }
    //edit
    public function edit($id)
    {
        $article = RulesToRestrict::find($id);
        return view('restricts.edit',compact('article'));
    }
    //update
    public function update(Request $request, $id)
    {
        RulesToRestrict::find($id)->update($request->all());
        return redirect()->route('restricts.index')
                        ->with('success','rulesToRestricts updated successfully');
    }
    //destroy
    protected function destroy($id)
    {
        RulesToRestrict::find($id)->delete();
        return redirect()->route('restricts.index')
	                        ->with('success','rulesToRestricts deleted successfully');
    }
}
