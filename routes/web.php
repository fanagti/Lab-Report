<?php

use App\Http\Controllers\Auth as ControllersAuth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\LabController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\UserController;
use App\Models\DetailLaporanLab;
use Illuminate\Support\Facades\Route;

use App\Models\Lab;
use App\Models\LaporanLab;
use App\Models\Mapel;
use App\Models\PC;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


//guest
Route::get('/', function () {
    return redirect("/login");
})->name("login");

Route::get('/api/mapel/{guru_id}', function ($guru_id) {
    $mapels = Mapel::where('guru_id', $guru_id)->get();
    return response()->json(['mapels' => $mapels]);
});





Route::get('/login', [AuthController::class, 'loginPage'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

//admin------------------------------------------------------
Route::middleware(['auth', 'role:admin'])->group(function () {


    Route::get('/laporan',[LaporanController::class, 'index'])->name('laporan.index');
    
    Route::get('/laporan/{laporanId}',[LaporanController::class,'show'])->name('laporan.detail');

    Route::get('/labs', [LabController::class,'index'])->middleware('labCheck');

    Route::put('/lab/{id}', [LabController::class, 'show']);
    Route::put('/change/lab/{id}', [LabController::class, 'statusChange']);
    Route::post('/labs', [LabController::class, 'store'])->name('labs.store');
    Route::put('/labs/{id}', [LabController::class, 'update'])->name('labs.update');
    Route::delete('/labs/{id}', [LabController::class, 'destroy'])->name('labs.destroy');


    Route::get('/guru', [GuruController::class, 'createWithMapels'])->name('gurus.createWithMapels');
    Route::post('/gurus/store-with-mapels', [GuruController::class, 'storeWithMapels'])->name('gurus.storeWithMapels');

    Route::put('gurus/{id}/update', [GuruController::class, 'update'])->name('gurus.update');
    Route::delete('gurus/{id}/delete', [GuruController::class, 'destroy'])->name('gurus.destroy');



    Route::get('/pengguna', [UserController::class, 'index']);
    Route::post('/pengguna', [UserController::class, 'store'])->name('users.store');
    Route::put('/pengguna/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

    Route::get('/bersihkan', [LaporanController::class, 'confirmDelete'])->name('laporan-labs.confirmDelete');
    Route::delete('/bersihkan', [LaporanController::class, 'deleteByDate'])->name('laporan-labs.delete');
    


});

//all----------------------------------------------------------------------
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/laporan-lab', [LaporanController::class, 'formLaporanPage'])->middleware('labCheck');

    Route::post('/laporan-lab', [LaporanController::class,'formLaporan']);

    Route::get('/lab/{labId}/laporan/{id}', [LaporanController::class, 'labLaporanPage'])->name('lab-edit');

    Route::put('/pcs/update/{labId}/{laporanId}', [LaporanController::class, 'labLaporan'])->name('pcs.updateAll');

});
Route::middleware(['auth'])->group(function(){

    Route::post('/logout', [AuthController::class, 'destroy'])->name('logout');
});

