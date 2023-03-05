<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MailVerifyCode extends Model
{
    use HasFactory;

    protected $table = 'mail_verify_codes';
    protected $guarded = [];
    protected $hidden = [];
}
