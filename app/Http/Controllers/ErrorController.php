<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErrorController extends Controller
{
    //
    public function failedLogin() {
        return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        return redirect('login')->setStatusCode(401);
    }
}
