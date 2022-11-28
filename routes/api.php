<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GoalController;
use App\Http\Controllers\IpcrController;
use App\Http\Controllers\OpcrController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\OutputController;
use App\Http\Controllers\SectorController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\StrategyController;
use App\Http\Controllers\StratPlanController;
use App\Http\Controllers\AssignRoleController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\KeyFunctionController;
use App\Http\Controllers\AssignOfficeController;
use App\Http\Controllers\CoreFunctionController;
use App\Http\Controllers\StratPlanTypeController;
use App\Http\Controllers\SpecificActionController;
use App\Http\Controllers\MajorFinalOutputController;
use App\Http\Controllers\AssignDesignationController;
use App\Http\Controllers\PerformanceTargetController;
use App\Http\Controllers\PerformanceMeasureController;
use App\Http\Controllers\StrategicObjectiveController;
use App\Http\Controllers\IpcrSuccessIndicatorController;
use App\Http\Controllers\OpcrSuccessIndicatorController;

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

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::get('/user/role', [UserController::class, 'role']);

Route::resource('/employee', EmployeeController::class);
Route::get('/employee/search/{name}', [EmployeeController::class, 'search']);

Route::resource('/role', RoleController::class);
Route::get('/assign_role', [AssignRoleController::class, 'assign_Role']);

Route::resource('/office', OfficeController::class);
Route::get('/assign_office', [AssignOfficeController::class, 'assign_Office']);

Route::resource('/designation', DesignationController::class);
Route::get('/assign_designation', [AssignDesignationController::class, 'assign_Designation']);

Route::resource('/stratPlan', StratPlanController::class);
Route::resource('/stratPlanType', StratPlanTypeController::class);

Route::resource('/goal', GoalController::class);

Route::resource('/key_function', KeyFunctionController::class);

Route::resource('/sector', SectorController::class);

Route::resource('/strategic_objective', StrategicObjectiveController::class);

Route::resource('/strategy', StrategyController::class);

Route::resource('/performance_target', PerformanceTargetController::class);

Route::resource('/specific_action', SpecificActionController::class);

Route::resource('/performance_measure', PerformanceMeasureController::class);

Route::resource('/opcr', OpcrController::class);

Route::resource('/mfo', MajorFinalOutputController::class);

Route::resource('/core_function', CoreFunctionController::class);

Route::resource('/service', ServiceController::class);

Route::resource('/output', OutputController::class);

Route::resource('/category', CategoryController::class);

Route::resource('/opcr_success_indicator', OpcrSuccessIndicatorController::class);

Route::resource('/ipcr', IpcrController::class);

Route::resource('/ipcr_success_indicator', IpcrSuccessIndicatorController::class);


Route::resource('/user', UserController::class);
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('current-user', [AuthController::class, 'getAuthenticatedUser']);
});
