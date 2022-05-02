<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryAssignment extends Model
{
    use HasFactory;

    protected $table = 'inventory_assignments';

    protected $id = 'id';

    protected $fillable = ['issue_to','assigned_to','number_of_item','issued_by','item_id'];

    public function item(){
        return $this->belongsTo(Inventory::class);
    }
}
