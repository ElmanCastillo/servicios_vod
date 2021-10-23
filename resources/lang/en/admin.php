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
            'url' => 'Url',
            'thumb' => 'Thumb',
            
            
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

    'role' => [
        'title' => 'Roles',

        'actions' => [
            'index' => 'Roles',
            'create' => 'New Role',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            'guard_name' => 'Guard name',
            
        ],
    ],

    'cliente' => [
        'title' => 'Clientes',

        'actions' => [
            'index' => 'Clientes',
            'create' => 'New Cliente',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            
        ],
    ],

    'suscriptore' => [
        'title' => 'Suscriptores',

        'actions' => [
            'index' => 'Suscriptores',
            'create' => 'New Suscriptore',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            
        ],
    ],

    'user' => [
        'title' => 'Users',

        'actions' => [
            'index' => 'Users',
            'create' => 'New User',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            'email' => 'Email',
            'email_verified_at' => 'Email verified at',
            'password' => 'Password',
            
        ],
    ],

    'suscriptore' => [
        'title' => 'Suscriptores',

        'actions' => [
            'index' => 'Suscriptores',
            'create' => 'New Suscriptore',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'estado' => 'Estado',
            'users_id' => 'Users',
            
        ],
    ],

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

    'permission' => [
        'title' => 'Permissions',

        'actions' => [
            'index' => 'Permissions',
            'create' => 'New Permission',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            'guard_name' => 'Guard name',
            
        ],
    ],

    'user' => [
        'title' => 'Users',

        'actions' => [
            'index' => 'Users',
            'create' => 'New User',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            'email' => 'Email',
            'email_verified_at' => 'Email verified at',
            'password' => 'Password',
            
        ],
    ],

    'rol' => [
        'title' => 'Rols',

        'actions' => [
            'index' => 'Rols',
            'create' => 'New Rol',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            
        ],
    ],

    // Do not delete me :) I'm used for auto-generation
];