<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class M_transaksiPesanan extends Model
{
    protected $table = 'transaksi_pesanan';
    public $incrementing = false;
    
    public function customers(){
        return $this->belongsTo( 'App\Models\M_Customer','customer','id');
    }

    public function pakets(){
        return $this->belongsTo( 'App\Models\M_Paket','paket','id');
    }

    public function status_pesanans(){
        return $this->belongsTo( 'App\Models\M_statusPesanan','status_pesanan','id');
    }

    public function status_pembayarans(){
        return $this->belongsTo( 'App\Models\M_statusPembayaran','status_pembayaran','id');
    }
}
