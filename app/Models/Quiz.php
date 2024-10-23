<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Quiz extends Model
{
    use HasFactory, SoftDeletes;
    protected $table="quiz";
    protected $guarded = [];

    protected $fillable = [
        'code',
        'name',
        'user_id',
        'total',
        'right',
        'wrong'
    ];

    public function questions()
    {
        return $this->hasMany(Question::class, 'quiz_id', 'id');//->where('deleted_at', null);
    }
    protected static function booted()
    {
        static::saving(function ($model) {
            $model->wrong = $model->total - $model->right;
        });
    }
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->code = Str::uuid()->toString();     
        });
    }
}
