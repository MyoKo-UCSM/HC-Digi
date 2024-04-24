<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FileManagerController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\SubDepartmentController;
use App\Http\Controllers\Admin\GradeController;
use App\Http\Controllers\Admin\BloodGroupController;
use App\Http\Controllers\Admin\PositionController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\MemberController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'middleware' => ['web', 'auth']], function () {
    Route::get('/', function () {
        return redirect('admin/dashboard');
        //return redirect('admin/member');
    });

    /*
    |--------------------------------------------------------------------------
    | This is the route for DashboardController
    |--------------------------------------------------------------------------
     */
    Route::controller(DashboardController::class)->group(function () {
        Route::get('dashboard', 'index')->name('admin.dashboard');
    });

    /*
    |--------------------------------------------------------------------------
    | This is the route for FileManagerController
    |--------------------------------------------------------------------------
     */
    Route::get('filemanager', [FileManagerController::class, 'filemanager'])->name('admin.filemanager');

    /*
    |--------------------------------------------------------------------------
    | This is the route for ResourcesController
    |--------------------------------------------------------------------------
     */
    Route::resources([
        'member'               => MemberController::class,
        'permission'           => PermissionController::class,
        'role'                 => RoleController::class,
        'user'                 => UserController::class,
        'location'             => LocationController::class,
        'department'           => DepartmentController::class,
        'sub-department'       => SubDepartmentController::class,
        'grade'                => GradeController::class,
        'blood-group'          => BloodGroupController::class,
        'position'             => PositionController::class,
        'employee'             => EmployeeController::class,
        'staff'                => StaffController::class,
    ]);

    /*
    |--------------------------------------------------------------------------
    | This is the route for UserController
    |--------------------------------------------------------------------------
     */
    Route::post('/user/getData', [UserController::class, 'getUsers'])->name('admin.get.user.data');

    /*
    |--------------------------------------------------------------------------
    | This is the route for RoleController
    |--------------------------------------------------------------------------
     */
    Route::post('/role/getData', [RoleController::class, 'getRoles'])->name('admin.get.role.data');

    /*
    |--------------------------------------------------------------------------
    | This is the route for PermissionController
    |--------------------------------------------------------------------------
     */
    Route::post('/permission/getData', [PermissionController::class, 'getPermissions'])->name('admin.get.permission.data');

    /*
    |--------------------------------------------------------------------------
    | This is the route for HomeController
    |--------------------------------------------------------------------------
     */
    Route::controller(HomeController::class)->group(function () {
        Route::get('home', 'index')->name('admin.get.home');
        Route::post('home', 'update')->name('admin.post.home');
    });

    /*
    |--------------------------------------------------------------------------
    | This is the route for MemberController
    |--------------------------------------------------------------------------
     */
    Route::post('/member/getData', [MemberController::class, 'getMembers'])->name('admin.get.member.data');
    Route::post('/member/status-change', [MemberController::class, 'statusChange'])->name('admin.member.status.change');

    /*
    |--------------------------------------------------------------------------
    | This is the route for SubCategoryController
    |--------------------------------------------------------------------------
     */
    // Route::post('/sub-categories/getData', [SubCategoryController::class, 'getSubCategory'])->name('admin.get.sub-categories.data');
    // Route::post('/sub-categories/status-change', [SubCategoryController::class, 'statusChange'])->name('admin.sub-categories.status.change');

    /*
    |--------------------------------------------------------------------------
    | This is the route for LocationController
    |--------------------------------------------------------------------------
     */
    Route::post('/location/getData', [LocationController::class, 'getLocation'])->name('admin.get.location.data');
    Route::post('/location/status-change', [LocationController::class, 'statusChange'])->name('admin.location.status.change');

    /*
    |--------------------------------------------------------------------------
    | This is the route for DepartmentController
    |--------------------------------------------------------------------------
     */
    Route::post('/department/getData', [DepartmentController::class, 'getDepartment'])->name('admin.get.departments.data');
    Route::post('/department/status-change', [DepartmentController::class, 'statusChange'])->name('admin.departments.status.change');

    /*
    |--------------------------------------------------------------------------
    | This is the route for SubDepartmentController
    |--------------------------------------------------------------------------
     */
    Route::post('/sub-department/getData', [SubDepartmentController::class, 'getSubDepartment'])->name('admin.get.sub-department.data');
    Route::post('/sub-department/status-change', [SubDepartmentController::class, 'statusChange'])->name('admin.sub-department.status.change');

    /*
    |--------------------------------------------------------------------------
    | This is the route for BloodGroupController
    |--------------------------------------------------------------------------
     */
    Route::post('/blood-group/getData', [BloodGroupController::class, 'getBloodGroup'])->name('admin.get.blood-group.data');
    Route::post('/blood-group/status-change', [BloodGroupController::class, 'statusChange'])->name('admin.blood-group.status.change');

    /*
    |--------------------------------------------------------------------------
    | This is the route for EmployeeController
    |--------------------------------------------------------------------------
     */
    Route::post('/employee/getData', [EmployeeController::class, 'getEmployee'])->name('admin.get.employee.data');
    Route::post('/employee/status-change', [EmployeeController::class, 'statusChange'])->name('admin.employee.status.change');
    Route::post('/get-sub-departments', [EmployeeController::class, 'getSubDepartments'])->name('getSubDepartments');

    /*---Get Name by NRC Code --*/
    Route::get('/admin/get-nrc-name/{nrcCodeId}', [EmployeeController::class, 'getNrcName'])->name('getNrcName');

    /*
    |--------------------------------------------------------------------------
    | This is the route for StaffController
    |--------------------------------------------------------------------------
     */
    Route::post('/staff/getData', [StaffController::class, 'getStaffs'])->name('admin.get.staff.data');
    Route::post('/staff/status-change', [StaffController::class, 'statusChange'])->name('admin.staff.status.change');

    /*
    |--------------------------------------------------------------------------
    | This is the route for PositionController
    |--------------------------------------------------------------------------
     */
    Route::post('/position/getData', [PositionController::class, 'getPosition'])->name('admin.get.position.data');
    Route::post('/position/status-change', [PositionController::class, 'statusChange'])->name('admin.position.status.change');

    /*
    |--------------------------------------------------------------------------
    | This is the route for StaffController
    |--------------------------------------------------------------------------
     */
    Route::post('/grade/getData', [GradeController::class, 'getGrade'])->name('admin.get.grade.data');
    Route::post('/grade/status-change', [GradeController::class, 'statusChange'])->name('admin.grade.status.change');
});
