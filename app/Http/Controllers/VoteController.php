<?php

namespace App\Http\Controllers;

use App\Models\Representative;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class VoteController extends Controller
{
    public function index()
    {
        User::truncate();
        $getRepresentative = Representative::all()->count();
        // dd($getRepresentative);
        if ($getRepresentative != 0) {
            for ($i = 0; $i < 500; $i++) {
                $name = Str::random(10);
                $email = Str::random(10) . "@gmail.com";
                $email_verified_at = now();
                $password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'; // password
                $selected_id = Representative::all()->random()->id;
                $remember_token = Str::random(10);

                $addUser = new User();
                $addUser->name =  $name;
                $addUser->email = $email;
                $addUser->email_verified_at = $email_verified_at;
                $addUser->password = $password;
                $addUser->selected_id = $selected_id;
                $addUser->remember_token = $remember_token;
                $addUser->save();
            }
            return back()->with('fail', 'สุ่มเเล้ว!');
        } else {
            return back()->with('fail', 'สุ่มไม่สำเร็จ!');
        }
    }
}
