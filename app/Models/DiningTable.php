<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiningTable extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    public function dining_room()
    {
        return $this->belongsTo(DiningRoom::class);
    }
    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'current_transaction_id');
    }
    public function table_reservations()
    {
        return $this->hasMany(TableReservation::class);
    }
}
