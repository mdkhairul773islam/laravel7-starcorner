<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class PrivilegeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['asideMenu']    = 'privilege';
        $data['asideSubmenu'] = '';

        return view('privilege', $data);
    }

    public function userList(Request $request)
    {
        $userList = User::where('privilege', $request->privilege)->get();

        $option = '<option value="" selected>Select User</option>';

        if (!empty($userList) && $userList->isNotEmpty()) {
            foreach ($userList as $item) {
                $option .= '<option value="' . $item->id . '">' . $item->name . '</option>';
            }
        }
        echo $option;
    }

    public function userRole(Request $request)
    {
        echo Role::where('user_id', $request->user_id)->select(['user_id', 'user_role'])->first();
    }

    public function setRole(Request $request)
    {

    }
}
