<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogMail extends Model
{
    use HasFactory;
    protected $table = "log_mails";
    protected $primarykey = "id";
    public $incrementing = true;
    public $tinestamps = true;

    protected $fillable = [
        "email",
        "date"
    ];

    public function aplication(){
        return $this->belongsTo(Aplication::class);
    }
}
