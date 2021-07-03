<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContractFileReturned extends Model
{
    use HasFactory;
    protected $fillable = [
        'contract_id',
        'description',
    ];
}
