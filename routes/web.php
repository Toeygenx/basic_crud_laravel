<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\NoteController;

Route::get('/', function () {
    return redirect()->route('notes.index');
});

Route::resource('/notes', NoteController::class);

// TEMPORARY: Delete this route after migration is done!
Route::get('/run-migrations', function () {
    try {
        Artisan::call('migrate', ['--force' => true]);
        return '<pre>' . Artisan::output() . '</pre><br><strong style="color:green">✅ Migration complete! DELETE this route now.</strong>';
    } catch (\Exception $e) {
        return '<pre style="color:red">❌ Error: ' . $e->getMessage() . '</pre>';
    }
})->withoutMiddleware(\Illuminate\Session\Middleware\StartSession::class);

