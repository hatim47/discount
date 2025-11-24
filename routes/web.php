<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\AiapplicationController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\ComponentpageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormsController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\RoleandaccessController;
use App\Http\Controllers\CryptocurrencyController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\RatingController;
use App\Models\Region;

try {
    $validRegions = Region::where('status', 1)
                         ->pluck('code')
                         ->implode('|');
    // Result: "au|ca|uk|nz|de|fr" etc.
} catch (\Exception $e) {
    // Fallback if database not available yet
    $validRegions = 'au|ca|uk|nz|de|fr';
}
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web']], function () {
     \UniSharp\LaravelFilemanager\Lfm::routes();
});
Route::controller(DashboardController::class)->group(function () {
    Route::get('admin', 'index')->name('index');
});
Route::controller(CategoryController::class)->group(function () {
Route::get('admin/cate','add')->name('cate.add');
Route::get('admin/categories/show/{id}','show')->name('cate.show');});
 Route::get('admin/stores/category/{category}', [StoreController::class, 'index_cat'])->name('stores.index');
    // Coupons filtered by category
Route::get('admin/coupons/category/{category}', [CouponController::class, 'index_cat'])->name('coupons.index');
Route::get('admin/coupons/store/{category}', [CouponController::class, 'index_Store'])->name('coupons.index_store');


Route::get('/admin/login', [App\Http\Controllers\Admin\Auth\LoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [App\Http\Controllers\Admin\Auth\LoginController::class, 'login'])->name('admin.login.post');
Route::resource('admin/categories',CategoryController::class);
Route::resource('admin/store',StoreController::class);
Route::resource('admin/coupon',CouponController::class);
Route::resource('admin/event',EventController::class);

Route::middleware('setregion')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('all-event', [EventController::class, 'event'])->name('event.all');
     Route::get('event/{slug}', [EventController::class, 'subevent'])->name('event');
    Route::get('store/{slug}', [StoreController::class, 'website'])->name('store.website');
    Route::get('all-store', [StoreController::class, 'store_menu'])->name('store.menusa');
    Route::get('all-store/{slug}', [StoreController::class, 'menu'])->name('store.menu');
    Route::get('categories', [CategoryController::class, 'categmenu'])->name('categ.menu');
    Route::get('categories/{slug}', [CategoryController::class, 'page'])->name('categ.page');
    Route::post('stores/{storeId}/rate', [StoreController::class, 'rate'])->name('store.rate');
 Route::get('search', [StoreController::class, 'search'])->name('store.search');
     Route::get('popupsearch', [StoreController::class, 'popupsearch'])->name('.categ.menu');
});

// Region-prefixed routes (dynamically from database)
Route::prefix('{region}')
    ->where(['region' => $validRegions]) // Only match valid region codes
    ->middleware('setregion')
    ->group(function () {
        Route::get('/', [HomeController::class, 'index'])->name('region.home');
        Route::get('store/{slug}', [StoreController::class, 'website'])->name('region.store.website');
        Route::get('all-store', [StoreController::class, 'store_menu'])->name('region.store.menusa');
        Route::get('all-event', [EventController::class, 'event'])->name('region.event.all');
        Route::get('event/{slug}', [EventController::class, 'subevent'])->name('region.event');
        Route::get('all-store/{slug}', [StoreController::class, 'menu'])->name('region.store.menu');
        Route::get('categories', [CategoryController::class, 'categmenu'])->name('region.categ.menu');
        Route::get('categories/{slug}', [CategoryController::class, 'page'])->name('region.categ.page');
        Route::post('stores/{storeId}/rate', [StoreController::class, 'rate'])->name('region.store.rate');
 Route::get('search', [StoreController::class, 'search'])->name('region.store.search');
 Route::get('popupsearch', [StoreController::class, 'popupsearch'])->name('region.categ.menu');

    });














// Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
// Route::get('/portal', fn() => view('website.portal'))->middleware('auth:web')->name('user.portal');
// Route::post('/register', [RegisterController::class, 'register'])->name('register');
// ADMIN AUTH
Route::controller(HomeController::class)->group(function () {
 

    Route::get('calendar','calendar')->name('calendar');
    Route::get('chatmessage','chatMessage')->name('chatMessage');
    Route::get('chatempty','chatempty')->name('chatempty');
    Route::get('email','email')->name('email');
    Route::get('error','error1')->name('error');
    Route::get('faq','faq')->name('faq');
    Route::get('gallery','gallery')->name('gallery');
    Route::get('kanban','kanban')->name('kanban');
    Route::get('pricing','pricing')->name('pricing');
    Route::get('termscondition','termsCondition')->name('termsCondition');
    Route::get('widgets','widgets')->name('widgets');
    Route::get('chatprofile','chatProfile')->name('chatProfile');
    Route::get('veiwdetails','veiwDetails')->name('veiwDetails');
    Route::get('blankPage','blankPage')->name('blankPage');
    Route::get('emp','emp')->name('page.emp');
    Route::get('attend','attend')->name('page.attend');
    Route::get('setting','setting')->name('page.setting');
    Route::get('comingSoon','comingSoon')->name('comingSoon');
    Route::get('maintenance','maintenance')->name('maintenance');
    Route::get('starred','starred')->name('starred');
    Route::get('testimonials','testimonials')->name('testimonials');
    });

    // aiApplication
Route::prefix('aiapplication')->group(function () {
    Route::controller(AiapplicationController::class)->group(function () {
        Route::get('/codegenerator', 'codeGenerator')->name('codeGenerator');
        Route::get('/codegeneratornew', 'codeGeneratorNew')->name('codeGeneratorNew');
        Route::get('/imagegenerator','imageGenerator')->name('imageGenerator');
        Route::get('/textgeneratornew','textGeneratorNew')->name('textGeneratorNew');
        Route::get('/textgenerator','textGenerator')->name('textGenerator');
        Route::get('/videogenerator','videoGenerator')->name('videoGenerator');
        Route::get('/voicegenerator','voiceGenerator')->name('voiceGenerator');
    });
});

// Authentication
Route::prefix('authentication')->group(function () {
    Route::controller(AuthenticationController::class)->group(function () {
        Route::get('/forgotpassword', 'forgotPassword')->name('forgotPassword');
        Route::get('/signin', 'signin')->name('signin');
        Route::get('/signup', 'signup')->name('signup');
    });
});

// chart
Route::prefix('chart')->group(function () {
    Route::controller(ChartController::class)->group(function () {
        Route::get('/columnchart', 'columnChart')->name('columnChart');
        Route::get('/linechart', 'lineChart')->name('lineChart');
        Route::get('/piechart', 'pieChart')->name('pieChart');
    });
});

// Componentpage
Route::prefix('componentspage')->group(function () {
    Route::controller(ComponentpageController::class)->group(function () {
        Route::get('/alert', 'alert')->name('alert');
        Route::get('/avatar', 'avatar')->name('avatar');
        Route::get('/badges', 'badges')->name('badges');
        Route::get('/button', 'button')->name('button');
        Route::get('/calendar', 'calendar')->name('calendar');
        Route::get('/card', 'card')->name('card');
        Route::get('/carousel', 'carousel')->name('carousel');
        Route::get('/colors', 'colors')->name('colors');
        Route::get('/dropdown', 'dropdown')->name('dropdown');
        Route::get('/imageupload', 'imageUpload')->name('imageUpload');
        Route::get('/list', 'list')->name('list');
        Route::get('/pagination', 'pagination')->name('pagination');
        Route::get('/progress', 'progress')->name('progress');
        Route::get('/radio', 'radio')->name('radio');
        Route::get('/starrating', 'starRating')->name('starRating');
        Route::get('/switch', 'switch')->name('switch');
        Route::get('/tabs', 'tabs')->name('tabs');
        Route::get('/tags', 'tags')->name('tags');
        Route::get('/tooltip', 'tooltip')->name('tooltip');
        Route::get('/typography', 'typography')->name('typography');
        Route::get('/videos', 'videos')->name('videos');
    });
});

// Dashboard
Route::prefix('dashboard')->group(function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/index', 'index')->name('index');
        Route::get('/index2', 'index2')->name('index2');
        Route::get('/index3', 'index3')->name('index3');
        Route::get('/index4', 'index4')->name('index4');
        Route::get('/index5','index5')->name('index5');
        Route::get('/index6','index6')->name('index6');
        Route::get('/index7','index7')->name('index7');
        Route::get('/index8','index8')->name('index8');
        Route::get('/index9','index9')->name('index9');
        Route::get('/index10','index10')->name('index10');
        Route::get('/dash','dash')->name('Dash');
        Route::get('/wallet','wallet')->name('wallet');
    });
});

// Forms
Route::prefix('forms')->group(function () {
    Route::controller(FormsController::class)->group(function () {
        Route::get('/form-layout', 'formLayout')->name('formLayout');
        Route::get('/form-validation', 'formValidation')->name('formValidation');
        Route::get('/form', 'form')->name('form');
        Route::get('/wizard', 'wizard')->name('wizard');
    });
});

// invoice/invoiceList
Route::prefix('invoice')->group(function () {
    Route::controller(InvoiceController::class)->group(function () {
        Route::get('/invoice-add', 'invoiceAdd')->name('invoiceAdd');
        Route::get('/invoice-edit', 'invoiceEdit')->name('invoiceEdit');
        Route::get('/invoice-list', 'invoiceList')->name('invoiceList');
        Route::get('/invoice-preview', 'invoicePreview')->name('invoicePreview');
    });
});

// Settings
Route::prefix('settings')->group(function () {
    Route::controller(SettingsController::class)->group(function () {
        Route::get('/company', 'company')->name('company');
        Route::get('/currencies', 'currencies')->name('currencies');
        Route::get('/language', 'language')->name('language');
        Route::get('/notification', 'notification')->name('notification');
        Route::get('/notification-alert', 'notificationAlert')->name('notificationAlert');
        Route::get('/payment-gateway', 'paymentGateway')->name('paymentGateway');
        Route::get('/theme', 'theme')->name('theme');
    });
});

// Table
Route::prefix('table')->group(function () {
    Route::controller(TableController::class)->group(function () {
        Route::get('/tablebasic', 'tableBasic')->name('tableBasic');
        Route::get('/tabledata', 'tableData')->name('tableData');
    });
});

// Users
Route::prefix('users')->group(function () {
    Route::controller(UsersController::class)->group(function () {
        Route::get('/add-user', 'addUser')->name('addUser');
        Route::get('/users-grid', 'usersGrid')->name('usersGrid');
        Route::get('/users-list', 'usersList')->name('usersList');
        Route::get('/view-profile', 'viewProfile')->name('viewProfile');
    });
});

// Users
Route::prefix('blog')->group(function () {
    Route::controller(BlogController::class)->group(function () {
        Route::get('/addBlog', 'addBlog')->name('addBlog');
        Route::get('/blog', 'blog')->name('blog');
        Route::get('/blogDetails', 'blogDetails')->name('blogDetails');
    });
});

// Users
Route::prefix('roleandaccess')->group(function () {
    Route::controller(RoleandaccessController::class)->group(function () {
        Route::get('/assignRole', 'assignRole')->name('assignRole');
        Route::get('/roleAaccess', 'roleAaccess')->name('roleAaccess');
    });
});

// Users
Route::prefix('cryptocurrency')->group(function () {
    Route::controller(CryptocurrencyController::class)->group(function () {
        Route::get('/marketplace', 'marketplace')->name('marketplace');
        Route::get('/marketplacedetails', 'marketplaceDetails')->name('marketplaceDetails');
        Route::get('/portfolio', 'portfolio')->name('portfolio');
        Route::get('/wallet', 'wallet')->name('wallet');
    });
});


