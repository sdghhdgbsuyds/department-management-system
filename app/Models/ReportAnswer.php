<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportAnswer extends Model
{
    use HasFactory;

    protected $fillable = ['answers'];

    protected $table = "report_answers";

    public function report()
    {
        return $this->belongsTo(Report::class);
    }

    public function question()
    {
        return $this->belongsTo(ReportQuestion::class)
    }
}
