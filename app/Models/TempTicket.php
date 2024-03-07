<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempTicket extends Model
{
    use HasFactory;

    protected $table = 'tbl_temp_tickets';
    protected $primaryKey = 'temp_ticket_id';

    protected $fillable = [
        'contact_name',
        'email',
        'no_tlp',
        'date',
        'ref_num',
        'no_queue',
        'status',
        'date'
    ];
}
