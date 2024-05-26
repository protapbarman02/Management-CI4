<?php

namespace App\Validation;


class ProductValidationRules
{
    public function getProductAddRules(): array
    {
        return [
            'name'=>[
                'rules'=>'required|min_length[3]|max_length[80]|is_unique[products.name]',
                'label'=>'Product Name',
                'errors'=>[
                    'required'=>'Please provide a Product name',
                    'min_length'=>'Product name should be minimum 3 characters',
                    'max_length'=>'Product name should be maximum 80 characters',
                    'is_unique'=>'Product name already exists'
                ]
            ],
            'category_id'=>[
                'rules'=>'required|is_natural_no_zero|is_valid_category_foreign_key',
                'label'=>'Category Id',
                'errors'=>[
                    'required'=>'Please provide a Category Id',
                    'is_natural_no_zero'=>'Invalid Category Id',
                    'is_valid_category_foreign_key'=>'Category not found'
                ]
            ],
            'img'=>[
                'rules'=>'max_size[img,1024]|is_image[img]',
                'label'=>'Image',
                'errors'=>[
                    'max_size'=>'Image is too large in size',
                    'is_image'=>'Invalid image'
                ],
            ],
            'description'=>[
                'rules'=>'max_length[4096]|min_length[10]',
                'label'=>'Description',
                'errors'=>[
                    'max_length'=>'Description is too large in size',
                    'min_length'=>'Description is too short'
                ],
            ]
        ];
    }
    
    public function getProductUpdateRules($id): array
    {
        return [
            'name'=>[
                'rules'=>'required|min_length[3]|max_length[80]|is_unique[products.name,id,'.$id.']',
                'label'=>'Product Name',
                'errors'=>[
                    'required'=>'Please provide a Product name',
                    'min_length'=>'Product name should be minimum 3 characters',
                    'max_length'=>'Product name should be maximum 80 characters',
                    'is_unique'=>'Product name already exists'
                ]
            ],
            'category_id'=>[
                'rules'=>'required|is_natural_no_zero|is_valid_category_foreign_key',
                'label'=>'Category Id',
                'errors'=>[
                    'required'=>'Please provide a Category Id',
                    'is_natural_no_zero'=>'Invalid Category Id',
                    'is_valid_category_foreign_key'=>'Category not found'
                ]
            ],
            'img'=>[
                'rules'=>'max_size[img,1024]|is_image[img]',
                'label'=>'Image',
                'errors'=>[
                    'max_size'=>'Image is too large in size',
                    'is_image'=>'Invalid image'
                ],
            ],
            'description'=>[
                'rules'=>'max_length[4096]|min_length[10]',
                'label'=>'Description',
                'errors'=>[
                    'max_length'=>'Description is too large in size',
                    'min_length'=>'Description is too short'
                ],
            ]
        ];
    }
}