<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PostLoginAdminRequest;

class UserController extends Controller
{
    public function getLoginAdmin()
    {
        if (Auth::check() && (Auth::user()->role == config('role.user.admin') || Auth::user()->role == config('role.user.superadmin'))){

            return redirect('admin/category/list');
        }

        return view('admin.login');
    }

    public function postLoginAdmin(PostLoginAdminRequest $request)
    {
        $request->validated();
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect('admin/slide/list');
        } else {
            $request->session()->flash('failed', __('message.failed'));

            return redirect('admin/login');
        }
    }
}
