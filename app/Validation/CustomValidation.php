<?php
namespace App\Validation;
use App\Models\CategoryModel;

class CustomValidation
{
    public function valid_past_date(string $str): bool {
        $date = strtotime($str);
        return $date !== false && $date < time();
    }
    
    public function is_valid_category_foreign_key(string $str): bool
    {
        $model = new CategoryModel();
        if ($model->find((int)$str)) {
            return true;
        }
        
        return false;
    }
}