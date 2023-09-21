<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileDownloadLog extends Model
{
    use HasFactory;

    protected $fillable=[
        'id','user_id',
        'file_id',
        'ip_address',
        'user_agent',
        'country',
        'download_time',
        'created_at',
        'updated_at'];

}
