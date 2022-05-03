<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportQuestion extends Model
{
    use HasFactory;

    protected $casts = [
        'option_name' => 'array',
    ];

    protected $fillable = ['title', 'question_type', 'option_name'];

    protected $table = "report_questions";

    public function report()
    {
        return $this->belongsTo(Report::class);
    }

    public function answers()
    {
        return $this->hasMany(ReportAnswer::class)
    }
}
