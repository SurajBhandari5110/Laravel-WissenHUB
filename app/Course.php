<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'courses';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'course_id';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    /**
     * The data type of the primary key.
     *
     * @var string
     */
    protected $keyType = 'int';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'image',
    ];
    public function contentTitles()
{
    return $this->hasMany(ContentTitle::class, 'course_id', 'course_id');
}
public function categories()
    {
        return $this->belongsToMany(Category::class, 'course_categories', 'course_id', 'category_id');
    }
    

}
