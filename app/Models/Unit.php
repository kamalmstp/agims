<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    //

    // add fillable
    protected $fillable = ['company_id', 'site_id', 'model_id', 'unit_code', 'model_number', 'chassis_number', 'raw', 'faw', 'gcw', 'engine_model', 'engine_number', 'capacity', 'made_year', 'hm_current', 'km_current'];
    // add guaded
    protected $guarded = ['id'];
    // add hidden
    protected $hidden = ['created_at', 'updated_at'];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function site()
    {
        return $this->belongsTo(Site::class, 'site_id');
    }

    public function model()
    {
        return $this->belongsTo(UnitModel::class, 'model_id');
    }
}
