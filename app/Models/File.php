<?php

namespace App\Models;

use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class File extends Model
{
    use HasFactory;

    protected $table = 'files';

    protected $fillable = [
        'waste_id',
        'file_url',
    ];

    /**
     * @return BelongsTo
     */
    public function waste(): BelongsTo
    {
        return $this->belongsTo(Waste::class, 'waste_id');
    }

    /**
     * @param int $wasteId
     * @return Model|Builder|null
     */
    public function getFile(int $wasteId): Model|Builder|null
    {
        $file = File::query()
            ->where('waste_id', $wasteId)
            ->first();

        return $file;
    }
}
