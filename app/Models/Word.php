<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use App\Models\Theme;


class Word extends Model
{
    use HasFactory;
    use Sortable;

    public $sortable = ['id', 'word'];
    protected $fillable = [
        'word',
    ];
     public function themes()
    {
        return $this->belongsToMany(Theme::class, 'ID396978_roadtripbingo.relations');
    }
}
