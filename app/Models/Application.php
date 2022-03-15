<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Application extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        static::created(
            function ($application) {
                $application->user()->update([
                    'account_status' => 3,
                ]);
            }
        );
    }

    public function generateHistory($message)
    {
        $current_history = $this->history;

        if (empty($current_history)) {
            $history = array();
        } else {
            $history = json_decode($current_history);
        }

        $history[] = [
            'time' => time(),
            'user' => Auth::user()->steam_hex,
            'comments' => $message,
        ];

        return $new_history = json_encode($history);
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    // public function getStatusNameAttribute()
    // {
    //     $status_name = DB::table('application_statuses')->where('id', '=', $this->status)->first();
    //     return $status_name->application_status_name;
    // }

    public function getUsableHistoryAttribute()
    {
        if (!is_null($this->history)) {
            $historys = json_decode($this->history);

            foreach ($historys as $history) {
                $history->user;
                $commenter = DB::table('users')
                    ->where('steam_hex', $history->user)
                    ->first()
                    ->display_name;
                $history->commenter = $commenter;
            }
            return $historys;
        } else {
            return "No History";
        }
    }

    public function getUsableCommentsAttribute()
    {
        if (!is_null($this->comments)) {
            $comments = json_decode($this->comments);

            foreach ($comments as $comment) {
                $comment->user;
                $commenter = DB::table('users')
                    ->where('steam_hex', $comment->user)
                    ->first()
                    ->display_name;
                $comment->commenter = $commenter;
            }
            return $comments;
        } else {
            return "No Comments";
        }
    }
}
