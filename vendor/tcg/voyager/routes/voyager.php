<?php

use App\Http\Controllers\ImportExportController;
use Illuminate\Support\Str;
use TCG\Voyager\Events\Routing;
use TCG\Voyager\Events\RoutingAdmin;
use TCG\Voyager\Events\RoutingAdminAfter;
use TCG\Voyager\Events\RoutingAfter;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Http\Controllers\SpecificController;
use TCG\Voyager\Http\Controllers\EformsController;
use TCG\Voyager\Http\Controllers\CategoriesBuilderController;
use TCG\Voyager\Http\Controllers\TranslationController;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;

/*
|--------------------------------------------------------------------------
| Voyager Routes
|--------------------------------------------------------------------------
|
| This file is where you may override any of the routes that are included
| with Voyager.
|
*/

Route::group(['as' => 'voyager.'], function () {
    event(new Routing());

    $namespacePrefix = '\\' . config('voyager.controllers.namespace') . '\\';

    Route::get('login', ['uses' => $namespacePrefix . 'VoyagerAuthController@login',     'as' => 'login']);
    Route::post('login', ['uses' => $namespacePrefix . 'VoyagerAuthController@postLogin', 'as' => 'postlogin']);

    Route::group(['middleware' => 'admin.user'], function () use ($namespacePrefix) {
        event(new RoutingAdmin());
        // icons Route
        Route::get('/icons', function () {
            return View::Make('voyager::partials.icons');
        })->name('icons');
        //translate setting
        Route::get('/translation/{lang}', [TranslationController::class,'index'])->name('translation');
        Route::post('/save/translation/{lang}', [TranslationController::class,'save'])->name('translation.save');
        //translate intranet setting
        Route::get('/translation_intranet/{lang}', [TranslationController::class,'indexTranslationIntranet'])->name('intranet_translation');
        Route::post('/save/translation_intranet/{lang}', [TranslationController::class,'saveTranslationIntranet'])->name('translation_intranet.save');
        //Consulter_réponses_formulaires
        Route::get('/request_formulaires/{formulaire_id}', [EformsController::class, 'request_formulaires'])->name('request_formulaires')->middleware('admin.user');
        Route::get('/print_request_formulaires/{from}/{formulaire_id}/{tentative}', [EformsController::class, 'print_request_formulaires'])->name('print_request_formulaires')->middleware('admin.user');
        Route::get('/traitement_formulaire_request/{tentative}/{action}', [EformsController::class, 'traitement_formulaire_request'])->name('traitement_formulaire_request')->middleware('admin.user');
        Route::get('/reception_formulaire_request/{tentative}', [EformsController::class, 'reception_formulaire_request'])->name('reception_formulaire_request')->middleware('admin.user');
        //maj_info_confidentielles
        Route::get('/maj_info_confidentielles', [SpecificController::class, 'maj_info_confidentielles'])->name('maj_info_confidentielles');
        // env mail newsletter
        Route::post('/env_newsletter', [SpecificController::class, 'envNewsletter'])->name('env_newsletter');
        // importation exportation
        Route::post('/stage_acceptation', [SpecificController::class, 'stageAcceptation'])->name('stage_acceptation');
        Route::post('/generate_convention', [SpecificController::class, 'generateConvention'])->name('generate_convention');
        Route::post('/rapport_update/{rapport_id}', [SpecificController::class, 'rapportUpdate'])->name('rapport_update');
        Route::get('/statistiques/stages' , [SpecificController::class , 'statistiquesStage'])->name('statistiques_stage');
        Route::post('/predefined-generate-stages' , [VoyagerBaseController::class , 'generatePredefinedStudentsStages'])->name('predefined-generate-stages');


        //import
        Route::post('/import', [ImportExportController::class, 'import'])->name('import');
        // export
        Route::get('/export/{slug}', [ImportExportController::class, 'export'])->name('export');
        // Main Admin and Logout Route
        Route::get('/', ['uses' => $namespacePrefix . 'VoyagerController@index',   'as' => 'dashboard']);
        Route::post('logout', ['uses' => $namespacePrefix . 'VoyagerController@logout',  'as' => 'logout']);
        Route::post('upload', ['uses' => $namespacePrefix . 'VoyagerController@upload',  'as' => 'upload']);

        Route::get('profile', ['uses' => $namespacePrefix . 'VoyagerUserController@profile', 'as' => 'profile']);

        try {
            foreach (Voyager::model('DataType')::all() as $dataType) {
                $breadController = $dataType->controller
                    ? Str::start($dataType->controller, '\\')
                    : $namespacePrefix . 'VoyagerBaseController';

                Route::get($dataType->slug . '/order', $breadController . '@order')->name($dataType->slug . '.order');
                Route::post($dataType->slug . '/action', $breadController . '@action')->name($dataType->slug . '.action');
                Route::post($dataType->slug . '/order', $breadController . '@update_order')->name($dataType->slug . '.update_order');
                Route::get($dataType->slug . '/{id}/restore', $breadController . '@restore')->name($dataType->slug . '.restore');
                Route::get($dataType->slug . '/relation', $breadController . '@relation')->name($dataType->slug . '.relation');
                Route::post($dataType->slug . '/remove', $breadController . '@remove_media')->name($dataType->slug . '.media.remove');
                Route::resource($dataType->slug, $breadController, ['parameters' => [$dataType->slug => 'id']]);
                Route::put($dataType->slug . '/{id}/bulk_update', $breadController . '@bulkEdit')->name($dataType->slug . '.bulk_update');
            }
        } catch (\InvalidArgumentException $e) {
            throw new \InvalidArgumentException("Custom routes hasn't been configured because: " . $e->getMessage(), 1);
        } catch (\Exception $e) {
            // do nothing, might just be because table not yet migrated.
        }

        // Menu Routes
        Route::group([
            'as'     => 'menus.',
            'prefix' => 'menus/{menu}',
        ], function () use ($namespacePrefix) {
            Route::get('builder', ['uses' => $namespacePrefix . 'VoyagerMenuController@builder',    'as' => 'builder']);
            Route::post('order', ['uses' => $namespacePrefix . 'VoyagerMenuController@order_item', 'as' => 'order_item']);

            Route::group([
                'as'     => 'item.',
                'prefix' => 'item',
            ], function () use ($namespacePrefix) {
                Route::delete('{id}', ['uses' => $namespacePrefix . 'VoyagerMenuController@delete_menu', 'as' => 'destroy']);
                Route::post('/', ['uses' => $namespacePrefix . 'VoyagerMenuController@add_item',    'as' => 'add']);
                Route::put('/', ['uses' => $namespacePrefix . 'VoyagerMenuController@update_item', 'as' => 'update']);
            });
        });
        Route::get('categs', [CategoriesBuilderController::class, 'index'])->name('categs');


        // Settings
        Route::group([
            'as'     => 'settings.',
            'prefix' => 'settings',
        ], function () use ($namespacePrefix) {
            Route::get('/', ['uses' => $namespacePrefix . 'VoyagerSettingsController@index',        'as' => 'index']);
            Route::post('/', ['uses' => $namespacePrefix . 'VoyagerSettingsController@store',        'as' => 'store']);
            Route::put('/', ['uses' => $namespacePrefix . 'VoyagerSettingsController@update',       'as' => 'update']);
            Route::delete('{id}', ['uses' => $namespacePrefix . 'VoyagerSettingsController@delete',       'as' => 'delete']);
            Route::get('{id}/move_up', ['uses' => $namespacePrefix . 'VoyagerSettingsController@move_up',      'as' => 'move_up']);
            Route::get('{id}/move_down', ['uses' => $namespacePrefix . 'VoyagerSettingsController@move_down',    'as' => 'move_down']);
            Route::put('{id}/delete_value', ['uses' => $namespacePrefix . 'VoyagerSettingsController@delete_value', 'as' => 'delete_value']);
        });

        // Admin Media
        Route::group([
            'as'     => 'media.',
            'prefix' => 'media',
        ], function () use ($namespacePrefix) {
            Route::get('/', ['uses' => $namespacePrefix . 'VoyagerMediaController@index',              'as' => 'index']);
            Route::post('files', ['uses' => $namespacePrefix . 'VoyagerMediaController@files',              'as' => 'files']);
            Route::post('new_folder', ['uses' => $namespacePrefix . 'VoyagerMediaController@new_folder',         'as' => 'new_folder']);
            Route::post('delete_file_folder', ['uses' => $namespacePrefix . 'VoyagerMediaController@delete', 'as' => 'delete']);
            Route::post('move_file', ['uses' => $namespacePrefix . 'VoyagerMediaController@move',          'as' => 'move']);
            Route::post('rename_file', ['uses' => $namespacePrefix . 'VoyagerMediaController@rename',        'as' => 'rename']);
            Route::post('upload', ['uses' => $namespacePrefix . 'VoyagerMediaController@upload',             'as' => 'upload']);
            Route::post('crop', ['uses' => $namespacePrefix . 'VoyagerMediaController@crop',             'as' => 'crop']);
        });

        // BREAD Routes
        Route::group([
            'as'     => 'bread.',
            'prefix' => 'bread',
        ], function () use ($namespacePrefix) {
            Route::get('/', ['uses' => $namespacePrefix . 'VoyagerBreadController@index',              'as' => 'index']);
            Route::get('{table}/create', ['uses' => $namespacePrefix . 'VoyagerBreadController@create',     'as' => 'create']);
            Route::post('/', ['uses' => $namespacePrefix . 'VoyagerBreadController@store',   'as' => 'store']);
            Route::get('{table}/edit', ['uses' => $namespacePrefix . 'VoyagerBreadController@edit', 'as' => 'edit']);
            Route::put('{id}', ['uses' => $namespacePrefix . 'VoyagerBreadController@update',  'as' => 'update']);
            Route::delete('{id}', ['uses' => $namespacePrefix . 'VoyagerBreadController@destroy',  'as' => 'delete']);
            Route::post('relationship', ['uses' => $namespacePrefix . 'VoyagerBreadController@addRelationship',  'as' => 'relationship']);
            Route::get('delete_relationship/{id}', ['uses' => $namespacePrefix . 'VoyagerBreadController@deleteRelationship',  'as' => 'delete_relationship']);
        });

        // Database Routes
        Route::resource('database', $namespacePrefix . 'VoyagerDatabaseController');


        // Compass Routes
        Route::group([
            'as'     => 'compass.',
            'prefix' => 'compass',
        ], function () use ($namespacePrefix) {
            Route::get('/', ['uses' => $namespacePrefix . 'VoyagerCompassController@index',  'as' => 'index']);
            Route::post('/', ['uses' => $namespacePrefix . 'VoyagerCompassController@index',  'as' => 'post']);
        });

        event(new RoutingAdminAfter());
    });

    //Asset Routes
    Route::get('voyager-assets', ['uses' => $namespacePrefix . 'VoyagerController@assets', 'as' => 'voyager_assets']);

    event(new RoutingAfter());
});
