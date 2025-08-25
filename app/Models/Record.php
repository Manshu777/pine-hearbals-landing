<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
     protected $fillable = [
        's_no',
        'date_of_record',
        'item_name',
        'mfg_lic_no',
        'packing_trader',
        'product_name',
        'batch_size',
        'pack_size',
        'bottle_jar',
        'color_material',
        'form_of_product',
        'ph_value',
        'fragrance_flavour',
        'no_of_packs',
        'batch_number',
        'manufacturing_date',
        'shelf_life',
        'no_of_sample',
        'sampled_by',
        'sample_handed_over_to',
        'qc_checked',
        'record_manager',
    ];
}
