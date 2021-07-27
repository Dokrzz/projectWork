<?php
namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller {
    public function getLogout() {
        Auth::logout();
        return view('admin');
    }

    public function getAdminPortal() {
        return view('admin/welcome-admin');
    }


    public function getAccount()
    {
        return view('account', ['admin' => Auth::user()]);
    }

    public function getDashboard() {
        return view('/admin/admin');
    }

    public function postSignIn(Request $request)
    {

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:4'
        ]);


        if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
            return redirect()->route('admin');
        }
        return redirect()->route('admin');
    }
}
