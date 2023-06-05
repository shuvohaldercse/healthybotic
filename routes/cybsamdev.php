<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CybSamDev\CybDevController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// CybSam Code
Route::prefix('CybSamDev')->group(function(){
    // Route::get('Optimize', [App\Http\Controllers\CybSamDev\CybDevController::class, 'optimize'])->name('cybsamdev.optimize');
    Route::get('Optimize', function(){
        Artisan::call('optimize');
        return redirect()->route('supuser.dashboard')->with('webdevodangeropr','Application cache has been Optimize');
    })->name('cybsamdev.optimize');
    // Route::get('Clear-Cache', [App\Http\Controllers\CybSamDev\CybDevController::class, 'clearCache'])->name('cybsamdev.clearCache');
    // Clear application cache:
    Route::get('/clear-cache', function() {
        Artisan::call('cache:clear');
        return redirect()->route('supuser.dashboard')->with('webdevodangeropr','Application cache has been cleared');
    })->name('cybsamdev.clearcache');

    //Clear route cache:
    Route::get('/route-cache', function() {
        Artisan::call('route:clear');
        return redirect()->route('supuser.dashboard')->with('webdevodangeropr','Routes cache has been cleared');
    })->name('cybsamdev.routecache');

    //Clear config cache:
    Route::get('/config-cache', function() {
        Artisan::call('config:cache');
        return redirect()->route('supuser.dashboard')->with('webdevodangeropr','Config cache has been cleared');
    })->name('cybsamdev.configcache');

    // Clear view cache:
    Route::get('/view-clear', function() {
        Artisan::call('view:clear');
        return redirect()->route('supuser.dashboard')->with('webdevodangeropr','View cache has been cleared');
    })->name('cybsamdev.viewclear');
});
