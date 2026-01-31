<?php

namespace App\Models;

use App\Constants\Categories;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'price', 'quantity'];

    public function cartItems(): hasMany
    {
        return $this->hasMany(CartItem::class);
    }

    public function getCategoryIcon()
    {
        $icons = [
            Categories::CPU => 'cpu.png',
            Categories::MOTHERBOARD => 'motherboard.png',
            Categories::RAM => 'ram.png',
            Categories::GPU => 'gpu.png',
            Categories::SSD => 'ssd.png',
            Categories::HDD => 'hdd.png',
            Categories::POWER_SUPPLY => 'power.png',
            Categories::BODY => 'case.png',
            Categories::COOLING_SYSTEM => 'cooling.png',
            Categories::MONITORS => 'monitor.png',
            Categories::OTHER => 'default.png',
        ];

        return $icons[$this->category_id] ?? 'default.png';
    }

    public function getCategoryName()
    {
        return Categories::WITH_TEXT[$this->category_id] ?? 'Інше';
    }
}
