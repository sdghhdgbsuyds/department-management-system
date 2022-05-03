<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Report extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['title', 'description'];
    protected $table = 'reports';

    public function questions()
    {
        return $this->hasMany(ReportQuestion::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}
