<?php

namespace Amranidev\ScaffoldInterface\Models;

use Illuminate\Database\Eloquent\Model;

class Scaffoldinterface extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['migration', 'model', 'controller', 'views', 'tablename', 'package'];
}
