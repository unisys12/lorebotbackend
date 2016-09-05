<?php

namespace LoreBot;

use Illuminate\Database\Eloquent\Model;

class Npc extends Model
{
    
    protected $fillable = ['name', 'quote', 'tags'];
    
}
