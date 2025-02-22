<?php

use App\Http\Controllers\Admin\CalendarController;
use App\Http\Controllers\Admin\CityFatch;
use App\Http\Controllers\Admin\DomainClassController;
use App\Http\Controllers\Admin\EventManagmentController;
use App\Http\Controllers\Admin\FollowUpController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\PriorityController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\StudentAdmission;
use App\Http\Controllers\Admin\StudentClaasTypeController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\StudentFeesController;
use App\Http\Controllers\Admin\StudentFeesDashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\UserProfileController;
use App\Http\Controllers\ProfileController;
use App\Models\DomainClass;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth','module-access', \App\Http\Middleware\PreventMultipleLogin::class])->group(function () {

    
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


  

    //profile routes
    Route::resource('user-profile', UserProfileController::class);

    //user routes
    Route::resource('user', UserController::class)->except(['show']);
    Route::post('user/list', [UserController::class, 'list'])->name('user.list');
    Route::post('user/delete', [UserController::class, 'destroyMany'])->name('user.delete');

     //addmission routes
    Route::resource('admission',StudentAdmission::class)->except(['show']);
    Route::post('admission/list', [StudentAdmission::class, 'list'])->name('admission.list');
    Route::post('admission/delete', [StudentAdmission::class, 'destroyMany'])->name('admission.delete');
    
    //get cities by state id
    Route::get('get-cities/{state}', [CityFatch::class, 'getCities'])->name('get.cities');
    Route::get('/api/get-user/{companyId}', [CityFatch::class, 'getUsersByCompany']);
  



    //follow up routes
    Route::resource('follow_up', FollowUpController::class)->except(['show']);
    Route::post('follow_up/list', [FollowUpController::class, 'list'])->name('follow_up.list');
    Route::post('follow_up/delete', [FollowUpController::class, 'destroyMany'])->name('follow_up.delete');
    Route::get('/api/get-domains-and-priorities/{companyId}', [CityFatch::class, 'getDomainsAndPriorities']);



    //domain class routes 
    Route::resource('domain_class', DomainClassController::class)->except(['show']);
    Route::post('domain_class/list', [DomainClassController::class, 'list'])->name('domain_class.list');
    Route::post('domain_class/delete', [DomainClassController::class, 'destroyMany'])->name('domain_class.delete');

    //priority routes
    Route::resource('priority', PriorityController::class)->except(['show']);
    Route::post('priority/list', [PriorityController::class, 'list'])->name('priority.list');
    Route::post('priority/delete', [PriorityController::class, 'destroyMany'])->name('priority.delete');

    

    //Student routes
    Route::resource('student', StudentController::class)->except(['show']);
    Route::post('student/list', [StudentController::class, 'list'])->name('student.list');
    Route::post('student/delete', [StudentController::class, 'destroyMany'])->name('student.delete');


    //Student-Fees routes
    Route::resource('student-fees', StudentFeesController::class)->except(['show']);
    Route::get('student-fees/{id}', [StudentFeesController::class, 'show'])->name('student-fees.show');
    Route::post('student-fees/list', [StudentFeesController::class, 'list'])->name('student-fees.list');
    Route::post('student-fees/delete', [StudentFeesController::class, 'destroyMany'])->name('student-fees.delete');
    Route::get('/get-domain-fee/{id}', function ($id) {
        $domain = DomainClass::find($id);
    
        if ($domain) {
            return response()->json(['success' => true, 'fees' => $domain->fees]);
        } else {
            return response()->json(['success' => false]);
        }
    })->name('student-fees.getprice');

    //Student-Fees-Dashboard routes
    Route::resource('student-fees-dashboard', StudentFeesDashboardController::class)->except(['show']);
    Route::post('student-fees-dashboard/list', [StudentFeesDashboardController::class, 'list'])->name('student-fees-dashboard.list');
    Route::post('student-fees-dashboard/delete', [StudentFeesDashboardController::class, 'destroyMany'])->name('student-fees-dashboard.delete');
    Route::post('student-fees-dashboard/dashboardList', [StudentFeesDashboardController::class, 'dashboardList'])->name('student-fees-dashboard.dashboardList');

    //Student-event routes
    Route::resource('event', EventManagmentController::class)->except(['show']);
    Route::post('event/list', [EventManagmentController::class, 'list'])->name('event.list');
    Route::post('event/delete', [EventManagmentController::class, 'destroyMany'])->name('event.delete');


    Route::get('/calendar/index', [CalendarController::class, 'index'])->name('calendar.index');
    Route::post('/calendar/store', [CalendarController::class, 'store'])->name('calendar.create');
    Route::post('/calendar/update/{id}', [CalendarController::class, 'update'])->name('calendar.update');
    Route::delete('/calendar/destroy/{id}', [CalendarController::class, 'destroy'])->name('calendar.destroy');

    Route::resource('menu', MenuController::class)->except(['show']);
    Route::post('menu/list', [MenuController::class, 'list'])->name('menu.list');



});
Route::fallback(function () {
    
    return response()->view('errors.404', [], 404);
});


require __DIR__.'/auth.php';
