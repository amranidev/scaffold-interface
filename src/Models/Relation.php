<?php

namespace Amranidev\ScaffoldInterface\Models;

use Illuminate\Database\Eloquent\Model;

class Relation extends Model
{
    /**
     * OneToMany Relationship.
     */
    const OneToMany = 'OneToMany';
    
    /**
     * ManyToMany Relationship.
     */
    const ManyToMany = 'ManyToMany';

    /**
     * The attributes that are mass assignable.
     *
     * @var array $fillable
     */
    protected $fillable = ['scaffoldinterface_id', 'to', 'having'];
}
