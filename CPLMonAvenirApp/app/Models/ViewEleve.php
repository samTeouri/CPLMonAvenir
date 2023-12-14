<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViewEleve extends Eleve
{
    use HasFactory;

    protected $table = 'view_eleve';
}
