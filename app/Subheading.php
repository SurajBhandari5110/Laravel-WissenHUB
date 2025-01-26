<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subheading extends Model
{
    use HasFactory;

    protected $table = 'subheadings';
    protected $primaryKey = 'subheading_id';
  
    protected $fillable = ['content_id', 'title', 'content'];


    public function contentTitle()
    {
        return $this->belongsTo(ContentTitle::class, 'content_id', 'content_id');
    }
}
