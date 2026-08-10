<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Production extends Model
{
    //

    // add fillable
    protected $fillable = ['production_date', 'site_id', 'shift_id', 'no_tiket', 'unit_id', 'employee_id', 'start_time', 'end_time', 'bruto', 'tara', 'netto', 'tonase', 'note'];
    // add guaded
    protected $guarded = ['id'];
    // add hidden
    protected $hidden = ['created_at', 'updated_at'];

    // add relationship to site
    public function site()
    {
        return $this->belongsTo(Site::class);
    }

    // add relationship to shift
    public function shift()
    {
        return $this->belongsTo(Shift::class);
    }

    // add relationship to unit
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    // add relationship to employee
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
