<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Agregar Empleado
    Route::delete('agregar-empleados/destroy', 'AgregarEmpleadoController@massDestroy')->name('agregar-empleados.massDestroy');
    Route::resource('agregar-empleados', 'AgregarEmpleadoController');

    // Documento Empleado
    Route::delete('documento-empleados/destroy', 'DocumentoEmpleadoController@massDestroy')->name('documento-empleados.massDestroy');
    Route::post('documento-empleados/media', 'DocumentoEmpleadoController@storeMedia')->name('documento-empleados.storeMedia');
    Route::post('documento-empleados/ckmedia', 'DocumentoEmpleadoController@storeCKEditorImages')->name('documento-empleados.storeCKEditorImages');
    Route::resource('documento-empleados', 'DocumentoEmpleadoController');

    // Recibo Pagos
    Route::delete('recibo-pagos/destroy', 'ReciboPagosController@massDestroy')->name('recibo-pagos.massDestroy');
    Route::post('recibo-pagos/media', 'ReciboPagosController@storeMedia')->name('recibo-pagos.storeMedia');
    Route::post('recibo-pagos/ckmedia', 'ReciboPagosController@storeCKEditorImages')->name('recibo-pagos.storeCKEditorImages');
    Route::resource('recibo-pagos', 'ReciboPagosController');

    // Contrato Laboral
    Route::delete('contrato-laborals/destroy', 'ContratoLaboralController@massDestroy')->name('contrato-laborals.massDestroy');
    Route::resource('contrato-laborals', 'ContratoLaboralController');

    // Descripcion Entrenamiento
    Route::delete('descripcion-entrenamientos/destroy', 'DescripcionEntrenamientoController@massDestroy')->name('descripcion-entrenamientos.massDestroy');
    Route::resource('descripcion-entrenamientos', 'DescripcionEntrenamientoController');

    // Asistencia Entrenamiento
    Route::delete('asistencia-entrenamientos/destroy', 'AsistenciaEntrenamientoController@massDestroy')->name('asistencia-entrenamientos.massDestroy');
    Route::resource('asistencia-entrenamientos', 'AsistenciaEntrenamientoController');

    // Charla
    Route::delete('charlas/destroy', 'CharlaController@massDestroy')->name('charlas.massDestroy');
    Route::resource('charlas', 'CharlaController');

    // Asistencia Charla
    Route::delete('asistencia-charlas/destroy', 'AsistenciaCharlaController@massDestroy')->name('asistencia-charlas.massDestroy');
    Route::resource('asistencia-charlas', 'AsistenciaCharlaController');

    // Empleado Contrato
    Route::delete('empleado-contratos/destroy', 'EmpleadoContratoController@massDestroy')->name('empleado-contratos.massDestroy');
    Route::resource('empleado-contratos', 'EmpleadoContratoController');

    // Horas Trabajadas
    Route::delete('horas-trabajadas/destroy', 'HorasTrabajadasController@massDestroy')->name('horas-trabajadas.massDestroy');
    Route::resource('horas-trabajadas', 'HorasTrabajadasController');

    // Contrato Documento
    Route::delete('contrato-documentos/destroy', 'ContratoDocumentoController@massDestroy')->name('contrato-documentos.massDestroy');
    Route::post('contrato-documentos/media', 'ContratoDocumentoController@storeMedia')->name('contrato-documentos.storeMedia');
    Route::post('contrato-documentos/ckmedia', 'ContratoDocumentoController@storeCKEditorImages')->name('contrato-documentos.storeCKEditorImages');
    Route::resource('contrato-documentos', 'ContratoDocumentoController');

    // Instructor
    Route::delete('instructors/destroy', 'InstructorController@massDestroy')->name('instructors.massDestroy');
    Route::resource('instructors', 'InstructorController');

    // Cargo
    Route::delete('cargos/destroy', 'CargoController@massDestroy')->name('cargos.massDestroy');
    Route::resource('cargos', 'CargoController');

    // Categoria Herramienta
    Route::delete('categoria-herramienta/destroy', 'CategoriaHerramientaController@massDestroy')->name('categoria-herramienta.massDestroy');
    Route::resource('categoria-herramienta', 'CategoriaHerramientaController');

    // Departamento
    Route::delete('departamentos/destroy', 'DepartamentoController@massDestroy')->name('departamentos.massDestroy');
    Route::resource('departamentos', 'DepartamentoController');

    // Agregar Cliente
    Route::delete('agregar-clientes/destroy', 'AgregarClienteController@massDestroy')->name('agregar-clientes.massDestroy');
    Route::resource('agregar-clientes', 'AgregarClienteController');

    // Herramienta
    Route::delete('herramienta/destroy', 'HerramientaController@massDestroy')->name('herramienta.massDestroy');
    Route::resource('herramienta', 'HerramientaController');

    // Uso Herramienta
    Route::delete('uso-herramienta/destroy', 'UsoHerramientaController@massDestroy')->name('uso-herramienta.massDestroy');
    Route::resource('uso-herramienta', 'UsoHerramientaController');

    // Mantenimiento Herramienta
    Route::delete('mantenimiento-herramienta/destroy', 'MantenimientoHerramientaController@massDestroy')->name('mantenimiento-herramienta.massDestroy');
    Route::resource('mantenimiento-herramienta', 'MantenimientoHerramientaController');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
