<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    function index() : object
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
        }else{
            return redirect('/');
        }
    }
    function grades() : object
    {
        $role_name = session('role_name');

        if ($role_name == 'admin') {
            return view('dashboards.grades.admin_school');
        }
        if ($role_name == 'teacher') {
            return view('dashboards.grades.teacher_school');
        }
        if ($role_name == 'student') {
            return view('dashboards.grades.student_school');
        }
        if ($role_name == 'parent') {
            return view('dashboards.grades.parent_school');
        }
        if ($role_name == 'admin_db') {
            return view('dashboards.grades.admin_db');
        }else{
            return redirect('/');
        }
    }

    function attendance() : object
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
            return view('dashboards.attendance.admin_db');
        }else{
            return redirect('/');
        }
    }

    function schedule() : object
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
        }else{
            return redirect('/');
        }
    }
    function testsHomeworks() : object
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
        }else{
            return redirect('/');
        }
    }
    function school() : object
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
        }else{
            return redirect('/');
        }
    }
    function meetings() : object
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
        }else{
            return redirect('/');
        }
    }
    function textbooks() : object
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
        }else{
            return redirect('/');
        }
    }
}
