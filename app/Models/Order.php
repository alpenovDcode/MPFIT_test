<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Order extends Model
{
    use HasFactory;
    protected $fillable = ['customer_name', 'product_id', 'quantity', 'status', 'comment'];
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
    public function getTotalPriceAttribute(): float
    {
        return $this->product->price * $this->quantity;
    }
} 