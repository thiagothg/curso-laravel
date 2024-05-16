<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('site.contact');
    }

    public function save(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:50',
            'phone' => 'required|max:20',
            'email' => 'required|max:80|email',
            'reason' => 'required',
            'message' => 'required|max:2000',
        ]);

        dd($request);
        return view('site.contact');
    }
}
