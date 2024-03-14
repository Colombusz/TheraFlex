<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkillCard extends Model
{
    protected $table = 'employee_skill_cards';
    protected $fillable = [
        'specialization',
        'description',
        'knowledges',
        'performance_review_id',
        'employee_id',
    ] ;

}
