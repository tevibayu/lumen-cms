<?php

namespace App\Models;
   
use Illuminate\Database\Eloquent\Model;

class AccessLogs extends Model {

    protected $table = 'access_logs';
    protected $primaryKey = 'id_access_logs';
    public $timestamps = true;
    protected $fillable = [];

}