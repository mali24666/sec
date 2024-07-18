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

    // Transeformer
    Route::delete('transeformers/destroy', 'TranseformerController@massDestroy')->name('transeformers.massDestroy');
    Route::post('transeformers/media', 'TranseformerController@storeMedia')->name('transeformers.storeMedia');
    Route::post('transeformers/ckmedia', 'TranseformerController@storeCKEditorImages')->name('transeformers.storeCKEditorImages');
    Route::resource('transeformers', 'TranseformerController');
    Route::get('transeformers/fetchTranse/{id}', 'TranseformerController@fetchTranse')->name('transeformers.fetchTranse');
    Route::get('/transeformers/add/{id}', 'TranseformerController@add')->name('transeformers.add');

    // Cb
    Route::delete('cbs/destroy', 'CbController@massDestroy')->name('cbs.massDestroy');
    Route::resource('cbs', 'CbController');
    Route::get('/cbs/add/{id}', 'CbController@add')->name('cbs.add');
    Route::get('cbs/fetchCb/{id}', 'CbController@fetchCb')->name('cbs.fetchCb');
    Route::post('cbs/media', 'CbController@storeMedia')->name('cbs.storeMedia');
    Route::post('cbs/ckmedia', 'CbController@storeCKEditorImages')->name('cbs.storeCKEditorImages');
        Route::post('cbs/save', 'CbController@save')->name('cbs.save');

    
    // Minibller
    Route::delete('minibllers/destroy', 'MinibllerController@massDestroy')->name('minibllers.massDestroy');
    Route::post('minibllers/media', 'MinibllerController@storeMedia')->name('minibllers.storeMedia');
    Route::post('minibllers/ckmedia', 'MinibllerController@storeCKEditorImages')->name('minibllers.storeCKEditorImages');
    Route::resource('minibllers', 'MinibllerController');
    Route::get('/minibllers/add/{id}', 'MinibllerController@add')->name('minibllers.add');
    Route::get('/minibllers/addloop/{id}', 'MinibllerController@addloop')->name('minibllers.addloop');
    // Fouse
    Route::delete('fouses/destroy', 'FouseController@massDestroy')->name('fouses.massDestroy');
    Route::resource('fouses', 'FouseController');
    Route::get('/fouses/add/{id}', 'FouseController@add')->name('fouses.add');

    // Box
    Route::delete('boxes/destroy', 'BoxController@massDestroy')->name('boxes.massDestroy');
    Route::post('boxes/media', 'BoxController@storeMedia')->name('boxes.storeMedia');
    Route::post('boxes/ckmedia', 'BoxController@storeCKEditorImages')->name('boxes.storeCKEditorImages');
    Route::resource('boxes', 'BoxController');
    Route::get('/boxes/add/{id}', 'BoxController@add')->name('boxes.add');
    Route::get('/boxes/loop/{id}', 'BoxController@loop')->name('boxes.loop');
    Route::get('/boxes/ct/{id}', 'BoxController@ct')->name('boxes.ct');

  
    // Cable
    Route::delete('cables/destroy', 'CableController@massDestroy')->name('cables.massDestroy');
    Route::resource('cables', 'CableController');

 // City
    Route::delete('cities/destroy', 'CityController@massDestroy')->name('cities.massDestroy');
    Route::resource('cities', 'CityController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // Bill
    Route::delete('bills/destroy', 'BillController@massDestroy')->name('bills.massDestroy');
    Route::resource('bills', 'BillController');

    // Allnote
    Route::delete('allnotes/destroy', 'AllnoteController@massDestroy')->name('allnotes.massDestroy');
    Route::resource('allnotes', 'AllnoteController', ['except' => ['show']]);

    // Minibllarnote
    Route::delete('minibllarnotes/destroy', 'MinibllarnoteController@massDestroy')->name('minibllarnotes.massDestroy');
    Route::resource('minibllarnotes', 'MinibllarnoteController', ['except' => ['show']]);

    // Lic
    Route::delete('lics/destroy', 'LicController@massDestroy')->name('lics.massDestroy');
    Route::post('lics/media', 'LicController@storeMedia')->name('lics.storeMedia');
    Route::post('lics/ckmedia', 'LicController@storeCKEditorImages')->name('lics.storeCKEditorImages');
    Route::resource('lics', 'LicController');

    // User Alerts
    Route::delete('user-alerts/destroy', 'UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
    Route::get('user-alerts/read', 'UserAlertsController@read');
    Route::resource('user-alerts', 'UserAlertsController', ['except' => ['edit', 'update']]);

    // Task Status
    Route::delete('task-statuses/destroy', 'TaskStatusController@massDestroy')->name('task-statuses.massDestroy');
    Route::resource('task-statuses', 'TaskStatusController');

    // Task Tag
    Route::delete('task-tags/destroy', 'TaskTagController@massDestroy')->name('task-tags.massDestroy');
    Route::resource('task-tags', 'TaskTagController');

    // Task
    Route::delete('tasks/destroy', 'TaskController@massDestroy')->name('tasks.massDestroy');
    Route::post('tasks/media', 'TaskController@storeMedia')->name('tasks.storeMedia');
    Route::post('tasks/ckmedia', 'TaskController@storeCKEditorImages')->name('tasks.storeCKEditorImages');
    Route::resource('tasks', 'TaskController');
    Route::get('/tasks/add/{id}', 'TaskController@add')->name('tasks.add');

    // Tasks Calendar
    Route::resource('tasks-calendars', 'TasksCalendarController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Esfelt
    Route::delete('esfelts/destroy', 'EsfeltController@massDestroy')->name('esfelts.massDestroy');
    Route::post('esfelts/media', 'EsfeltController@storeMedia')->name('esfelts.storeMedia');
    Route::post('esfelts/ckmedia', 'EsfeltController@storeCKEditorImages')->name('esfelts.storeCKEditorImages');
    Route::resource('esfelts', 'EsfeltController');
    Route::get('/esfelts/add/{id}', 'EsfeltController@add')->name('esfelts.add');
    // Room
    Route::delete('rooms/destroy', 'RoomController@massDestroy')->name('rooms.massDestroy');
    Route::post('rooms/media', 'RoomController@storeMedia')->name('rooms.storeMedia');
    Route::post('rooms/ckmedia', 'RoomController@storeCKEditorImages')->name('rooms.storeCKEditorImages');
    Route::resource('rooms', 'RoomController');

    // Close
    Route::delete('closes/destroy', 'CloseController@massDestroy')->name('closes.massDestroy');
    Route::post('closes/media', 'CloseController@storeMedia')->name('closes.storeMedia');
    Route::post('closes/ckmedia', 'CloseController@storeCKEditorImages')->name('closes.storeCKEditorImages');
    Route::resource('closes', 'CloseController');
    Route::get('/closes/add/{id}', 'CloseController@add')->name('closes.add');

        // Employee
        Route::delete('employees/destroy', 'EmployeeController@massDestroy')->name('employees.massDestroy');
        Route::post('employees/media', 'EmployeeController@storeMedia')->name('employees.storeMedia');
        Route::post('employees/ckmedia', 'EmployeeController@storeCKEditorImages')->name('employees.storeCKEditorImages');
        Route::resource('employees', 'EmployeeController');
    
        // Tools
        Route::delete('tools/destroy', 'ToolsController@massDestroy')->name('tools.massDestroy');
        Route::resource('tools', 'ToolsController');
    
        // Custody
        Route::delete('custodies/destroy', 'CustodyController@massDestroy')->name('custodies.massDestroy');
        Route::post('custodies/media', 'CustodyController@storeMedia')->name('custodies.storeMedia');
        Route::post('custodies/ckmedia', 'CustodyController@storeCKEditorImages')->name('custodies.storeCKEditorImages');
        Route::resource('custodies', 'CustodyController');
    
        // Course
        Route::delete('courses/destroy', 'CourseController@massDestroy')->name('courses.massDestroy');
        Route::resource('courses', 'CourseController');
    
        // Certificate
        Route::delete('certificates/destroy', 'CertificateController@massDestroy')->name('certificates.massDestroy');
        Route::post('certificates/media', 'CertificateController@storeMedia')->name('certificates.storeMedia');
        Route::post('certificates/ckmedia', 'CertificateController@storeCKEditorImages')->name('certificates.storeCKEditorImages');
        Route::resource('certificates', 'CertificateController');
    
        // Car
        Route::delete('cars/destroy', 'CarController@massDestroy')->name('cars.massDestroy');
        Route::post('cars/media', 'CarController@storeMedia')->name('cars.storeMedia');
        Route::post('cars/ckmedia', 'CarController@storeCKEditorImages')->name('cars.storeCKEditorImages');
        Route::resource('cars', 'CarController');
    
        // Repairs
        Route::delete('repairs/destroy', 'RepairsController@massDestroy')->name('repairs.massDestroy');
        Route::post('repairs/media', 'RepairsController@storeMedia')->name('repairs.storeMedia');
        Route::post('repairs/ckmedia', 'RepairsController@storeCKEditorImages')->name('repairs.storeCKEditorImages');
        Route::resource('repairs', 'RepairsController');
    
        // Car Move
        Route::delete('car-moves/destroy', 'CarMoveController@massDestroy')->name('car-moves.massDestroy');
        Route::post('car-moves/media', 'CarMoveController@storeMedia')->name('car-moves.storeMedia');
        Route::post('car-moves/ckmedia', 'CarMoveController@storeCKEditorImages')->name('car-moves.storeCKEditorImages');
        Route::resource('car-moves', 'CarMoveController');
    
        // Station
    Route::delete('stations/destroy', 'StationController@massDestroy')->name('stations.massDestroy');
    Route::resource('stations', 'StationController');

    // Line
    Route::delete('lines/destroy', 'LineController@massDestroy')->name('lines.massDestroy');
    Route::resource('lines', 'LineController');
    Route::get('/line/fetchfeeder/{id}', 'LineController@fetchfeeder')->name('lines.fetchfeeder');
    Route::get('/line/add/{id}', 'LineController@add')->name('lines.add');
    Route::get('/line/export/{id}', 'LineController@export')->name('lines.export');

     // Box Note
     Route::delete('box-notes/destroy', 'BoxNoteController@massDestroy')->name('box-notes.massDestroy');
     Route::resource('box-notes', 'BoxNoteController');
    // Ct
    Route::delete('cts/destroy', 'CtController@massDestroy')->name('cts.massDestroy');
    Route::resource('cts', 'CtController');
    Route::get('/cts/fetchCt/{id}', 'CtController@fetchCt')->name('cts.fetchCt');

    // Diagram
    Route::delete('diagrams/destroy', 'DiagramController@massDestroy')->name('diagrams.massDestroy');
    Route::resource('diagrams', 'DiagramController');

    // Project
    Route::delete('projects/destroy', 'ProjectController@massDestroy')->name('projects.massDestroy');
    Route::resource('projects', 'ProjectController');

    // Rmu
    Route::delete('rmus/destroy', 'RmuController@massDestroy')->name('rmus.massDestroy');
    Route::resource('rmus', 'RmuController');

    // Autorecloser
    Route::delete('autoreclosers/destroy', 'AutorecloserController@massDestroy')->name('autoreclosers.massDestroy');
    Route::resource('autoreclosers', 'AutorecloserController');

    // Section Lazy
    Route::delete('section-lazies/destroy', 'SectionLazyController@massDestroy')->name('section-lazies.massDestroy');
    Route::resource('section-lazies', 'SectionLazyController');

    // Avr
    Route::delete('avrs/destroy', 'AvrController@massDestroy')->name('avrs.massDestroy');
    Route::resource('avrs', 'AvrController');
    // Boxes Details
    Route::delete('boxes-details/destroy', 'BoxesDetailsController@massDestroy')->name('boxes-details.massDestroy');
    Route::resource('boxes-details', 'BoxesDetailsController');
    Route::get('/boxes-details/details/{box_number}', 'BoxesDetailsController@details')->name('boxes-details.details');

    Route::post('boxes-details/media', 'BoxesDetailsController@storeMedia')->name('boxes-details.storeMedia');
    Route::post('boxes-details/ckmedia', 'BoxesDetailsController@storeCKEditorImages')->name('boxes-details.storeCKEditorImages');


    Route::get('global-search', 'GlobalSearchController@search')->name('globalSearch');
    Route::get('messenger', 'MessengerController@index')->name('messenger.index');
    Route::get('messenger/create', 'MessengerController@createTopic')->name('messenger.createTopic');
    Route::post('messenger', 'MessengerController@storeTopic')->name('messenger.storeTopic');
    Route::get('messenger/inbox', 'MessengerController@showInbox')->name('messenger.showInbox');
    Route::get('messenger/outbox', 'MessengerController@showOutbox')->name('messenger.showOutbox');
    Route::get('messenger/{topic}', 'MessengerController@showMessages')->name('messenger.showMessages');
    Route::delete('messenger/{topic}', 'MessengerController@destroyTopic')->name('messenger.destroyTopic');
    Route::post('messenger/{topic}/reply', 'MessengerController@replyToTopic')->name('messenger.reply');
    Route::get('messenger/{topic}/reply', 'MessengerController@showReply')->name('messenger.showReply');
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
