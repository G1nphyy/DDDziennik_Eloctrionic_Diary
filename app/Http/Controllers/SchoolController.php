<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;
use App\Models\schools;

class SchoolController extends Controller
{
    public function index(Request $request): object
    {
        $query = schools::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('name', 'LIKE', "%{$search}%");
        }

        $schools = $query->paginate(9)->appends($request->query());

        return view('info_schools/schools', compact('schools'));
    }
    public function info(schools $school) : object
    {
        return view('info_schools.school_info', compact('school'));
    }

}
