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

class CurriculumController extends Controller
{
    public function __construct()
    {
        $this->user = new User();
        $this->curriculums = new Curriculum();
    

    }
}
