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
    //
    public function showAllTicket()
    {
        try
        {
            $oTicket = Ticket::all();
            return view('ticket.index', ['ticket' => $oTicket]);
        }
        catch (Exception $e)
        {
            $oError = $e->getMessage();
            Log::error($oError);
        }
    }

    public function viewDetailTicket(Request $request)
    {
        $oUser = $request->session()->get('username');
        $oGetUser = Ticket::where('contact_name', $oUser)->first();
        //echo '<pre>';
        //var_dump($oGetUser);
        return view('tickets.detail', ['user' => $oGetUser]);
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

            // $totalTickets = Ticket::count();

            $oTicket = new Ticket();
            $oTicket->contact_name = $sValid['contact_name'];
            $oTicket->email = $sValid['email'];
            $oTicket->no_tlp = $sValid['no_tlp'];
            $oTicket->ref_num = Str::random(16);
            $oTicket->status = $sValid['status'];
            $oTicket->created_at = now();
            $oTicket->updated_at = now();
            // $noQueue = 'T - ' . ($totalTickets + 1);
            // $oTicket->no_queue = $noQueue;
            $oTicket->save();
            
            return redirect('/detail')->with('success', 'Users berhasil ditambahkan');
        }
        catch (Exception $e)
        {
            $oError = $e->getMessage();
            Log::error($oError);
            return redirect('/dash')->with('error', "$oError");
        }
    }
}
