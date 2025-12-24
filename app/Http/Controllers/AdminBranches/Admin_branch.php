<?php

namespace App\Http\Controllers\AdminBranches;


class Admin_branch
{
    public function afterLogin()
    {
        if (auth()->user()->type == 'admin_branch') {
            return view('layouts.admin');
        } elseif (auth()->user()->type == 'admin_panel') {
            return view('layouts.admin');
        }
        return auth()->user()->user_name;
    }
}
