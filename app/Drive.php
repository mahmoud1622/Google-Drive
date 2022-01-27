<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Drive extends Model
{
    protected $table="drives";
    public $file=['title','description','file'];
}

