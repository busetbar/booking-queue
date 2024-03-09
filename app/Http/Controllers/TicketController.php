<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Users;
use Exception;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class TicketController extends Controller
{
    //Customer
    // Admin
    public function GetOpenTicket(Request $request)
    {
        try
        {
            $oGetUser = $request->session()->get('username');
            $oGetTicket = Ticket::where('contact_name', $oGetUser)->where('status', 'open')->get();
            return view('dashboards.index', ['ticket' => $oGetTicket]);
        }
        catch (Exception $e)
        {
            $oError = $e->getMessage();
            Log::error($oError);
        }
    }

    public function GetCloseTicket(Request $request)
    {
        try
        {
            $oGetUser = $request->session()->get('username');
            $oGetTicket = Ticket::where('contact_name', $oGetUser)->where('status', 'closed')->get();
            return view('tickets.closed', ['ticket' => $oGetTicket]);
        }
        catch (Exception $e)
        {
            $oError = $e->getMessage();
            Log::error($oError);
        }
    }

    public function viewDetailTicket(Request $request, $ref)
    {
        $oUser = $request->session()->get('username');
        $oGetUser = Ticket::where('ref_num', $ref)->where('contact_name', $oUser)->first();
        $oTotal = Ticket::where('status', 'open')->get();
        $oCount = count($oTotal);

        return view('tickets.detail', ['user' => $oGetUser, 'total' => $oCount]);
    }

    public function doPostTicket(Request $request)
    {
        try
        {
            $sValid = $request->validate(
            [
                'contact_name' => 'required|unique:tbl_tickets',
                'email' => 'required|email|unique:tbl_tickets',
                'no_tlp' => 'required|unique:tbl_tickets',
                'status' => 'required'
            ]);

            $totalTickets = Ticket::count();

            $oTicket = new Ticket();
            $oTicket->contact_name = $sValid['contact_name'];
            $oTicket->email = $sValid['email'];
            $oTicket->no_tlp = $sValid['no_tlp'];
            $oTicket->ref_num = Str::random(16);
            $oTicket->status = $sValid['status'];
            $oTicket->created_at = now();
            $oTicket->updated_at = now();
            $noQueue = ($totalTickets + 1);
            $oTicket->no_queue = $noQueue;
            $oTicket->save();
            
            return redirect('/dash')->with('success', 'Users berhasil ditambahkan');
        }
        catch (Exception $e)
        {
            $oError = $e->getMessage();
            Log::error($oError);
            return redirect('/dash')->with('error', "$oError");
        }
    }
}
