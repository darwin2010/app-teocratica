<?php

/*
|--------------------------------------------------------------------------
| Rutas Web
|--------------------------------------------------------------------------
|
| Aqui es donde se van a registrar las rutas de acceso en su orden jerargico segun el menu de navegacion
|
*/

Route::get('/', 'InicioController@index')->name("inicio"); //Ruta para ir a inicio
Route::get('seguridad/login', "Seguridad\LoginController@index")->name("login"); //Ruta para iniciar session
Route::post('seguridad/login', "Seguridad\LoginController@login")->name("login_post"); //Ruta para iniciar session
Route::get("seguridad/logout", "Seguridad\LoginController@logout")->name("logout"); //Ruta para cerrar session
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', "middleware" => ["auth", "superadmin"]], function (){
    Route::get("", "AdminController@index");
    /*----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
    /*----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
    /*----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
    /*RUTAS - CONFIGURACION - MENU (listar-guardar-guardar orden)*/
    Route::get('menu', 'MenuController@index')->name('menu'); //Ruta para listar datos del menu
    Route::post('menu', 'MenuController@guardar')->name('guardar_menu'); //Ruta para guardar datos del menu
    Route::post('menu/guardar-orden', 'MenuController@guardarOrden')->name('guardar_orden'); //Ruta para guardar el orden de los datos del menu
    /*----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
    /*----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
    /*RUTAS - CONFIGURACION - MENU-ROL (listar-guardar)*/
    Route::get('menu-rol', 'MenuRolController@index')->name('menu_rol'); //Ruta para listar datos del menu-rol
    Route::post('menu-rol', 'MenuRolController@guardar')->name('guardar_menu_rol'); //Ruta para guardar datos del menu-rol
    /*----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
    /*----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
    /*RUTAS - CONFIGURACION - ROLES (listar-crear-guardar-editar-actualizar-eliminar)*/
    Route::get('rol', 'RolController@index')->name('rol'); //Ruta para listar datos del rol
    Route::get('rol/crear', 'RolController@crear')->name('crear_rol'); //Ruta para crear datos del rol
    Route::post('rol', 'RolController@guardar')->name('guardar_rol'); //Ruta para guardar datos del rol
    Route::get("rol/{id}/editar", "RolController@editar")->name("editar_rol"); //Ruta para editar datos del rol
    Route::put("rol/{id}", "RolController@actualizar")->name("actualizar_rol"); //Ruta para actualizar datos del rol
    Route::delete("rol/{id}", "RolController@eliminar")->name("eliminar_rol"); //Ruta para eliminar datos del rol
    /*----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
    /*----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
    /*RUTAS - CONFIGURACION - PERMISOS (listar-crear-guardar-editar-actualizar-eliminar)*/
    Route::get('permiso', 'PermisoController@index')->name('permiso'); //Ruta para listar datos del permiso
    Route::get('permiso/crear', 'PermisoController@crear')->name('crear_permiso'); //Ruta para crear datos del permiso
    Route::post('permiso', 'PermisoController@guardar')->name('guardar_permiso'); //Ruta para guardar datos del permiso
    Route::get("permiso/{id}/editar", "PermisoController@editar")->name("editar_permiso"); //Ruta para editar datos del permiso
    Route::put("permiso/{id}", "PermisoController@actualizar")->name("actualizar_permiso"); //Ruta para actualizar datos del permiso
    Route::delete("permiso/{id}", "PermisoController@eliminar")->name("eliminar_permiso"); //Ruta para eliminar datos del permiso
    /*----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
    /*----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
    /*RUTAS - CONFIGURACION - PERMISO-ROL (listar-guardar)*/
    Route::get('permiso-rol', 'PermisoRolController@index')->name('permiso_rol'); //Ruta para listar datos del permiso-rol
    Route::post('permiso-rol', 'PermisoRolController@guardar')->name('guardar_permiso_rol'); //Ruta para guardar datos del permiso-rol
    /*----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
    /*----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
    /*----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
    
    /*RUTAS - ADMINISTRACION - USUARIOS (listar-crear-guardar-editar-actualizar-eliminar)*/
    Route::get('usuario', 'UsuarioController@index')->name('usuario'); //Ruta para listar datos del usuario
    Route::get('usuario/crear', 'UsuarioController@crear')->name('crear_usuario'); //Ruta para crear datos del usuario
    Route::post('usuario', 'UsuarioController@guardar')->name('guardar_usuario'); //Ruta para guardar datos del usuario
    Route::get("usuario/{id}/editar", "UsuarioController@editar")->name("editar_usuario"); //Ruta para editar datos del usaurio
    Route::put("usuario/{id}", "UsuarioController@actualizar")->name("actualizar_usuario"); //Ruta para actualizar datos del usaurio
    Route::delete("usuario/{id}", "UsuarioController@eliminar")->name("eliminar_usuario"); //Ruta para eliminar datos del usaurio
    /*----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
    /*----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
    /*RUTAS - ADMINISTRACION - HERMANOS (listar-crear-guardar-editar-actualizar-eliminar)*/
    Route::get('hermano', 'HermanoController@index')->name('hermano'); //Ruta para listar datos del hermano
    Route::get("hermano/{id}", "HermanoController@ver")->name("ver_hermano"); //Ruta para ver el hermano
    Route::get('hermano/crear', 'HermanoController@crear')->name('crear_hermano'); //Ruta para crear datos del hermano
    Route::post('hermano', 'HermanoController@guardar')->name('guardar_hermano'); //Ruta para guardar datos del hermano
    Route::get("hermano/{id}/editar", "HermanoController@editar")->name("editar_hermano"); //Ruta para editar datos del hermano
    Route::put("hermano/{id}", "HermanoController@actualizar")->name("actualizar_hermano"); //Ruta para actualizar datos del hermano
    Route::delete("hermano/{id}", "HermanoController@eliminar")->name("eliminar_hermano"); //Ruta para eliminar datos del hermano
    /*----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
    /*----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
    /*RUTAS - ADMINISTRACION - PRIVILEGIOS (listar-crear-guardar-editar-actualizar-eliminar)*/
    Route::get('privilegio', 'PrivilegioController@index')->name('privilegio'); //Ruta para listar datos del privilegio
    Route::get('privilegio/crear', 'PrivilegioController@crear')->name('crear_privilegio'); //Ruta para crear datos del privilegio
    Route::post('privilegio', 'PrivilegioController@guardar')->name('guardar_privilegio'); //Ruta para guardar datos del privilegio
    Route::get("privilegio/{id}/editar", "PrivilegioController@editar")->name("editar_privilegio"); //Ruta para editar datos del privilegio
    Route::put("privilegio/{id}", "PrivilegioController@actualizar")->name("actualizar_privilegio"); //Ruta para actualizar datos del privilegio
    Route::delete("privilegio/{id}", "PrivilegioController@eliminar")->name("eliminar_privilegio"); //Ruta para eliminar datos del privilegio
    /*----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
    /*----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
    /*RUTAS - ADMINISTRACION - GRUPOS (listar-crear-guardar-editar-actualizar-eliminar)*/
    Route::get('grupo', 'GrupoController@index')->name('grupo'); //Ruta para listar datos del grupo
    Route::get('grupo/crear', 'GrupoController@crear')->name('crear_grupo'); //Ruta para crear datos del grupo
    Route::post('grupo', 'GrupoController@guardar')->name('guardar_grupo'); //Ruta para guardar datos del grupo
    Route::get("grupo/{id}/editar", "GrupoController@editar")->name("editar_grupo"); //Ruta para editar datos del grupo
    Route::put("grupo/{id}", "GrupoController@actualizar")->name("actualizar_grupo"); //Ruta para actualizar datos del grupo
    Route::delete("grupo/{id}", "GrupoController@eliminar")->name("eliminar_grupo"); //Ruta para eliminar datos del grupo
    /*----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
    /*----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/  
    /*RUTAS - ADMINISTRACION - AÑOS (listar-crear-guardar-editar-actualizar-eliminar)*/
    Route::get('año', 'AñoController@index')->name('año'); //Ruta para listar datos el año
    Route::get('año/crear', 'AñoController@crear')->name('crear_año'); //Ruta para crear datos del año
    Route::post('año', 'AñoController@guardar')->name('guardar_año'); //Ruta para guardar datos del año
    Route::get("año/{id}/editar", "AñoController@editar")->name("editar_año"); //Ruta para editar datos del año
    Route::put("año/{id}", "AñoController@actualizar")->name("actualizar_año"); //Ruta para actualizar datos del año
    Route::delete("año/{id}", "AñoController@eliminar")->name("eliminar_año"); //Ruta para eliminar datos del año
    /*----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
    /*----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
    /*RUTAS - ADMINISTRACION - MESES (listar-crear-guardar-editar-actualizar-eliminar)*/
    Route::get('mes', 'MesController@index')->name('mes'); //Ruta para listar datos del mes
    Route::get('mes/crear', 'MesController@crear')->name('crear_mes');//Ruta para crear datos del mes
    Route::post('mes', 'MesController@guardar')->name('guardar_mes'); //Ruta para guardar datos del mes
    Route::get("mes/{id}/editar", "MesController@editar")->name("editar_mes"); //Ruta para editar datos del mes
    Route::put("mes/{id}", "MesController@actualizar")->name("actualizar_mes"); //Ruta para actualizar datos del mes
    Route::delete("mes/{id}", "MesController@eliminar")->name("eliminar_mes"); //Ruta para eliminar datos del mes
    /*----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
    /*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
    /*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
    
    /*RUTAS - GESTION ANCIANOS - HORAS (listar)*/
    Route::get('horas-2019/marzo', 'HorasController@horasA')->name('horas_marzo'); //Ruta para listar datos del mes de marzo del 2019
    Route::get('horas-2019/abril', 'HorasController@horasB')->name('horas_abril'); //Ruta para listar datos del mes de abril del 2019
    Route::get('horas-2019/mayo', 'HorasController@horasC')->name('horas_mayo'); //Ruta para listar datos del mes de mayo del 2019
    Route::get('horas-2019/junio', 'HorasController@horasD')->name('horas_junio'); //Ruta para listar datos del mes de junio del 2019
    Route::get('horas-2019/julio', 'HorasController@horasE')->name('horas_julio'); //Ruta para listar datos del mes de julio del 2019
    Route::get('horas-2019/agosto', 'HorasController@horasF')->name('horas_agosto'); //Ruta para listar datos del mes de agosto del 2019
    Route::get('horas-2019/general', 'HorasController@horasG')->name('horas_general'); //Ruta para listar datos del resumen general del 2019
    /*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
    Route::get('horas-2020/septiembre', 'HorasController@horasH')->name('horas_septiembre'); //Ruta para listar datos del mes de septiembre del 2020
    Route::get('horas-2020/octubre', 'HorasController@horasI')->name('horas_octubre'); //Ruta para listar datos del mes de octubre del 2020
    Route::get('horas-2020/noviembre', 'HorasController@horasJ')->name('horas_noviembre'); //Ruta para listar datos del mes de noviembre del 2020
    Route::get('horas-2020/diciembre', 'HorasController@horasK')->name('horas_diciembre'); //Ruta para listar datos del mes de diciembre del 2020
    Route::get('horas-2020/enero', 'HorasController@horasL')->name('horas_enero'); //Ruta para listar datos del mes de enero del 2020
    Route::get('horas-2020/febrero', 'HorasController@horasM')->name('horas_febrero'); //Ruta para listar datos del mes de febrero del 2020
    Route::get('horas-2020/marzo', 'HorasController@horasN')->name('horas_marzo'); //Ruta para listar datos del mes de marzo del 2020
    Route::get('horas-2020/abril', 'HorasController@horasO')->name('horas_abril'); //Ruta para listar datos del mes de abril del 2020
    Route::get('horas-2020/mayo', 'HorasController@horasP')->name('horas_mayo'); //Ruta para listar datos del mes de mayo del 2020
    Route::get('horas-2020/junio', 'HorasController@horasQ')->name('horas_junio'); //Ruta para listar datos del mes de junio del 2020
    Route::get('horas-2020/julio', 'HorasController@horasR')->name('horas_julio'); //Ruta para listar datos del mes de julio del 2020
    Route::get('horas-2020/agosto', 'HorasController@horasS')->name('horas_agosto'); //Ruta para listar datos del mes de agosto del 2020
    Route::get('horas-2020/general', 'HorasController@horasT')->name('horas_general'); //Ruta para listar datos del resumen general del 2020
    /*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
    Route::get('horas-2021/septiembre', 'HorasController@horasU')->name('horas_septiembre'); //Ruta para listar datos del mes de septiembre del 2021
    Route::get('horas-2021/octubre', 'HorasController@horasV')->name('horas_octubre'); //Ruta para listar datos del mes de octubre del 2021
    Route::get('horas-2021/noviembre', 'HorasController@horasW')->name('horas_noviembre'); //Ruta para listar datos del mes de noviembre del 2021
    Route::get('horas-2021/diciembre', 'HorasController@horasX')->name('horas_diciembre'); //Ruta para listar datos del mes de diciembre del 2021
    Route::get('horas-2021/enero', 'HorasController@horasY')->name('horas_enero'); //Ruta para listar datos del mes de enero del 2021
    Route::get('horas-2021/febrero', 'HorasController@horasZ')->name('horas_febrero'); //Ruta para listar datos del mes de febrero del 2021
    Route::get('horas-2021/marzo', 'HorasController@horasAA')->name('horas_marzo'); //Ruta para listar datos del mes de marzo del 2021
    Route::get('horas-2021/abril', 'HorasController@horasAB')->name('horas_abril'); //Ruta para listar datos del mes de abril del 2021
    Route::get('horas-2021/mayo', 'HorasController@horasAC')->name('horas_mayo'); //Ruta para listar datos del mes de mayo del 2021
    Route::get('horas-2021/junio', 'HorasController@horasAD')->name('horas_junio'); //Ruta para listar datos del mes de junio del 2021
    Route::get('horas-2021/julio', 'HorasController@horasAE')->name('horas_julio'); //Ruta para listar datos del mes de julio del 2021
    Route::get('horas-2021/agosto', 'HorasController@horasAF')->name('horas_agosto'); //Ruta para listar datos del mes de agosto del 2021
    Route::get('horas-2021/general', 'HorasController@horasAG')->name('horas_general'); //Ruta para listar datos del resumen general del 2021
    /*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
    /*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
    /*RUTAS - GESTION AUXILIARES - DIRECTORIO (listar)*/
    Route::get('directorio/grupo-1', 'DirectorioController@directorioA')->name('directorio_grupo1'); //Ruta para listar datos del grupo 1
    Route::get('directorio/grupo-2', 'DirectorioController@directorioB')->name('directorio_grupo2'); //Ruta para listar datos del grupo 2
    Route::get('directorio/grupo-3', 'DirectorioController@directorioC')->name('directorio_grupo3'); //Ruta para listar datos del grupo 3
    Route::get('directorio/grupo-4', 'DirectorioController@directorioD')->name('directorio_grupo4'); //Ruta para listar datos del grupo 4
    Route::get('directorio/grupo-5', 'DirectorioController@directorioE')->name('directorio_grupo5'); //Ruta para listar datos del grupo 5
    Route::get('directorio/grupo-6', 'DirectorioController@directorioF')->name('directorio_grupo6'); //Ruta para listar datos del grupo 6
    Route::get('directorio/general', 'DirectorioController@directorioG')->name('directorio_general'); //Ruta para listar datos generales
    /*----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
    /*----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
    /*RUTAS - GESTION AUXILIARES - INFORMES (listar-editar-actualizar)*/
    Route::get('informes-2019/grupo-1/marzo', 'InformesController@informesA')->name('informes2019_grupo1_marzo'); //Ruta para listar datos del 2019 del grupo 1 del mes de marzo
    Route::get('informes-2019/grupo-1/abril', 'InformesController@informesB')->name('informes2019_grupo1_abril'); //Ruta para listar datos del 2019 del grupo 1 del mes de abril
    Route::get('informes-2019/grupo-1/mayo', 'InformesController@informesC')->name('informes2019_grupo1_mayo'); //Ruta para listar datos del 2019 del grupo 1 del mes de mayo
    Route::get('informes-2019/grupo-1/junio', 'InformesController@informesD')->name('informes2019_grupo1_junio'); //Ruta para listar datos del 2019 del grupo 1 del mes de junio
    Route::get('informes-2019/grupo-1/julio', 'InformesController@informesE')->name('informes2019_grupo1_julio'); //Ruta para listar datos del 2019 del grupo 1 del mes de julio
    Route::get('informes-2019/grupo-1/agosto', 'InformesController@informesF')->name('informes2019_grupo1_agosto'); //Ruta para listar datos del 2019 del grupo 1 del mes de agosto
    //Rutas grupo 2 año 2019 para listar datos
    Route::get('informes-2019/grupo-2/marzo', 'InformesController@informesG')->name('informes2019_grupo2_marzo'); //Ruta para listar datos del 2019 del grupo 2 del mes de marzo
    Route::get('informes-2019/grupo-2/abril', 'InformesController@informesH')->name('informes2019_grupo2_abril'); //Ruta para listar datos del 2019 del grupo 2 del mes de abril
    Route::get('informes-2019/grupo-2/mayo', 'InformesController@informesI')->name('informes2019_grupo2_mayo'); //Ruta para listar datos del 2019 del grupo 2 del mes de mayo
    Route::get('informes-2019/grupo-2/junio', 'InformesController@informesJ')->name('informes2019_grupo2_junio'); //Ruta para listar datos del 2019 del grupo 2 del mes de junio
    Route::get('informes-2019/grupo-2/julio', 'InformesController@informesK')->name('informes2019_grupo2_julio'); //Ruta para listar datos del 2019 del grupo 2 del mes de julio
    Route::get('informes-2019/grupo-2/agosto', 'InformesController@informesL')->name('informes2019_grupo2_agosto'); //Ruta para listar datos del 2019 del grupo 2 del mes de agosto
    //Rutas grupo 3 año 2019 para listar datos
    Route::get('informes-2019/grupo-3/marzo', 'InformesController@informesM')->name('informes2019_grupo3_marzo'); //Ruta para listar datos del 2019 del grupo 3 del mes de marzo
    Route::get('informes-2019/grupo-3/abril', 'InformesController@informesN')->name('informes2019_grupo3_abril'); //Ruta para listar datos del 2019 del grupo 3 del mes de abril
    Route::get('informes-2019/grupo-3/mayo', 'InformesController@informesO')->name('informes2019_grupo3_mayo'); //Ruta para listar datos del 2019 del grupo 3 del mes de mayo
    Route::get('informes-2019/grupo-3/junio', 'InformesController@informesP')->name('informes2019_grupo3_junio'); //Ruta para listar datos del 2019 del grupo 3 del mes de junio
    Route::get('informes-2019/grupo-3/julio', 'InformesController@informesQ')->name('informes2019_grupo3_julio'); //Ruta para listar datos del 2019 del grupo 3 del mes de julio
    Route::get('informes-2019/grupo-3/agosto', 'InformesController@informesR')->name('informes2019_grupo3_agosto'); //Ruta para listar datos del 2019 del grupo 3 del mes de agosto
    //Rutas grupo 4 año 2019 para listar datos
    Route::get('informes-2019/grupo-4/marzo', 'InformesController@informesS')->name('informes2019_grupo4_marzo'); //Ruta para listar datos del 2019 del grupo 4 del mes de marzo
    Route::get('informes-2019/grupo-4/abril', 'InformesController@informesT')->name('informes2019_grupo4_abril'); //Ruta para listar datos del 2019 del grupo 4 del mes de abril
    Route::get('informes-2019/grupo-4/mayo', 'InformesController@informesU')->name('informes2019_grupo4_mayo'); //Ruta para listar datos del 2019 del grupo 4 del mes de mayo
    Route::get('informes-2019/grupo-4/junio', 'InformesController@informesV')->name('informes2019_grupo4_junio'); //Ruta para listar datos del 2019 del grupo 4 del mes de junio
    Route::get('informes-2019/grupo-4/julio', 'InformesController@informesW')->name('informes2019_grupo4_julio'); //Ruta para listar datos del 2019 del grupo 4 del mes de julio
    Route::get('informes-2019/grupo-4/agosto', 'InformesController@informesX')->name('informes2019_grupo4_agosto'); //Ruta para listar datos del 2019 del grupo 4 del mes de agosto
    //Rutas grupo 5 año 2019 para listar datos
    Route::get('informes-2019/grupo-5/marzo', 'InformesController@informesY')->name('informes2019_grupo5_marzo'); //Ruta para listar datos del 2019 del grupo 5 del mes de marzo
    Route::get('informes-2019/grupo-5/abril', 'InformesController@informesZ')->name('informes2019_grupo5_abril'); //Ruta para listar datos del 2019 del grupo 5 del mes de abril
    Route::get('informes-2019/grupo-5/mayo', 'InformesController@informesAA')->name('informes2019_grupo5_mayo'); //Ruta para listar datos del 2019 del grupo 5 del mes de mayo
    Route::get('informes-2019/grupo-5/junio', 'InformesController@informesAB')->name('informes2019_grupo5_junio'); //Ruta para listar datos del 2019 del grupo 5 del mes de junio
    Route::get('informes-2019/grupo-5/julio', 'InformesController@informesAC')->name('informes2019_grupo5_julio'); //Ruta para listar datos del 2019 del grupo 5 del mes de julio
    Route::get('informes-2019/grupo-5/agosto', 'InformesController@informesAD')->name('informes2019_grupo5_agosto'); //Ruta para listar datos del 2019 del grupo 5 del mes de agosto
    //Rutas grupo 6 año 2019 para listar datos
    Route::get('informes-2019/grupo-6/marzo', 'InformesController@informesAE')->name('informes2019_grupo6_marzo'); //Ruta para listar datos del 2019 del grupo 6 del mes de marzo
    Route::get('informes-2019/grupo-6/abril', 'InformesController@informesAF')->name('informes2019_grupo6_abril'); //Ruta para listar datos del 2019 del grupo 6 del mes de abril
    Route::get('informes-2019/grupo-6/mayo', 'InformesController@informesAG')->name('informes2019_grupo6_mayo'); //Ruta para listar datos del 2019 del grupo 6 del mes de mayo
    Route::get('informes-2019/grupo-6/junio', 'InformesController@informesAH')->name('informes2019_grupo6_junio'); //Ruta para listar datos del 2019 del grupo 6 del mes de junio
    Route::get('informes-2019/grupo-6/julio', 'InformesController@informesAI')->name('informes2019_grupo6_julio'); //Ruta para listar datos del 2019 del grupo 6 del mes de julio
    Route::get('informes-2019/grupo-6/agosto', 'InformesController@informesAJ')->name('informes2019_grupo6_agosto'); //Ruta para listar datos del 2019 del grupo 6 del mes de agosto
    /*----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
    //Rutas grupo 1 año 2020 para listar datos
    Route::get('informes-2020/grupo-1/septiembre', 'InformesController@informesAK')->name('informes2020_grupo1_septiembre'); //Ruta para listar datos del 2020 del grupo 1 del mes de septiembre
    Route::get('informes-2020/grupo-1/octubre', 'InformesController@informesAL')->name('informes2020_grupo1_octubre'); //Ruta para listar datos del 2020 del grupo 1 del mes de octubre
    Route::get('informes-2020/grupo-1/noviembre', 'InformesController@informesAM')->name('informes2020_grupo1_noviembre'); //Ruta para listar datos del 2020 del grupo 1 del mes de noviembre
    Route::get('informes-2020/grupo-1/diciembre', 'InformesController@informesAN')->name('informes2020_grupo1_diciembre'); //Ruta para listar datos del 2020 del grupo 1 del mes de diciembre
    Route::get('informes-2020/grupo-1/enero', 'InformesController@informesAO')->name('informes2020_grupo1_enero'); //Ruta para listar datos del 2020 del grupo 1 del mes de enero
    Route::get('informes-2020/grupo-1/febrero', 'InformesController@informesAP')->name('informes2020_grupo1_febrero'); //Ruta para listar datos del 2020 del grupo 1 del mes de febrero
    Route::get('informes-2020/grupo-1/marzo', 'InformesController@informesAQ')->name('informes2020_grupo1_marzo'); //Ruta para listar datos del 2020 del grupo 1 del mes de marzo
    Route::get('informes-2020/grupo-1/abril', 'InformesController@informesAR')->name('informes2020_grupo1_abril'); //Ruta para listar datos del 2020 del grupo 1 del mes de abril
    Route::get('informes-2020/grupo-1/mayo', 'InformesController@informesAS')->name('informes2020_grupo1_mayo'); //Ruta para listar datos del 2020 del grupo 1 del mes de mayo
    Route::get('informes-2020/grupo-1/junio', 'InformesController@informesAT')->name('informes2020_grupo1_junio'); //Ruta para listar datos del 2020 del grupo 1 del mes de junio
    Route::get('informes-2020/grupo-1/julio', 'InformesController@informesAU')->name('informes2020_grupo1_julio'); //Ruta para listar datos del 2020 del grupo 1 del mes de julio
    Route::get('informes-2020/grupo-1/agosto', 'InformesController@informesAV')->name('informes2020_grupo1_agosto'); //Ruta para listar datos del 2020 del grupo 1 del mes de agosto
    //Rutas grupo 2 año 2020 para listar datos
    Route::get('informes-2020/grupo-2/septiembre', 'InformesController@informesAW')->name('informes2020_grupo2_septiembre'); //Ruta para listar datos del 2020 del grupo 2 del mes de septiembre
    Route::get('informes-2020/grupo-2/octubre', 'InformesController@informesAX')->name('informes2020_grupo2_octubre'); //Ruta para listar datos del 2020 del grupo 2 del mes de octubre
    Route::get('informes-2020/grupo-2/noviembre', 'InformesController@informesAY')->name('informes2020_grupo2_noviembre'); //Ruta para listar datos del 2020 del grupo 2 del mes de noviembre
    Route::get('informes-2020/grupo-2/diciembre', 'InformesController@informesAZ')->name('informes2020_grupo2_diciembre'); //Ruta para listar datos del 2020 del grupo 2 del mes de diciembre
    Route::get('informes-2020/grupo-2/enero', 'InformesController@informesBA')->name('informes2020_grupo2_enero'); //Ruta para listar datos del 2020 del grupo 2 del mes de enero
    Route::get('informes-2020/grupo-2/febrero', 'InformesController@informesBB')->name('informes2020_grupo2_febrero'); //Ruta para listar datos del 2020 del grupo 2 del mes de febrero
    Route::get('informes-2020/grupo-2/marzo', 'InformesController@informesBC')->name('informes2020_grupo2_marzo'); //Ruta para listar datos del 2020 del grupo 2 del mes de marzo
    Route::get('informes-2020/grupo-2/abril', 'InformesController@informesBD')->name('informes2020_grupo2_abril'); //Ruta para listar datos del 2020 del grupo 2 del mes de abril
    Route::get('informes-2020/grupo-2/mayo', 'InformesController@informesBE')->name('informes2020_grupo2_mayo'); //Ruta para listar datos del 2020 del grupo 2 del mes de mayo
    Route::get('informes-2020/grupo-2/junio', 'InformesController@informesBF')->name('informes2020_grupo2_junio'); //Ruta para listar datos del 2020 del grupo 2 del mes de junio
    Route::get('informes-2020/grupo-2/julio', 'InformesController@informesBG')->name('informes2020_grupo2_julio'); //Ruta para listar datos del 2020 del grupo 2 del mes de julio
    Route::get('informes-2020/grupo-2/agosto', 'InformesController@informesBH')->name('informes2020_grupo2_agosto'); //Ruta para listar datos del 2020 del grupo 2 del mes de agosto
    //Rutas grupo 3 año 2020 para listar datos
    Route::get('informes-2020/grupo-3/septiembre', 'InformesController@informesBI')->name('informes2020_grupo3_septiembre'); //Ruta para listar datos del 2020 del grupo 3 del mes de septiembre
    Route::get('informes-2020/grupo-3/octubre', 'InformesController@informesBJ')->name('informes2020_grupo3_octubre'); //Ruta para listar datos del 2020 del grupo 3 del mes de octubre
    Route::get('informes-2020/grupo-3/noviembre', 'InformesController@informesBK')->name('informes2020_grupo3_noviembre'); //Ruta para listar datos del 2020 del grupo 3 del mes de noviembre
    Route::get('informes-2020/grupo-3/diciembre', 'InformesController@informesBL')->name('informes2020_grupo3_diciembre'); //Ruta para listar datos del 2020 del grupo 3 del mes de diciembre
    Route::get('informes-2020/grupo-3/enero', 'InformesController@informesBM')->name('informes2020_grupo3_enero'); //Ruta para listar datos del 2020 del grupo 3 del mes de enero
    Route::get('informes-2020/grupo-3/febrero', 'InformesController@informesBN')->name('informes2020_grupo3_febrero'); //Ruta para listar datos del 2020 del grupo 3 del mes de febrero
    Route::get('informes-2020/grupo-3/marzo', 'InformesController@informesBO')->name('informes2020_grupo3_marzo'); //Ruta para listar datos del 2020 del grupo 3 del mes de marzo
    Route::get('informes-2020/grupo-3/abril', 'InformesController@informesBP')->name('informes2020_grupo3_abril'); //Ruta para listar datos del 2020 del grupo 3 del mes de abril
    Route::get('informes-2020/grupo-3/mayo', 'InformesController@informesBQ')->name('informes2020_grupo3_mayo'); //Ruta para listar datos del 2020 del grupo 3 del mes de mayo
    Route::get('informes-2020/grupo-3/junio', 'InformesController@informesBR')->name('informes2020_grupo3_junio'); //Ruta para listar datos del 2020 del grupo 3 del mes de junio
    Route::get('informes-2020/grupo-3/julio', 'InformesController@informesBS')->name('informes2020_grupo3_julio'); //Ruta para listar datos del 2020 del grupo 3 del mes de julio
    Route::get('informes-2020/grupo-3/agosto', 'InformesController@informesBT')->name('informes2020_grupo3_agosto'); //Ruta para listar datos del 2020 del grupo 3 del mes de agosto
     //Rutas grupo 4 año 2020 para listar datos
     Route::get('informes-2020/grupo-4/septiembre', 'InformesController@informesBU')->name('informes2020_grupo4_septiembre'); //Ruta para listar datos del 2020 del grupo 4 del mes de septiembre
     Route::get('informes-2020/grupo-4/octubre', 'InformesController@informesBV')->name('informes2020_grupo4_octubre'); //Ruta para listar datos del 2020 del grupo 4 del mes de octubre
     Route::get('informes-2020/grupo-4/noviembre', 'InformesController@informesBW')->name('informes2020_grupo4_noviembre'); //Ruta para listar datos del 2020 del grupo 4 del mes de noviembre
     Route::get('informes-2020/grupo-4/diciembre', 'InformesController@informesBX')->name('informes2020_grupo4_diciembre'); //Ruta para listar datos del 2020 del grupo 4 del mes de diciembre
     Route::get('informes-2020/grupo-4/enero', 'InformesController@informesBY')->name('informes2020_grupo4_enero'); //Ruta para listar datos del 2020 del grupo 4 del mes de enero
     Route::get('informes-2020/grupo-4/febrero', 'InformesController@informesBZ')->name('informes2020_grupo4_febrero'); //Ruta para listar datos del 2020 del grupo 4 del mes de febrero
     Route::get('informes-2020/grupo-4/marzo', 'InformesController@informesCA')->name('informes2020_grupo4_marzo'); //Ruta para listar datos del 2020 del grupo 4 del mes de marzo
     Route::get('informes-2020/grupo-4/abril', 'InformesController@informesCB')->name('informes2020_grupo4_abril'); //Ruta para listar datos del 2020 del grupo 4 del mes de abril
     Route::get('informes-2020/grupo-4/mayo', 'InformesController@informesCC')->name('informes2020_grupo4_mayo'); //Ruta para listar datos del 2020 del grupo 4 del mes de mayo
     Route::get('informes-2020/grupo-4/junio', 'InformesController@informesCD')->name('informes2020_grupo4_junio'); //Ruta para listar datos del 2020 del grupo 4 del mes de junio
     Route::get('informes-2020/grupo-4/julio', 'InformesController@informesCE')->name('informes2020_grupo4_julio'); //Ruta para listar datos del 2020 del grupo 4 del mes de julio
     Route::get('informes-2020/grupo-4/agosto', 'InformesController@informesCF')->name('informes2020_grupo4_agosto'); //Ruta para listar datos del 2020 del grupo 4 del mes de agosto
    //Rutas grupo 5 año 2020 para listar datos
    Route::get('informes-2020/grupo-5/septiembre', 'InformesController@informesCG')->name('informes2020_grupo4_septiembre'); //Ruta para listar datos del 2020 del grupo 4 del mes de septiembre
    Route::get('informes-2020/grupo-5/octubre', 'InformesController@informesCH')->name('informes2020_grupo4_octubre'); //Ruta para listar datos del 2020 del grupo 4 del mes de octubre
    Route::get('informes-2020/grupo-5/noviembre', 'InformesController@informesCI')->name('informes2020_grupo4_noviembre'); //Ruta para listar datos del 2020 del grupo 4 del mes de noviembre
    Route::get('informes-2020/grupo-5/diciembre', 'InformesController@informesCJ')->name('informes2020_grupo4_diciembre'); //Ruta para listar datos del 2020 del grupo 4 del mes de diciembre
    Route::get('informes-2020/grupo-5/enero', 'InformesController@informesCK')->name('informes2020_grupo4_enero'); //Ruta para listar datos del 2020 del grupo 4 del mes de enero
    Route::get('informes-2020/grupo-5/febrero', 'InformesController@informesCL')->name('informes2020_grupo4_febrero'); //Ruta para listar datos del 2020 del grupo 4 del mes de febrero
    Route::get('informes-2020/grupo-5/marzo', 'InformesController@informesCM')->name('informes2020_grupo4_marzo'); //Ruta para listar datos del 2020 del grupo 4 del mes de marzo
    Route::get('informes-2020/grupo-5/abril', 'InformesController@informesCN')->name('informes2020_grupo4_abril'); //Ruta para listar datos del 2020 del grupo 4 del mes de abril
    Route::get('informes-2020/grupo-5/mayo', 'InformesController@informesCO')->name('informes2020_grupo4_mayo'); //Ruta para listar datos del 2020 del grupo 4 del mes de mayo
    Route::get('informes-2020/grupo-5/junio', 'InformesController@informesCP')->name('informes2020_grupo4_junio'); //Ruta para listar datos del 2020 del grupo 4 del mes de junio
    Route::get('informes-2020/grupo-5/julio', 'InformesController@informesCQ')->name('informes2020_grupo4_julio'); //Ruta para listar datos del 2020 del grupo 4 del mes de julio
    Route::get('informes-2020/grupo-5/agosto', 'InformesController@informesCR')->name('informes2020_grupo4_agosto'); //Ruta para listar datos del 2020 del grupo 4 del mes de agosto
    //Rutas grupo 6 año 2020 para listar datos
    Route::get('informes-2020/grupo-6/septiembre', 'InformesController@informesCT')->name('informes2020_grupo6_septiembre'); //Ruta para listar datos del 2020 del grupo 6 del mes de septiembre
    Route::get('informes-2020/grupo-6/octubre', 'InformesController@informesCU')->name('informes2020_grupo6_octubre'); //Ruta para listar datos del 2020 del grupo 6 del mes de octubre
    Route::get('informes-2020/grupo-6/noviembre', 'InformesController@informesCV')->name('informes2020_grupo6_noviembre'); //Ruta para listar datos del 2020 del grupo 6 del mes de noviembre
    Route::get('informes-2020/grupo-6/diciembre', 'InformesController@informesCW')->name('informes2020_grupo6_diciembre'); //Ruta para listar datos del 2020 del grupo 6 del mes de diciembre
    Route::get('informes-2020/grupo-6/enero', 'InformesController@informesCX')->name('informes2020_grupo6_enero'); //Ruta para listar datos del 2020 del grupo 6 del mes de enero
    Route::get('informes-2020/grupo-6/febrero', 'InformesController@informesCY')->name('informes2020_grupo6_febrero'); //Ruta para listar datos del 2020 del grupo 6 del mes de febrero
    Route::get('informes-2020/grupo-6/marzo', 'InformesController@informesCZ')->name('informes2020_grupo6_marzo'); //Ruta para listar datos del 2020 del grupo 6 del mes de marzo
    Route::get('informes-2020/grupo-6/abril', 'InformesController@informesDA')->name('informes2020_grupo6_abril'); //Ruta para listar datos del 2020 del grupo 6 del mes de abril
    Route::get('informes-2020/grupo-6/mayo', 'InformesController@informesDB')->name('informes2020_grupo6_mayo'); //Ruta para listar datos del 2020 del grupo 6 del mes de mayo
    Route::get('informes-2020/grupo-6/junio', 'InformesController@informesDC')->name('informes2020_grupo6_junio'); //Ruta para listar datos del 2020 del grupo 6 del mes de junio
    Route::get('informes-2020/grupo-6/julio', 'InformesController@informesDD')->name('informes2020_grupo6_julio'); //Ruta para listar datos del 2020 del grupo 6 del mes de julio
    Route::get('informes-2020/grupo-6/agosto', 'InformesController@informesDE')->name('informes2020_grupo6_agosto'); //Ruta para listar datos del 2020 del grupo 6 del mes de agosto
    /*----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
    //Rutas grupo 1 año 2021 para listar datos
    Route::get('informes-2021/grupo-1/septiembre', 'InformesController@informesDF')->name('informes2021_grupo1_septiembre'); //Ruta para listar datos del 2021 del grupo 1 del mes de septiembre
    Route::get('informes-2021/grupo-1/octubre', 'InformesController@informesDG')->name('informes2021_grupo1_octubre'); //Ruta para listar datos del 2021 del grupo 1 del mes de octubre
    Route::get('informes-2021/grupo-1/noviembre', 'InformesController@informesDH')->name('informes2021_grupo1_noviembre'); //Ruta para listar datos del 2021 del grupo 1 del mes de noviembre
    Route::get('informes-2021/grupo-1/diciembre', 'InformesController@informesDI')->name('informes2021_grupo1_diciembre'); //Ruta para listar datos del 2021 del grupo 1 del mes de diciembre
    Route::get('informes-2021/grupo-1/enero', 'InformesController@informesDJ')->name('informes2021_grupo1_enero'); //Ruta para listar datos del 2021 del grupo 1 del mes de enero
    Route::get('informes-2021/grupo-1/febrero', 'InformesController@informesDK')->name('informes2021_grupo1_febrero'); //Ruta para listar datos del 2021 del grupo 1 del mes de febrero
    Route::get('informes-2021/grupo-1/marzo', 'InformesController@informesDL')->name('informes2021_grupo1_marzo'); //Ruta para listar datos del 2021 del grupo 1 del mes de marzo
    Route::get('informes-2021/grupo-1/abril', 'InformesController@informesDM')->name('informes2021_grupo1_abril'); //Ruta para listar datos del 2021 del grupo 1 del mes de abril
    Route::get('informes-2021/grupo-1/mayo', 'InformesController@informesDN')->name('informes2021_grupo1_mayo'); //Ruta para listar datos del 2021 del grupo 1 del mes de mayo
    Route::get('informes-2021/grupo-1/junio', 'InformesController@informesDO')->name('informes2021_grupo1_junio'); //Ruta para listar datos del 2021 del grupo 1 del mes de junio
    Route::get('informes-2021/grupo-1/julio', 'InformesController@informesDP')->name('informes2021_grupo1_julio'); //Ruta para listar datos del 2021 del grupo 1 del mes de julio
    Route::get('informes-2021/grupo-1/agosto', 'InformesController@informesDQ')->name('informes2021_grupo1_agosto'); //Ruta para listar datos del 2021 del grupo 1 del mes de agosto
    /*----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
    //Rutas grupo 2 año 2021 para listar datos
    Route::get('informes-2021/grupo-2/septiembre', 'InformesController@informesDR')->name('informes2021_grupo2_septiembre'); //Ruta para listar datos del 2021 del grupo 2 del mes de septiembre
    Route::get('informes-2021/grupo-2/octubre', 'InformesController@informesDS')->name('informes2021_grupo2_octubre'); //Ruta para listar datos del 2021 del grupo 2 del mes de octubre
    Route::get('informes-2021/grupo-2/noviembre', 'InformesController@informesDT')->name('informes2021_grupo2_noviembre'); //Ruta para listar datos del 2021 del grupo 2 del mes de noviembre
    Route::get('informes-2021/grupo-2/diciembre', 'InformesController@informesDU')->name('informes2021_grupo2_diciembre'); //Ruta para listar datos del 2021 del grupo 2 del mes de diciembre
    Route::get('informes-2021/grupo-2/enero', 'InformesController@informesDV')->name('informes2021_grupo2_enero'); //Ruta para listar datos del 2021 del grupo 2 del mes de enero
    Route::get('informes-2021/grupo-2/febrero', 'InformesController@informesDW')->name('informes2021_grupo2_febrero'); //Ruta para listar datos del 2021 del grupo 2 del mes de febrero
    Route::get('informes-2021/grupo-2/marzo', 'InformesController@informesDX')->name('informes2021_grupo2_marzo'); //Ruta para listar datos del 2021 del grupo 2 del mes de marzo
    Route::get('informes-2021/grupo-2/abril', 'InformesController@informesDY')->name('informes2021_grupo2_abril'); //Ruta para listar datos del 2021 del grupo 2 del mes de abril
    Route::get('informes-2021/grupo-2/mayo', 'InformesController@informesDZ')->name('informes2021_grupo2_mayo'); //Ruta para listar datos del 2021 del grupo 2 del mes de mayo
    Route::get('informes-2021/grupo-2/junio', 'InformesController@informesEA')->name('informes2021_grupo2_junio'); //Ruta para listar datos del 2021 del grupo 2 del mes de junio
    Route::get('informes-2021/grupo-2/julio', 'InformesController@informesEB')->name('informes2021_grupo2_julio'); //Ruta para listar datos del 2021 del grupo 2 del mes de julio
    Route::get('informes-2021/grupo-2/agosto', 'InformesController@informesEC')->name('informes2021_grupo2_agosto'); //Ruta para listar datos del 2021 del grupo 2 del mes de agosto
    /*----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
    //Rutas grupo 3 año 2021 para listar datos
    Route::get('informes-2021/grupo-3/septiembre', 'InformesController@informesED')->name('informes2021_grupo2_septiembre'); //Ruta para listar datos del 2021 del grupo 2 del mes de septiembre
    Route::get('informes-2021/grupo-3/octubre', 'InformesController@informesEE')->name('informes2021_grupo2_octubre'); //Ruta para listar datos del 2021 del grupo 2 del mes de octubre
    Route::get('informes-2021/grupo-3/noviembre', 'InformesController@informesEF')->name('informes2021_grupo2_noviembre'); //Ruta para listar datos del 2021 del grupo 2 del mes de noviembre
    Route::get('informes-2021/grupo-3/diciembre', 'InformesController@informesEG')->name('informes2021_grupo2_diciembre'); //Ruta para listar datos del 2021 del grupo 2 del mes de diciembre
    Route::get('informes-2021/grupo-3/enero', 'InformesController@informesEH')->name('informes2021_grupo2_enero'); //Ruta para listar datos del 2021 del grupo 2 del mes de enero
    Route::get('informes-2021/grupo-3/febrero', 'InformesController@informesEI')->name('informes2021_grupo2_febrero'); //Ruta para listar datos del 2021 del grupo 2 del mes de febrero
    Route::get('informes-2021/grupo-3/marzo', 'InformesController@informesEJ')->name('informes2021_grupo2_marzo'); //Ruta para listar datos del 2021 del grupo 2 del mes de marzo
    Route::get('informes-2021/grupo-3/abril', 'InformesController@informesEK')->name('informes2021_grupo2_abril'); //Ruta para listar datos del 2021 del grupo 2 del mes de abril
    Route::get('informes-2021/grupo-3/mayo', 'InformesController@informesEL')->name('informes2021_grupo2_mayo'); //Ruta para listar datos del 2021 del grupo 2 del mes de mayo
    Route::get('informes-2021/grupo-3/junio', 'InformesController@informesEM')->name('informes2021_grupo2_junio'); //Ruta para listar datos del 2021 del grupo 2 del mes de junio
    Route::get('informes-2021/grupo-3/julio', 'InformesController@informesEN')->name('informes2021_grupo2_julio'); //Ruta para listar datos del 2021 del grupo 2 del mes de julio
    Route::get('informes-2021/grupo-3/agosto', 'InformesController@informesEO')->name('informes2021_grupo2_agosto'); //Ruta para listar datos del 2021 del grupo 2 del mes de agosto







    //Rutas grupo 1 año 2020 para editar datos
    Route::get('informes/{id}/editar-2020/grupo1/junio', 'InformesController@edtarA')->name('editar2020_grupo1_junio');
    Route::get('informes/{id}/editar-2020/grupo1/julio', 'InformesController@editarB')->name('editar2020_grupo1_julio');
    Route::get('informes/{id}/editar-2020/grupo1/agosto', 'InformesController@editarC')->name('editar2020_grupo1_agosto');
    //Rutas grupo 2 año 2020 para editar datos
    Route::get('informes/{id}/editar-2020/grupo2/junio', 'InformesController@geitarD')->name('editar2020_grupo2_junio');
    Route::get('informes/{id}/editar-2020/grupo2/julio', 'InformesController@editarE')->name('editar2020_grupo2_julio');
    Route::get('informes/{id}/editar-2020/grupo2/agosto', 'InformesController@editarF')->name('editar2020_grupo2_agosto');
    //Rutas grupo 3 año 2020 para editar datos
    Route::get('informes/{id}/editar-2020/grupo3/junio', 'InformesController@geitarG')->name('editar2020_grupo3_junio');
    Route::get('informes/{id}/editar-2020/grupo3/julio', 'InformesController@editarH')->name('editar2020_grupo3_julio');
    Route::get('informes/{id}/editar-2020grupo-3/agosto', 'InformesController@editarI')->name('editar2020_grupo3_agosto');
    //Rutas grupo 4 año 2020 para editar datos
    Route::get('informes/{id}/editar-2020/grupo-4/junio', 'InformesController@geitarJ')->name('editar2020_grupo4_junio');
    Route::get('informes/{id}/editar-2020/grupo-4/julio', 'InformesController@editarK')->name('editar2020_grupo4_julio');
    Route::get('informes/{id}/editar-2020/grupo-4/agosto', 'InformesController@editarL')->name('editar2020_grupo4_agosto');
    //Rutas grupo 5 año 2020 para editar datos
    Route::get('informes/{id}/editar-2020/grupo-5/junio', 'InformesController@geitarM')->name('editar2020_grupo5_junio');
    Route::get('informes/{id}/editar-2020/grupo-5/julio', 'InformesController@editarN')->name('editar2020_grupo5_julio');
    Route::get('informes/{id}/editar-2020/grupo-5/agosto', 'InformesController@editarO')->name('editar2020_grupo5_agosto');
    //Rutas grupo 6 año 2020 para editar datos
    Route::get('informes/{id}/editar-2020/grupo-6/junio', 'InformesController@geitarP')->name('editar2020_grupo6_junio');
    Route::get('informes/{id}/editar-2020/grupo-6/julio', 'InformesController@editarQ')->name('editar2020_grupo6_julio');
    Route::get('informes/{id}/editar-2020/grupo-6/agosto', 'InformesController@editarR')->name('editar2020_grupo6_agosto');
    
    Route::get('informes/crear', 'InformesController@crear')->name('crear_informe');

    //Rutas grupo 1 año 2020 para guardar datos
    Route::post('informes-2020/grupo-1/junio', 'InformesController@guardarA')->name('guardar2020_grupo1_junio');
    Route::post('informes-2019/grupo-1/abril', 'InformesController@guardarB')->name('guardar2019_grupo1_abril');
    Route::post('informes-2020/grupo-1/agosto', 'InformesController@guardarC')->name('guardar2020_grupo1_agosto');
    //Rutas grupo 2 año 2020 para guardar datos
    Route::post('informes-2020/grupo-2/junio', 'InformesController@guardarD')->name('guardar2020_grupo2_junio');
    Route::post('informes-2020/grupo-2/julio', 'InformesController@guardarE')->name('guardar2020_grupo2_julio');
    Route::post('informes-2020/grupo-2/agosto', 'InformesController@guardarF')->name('guardar2020_grupo2_agosto');
    //Rutas grupo 3 año 2020 para guardar datos
    Route::post('informes-2020/grupo-3/junio', 'InformesController@guardarG')->name('guardar2020_grupo3_junio');
    Route::post('informes-2020/grupo-3/julio', 'InformesController@guardarH')->name('guardar2020_grupo3_julio');
    Route::post('informes-2020/grupo-3/agosto', 'InformesController@guardarI')->name('guardar2020_grupo3_agosto');
    //Rutas grupo 4 año 2020 para guardar datos
    Route::post('informes-2020/grupo-4/junio', 'InformesController@guardarJ')->name('guardar2020_grupo4_junio');
    Route::post('informes-2020/grupo-4/julio', 'InformesController@guardarK')->name('guardar2020_grupo4_julio');
    Route::post('informes-2020/grupo-4/agosto', 'InformesController@guardarL')->name('guardar2020_grupo4_agosto');
    //Rutas grupo 5 año 2020 para guardar datos
    Route::post('informes-2020/grupo-5/junio', 'InformesController@guardarM')->name('guardar2020_grupo5_junio');
    Route::post('informes-2020/grupo-5/julio', 'InformesController@guardarN')->name('guardar2020_grupo5_julio');
    Route::post('informes-2020/grupo-5/agosto', 'InformesController@guardarO')->name('guardar2020_grupo5_agosto');
    //Rutas grupo 6 año 2020 para guardar datos
    Route::post('informes-2020/grupo-6/junio', 'InformesController@guardarP')->name('guardar2020_grupo6_junio');
    Route::post('informes-2020/grupo-6/julio', 'InformesController@guardarQ')->name('guardar2020_grupo6_julio');
    Route::post('informes-2020/grupo-6/agosto', 'InformesController@guardarR')->name('guardar2020_grupo6_agosto');

    //Rutas grupo 1 año 2020 para actualizar los datos
    Route::put('informes-2020/grupo-1/junio/{id}', 'InformesController@actualizarA')->name('actualizar2020_grupo1_junio');
    Route::put('informes-2020/grupo-1/julio/{id}', 'InformesController@actualizarB')->name('actualizar2020_grupo1_julio');
    Route::put('informes-2020/grupo-1/agosto/{id}', 'InformesController@actualizarC')->name('actualizar2020_grupo1_agosto');
    //Rutas grupo 2 año 2020 para actualizar los datos
    Route::put('informes-2020/grupo-2/junio/{id}', 'InformesController@actualizarD')->name('actualizar2020_grupo2_junio');
    Route::put('informes-2020/grupo-2/julio/{id}', 'InformesController@actualizarE')->name('actualizar2020_grupo2_julio');
    Route::put('informes-2020/grupo-2/agosto/{id}', 'InformesController@actualizarF')->name('actualizar2020_grupo2_agosto');
    //Rutas grupo 3 año 2020 para actualizar los datos
    Route::put('informes-2020/grupo-3/junio/{id}', 'InformesController@actualizarG')->name('actualizar2020_grupo3_junio');
    Route::put('informes-2020/grupo-3/julio/{id}', 'InformesController@actualizarH')->name('actualizar2020_grupo3_julio');
    Route::put('informes-2020/grupo-3/agosto/{id}', 'InformesController@actualizarI')->name('actualizar2020_grupo3_agosto');
    //Rutas grupo 4 año 2020 para actualizar los datos
    Route::put('informes-2020/grupo-4/junio/{id}', 'InformesController@actualizarJ')->name('actualizar2020_grupo4_junio');
    Route::put('informes-2020/grupo-4/julio/{id}', 'InformesController@actualizarK')->name('actualizar2020_grupo4_julio');
    Route::put('informes-2020/grupo-4/agosto/{id}', 'InformesController@actualizarL')->name('actualizar2020_grupo4_agosto');
    //Rutas grupo 5 año 2020 para actualizar los datos
    Route::put('informes-2020/grupo-5/junio/{id}', 'InformesController@actualizarM')->name('actualizar2020_grupo5_junio');
    Route::put('informes-2020/grupo-5/julio/{id}', 'InformesController@actualizarN')->name('actualizar2020_grupo5_julio');
    Route::put('informes-2020/grupo-5/agosto/{id}', 'InformesController@actualizarO')->name('actualizar2020_grupo5_agosto');
    //Rutas grupo 6 año 2020 para actualizar los datos
    Route::put('informes-2020/grupo-6/junio/{id}', 'InformesController@actualizarP')->name('actualizar2020_grupo6_junio');
    Route::put('informes-2020/grupo-6/julio/{id}', 'InformesController@actualizarQ')->name('actualizar2020_grupo6_julio');
    Route::put('informes-2020/grupo-6/agosto/{id}', 'InformesController@actualizarR')->name('actualizar2020_grupo6_agosto');
    /*----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/





    /*----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
    /*----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
    /*RUTAS - GESTION AUXILIARES - ASISTENCIA A LAS REUNIONES (listar-editar-actualizar)*/
    Route::get('asistencia-2019', 'AsistenciaController@asistenciaA')->name('asistencia_2019'); //Ruta para listar datos del 2019
    Route::get('asistencia-2020', 'AsistenciaController@asistenciaB')->name('asistencia_2020'); //Ruta para listar datos del 2020
    Route::get('asistencia-2021', 'AsistenciaController@asistenciaC')->name('asistencia_2021'); //Ruta para listar datos del 2021
    Route::post('asistencia-2021', 'AsistenciaController@guardarA')->name('guardar_2021'); //Ruta para guardar datos del 2021
    Route::get("asistencia/{id}/editar-2021", "AsistenciaController@editarA")->name("editar_2021"); //Ruta para editar datos del 2021
    Route::put("asistencia-2021/{id}", "AsistenciaController@actualizarA")->name("actualizar_2021"); //Ruta para actualizar datos del 2021
    /*----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
    /*----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
    /*----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
    /*RUTAS - GESTION AUXILIARES - LISTADO (listar)*/
    Route::get('listado/ancianos', 'ListadoController@ancianos')->name('ancianos'); //Ruta para listar datos de los ancianos
    Route::get('listado/siervos', 'ListadoController@siervos')->name('siervos'); //Ruta para listar datos de los siervos ministeriales
    Route::get('listado/precursores', 'ListadoController@precursores')->name('precursores'); //Ruta para listar datos de los precursores regulares
    Route::get('listado/publicadores', 'ListadoController@publicadores')->name('publicadores'); //Ruta para listar datos de los publicadores
    Route::get('listado/publicadores-no-bautizados', 'ListadoController@publicadoresN')->name('publicadores_no_bautizados'); //Ruta para listar datos de los publicadores no bautizados
    Route::get('listado/publicadores-inactivos', 'ListadoController@publicadoresI')->name('publicadores_inactivos'); //Ruta para listar datos de los publicadores inactivos
    /*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
    /*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
    /*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
});  