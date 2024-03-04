<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'tbl_customers';
    protected $primaryKey = 'customer_id';

    protected $fillable = [
        'username',
        'password',
        'name',
        'email',
        'no_tlp'
    ];
}
