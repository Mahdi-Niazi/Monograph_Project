<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AddMember;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\Sidebar;



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

Route::get('/', function (){
    return redirect('login');
});

//Login Routes
Route::view('login', 'user.login')->name('login');
Route::post('/login', [UserController::class, 'login']);


//Dashboard Routes
Route::middleware('auth')->group(function(){
    Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard');
});
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::controller(Sidebar::class)->group(function(){
        Route::view('/edit-profile', 'edit-profile');
        Route::get('edit-profile','editProfile');
        Route::post('edit-profile','updateProfile'); 
    });

Route::middleware(['auth', 'isAdmin'])->group(function(){

    Route::controller(UserController::class)->group(function(){
        Route::view('register', 'user.register');
        Route::get('register', 'empName'); 
        Route::post('register', 'store');   
        Route::view('view-users', 'user.view-users');  
        Route::get('/view-users','users' ); 
        Route::get('edit-user/{id}', 'editUser');  
        Route::post('edit-user', 'updateUser');
        Route::get('delete-user/{id}','delete');
    });   
    // Employee Controller
    Route::controller(EmployeeController::class)->group(function(){
        Route::view('add-employee', 'employee.addemp');
        Route::post('add-employee', 'store');
        Route::get('view-employee', 'viewEmp');
        Route::get('edit-employee/{id}', 'editEmp');
        Route::post('edit-employee', 'updateEmp');
        Route::get('delete-employee/{id}','delete');
    });

});

Route::middleware(['auth','isClerk'])->group(function(){ 
    //Business Controller
    Route::controller(BusinessController::class)->group(function(){
        Route::view('/add-business','members.add-business');
        Route::post('add-business','business');
        Route::get('add-business','fname');
        Route::get('edit-business/{id}','edit');
        Route::post('edit-business', 'update');
    
    });
    //Address Controller
    Route::controller(AddressController::class)->group(function () {
        Route::get('edit-address/{id}', 'edit');
        Route::post('edit-address','update');
        Route::view('/address', 'address.add-address'); 
        Route::get('address','address');  
        Route::post('address', 'store');
        Route::post('/getProvince', 'getProvince');
        Route::post('/getDistrict', 'getDistrict');
    });
    //Education 
    Route::controller(EducationController::class)->group(function (){
        Route::get('edit-education/{id}', 'edit');
        Route::post('edit-education', 'update');
    });
    //News Controller
    Route::controller(NewsController::class)->group(function(){
            Route::view('/add-news', 'news.add-news');
            Route::view('/view-news', 'news.view-news');
            Route::post('add-news','addNews');
            Route::get('view-news','showNews');
            Route::get('show-news/{id}','viewNews');
            Route::get('delete-news/{nid}','newsDelete');
            Route::get('edit-news/{id}','newsEdit');
            Route::post('edit-news','newsUpdate');
    });
    //Member Controller
    Route::controller(AddMember::class)->group(function () {
            Route::view('view-members', 'members.view-member');
            Route::get('view-members','show');
            Route::get('delete-member/{id}','delete');
            Route::get('edit-member/{id}','memberEdit');
            Route::post('edit-member','memberUpdate');
            Route::get('show-member/{id}',  'showMember');
            Route::view('/add-member', 'members.add-member');
            Route::post('add-member', 'addData');
            Route::view('/education', 'members.education');
            Route::post('education','education');
            Route::get('education', 'edu');
    });
    //Event Controller
    Route::controller(EventController::class)->group(function () {
        Route::view('/view-events', 'events.view-events');
        Route::view('/add-events', 'events.add-event');
        Route::post('/add-events', 'addEvent');
        Route::get('view-events','showEvent');
        Route::get('event/{id}', 'viewEvent');
        Route::get('delete/{id}','eventDelete');
        Route::get('edit/{id}','eventEdit');
        Route::post('edit', 'eventUpdate');
    
    });
});

Route::middleware(['auth','isFinance'])->group(function(){
    Route::controller(BillController::class)->group(function (){
        Route::view('/add-bill', 'bills.add-bill');
        Route::view('/view-bill','bills.view-bill');
        Route::post('add-bill','addBill');
        Route::get('add-bill', 'nameType');
        Route::get('view-bill','joinBill');
        Route::get('bill/{id}','billDetail');
        Route::get('edit-bill/{id}','editBill');
        Route::post('edit-bill','updateBill');
        Route::get('deleteBill/{id}','deleteBill');
        Route::get('pricing', 'storePrice');
        Route::get('pricing', 'bill');
        Route::post('pricing', 'storePrice');
         Route::post('/getBusinessName', 'getBusinessName');
    });
});



