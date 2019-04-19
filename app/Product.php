<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $guarded = ['id'];

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function delete(){
        if($this->image) Storage::delete('/public/products'.$this->image);
        return parent::delete();
    }
}
