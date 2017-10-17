<?php

namespace App\Http\Controllers;

use App\Goals;
use Illuminate\Http\Request;

class GoalsController extends Controller
{

	public function index()
    {
        $members = Member::latest()->paginate(10);
        return view('goals.index',compact('members'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    protected function create(array $data)
    {
        return Goals::create([
            'name' => $data['name'],
            'idRuleToAchieve' => $data['idRuleToAchieve'],
            'idRuleToRestrict' => $data['idRuleToRestrict'], 
            'idRuleToAward'=> $data['idRuleToAward'],
        ]);
    }
}
