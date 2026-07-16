<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //

    // add fillable
    protected $fillable = ['code', 'name', 'email', 'phone', 'address', 'logo'];
    // add guaded
    protected $guarded = ['id'];
    // add hidden
    protected $hidden = ['created_at', 'updated_at'];

    public function sites()
    {
        return $this->hasMany(Site::class);
    }

    public function departments()
    {
        return $this->hasMany(Department::class);
    }
}
