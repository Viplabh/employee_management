<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataUpload extends Model
{
    use HasFactory;
    protected $table = 'uploaded_data';

    protected $fillable = [
        
        'id', 'customer_name', 'mobile_no', 'email', 'address', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'
    ];
}
