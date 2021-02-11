<?php

namespace App\Models\Test;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SampleTable2 extends Model
{
    use HasFactory;

    protected $table = 'sample_table2';
    public $primaryKey = "id";

    protected $fillable = [
        'id',
        'sampleName',
        'sampleEmail',
        'password',
        'sampleAddress',
    ];
}
