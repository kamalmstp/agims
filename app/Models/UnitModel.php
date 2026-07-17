<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UnitModel extends Model
{
    //

    // add fillable
    protected $fillable = ['category_id', 'brand', 'name'];
    // add guaded
    protected $guarded = ['id'];
    // add hidden
    protected $hidden = ['created_at', 'updated_at'];

    public function category()
    {
        return $this->belongsTo(UnitCategory::class, 'category_id');
    }

    public function units()
    {
        return $this->hasMany(Unit::class, 'model_id');
    }
}
