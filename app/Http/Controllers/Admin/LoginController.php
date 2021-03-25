<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function index()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        if ($request->get('login') == 'admin') {
            session(['login' => true]);
            return redirect(route('admin.home'));
        }

        return redirect(route('admin.login'))->with('error', 'Špatný login');
    }


    public function logout()
    {
        session(['login' => null]);
        return redirect(route('admin.login'));
    }

}
