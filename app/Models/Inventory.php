<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    protected $table = 'inventories';

    protected $primaryKey = 'id';

    protected $fillable = ['remaining_quantity','product_name','item_number','condition','quantity','delivered_by','date_delivered','product_desc','category','expiry_date'];
}
