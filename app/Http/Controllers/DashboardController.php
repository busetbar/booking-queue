<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Ticket;
use App\Models\Users;
use Exception;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    //
    public function index(Request $request)
    {
        try
        {
            $oGetUser = $request->session()->get('username');
            $oGetTicket = Ticket::where('contact_name', $oGetUser)->where('status', 'open')->get();
            $oClosedTicket = Ticket::where('contact_name', $oGetUser)->where('status', 'closed')->get();
            return view('dashboards.index', ['ticket' => $oGetTicket, 'closed' => $oClosedTicket]);
        }
        catch (Exception $e)
        {
            $oError = $e->getMessage();
            Log::error($oError);
        }
    }

    public function getTicketDetail(Request $request, $ref)
    {
        $oUser = $request->session()->get('username');
        $oGetUser = Ticket::where('ref_num', $ref)->where('contact_name', $oUser)->first();
        $oTotal = Ticket::where('status', 'open')->get();
        $oCount = count($oTotal);

        return view('tickets.detail', ['detail' => $oGetUser, 'total' => $oCount ]);
    }
}
