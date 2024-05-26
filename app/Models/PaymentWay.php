<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentWay extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $keyType = 'string';
    protected $fillable = [
        'id',
        'name',
        'comment'
    ];

    public $isRegisteredSpendByPaymentWay = false;

    //その決済方法で登録されている支出情報があるかどうかを判定
    public function isRegisteredSpendByPaymentWay(string $categoryId) {
        $spendCount = Spend::where('category_id', $categoryId)->count();
        $this->isRegisteredSpendByPaymentWay = $spendCount > 0 ? true : false;
        return $this->isRegisteredSpendByPaymentWay;
    }
}
