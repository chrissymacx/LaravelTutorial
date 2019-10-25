<?php

namespace App;

use App\Mail\ProjectCreated;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class Project extends Model
{
    //

    protected $guarded = [];


    protected $dispatchesEvents = [
        'created' => ProjectCreated::class
    ];

   /* protected static function boot() {
        parent::boot();

        static::created(function ($project) {

            );
        });

    }*/

    public function tasks()

    {

        return $this->hasMany(Task::class);    //a Project has many Tasks

    }


    public function addTask($task)
    {

        $this->tasks()->create($task);

    }

    public function owner() {

        return $this->belongsTo(User::class);
    }
}
