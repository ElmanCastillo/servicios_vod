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

    'actor' => [
        'title' => 'Actors',

        'actions' => [
            'index' => 'Actors',
            'create' => 'New Actor',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'nacimiento' => 'Nacimiento',
            
        ],
    ],

    'reparto' => [
        'title' => 'Repartos',

        'actions' => [
            'index' => 'Repartos',
            'create' => 'New Reparto',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'actors_id' => 'Actors',
            'peliculas_id' => 'Peliculas',
            
        ],
    ],

    'tipopago' => [
        'title' => 'Tipopagos',

        'actions' => [
            'index' => 'Tipopagos',
            'create' => 'New Tipopago',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nombre' => 'Nombre',
            
        ],
    ],

    'genero' => [
        'title' => 'Generos',

        'actions' => [
            'index' => 'Generos',
            'create' => 'New Genero',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'genero' => 'Genero',
            
        ],
    ],

    'pelicula' => [
        'title' => 'Peliculas',

        'actions' => [
            'index' => 'Peliculas',
            'create' => 'New Pelicula',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'descripcion' => 'Descripcion',
            'duracion' => 'Duracion',
            'genero_id' => 'Genero',
            'director_id' => 'Director',
            
        ],
    ],

    'director' => [
        'title' => 'Directors',

        'actions' => [
            'index' => 'Directors',
            'create' => 'New Director',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nombre' => 'Nombre',
            
        ],
    ],

    'listapelicula' => [
        'title' => 'Listapeliculas',

        'actions' => [
            'index' => 'Listapeliculas',
            'create' => 'New Listapelicula',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'pelicula_id' => 'Pelicula',
            'venta_id' => 'Venta',
            
        ],
    ],

    'venta' => [
        'title' => 'Ventas',

        'actions' => [
            'index' => 'Ventas',
            'create' => 'New Venta',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'valor' => 'Valor',
            'fecha' => 'Fecha',
            'estado' => 'Estado',
            'users_id' => 'Users',
            'tipopagos_id' => 'Tipopagos',
            
        ],
    ],

    // Do not delete me :) I'm used for auto-generation
];