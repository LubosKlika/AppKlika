<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserCodeController extends Controller
{
    public function show()
    {
        return view('main.enter-code');
    }

    public function enter(Request $request)
    {
      
        if ($request->input('code') == '1.Ch3ss#') {
           
            $request->session()->put('user_code', true);
            return redirect('/'); 
        } else {
       
            return redirect('enter-code')->withErrors(['code' => 'The entered code is incorrect']);
        }
    }
}