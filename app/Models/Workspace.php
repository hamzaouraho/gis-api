<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workspace extends Model
{
    use HasFactory;

    protected $fillable = [

        'name','gs_workspace_name',
        'gs_workspace_isolated',
        'description',
        'basemap_id',
        'user_id'
        
    ];
}
