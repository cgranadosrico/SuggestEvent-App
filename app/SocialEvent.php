<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class SocialEvent  extends Model {

    protected $primaryKey = 'id_event';

    protected $fillable = [
        'id_event','photo', 'name', 'date_star', 'date_end', 'description', 'location'
    ];

    protected $hidden = [];
}