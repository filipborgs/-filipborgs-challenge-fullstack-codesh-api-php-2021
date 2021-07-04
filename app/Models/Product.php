<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Product extends Model
{
    use HasFactory, Notifiable;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code', 'barcode', 'status', 'imported_t', 'url',
        'product_name', 'quantity', 'categories', 'packaging', 'brands', 'image_url'
    ];

    public function setBarCodeAttribute($str)
    {

        if (preg_match('/(\d)+/', $str, $code)) {
            $this->attributes['code'] = $code[0];
        }
        $this->attributes['barcode'] = preg_replace('/Barcode: /', '', $str);
    }
}
