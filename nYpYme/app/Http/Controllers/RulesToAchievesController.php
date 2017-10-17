<?php

namespace App\Http\Controllers;

use App\RulesToAchieve;
use Illuminate\Http\Request;

class RulesToAchievesController extends Controller
{
    protected function create(array $data)
    {
        return RulesToAchieve::create([
            'name' => $data['name'],
            'idRuleToAchieve' => $data['idRuleToAchieve'],
            'idRuleToRestrict' => $data['idRuleToRestrict'], 
            'idRuleToAward'=> $data['idRuleToAward'],
        ]);
    }
}