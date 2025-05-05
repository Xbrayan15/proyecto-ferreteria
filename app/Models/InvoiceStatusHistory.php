<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceStatusHistory extends Model
{
    use HasFactory;

    protected $table = 'invoice_status_history';

    protected $fillable = [
        'invoice_id',
        'status',
    ];

    // Relación: un historial pertenece a una factura
    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }
}
