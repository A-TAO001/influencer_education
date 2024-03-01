<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ClassesTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CurriculumProgress;



class CurriculumProgressController extends Controller
{

    public function __construct()
    {
        $this->user = new User();
        $this->classesTable = new  ClassesTable();
    }

    public function curriculum_progress() {
        
        $user = Auth::user();
        $user = User::all();
        $classesTables = $this->classesTable->get();
        return view('curriculum_progress', compact('classesTables'),['user' => $user]);

    }
}
