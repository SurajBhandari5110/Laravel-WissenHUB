<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentTitle extends Model
{
    use HasFactory;

    protected $table = 'content_titles';
    protected $primaryKey = 'content_id';
    protected $fillable = ['course_id', 'title', 'position'];

    public function subheadings()
    {
        return $this->hasMany(Subheading::class, 'content_id', 'content_id');
    }
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id', 'course_id'); // Foreign key and local key
    }
}
