<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\AdminDashboardComponent;
use App\Livewire\Sprovider\SproviderDashboardComponent;
use App\Livewire\Sprovider\SproviderProfileComponent;
use App\Livewire\Sprovider\EditSproviderProfileComponent;
use App\Livewire\Customer\CustomerDashboardComponent;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SearchController;
use App\Livewire\ServiceCategoriesComponent;
use App\Livewire\ServicesByCategoryComponent;
use App\Livewire\ServiceDetailsComponent;
use App\Livewire\Admin\AdminServiceCategoryComponent;
use App\Livewire\Admin\AdminAddServiceCategoryComponent;
use App\Livewire\Admin\AdminEditServiceCategoryComponent;
use App\Livewire\Admin\AdminAddServiceComponent;
use App\Livewire\Admin\AdminServicesByCategoryComponent;
use App\Livewire\Admin\AdminEditServiceComponent;
use App\Livewire\Admin\AdminServicesComponent;
use App\Livewire\Admin\AdminServiceProviderComponent;
use App\Livewire\Admin\AdminUsersComponent;
use App\Livewire\Admin\AdminBookingsComponent;
use App\Livewire\Admin\AdminEditUserComponent;
use App\Livewire\Admin\AdminEditBookingsComponent;
use App\Livewire\Customer\CustomerProfileComponent;
use App\Livewire\Customer\EditCustomerProfile;
use App\Livewire\Homepage;
use App\Livewire\HomeComponent;
use App\Livewire\ContactUsComponent;
use App\Livewire\AboutUsComponent;
use App\Livewire\ChangeLocationComponent;
use App\Livewire\BookServiceComponent;
use App\Livewire\BookingForm;

// use App\Http\Controllers\ServiceController;

// Route::get('/services/{service}', [ServiceController::class, 'show'])->name('services.show');
// Route::post('/services/{service}/book', [ServiceController::class, 'book'])->name('services.book');
// Route::post('/services/{service}/accept', [ServiceController::class, 'acceptBooking'])->name('services.accept');


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
use App\Http\Controllers\BookingController;

// Route::get('/booking', BookingForm::class)->name('booking.form');
Route::post('/booking', [BookingController::class, 'bookService'])->name('booking.book');


Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');
Route::post('/register', [RegisterController::class, 'register'])->name('register');
Route::get('/home-page', HomeComponent::class)->name('homepage');
// Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/service-categories',ServiceCategoriesComponent::class)->name('home.service_categories');
Route::get('/{category_slug}/services', ServicesByCategoryComponent::class)->name('home.services_by_category');
Route::get('/service/{service_slug}', ServiceDetailsComponent::class)->name('home.services_details');
Route::get('/contactus', ContactUsComponent::class)->name('home.contact_us');
Route::get('/aboutus', AboutUsComponent::class)->name('home.about_us');

Route::get('/booking-form', BookingForm::class)->name('home.booking-form');


Route::get('/autocomplete',[SearchController::class,'autocomplete'])->name('autocomplete');
Route::post('/search',[SearchController::class,'searchService'])->name('searchService');

Route::get('/change-location',ChangeLocationComponent::class)->name('home.change_location');

Route::get('/book-service', BookServiceComponent::class)->name('book-service');
//For Customer
Route::get('/', HomeComponent::class)->name('home');
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/customer/dashboard', CustomerDashboardComponent::class)->name('customer.dashboard');
    Route::get('/customer/profile', CustomerProfileComponent::class)->name('customer.profile');
    Route::get('/customer/profile/edit', EditCustomerProfile::class)->name('customer.edit_profile');
});

//For Service Provider
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'authsprovider'
])->group(function () {
    Route::get('/sprovider/dashboard', SproviderDashboardComponent::class)->name('sprovider.dashboard');
    Route::get('/sprovider/profile',SproviderProfileComponent::class)->name('sprovider.profile');
    Route::get('/sprovider/profile/edit',EditSproviderProfileComponent::class)->name('sprovider.edit_profile');
});

//For Admin
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'authadmin'
])->group(function () {
    Route::get('/admin/users', AdminDashboardComponent::class)->name('admin.users');
    Route::get('/admin/service-categories',AdminServiceCategoryComponent::class)->name('admin.service_categories');
    Route::get('/admin/service-category/add',AdminAddServiceCategoryComponent::class)->name('admin.add_service_categories');
    Route::get('/admin/service-category/edit/{category_id}',AdminEditServiceCategoryComponent::class)->name('admin.edit_service_category');
    Route::get('/admin/all-services',AdminServicesComponent::class)->name('admin.all_services'); 
    Route::get('/admin/{category_slug}/services',AdminServicesByCategoryComponent::class)->name('admin.services_by_category'); 
    Route::get('/admin/service/add',AdminAddServiceComponent::class)->name('admin.add_service');
    Route::get('/admin/service/edit/{service_slug}',AdminEditServiceComponent::class)->name('admin.edit_service');
    Route::get('/admin/service-providers',AdminEditServiceComponent::class)->name('admin.service_providers');
    Route::get('/admin/dashboard',AdminUsersComponent::class)->name('admin.dashboard');
    Route::get('/admin/users/edit/{id}',AdminEditUserComponent::class)->name('admin.edit_users');
    Route::get('/admin/bookings',AdminBookingsComponent::class)->name('admin.bookings');
    // Route::get('/admin/bookings/edit',AdminEditBookingsComponent::class)->name('admin.edit_bookings');
});

