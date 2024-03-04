<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $table = 'tbl_tickets';
    protected $primaryKey = 'ticket_id';

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
