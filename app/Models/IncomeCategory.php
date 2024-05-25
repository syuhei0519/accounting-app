<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Income;

class IncomeCategory extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $keyType = 'string';
    protected $fillable = [
        'id',
        'name',
        'comment'
    ];

    public $isRegisteredIncomeByCategory = false;

    //その収入カテゴリーで登録されている収入情報があるかどうかを判定
    public function isRegisteredIncomeByCategory(string $categoryId) {
        $incomeCount = Income::where('category_id', $categoryId)->count();
        $this->isRegisteredIncomeByCategory = $incomeCount > 0 ? true : false;
        return $this->isRegisteredIncomeByCategory;
    }
}
