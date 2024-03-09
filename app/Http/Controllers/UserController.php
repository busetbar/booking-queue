<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Users;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function viewInput()
    {
        return view('logins.admin');
    }

    public function doInput(Request $request)
    {
        try
        {
            $oValidate = $request->validate(
            [
                'username' => 'required',
                'password' => 'required'
            ]);
            $oGetUser = $oValidate['username'];
            $oGetPass = $oValidate['password'];
            try
            {
                $oCheck = Users::where('username', $oGetUser)->firstOrFail();
            }
            catch(ModelNotFoundException $e)
            {
                return Redirect::to('/op')->with('error', 'User tidak ditemukan');
            }
            $oGetHash = $oCheck->password;
            if (!Hash::check($oGetPass, $oGetHash))
            {
                return redirect()->route('loginAdmin')->with('error', 'Kombinasi username dan password tidak valid.');
            }
            $request->session()->put('username', $oGetUser);
            return redirect('/admin')->with('success', 'Berhasil Masuk !');
        }
        catch(Exception $e)
        {
            $oError = $e->getMessage();
            Log::error($oError);
        }
    }

    public function viewRegister()
    {
        try
        {
            return view('admin.register');
        }
        catch(Exception $e)
        {
            $oError = $e->getMessage();
            Log::error($oError);
            return redirect('/op')->with('error', "$oError");
        }
    }

    public function registerUser(Request $request)
    {
        try
        {
            $sValid = $request->validate(
            [
                'username' => 'required|unique:tbl_users',
                'password' => 'required',
                'password_confirm' => 'required'

            ],
            [
                'email.required' => 'Email harus diisi',
                'username.required' => 'Username harus diisi',
                'password.required' => 'Password tidak boleh kosong',
                'password_confirm.required' => 'Password tidak boleh kosong',

            ]);

            $oTicket = new Users();
            $oTicket->username = $sValid['username'];
            $oTicket->password = Hash::make($sValid['password']);
            $oTicket->created_at = now();
            $oTicket->updated_at = now();
            $oTicket->save();
            
            return redirect('/op')->with('success', 'Users berhasil ditambahkan, Silahkan Login');
        }
        catch (Exception $e)
        {
            $oError = $e->getMessage();
            Log::error($oError);
        }
    }
}
