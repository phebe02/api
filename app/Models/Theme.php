<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Word;

class Theme extends Model
{
    use HasFactory, Sortable;

    public $sortable = ['id', 'theme'];
    protected $fillable = [
        'theme',
    ];
    public function words()
    {
        return $this->belongsToMany(Word::class, 'ID396978_roadtripbingo.relations');
    }
}
