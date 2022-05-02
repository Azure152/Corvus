<?php 

require_once "Main.php";

/* <=== =====================================================
    Declaracion de rutas
===================================================== ===> */

Route::get( '/' , [Welcome::class, 'index'] );
Route::get( 'extras' , [Extra::class, 'index'] );

/* <=== ========= Rutas de Proyectos ========= ===> */

Route::get( 'projects/all' , [Project::class, 'all'] ); # Todos los proyectos
Route::get( 'projects/personal' , [Project::class, 'personal'] ); # Proyectos personales
Route::get( 'projects/college' , [Project::class, 'college'] ); # Proyectos universitarios

Route::get( 'projects/create' , [Project::class, 'create'] ); # Create
Route::post( 'projects/create' , [Project::class, 'store'] ); # Almacenar
Route::get( 'projects/edit/' , [Project::class, 'edit'] ); # Editar
Route::post( 'projects/update/' , [Project::class, 'update'] ); # Update
Route::post( 'projects/delete/' , [Project::class, 'delete'] ); # Delete / Destroy

/* <=== ========= Rutas de Tareas ========= ===> */

Route::get( 'homeworks' , [Homework::class, 'index'] ); # Read
Route::get( 'homeworks/create' , [Homework::class, 'create'] ); # Create
Route::post( 'homeworks/store' , [Homework::class, 'store'] ); # Almacenar
Route::get( 'homeworks/edit/' , [Homework::class, 'edit'] ); # Editar 
Route::post( 'homeworks/update/' , [Homework::class, 'update'] ); # Update
Route::post( 'homeworks/delete/' , [Homework::class, 'delete'] ); # Delete / Destroy

/* <=== ========= Rutas de actividades Extras ========= ===> */

Route::get( 'extras' , [Extra::class, 'index'] ); # Read
Route::get( 'extras/create' , [Extra::class, 'create'] ); # Create
Route::post( 'extras/store' , [Extra::class, 'store'] ); # Almacenar
Route::get( 'extras/edit/' , [Extra::class, 'edit'] ); # Editar 
Route::post( 'extras/update/' , [Extra::class, 'update'] ); # Update
Route::post( 'extras/delete/' , [Extra::class, 'delete'] ); # Delete / Destroy