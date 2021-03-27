<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingAdminControler extends Controller
{
    public function index() {
        return view('admin.setting.index');
    }
    public function create() {
        return view('admin.setting.add');
    }
}
