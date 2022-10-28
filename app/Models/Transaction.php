<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class Transaction extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Searchable;

    protected $fillable = [
        'name',
        'amount',
        'description',
        'account_id',
    ];

    protected $hidden = [
        'account_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'amount' => $this->amount,
            'description' => $this->description,
        ];
    }

    public function account()
    {
        return $this->belongsTo(Account::class);
    }
}
