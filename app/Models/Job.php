<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $guarded = [];
    static public function getSingle($id)
    {
    return self::find($id);
    }
    public function getImage(){
        if(!empty($this->job_pic) && file_exists('upload/job/'.$this->job_pic)){
            return url('upload/job/'.$this->job_pic);
        }
        else
        {
            return "";
        }
    }
    static public function getJob(){
        $return = self::select('jobs.*');
       $return=$return->orderBy('id')
        ->paginate(7);
        return  $return;

 
    }
    public function comments()
{
    return $this->hasMany(Comment::class, 'jobs_id');
}
}
