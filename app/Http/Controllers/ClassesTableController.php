<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassesTable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Exception;

class ClassesTableController extends Controller
{
    public function __construct(){

        $this->classesTable = new ClassesTable();
    
    }
    
    public function index()
    {
        $classesTables = $this->classesTable->get();
        $user = auth()->user();

        return view('progress',compact('id'));
    }
}
