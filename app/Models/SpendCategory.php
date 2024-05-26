<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpendCategory extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $keyType = 'string';
    protected $fillable = [
        'id',
        'name',
        'comment'
    ];

    public $isRegisteredSpendByCategory = false;

    //その支出カテゴリーで登録されている収入情報があるかどうかを判定
    public function isRegisteredSpendByCategory(string $categoryId) {
        $spendCount = Spend::where('category_id', $categoryId)->count();
        $this->isRegisteredSpendByCategory = $spendCount > 0 ? true : false;
        return $this->isRegisteredSpendByCategory;
    }
}
