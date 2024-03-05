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

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($ticket) 
        {
            // Menghasilkan nomor antrian secara otomatis
            $lastTicket = static::latest()->first();
            if ($lastTicket) {
                // Mengambil nomor antrian terakhir dan menambahkan 1
                $lastQueueNumber = intval($lastTicket->no_queue);
                $ticket->no_queue = $lastQueueNumber + 1;
            } else {
                // Jika tidak ada nomor antrian sebelumnya, nomor antrian pertama diatur menjadi 1
                $ticket->no_queue = 0000;
            }
        });
    }
}
