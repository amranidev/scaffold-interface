<?php

namespace Amranidev\ScaffoldInterface\Models;

use Illuminate\Database\Eloquent\Model;

class Relation extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['scaffoldinterface_id', 'to', 'having'];
}
