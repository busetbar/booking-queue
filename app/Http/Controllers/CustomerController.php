<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CustomerController extends Controller
{
    public function viewInput()
    {
        return view('logins.index');
    }

    public function doInput(Request $request)
    {
        try
        {
            $sValid = $request->validate(
            [
                'username' => 'required'
            ]);
            $oUserName = $sValid['username'];
            $request->session()->put(['username' => $oUserName]);
    
            return redirect('/dash')->with('success', 'Berhasil Masuk !');
        }
        catch(Exception $e)
        {
            $oError = $e->getMessage();
            Log::error($oError);
            return redirect('/')->with('error', "$oError");
        }
    }

    public function doLogout(Request $request)
    {
        try
        {
            $oGetSeesion = $request->session()->get('username');
            if (!$oGetSeesion)
            {
                return redirect('/')->with('success', 'Berhasil Logout !');
            }
            $request->session()->flush();
            return redirect('/')->with('success', 'Berhasil Logout');
        }
        catch(Exception $e)
        {
            $oError = $e->getMessage();
            Log::error($oError);
        }
    }
}
