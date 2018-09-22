<?php

namespace Amranidev\ScaffoldInterface\Models;

use Illuminate\Database\Eloquent\Model;

class Relation extends Model
{
    /**
     * OneToMany Relationship.
     */
    const ONE_TO_MANY = 'OneToMany';

    /**
     * ManyToMany Relationship.
     */
    const MANY_TO_MANY = 'ManyToMany';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['scaffoldinterface_id', 'to', 'having'];
}
