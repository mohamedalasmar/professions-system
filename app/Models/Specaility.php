<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specaility extends Model
{
    public function getActivityStatusAttribute(){

        return $this->active ? 'Active' : 'In-Active';
    }
    use HasFactory;

    public function professions(){

        return $this->hasMany(Profession::class, 'specaility_id','id');
    }
}
