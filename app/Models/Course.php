<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Platform;
use App\Models\Topic;

class Course extends Model
{
    use HasFactory;

    public function platform() {
        return $this->belongsTo(Platform::class);
    }

    public function topics() {
        return $this->belongsToMany(Topic::class, 'course_topic', 'course_id', 'topic_id');
    }
}
