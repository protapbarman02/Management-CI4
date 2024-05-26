<?php

namespace App\Validation;


class ValidationRules
{
    public function getSuperAdminAddUserRules(): array
    {
        return [
            'group' => [
                'rules'=>'required|in_list[superadmin,admin,customer,staff]',
                'label'=>'Group',
                'errors'=>[
                    'required'=>'Please provide a Group.',
                    'in_list'=> 'The Group(Role) field must contain a valid group: Superadmin, Admin, Customer, Staff.'
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
            'first_name' => [
                'rules' => 'required|min_length[3]|max_length[50]',
                'errors' => [
                    'required' => 'The First Name field is required.',
                    'min_length' => 'The First Name must be at least 3 characters long.',
                    'max_length' => 'The First Name cannot exceed 50 characters.'
                ]
            ],
            'last_name' => [
                'rules' => 'required|min_length[2]|max_length[50]',
                'errors' => [
                    'required' => 'The Last Name field is required.',
                    'min_length' => 'The Last Name must be at least 2 characters long.',
                    'max_length' => 'The Last Name cannot exceed 50 characters.'
                ]
            ],
            'email' => [
                'label' => 'Email Address', 
                'rules' => 'required|valid_email|is_unique[auth_identities.secret]',
                'errors'=>[
                    'required'=>'Please provide an Email Address',
                    'valid_email'=>'Invalid Email',
                    'is_unique'=>'Email already exists'
                ]
            ],
            'mobile' => [
                'rules' => 'required|regex_match[/^[0-9]{10}$/]',
                'errors' => [
                    'required' => 'The Mobile field is required.',
                    'regex_match' => 'The Mobile field must contain a valid phone number.'
                ]
            ],
            'username' => [
                'label' => 'Username', 
                'rules' => 'required|max_length[30]|min_length[6]|alpha_dash|is_unique[users.username]',
                'errors'=>[
                    'required'=>'Please provide an Username',
                    'max_length'=>'Username should be less than 30 characters',
                    'min_length'=>'Username should be at least 6 characters',
                    'alpha_dash'=>'Username can not contain special characters',
                    'is_unique'=>'Username is already taken'
                ]
            ],
            'password' => [
                'label' => 'Password', 
                'rules' => 'required|min_length[8]',
                'errors'=>[
                    'required'=>'Please provide a Password',
                    'min_length'=>'Password should be at least 8 characters'
                ]
            ],
            'address' => [
                'rules' => 'required|min_length[10]|max_length[255]',
                'errors' => [
                    'required' => 'The Address field is required.',
                    'min_length' => 'The Address must be at least 10 characters long.',
                    'max_length' => 'The Address cannot exceed 255 characters.'
                ]
            ],
            'gender' => [
                'rules' => 'required|in_list[Male,Female,Others]',
                'errors' => [
                    'required' => 'The Gender field is required.',
                    'in_list' => 'The Gender field must be male or female or others.'
                ]
            ],
            'dob' => [
                'rules' => 'required|valid_date[Y-m-d]|valid_past_date',
                'errors' => [
                    'required' => 'The Date of Birth field is required.',
                    'valid_date' => 'The Date of Birth field must contain a valid date (Y-m-d).',
                    'valid_past_date' => 'The Date of Birth must be a date in the past.'
                ]
            ],
        ];
    }
    
    public function getSuperAdminUpdateUserRules($id): array
    {
        return [
            'group' => [
                'rules'=>'required|in_list[superadmin,admin,customer,staff]',
                'label'=>'Group',
                'errors'=>[
                    'required'=>'Please provide a Group.',
                    'in_list'=> 'The Group(Role) field must contain a valid group: Superadmin, Admin, Customer, Staff.'
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
            'first_name' => [
                'rules' => 'required|min_length[3]|max_length[50]',
                'errors' => [
                    'required' => 'The First Name field is required.',
                    'min_length' => 'The First Name must be at least 3 characters long.',
                    'max_length' => 'The First Name cannot exceed 50 characters.'
                ]
            ],
            'last_name' => [
                'rules' => 'required|min_length[2]|max_length[50]',
                'errors' => [
                    'required' => 'The Last Name field is required.',
                    'min_length' => 'The Last Name must be at least 2 characters long.',
                    'max_length' => 'The Last Name cannot exceed 50 characters.'
                ]
            ],
            'email' => [
                'label' => 'Email Address', 
                'rules' => 'required|valid_email|is_unique[auth_identities.secret,user_id,'.$id.']',
                'errors'=>[
                    'required'=>'Please provide an Email Address',
                    'valid_email'=>'Invalid Email',
                    'is_unique'=>'Email already exists'
                ]
            ],
            'mobile' => [
                'rules' => 'required|regex_match[/^[0-9]{10}$/]',
                'errors' => [
                    'required' => 'The Mobile field is required.',
                    'regex_match' => 'The Mobile field must contain a valid phone number.'
                ]
            ],
            'username' => [
                'label' => 'Username', 
                'rules' => 'required|max_length[30]|min_length[6]|alpha_dash|is_unique[users.username,id,'.$id.']',
                'errors'=>[
                    'required'=>'Please provide an Username',
                    'max_length'=>'Username should be less than 30 characters',
                    'min_length'=>'Username should be at least 6 characters',
                    'alpha_dash'=>'Username can not contain special characters',
                    'is_unique'=>'Username is already taken'
                ]
            ],
            'address' => [
                'rules' => 'required|min_length[10]|max_length[255]',
                'errors' => [
                    'required' => 'The Address field is required.',
                    'min_length' => 'The Address must be at least 10 characters long.',
                    'max_length' => 'The Address cannot exceed 255 characters.'
                ]
            ],
            'gender' => [
                'rules' => 'required|in_list[Male,Female,Others]',
                'errors' => [
                    'required' => 'The Gender field is required.',
                    'in_list' => 'The Gender field must be male or female or others.'
                ]
            ],
            'dob' => [
                'rules' => 'required|valid_date[Y-m-d]|valid_past_date',
                'errors' => [
                    'required' => 'The Date of Birth field is required.',
                    'valid_date' => 'The Date of Birth field must contain a valid date (Y-m-d).',
                    'valid_past_date' => 'The Date of Birth must be a date in the past.'
                ]
            ],
        ];
    }
}
