<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\NonStockItemController;
use App\Http\Controllers\NotifhrdController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QcController;
use App\Http\Controllers\SertifikatController;
use App\Http\Controllers\SpecsheetController;
use App\Http\Controllers\StockMovementController;
use App\Http\Controllers\WasjangController;
use App\Http\Controllers\IncidentReportController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('changepassword', [ProfileController::class, 'changePassword']);


Route::get('listspk', [SpecsheetController::class, 'listspk']);
Route::get('jmlspkbaru', [SpecsheetController::class, 'jmlspkbaru']);
Route::get('viewspk/{id}', [SpecsheetController::class, 'viewspk']);
Route::post('specsheetcreate', [SpecsheetController::class, 'createSpeck']);
Route::post('specsheetstatus', [SpecsheetController::class, 'updateStatus']);
Route::get('specsheetdashboard', [SpecsheetController::class, 'dashboard']);


Route::post('trainingcreate', [SertifikatController::class, 'createTraining']);
Route::get('traininglist', [SertifikatController::class, 'listTraining']);
Route::get('detailtraining/{id}', [SertifikatController::class, 'detailTraining']);
Route::post('trainingsertifikat', [SertifikatController::class, 'sertifikatTraining']);
Route::post('uploadpeserta', [SertifikatController::class, 'uploadPeserta']);
Route::get('listpeserta/{id}', [SertifikatController::class, 'listPeserta']);
Route::get('detailpeserta/{id}', [SertifikatController::class, 'detailPeserta']);
Route::post('deletepeserta', [SertifikatController::class, 'deletePeserta']);

//QC
Route::get('cuttingsewing', [QcController::class, 'cuttingSewing']);
Route::get('sewingtanpainner', [QcController::class, 'sewingtanpainner']);
Route::get('sewinginner', [QcController::class, 'sewinginner']);

Route::post('createcuttingsewing', [QcController::class, 'createCuttingSewing']);
Route::get('qccuttingsewing/{mesin}', [QcController::class, 'qcCuttingSewing']);
Route::post('createqccuttingsewing', [QcController::class, 'createqcCuttingSewing']);
Route::post('createqcsewing', [QcController::class, 'createqcSewing']);
Route::post('createqchotseal', [QcController::class, 'createqcHotseal']);
Route::get('hotsealdata', [QcController::class, 'hotsealdata']);
Route::post('createqcpasanginner', [QcController::class, 'createqcpasanginner']);
Route::get('pasanginnerdata', [QcController::class, 'pasanginnerdata']);


Route::get('qccuttingsewingdata', [QcController::class, 'qccuttingSewingdata']);
Route::get('qccuttingsewingdatainner', [QcController::class, 'qccuttingSewingdatainner']);

Route::post('finishingcreate', [QcController::class, 'createPrinting']);
Route::get('printingrtr', [QcController::class, 'printingrtr']);
Route::get('printingsts', [QcController::class, 'printingsts']);

//non stock
Route::resource('customer', CustomerController::class);
Route::resource('nonstockitem', NonStockItemController::class);
Route::resource('stockmovement', StockMovementController::class);

//wasjang
Route::resource('wasjang', WasjangController::class);
Route::put('update-wasjang-status-sent/{nowasjang}', [WasjangController::class, 'updateStatus']);
Route::post('wasjangberat', [WasjangController::class, 'saveHeavyWasjang']);
Route::get('wasjangberat', [WasjangController::class, 'indexWasjangBerat']);
Route::post('temuanQC', [WasjangController::class, 'storeQC']);
Route::get('temuanQC', [WasjangController::class, 'indexQC']);

Route::post('incidentreport', [IncidentReportController::class, 'create']);

Route::resource('notifhrd', NotifhrdController::class);

Route::get('employee/{pin}', [EmployeesController::class, 'employee']);
