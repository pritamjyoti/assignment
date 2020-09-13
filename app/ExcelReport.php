<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExcelReport extends Model
{
    protected $table = "excel_report";
    protected $guarded = [];
    public function details(){
        return $this->hasMany('App\ExcelReportDetails','excel_id');
    }
}
