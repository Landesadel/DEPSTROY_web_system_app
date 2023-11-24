<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Waste extends Model
{
    use HasFactory;

    protected $table = 'waste';

    protected $fillable = [
        'date',
        'number_car',
        'is_exactly',
        'wood',
        'dirt',
        'concrete',
        'brick',
        'statement',
        'is_awning',
    ];

    /**
     * @param int $wasteId
     * @return File|null
     */
    public function getFile(int $wasteId): File|null
    {
        $file = File::where('waste_id', $wasteId)
            ->first();

        return $file ?? null;
    }
}
