<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScrapeLink extends Model
{
    protected $fillable = ['status','type','href'];
}
