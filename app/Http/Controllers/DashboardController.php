<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Grades;
use App\Models\Schools;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\select;

class DashboardController extends Controller
{
    function index(): object
    {
        $role_name = session('role_name');

        if ($role_name == 'admin') {
            return view('dashboards.dashboard_admin_school');
        }
        if ($role_name == 'teacher') {
            return view('dashboards.dashboard_teacher_school');
        }
        if ($role_name == 'student') {
            return view('dashboards.dashboard_student_school');
        }
        if ($role_name == 'parent') {
            return view('dashboards.dashboard_parent_school');
        }
        if ($role_name == 'admin_db') {
            return view('dashboards.dashboard_admin_db');
        } else {
            return redirect('/');
        }
    }

    function grades(): object
    {
        $role_name = session('role_name');

        if ($role_name == 'admin') {
            $schools = schools::where('id', Auth::user()->getAuthIdentifier())->get();
            $users = User::where('id', Auth::user()->getAuthIdentifier())->get();
            return view('dashboards.grades.admin_school');
        }
        if ($role_name == 'teacher') {
            $schools = schools::all();
            $users = User::all();
            return view('dashboards.grades.teacher_school');
        }
        if ($role_name == 'student') {
            $schools = schools::all();
            $users = User::all();
            return view('dashboards.grades.student_school');
        }
        if ($role_name == 'parent') {
            $schools = schools::all();
            $users = User::all();
            return view('dashboards.grades.parent_school');
        }
        if ($role_name == 'admin_db') {

            $data = userSearch();
            $users = $data[0];
            $schools = $data[1];

            return view('dashboards.grades.admin_db', compact('schools', 'users'));
        } else {
            return redirect('/');
        }
    }

    function getGrades(Request $request): JsonResponse
    {
        $request->validate(['user_token' => 'required|string']);

        try {
            $userId = Crypt::decryptString($request->user_token);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Invalid token'], 400);
        }

        $auth = auth()->user();

        $user = Grades::join('users', 'grades.student_id', '=', 'users.id')
            ->join('subjects', 'grades.subject_id', '=', 'subjects.id')
            ->where('student_id', $userId)->get()
            ->select(
                'grade',
                'weight',
                'description',
                'teacher_id',
                'updated_at',
                'name'
            );

        $teacher = Grades::join('users', 'grades.teacher_id', '=', 'users.id')
            ->join('subjects', 'grades.subject_id', '=', 'subjects.id')
            ->where('student_id', $userId)->get()
            ->select(
                'teacher_id',
                'first_name',
                'last_name'
            );

        return response()->json(['grades' => $user, 'teacher' => $teacher]);
    }

    function attendance(): object
    {
        $role_name = session('role_name');

        if ($role_name == 'admin') {
            return view('dashboards.attendance.admin_school');
        }
        if ($role_name == 'teacher') {
            return view('dashboards.attendance.teacher_school');
        }
        if ($role_name == 'student') {
            return view('dashboards.attendance.student_school');
        }
        if ($role_name == 'parent') {
            return view('dashboards.attendance.parent_school');
        }
        if ($role_name == 'admin_db') {
            $dateFrom = request('date_from') ?? null;
            $dateTo = request('date_to') ?? null;

            if ($dateFrom && $dateTo) {
                session()->put('date_from', $dateFrom);
                session()->put('date_to', $dateTo);
            }


            [$users, $schools] = userSearch();

            return view('dashboards.attendance.admin_db', compact('schools', 'users'));
        } else {
            return redirect('/');
        }
    }

    function getAttendance(Request $request): JsonResponse
    {
        $request->validate([
            'user_token' => 'required|string',
        ]);

        $dateFrom = session('date_from', null);
        $dateTo = session('date_to', now()->toDateString());

        try {
            $userId = Crypt::decryptString($request->user_token);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Invalid token'], 400);
        }

        $attendances = Attendance::join('users', 'attendances.student_id', '=', 'users.id')
            ->leftJoin('schedules', 'schedules.id', '=', 'attendances.schedule_id')
            ->leftJoin('subjects', 'schedules.subject_id', '=', 'subjects.id')
            ->where('student_id', $userId)
            ->when($dateFrom, fn($q) => $q->whereDate('attendances.date', '>=', $dateFrom))
            ->when($dateTo, fn($q) => $q->whereDate('attendances.date', '<=', $dateTo))
            ->get();

        $teachers = Attendance::join('users', 'attendances.teacher_id', '=', 'users.id')
            ->leftJoin('schedules', 'schedules.id', '=', 'attendances.schedule_id')
            ->where('student_id', $userId)
            ->when($dateFrom, fn($q) => $q->whereDate('attendances.date', '>=', $dateFrom))
            ->when($dateTo, fn($q) => $q->whereDate('attendances.date', '<=', $dateTo))
            ->get();

        return response()->json([
            'attendances' => $attendances,
            'teacher' => $teachers,
        ]);
    }

    function schedule(): object
    {
        $role_name = session('role_name');

        if ($role_name == 'admin') {
            return view('dashboards.schedule.admin_school');
        }
        if ($role_name == 'teacher') {
            return view('dashboards.schedule.teacher_school');
        }
        if ($role_name == 'student') {
            return view('dashboards.schedule.student_school');
        }
        if ($role_name == 'parent') {
            return view('dashboards.schedule.parent_school');
        }
        if ($role_name == 'admin_db') {
            return view('dashboards.schedule.admin_db');
        } else {
            return redirect('/');
        }
    }

    function testsHomeworks(): object
    {
        $role_name = session('role_name');

        if ($role_name == 'admin') {
            return view('dashboards.testsHomeworks.admin_school');
        }
        if ($role_name == 'teacher') {
            return view('dashboards.testsHomeworks.teacher_school');
        }
        if ($role_name == 'student') {
            return view('dashboards.testsHomeworks.student_school');
        }
        if ($role_name == 'parent') {
            return view('dashboards.testsHomeworks.parent_school');
        }
        if ($role_name == 'admin_db') {
            return view('dashboards.testsHomeworks.admin_db');
        } else {
            return redirect('/');
        }
    }

    function school(): object
    {
        $role_name = session('role_name');

        if ($role_name == 'admin') {
            return view('dashboards.school.admin_school');
        }
        if ($role_name == 'teacher') {
            return view('dashboards.school.teacher_school');
        }
        if ($role_name == 'student') {
            return view('dashboards.school.student_school');
        }
        if ($role_name == 'parent') {
            return view('dashboards.school.parent_school');
        }
        if ($role_name == 'admin_db') {
            return view('dashboards.school.admin_db');
        } else {
            return redirect('/');
        }
    }

    function meetings(): object
    {
        $role_name = session('role_name');

        if ($role_name == 'admin') {
            return view('dashboards.meetings.admin_school');
        }
        if ($role_name == 'teacher') {
            return view('dashboards.meetings.teacher_school');
        }
        if ($role_name == 'student') {
            return view('dashboards.meetings.student_school');
        }
        if ($role_name == 'parent') {
            return view('dashboards.meetings.parent_school');
        }
        if ($role_name == 'admin_db') {
            return view('dashboards.meetings.admin_db');
        } else {
            return redirect('/');
        }
    }

    function textbooks(): object
    {
        $role_name = session('role_name');

        if ($role_name == 'admin') {
            return view('dashboards.textbooks.admin_school');
        }
        if ($role_name == 'teacher') {
            return view('dashboards.textbooks.teacher_school');
        }
        if ($role_name == 'student') {
            return view('dashboards.textbooks.student_school');
        }
        if ($role_name == 'parent') {
            return view('dashboards.textbooks.parent_school');
        }
        if ($role_name == 'admin_db') {
            return view('dashboards.textbooks.admin_db');
        } else {
            return redirect('/');
        }
    }
}

function userSearch() : array
{
    $schools = Schools::where('name', "like", "%".request("search")."%")->get();
    if ($schools->isEmpty()) {
        $schools = Schools::all();
    }
    $search = request('search');


    if ($search && trim($search) !== '') {
        $users = User::join('user_roles', 'users.id', '=', 'user_roles.user_id')
            ->leftJoin('user_classes', 'users.id', '=', 'user_classes.user_id')
            ->leftJoin('classes', 'user_classes.class_id', '=', 'classes.id')
            ->leftJoin('schools', 'user_roles.school_id', '=', 'schools.id')
            ->where('user_roles.role_id', 3)
            ->where(function ($query) use ($search) {
                $query->where(DB::raw("users.first_name || ' ' || users.last_name"), 'like', "%$search%")
                    ->orWhere('users.first_name', 'like', "%$search%")
                    ->orWhere('users.last_name', 'like', "%$search%")
                    ->orWhere('classes.name', 'like', "%$search%")
                    ->orWhere('schools.name', 'like', "%$search%");
            })
            ->select(
                'users.id',
                'users.first_name',
                'users.last_name',
                DB::raw('GROUP_CONCAT(DISTINCT classes.name) as class_names'),
                DB::raw('GROUP_CONCAT(DISTINCT schools.name) as school_names')
            )
            ->groupBy('users.id', 'users.first_name', 'users.last_name')
            ->paginate(12);
    } else {
        $users = User::join('user_roles', 'users.id', '=', 'user_roles.user_id')
            ->leftJoin('user_classes', 'users.id', '=', 'user_classes.user_id')
            ->leftJoin('classes', 'user_classes.class_id', '=', 'classes.id')
            ->leftJoin('schools', 'user_roles.school_id', '=', 'schools.id')
            ->where('user_roles.role_id', 3)
            ->select(
                'users.id',
                'users.first_name',
                'users.last_name',
                DB::raw('GROUP_CONCAT(DISTINCT classes.name) as class_names'),
                DB::raw('GROUP_CONCAT(DISTINCT schools.name) as school_names')
            )
            ->groupBy('users.id', 'users.first_name', 'users.last_name')
            ->paginate(12);
    }
    return [$users, $schools];
}
