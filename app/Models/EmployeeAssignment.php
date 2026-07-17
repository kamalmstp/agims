<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeAssignment extends Model
{
    //

    // add fillable
    protected $fillable = ['employee_id', 'site_id', 'start_date', 'end_date', 'notes'];
    // add guaded
    protected $guarded = ['id'];
    // add hidden
    protected $hidden = ['created_at', 'updated_at'];

    // add relationship to employee
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    // add relationship to site
    public function site()
    {
        return $this->belongsTo(Site::class);
    }
}
