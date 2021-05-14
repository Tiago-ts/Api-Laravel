<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aplication extends Model
{
    use HasFactory;

    protected $table = "aplication";
    protected $primarykey = "id";
    public $incrementing = true;
    public $tinestamps = true;

    protected $fillable = [
        "name",
        "token"
    ];

    public function logs(){
        return $this->hasMany(LogMail::class);
    }

}
