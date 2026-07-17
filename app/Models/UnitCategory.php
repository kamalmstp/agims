<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UnitCategory extends Model
{
    //

    // add fillable
    protected $fillable = ['code', 'name'];
    // add guaded
    protected $guarded = ['id'];
    // add hidden
    protected $hidden = ['created_at', 'updated_at'];

    public function unitModels()
    {
        return $this->hasMany(UnitModel::class, 'category_id');
    }
}
