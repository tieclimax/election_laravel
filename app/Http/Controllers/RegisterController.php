<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Representative;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\String_;

class RegisterController extends Controller
{
    public function index(Request $request)
    {
        $groupnames = Group::get();


        return view('register', compact('groupnames'));
    }
    public function Pre_register(Request $request)
    {
        $getCount = User::all()->count();
        $sub = User::groupBy('selected_id')->count();

        $getWingroup = DB::select('SELECT selected_id, Count(selected_id) as win
        FROM users
        GROUP BY selected_id
        ORDER BY win DESC');
        $id = $getWingroup;

        $newid = $id[0]->selected_id;

        $getName = Group::where('id', $newid)->get();


        return view('pre-register', compact('getCount', 'getWingroup', 'getName'));
    }
    public function Show_group_register(Request $request)
    {
        $groupnames = Group::get();

        return view('group-register', compact('groupnames'));
    }
    public function Group_register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'groupname' => 'required|string'
        ]);

        if ($validator->fails()) {
            return back()->with('fail', 'ชื่อพรรคไม่ถูกต้อง!');
        }
        $groupnames = Group::get();
        $groupname = $request->input('groupname');
        $cnt_groupname = Group::where("groupname", $groupname)->count();
        if ($cnt_groupname == 0) {
            $group = new Group;
            $group->groupname = $groupname;
            $group->save();

            return  redirect()->route('register', compact('groupnames'));
        }
        return back()->with('fail', 'มีชื่อพรรคนี้อยู่เเล้ว!');
    }
    public function Register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'edu_level' => 'required',
            'groupid' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->with('fail', 'ข้อมูลไม่ถูกต้อง หรือ ไม่ครบถ้วน!');
        }
        $firstname = $request->input('firstname');
        $lastname = $request->input('lastname');
        $edu_level = $request->get('edu_level');
        $groupid = $request->get('groupid');

        $cnt_amount = Group::where("id", $groupid)->first();
        // dd($cnt_amount->amount);
        $cnt_groupname = Representative::where("firstname", $firstname)->where("lastname", $lastname)->count();

        // dd($cnt_amount->amount);
        if ($cnt_amount->amount > 10) {
            return back()->with('fail', 'มีสมาชิกครบเเล้ว!');
        } else {
            if ($cnt_groupname == 0) {
                $group = new Representative;
                $group->firstname = $firstname;
                $group->lastname = $lastname;
                $group->edu_level = $edu_level;
                $group->group_id = $groupid;
                $group->save();

                $count = $cnt_amount->amount;
                $count++;

                $empLog = Group::where('id', $groupid)->first();
                $empLog->update(['amount' => $count]);

                $getdatas = Representative::where("firstname", $firstname)->where("lastname", $lastname)->get();

                return view('group-home', compact('getdatas'));
            }
            return back()->with('fail', 'เคยลงสมัครเเล้ว!');
        }
    }
}
