<?php

namespace App\Models;
   
use Illuminate\Database\Eloquent\Model;

class Companies extends Model {

    protected $table = 'companies';
    protected $primaryKey = 'id_company';
    public $timestamps = true;
    protected $fillable = [];

}