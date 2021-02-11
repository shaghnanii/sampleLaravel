<?php

namespace App\Models\Test;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SampleTable extends Model
{
    use HasFactory;
    protected $table = 'sample_table';
    public $primaryKey = "id";

    protected $fillable = [
        'id',
        'sampleName',
        'sampleEmail',
        'password',
        'sampleAddress',
    ];
}
