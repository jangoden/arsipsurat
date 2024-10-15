<?php
namespace App\Models;

use App\Enums\Config as ConfigEnum;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notaris extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $guarded = [];

    /**
     * @var string[]
     */
    protected $casts = [
        'nota_date' => 'date',
    ];

    protected $appends = [
        'formatted_nota_date',
        'formatted_created_at',
        'formatted_updated_at',
    ];
/**
 * Scope for rendering notaris data with search and pagination
 *
 * @param \Illuminate\Database\Eloquent\Builder $query
 * @param string|null $search
 * @param string $sort
 * @param string $order
 * @return \Illuminate\Database\Eloquent\Builder
 */
    public function scopeRender($query, $search, $sort = 'nota_date', $order = 'asc')
    {
        return $query
            ->search($search) // Using the scopeSearch for searching
            ->orderBy($sort, $order) // Apply sorting based on parameters
            ->paginate(Config::getValueByCode(ConfigEnum::PAGE_SIZE)) // Pagination
            ->appends(['search' => $search]); // Keep search parameter in the query string for pagination
    }

    /**
     * Scope for searching notaris records
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string|null $search
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSearch($query, $search)
    {
        return $query->when($search, function ($query, $find) {
            return $query->where('nota_number', 'LIKE', "%{$find}%")
                ->orWhere('description', 'LIKE', "%{$find}%")
                ->orWhere('from', 'LIKE', "%{$find}%")
                ->orWhere('to', 'LIKE', "%{$find}%");
        });
    }

    public function getFormattedNotaDateAttribute(): string
    {
        return Carbon::parse($this->nota_date)->isoFormat('dddd, D MMMM YYYY');
    }

    public function getFormattedCreatedAtAttribute(): string
    {
        return $this->created_at->isoFormat('dddd, D MMMM YYYY, HH:mm:ss');
    }

    public function getFormattedUpdatedAtAttribute(): string
    {
        return $this->updated_at->isoFormat('dddd, D MMMM YYYY, HH:mm:ss');
    }
}
