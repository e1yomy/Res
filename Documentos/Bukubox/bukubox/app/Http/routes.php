<?php
Route::get('/', 'HomeController@getHome');
Route::get('/login', 'HomeController@getLogin');
Route::post('/login', 'HomeController@login');
Route::get('registro', 'HomeController@getRegistro');
Route::post('/registro', 'HomeController@registrar');

Route::group(['prefix' => '{username}', 'middleware' => 'valida_usuario'], function() {
	Route::get('/', 'LectorController@getInicioView')->name('inicio');
	Route::group(['prefix' => 'libros'], function() {
		Route::get('/', 'LectorController@getLibrosView')->name('libros');
		Route::get('genero/{id}', 'LectorController@getLibrosGeneroView')->name('libro_consultar_genero');
		Route::get('detalle/{id}', 'LectorController@getDetalleLibroView')->name('libro_detalle');
		Route::get('agregar', 'LectorController@getRegistrarLibroView')->name('libro_agregar');
		Route::post('agregar', 'LectorController@registrarLibro')->name('libro_agregar');
		Route::get('agregar-a-caja/{id}', 'LectorController@agregarACaja')->name('libro_agregar_caja');
		Route::get('quitar-de-caja/{id}', 'LectorController@quitarDeCaja')->name('libro_quitar_caja');
		Route::get('lo-deseo/{id}', 'LectorController@loDeseo')->name('libro_deseo');
		Route::get('no-deseo/{id}', 'LectorController@noLoDeseo')->name('libro_no_deseo');
		Route::post('cambiar-estado/{id}', 'LectorController@cambiarEstadoLibro')->name('cambiar_estado_libro');
		Route::get('calificar-libro/{libro_id}/{calificacion}', 'LectorController@calificarLibro')->name('calificar_libro');
	});
	Route::group(['prefix' => 'citas'], function() {
		Route::get('/', 'LectorController@getCitasView')->name('citas');
		Route::post('agregar', 'LectorController@agregarCita')->name('agregar_cita');
		Route::get('eliminar-cita/{id}', 'LectorController@eliminarCita')->name('eliminar_cita');
	});
	Route::group(['prefix' => 'caja'], function() {
		Route::get('/', 'LectorController@getCajaView')->name('caja');
	});
	Route::group(['prefix' => 'lectores'], function() {
		Route::get('lectores', 'LectorController@getLectoresView')->name('lectores');
		Route::get('ver-perfil/{id}', 'LectorController@verPerfilView')->name('lectores_ver_perfil');
		Route::post('solicitar-amistad', 'LectorController@solicitarAmistad')->name('lectores_solicitar_amistad');
		Route::post('confirmar-amistad', 'LectorController@confirmarAmistad')->name('lectores_confirmar_amistad');
		Route::post('cancelar-solicitud', 'LectorController@cancelarSolicitud')->name('lectores_cancelar_solicitud_amistad');
		Route::post('quitar-amistad', 'LectorController@quitarAmistad')->name('lectores_quitar_amistad');
	});
	Route::group(['prefix' => 'generos', 'middleware' => 'verifica_admin'], function() {
		Route::get('/', 'LectorController@getGenerosView')->name('generos');
		Route::get('/quitar/{id}', 'LectorController@quitarGenero')->name('genero_quitar');
		Route::get('/ver_detalle/{id}', 'LectorController@detalleGenero')->name('genero_detalle');
		Route::post('/actualizar/{id}', 'LectorController@actualizarGenero')->name('genero_actualizar');
		Route::post('/agregar', 'LectorController@agregarGenero')->name('genero_agregar');
	});
	Route::group(['prefix' => 'administradores', 'middleware' => 'verifica_admin'], function() {
		Route::get('/', 'LectorController@getAdministradoresView')->name('administradores');
		Route::post('/agregar', 'LectorController@agregarAdministrador')->name('administrador_agregar');
		Route::get('/quitar/{id}', 'LectorController@quitarAdministrador')->name('administrador_quitar');
	});
	Route::group(['prefix' => 'secciones', 'middleware' => 'verifica_admin'], function() {
		Route::get('/', 'LectorController@getSeccionesView')->name('secciones');
		Route::get('/editar-imagen-inicio', 'LectorController@getEditarImagenInicioView')->name('editar_imagen_inicio');
		Route::post('/editar-imagen-inicio', 'LectorController@editarImagenInicio')->name('editar_imagen_inicio');
		Route::get('/editar-objetivos', 'LectorController@getEditarObjetivosView')->name('editar_objetivos');
		Route::post('/editar-objetivos', 'LectorController@editarObjetivos')->name('editar_objetivos');
		Route::get('/eliminar-objetivo/{id}', 'LectorController@eliminarObjetivo')->name('eliminar_objetivo');
		Route::get('/editar-patrocinadores', 'LectorController@getEditarPatrocinadoresView')->name('editar_patrocinadores');
		Route::post('/editar-patrocinadores', 'LectorController@editarPatrocinadores')->name('editar_patrocinadores');
		Route::get('/eliminar-patrocinador/{id}', 'LectorController@eliminarPatrocinador')->name('eliminar_patrocinador');
	});
	Route::get('logout', 'LectorController@logout')->name('logout');
	Route::get('ver-perfil', 'LectorController@verPerfilLectorView')->name('ver_perfil');
	Route::get('editar-perfil', 'LectorController@getEditarPerfilView')->name('editar_perfil');
	Route::post('editar-perfil', 'LectorController@editarPerfil')->name('editar_perfil');
	Route::post('actualizar-cuenta', 'LectorController@actualizarCuenta')->name('actualizar_cuenta');
});