<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Ad;
use App\Models\Cinema;
use App\Models\Film;
use App\Models\FormatFilm;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Screening;
use phpDocumentor\Reflection\DocBlock\Tags\Formatter;

class AdminController extends Controller
{
    public function homeAdmin() {
        return view('admin.home');
    }

    //CRUD Cinema
    

}
