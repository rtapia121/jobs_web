<?php

return [
    'admin-user' => [
        'title' => 'Users',

        'actions' => [
            'index' => 'Users',
            'create' => 'New User',
            'edit' => 'Edit :name',
            'edit_profile' => 'Edit Profile',
            'edit_password' => 'Edit Password',
        ],

        'columns' => [
            'id' => 'ID',
            'last_login_at' => 'Last login',
            'first_name' => 'First name',
            'last_name' => 'Last name',
            'email' => 'Email',
            'password' => 'Password',
            'password_repeat' => 'Password Confirmation',
            'activated' => 'Activated',
            'forbidden' => 'Forbidden',
            'language' => 'Language',

            //Belongs to many relations
            'roles' => 'Roles',

        ],
    ],

    'vacant' => [
        'title' => 'Vacants',

        'actions' => [
            'index' => 'Vacants',
            'create' => 'New Vacant',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'hiringOrganization' => 'Hiring Organization',
            'jobLocation' => 'Job Location',
            'validThrough' => 'Valid Through',
            'datePosted' => 'Date Posted',
            'optionalFilds' => 'Optional Filds',

        ],
    ],

    // Do not delete me :) I'm used for auto-generation
];
