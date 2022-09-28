<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailManagement extends Model
{
    use HasFactory;

    protected $table = 'email_management';
    protected $fillable = ['title', 'description', 'theme'];
}
