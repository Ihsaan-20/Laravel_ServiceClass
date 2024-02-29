<?php

namespace App\Services;

class ProductService
{
    public function calculateDiscountWithTax($discountType, $discountAmount, $price, $taxRate = null)
    {
        $discountAmount = (float) $discountAmount;
        $taxRate = (float) $taxRate;

        $totalPrice = $price * (1 + ($taxRate / 100));

        switch ($discountType) {
            case 'flat': 
                $discountedPrice = $totalPrice - $discountAmount;
                break;
            case 'percentage':
                $discountPercentage = min(100, max(0, $discountAmount)); 
                $discountedPrice = $totalPrice - ($totalPrice * ($discountPercentage / 100));
                break;
            default:
                $discountedPrice = $totalPrice;
                break;
        }
        return $discountedPrice;
    }


}
