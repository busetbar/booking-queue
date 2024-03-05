<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Users;
use Exception;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    //
    public function index()
    {
        try
        {
            return view('dashboards.index');
        }
        catch (Exception $e)
        {
            $oError = $e->getMessage();
            Log::error($oError);
        }
    }
}
