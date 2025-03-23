<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToManyMany;

class Test extends Model
{
    use HasFactory;

    /**
     * @var \Illuminate\Support\Carbon|mixed
     */
    //public mixed $created_time;
    protected $table = 'tests';
    protected $fillable = [
        'test_name',
        'test_description',
        'created_time'
    ];
    public function questions(): HasMany
    {
        return $this->hasMany(Question::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'results')->withPivot('score', 'time_finished');
    }
}
