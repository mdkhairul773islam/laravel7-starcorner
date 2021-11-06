<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect()->route('admin.login');
});


Auth::routes();

Route::get('login', function () {
    return redirect()->route('admin.login');
});

Route::any('register', function () {
    return redirect()->route('admin.login');
});
Route::any('password/confirm', function () {
    return redirect()->route('admin.login');
});
Route::post('password/email', function () {
    return redirect()->route('admin.login');
});
Route::any('password/reset', function () {
    return redirect()->route('admin.login');
});

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('admin/login', [App\Http\Controllers\AccessController::class, 'index'])->name('admin.login');
Route::post('admin/login', [App\Http\Controllers\AccessController::class, 'login'])->name('admin.login');
Route::post('admin/logout', [App\Http\Controllers\AccessController::class, 'logout'])->name('admin.logout');

Route::prefix('admin/dashboard')->group(function () {
    Route::get('/', [App\Http\Controllers\DashboardController::class, 'index'])->name('admin.dashboard');
    Route::post('/machine-record', [App\Http\Controllers\DashboardController::class, 'machineRecord'])->name('admin.dashboard.machine-record');
});

// product route
Route::prefix('admin/product')->group(function () {
    Route::any('/', [App\Http\Controllers\ProductController::class, 'index'])->name('admin.product');
    Route::get('/create', [App\Http\Controllers\ProductController::class, 'create'])->name('admin.product.create');
    Route::post('/store', [App\Http\Controllers\ProductController::class, 'store'])->name('admin.product.store');
    Route::get('/edit/{id}', [App\Http\Controllers\ProductController::class, 'edit'])->name('admin.product.edit');
    Route::post('/update', [App\Http\Controllers\ProductController::class, 'update'])->name('admin.product.update');
    Route::get('/destroy/{id}', [App\Http\Controllers\ProductController::class, 'destroy'])->name('admin.product.destroy');

    // category
    Route::get('/category', [App\Http\Controllers\ProductController::class, 'category'])->name('admin.product.category');
    Route::post('/category-store', [App\Http\Controllers\ProductController::class, 'categoryStore'])->name('admin.product.category-store');
    Route::post('/category-edit', [App\Http\Controllers\ProductController::class, 'categoryEdit'])->name('admin.product.category-edit');
    Route::post('/category-update', [App\Http\Controllers\ProductController::class, 'categoryUpdate'])->name('admin.product.category-update');
    Route::get('/category-destroy/{id}', [App\Http\Controllers\ProductController::class, 'categoryDestroy'])->name('admin.product.category-destroy');

    // subcategory
    Route::any('/subcategory', [App\Http\Controllers\ProductController::class, 'subcategory'])->name('admin.product.subcategory');
    Route::post('/subcategory-store', [App\Http\Controllers\ProductController::class, 'subcategoryStore'])->name('admin.product.subcategory-store');
    Route::post('/subcategory-edit', [App\Http\Controllers\ProductController::class, 'subcategoryEdit'])->name('admin.product.subcategory-edit');
    Route::post('/subcategory-update', [App\Http\Controllers\ProductController::class, 'subcategoryUpdate'])->name('admin.product.subcategory-update');
    Route::get('/subcategory-destroy/{id}', [App\Http\Controllers\ProductController::class, 'subcategoryDestroy'])->name('admin.product.subcategory-destroy');

    // brand
    Route::any('/brand', [App\Http\Controllers\ProductController::class, 'brand'])->name('admin.product.brand');
    Route::post('/brand-store', [App\Http\Controllers\ProductController::class, 'brandStore'])->name('admin.product.brand-store');
    Route::post('/brand-edit', [App\Http\Controllers\ProductController::class, 'brandEdit'])->name('admin.product.brand-edit');
    Route::post('/brand-update', [App\Http\Controllers\ProductController::class, 'brandUpdate'])->name('admin.product.brand-update');
    Route::get('/brand-destroy/{id}', [App\Http\Controllers\ProductController::class, 'brandDestroy'])->name('admin.product.brand-destroy');

    // unit
    Route::any('/unit', [App\Http\Controllers\ProductController::class, 'unit'])->name('admin.product.unit');
    Route::post('/unit-store', [App\Http\Controllers\ProductController::class, 'unitStore'])->name('admin.product.unit-store');
    Route::post('/unit-edit', [App\Http\Controllers\ProductController::class, 'unitEdit'])->name('admin.product.unit-edit');
    Route::post('/unit-update', [App\Http\Controllers\ProductController::class, 'unitUpdate'])->name('admin.product.unit-update');
    Route::get('/unit-destroy/{id}', [App\Http\Controllers\ProductController::class, 'unitDestroy'])->name('admin.product.unit-destroy');
});

// machine route
Route::prefix('admin/machine')->group(function () {
    Route::any('/', [App\Http\Controllers\MachineController::class, 'index'])->name('admin.machine');
    Route::get('/create', [App\Http\Controllers\MachineController::class, 'create'])->name('admin.machine.create');
    Route::post('/store', [App\Http\Controllers\MachineController::class, 'store'])->name('admin.machine.store');
    Route::get('/edit/{id}', [App\Http\Controllers\MachineController::class, 'edit'])->name('admin.machine.edit');
    Route::post('/update', [App\Http\Controllers\MachineController::class, 'update'])->name('admin.machine.update');
    Route::get('/destroy/{id}', [App\Http\Controllers\MachineController::class, 'destroy'])->name('admin.machine.destroy');
});


// Supplier route
Route::prefix('admin/supplier')->group(function () {
    Route::any('/', [App\Http\Controllers\SupplierController::class, 'index'])->name('admin.supplier');
    Route::get('/create', [App\Http\Controllers\SupplierController::class, 'create'])->name('admin.supplier.create');
    Route::post('/store', [App\Http\Controllers\SupplierController::class, 'store'])->name('admin.supplier.store');
    Route::get('/edit/{id}', [App\Http\Controllers\SupplierController::class, 'edit'])->name('admin.supplier.edit');
    Route::post('/update', [App\Http\Controllers\SupplierController::class, 'update'])->name('admin.supplier.update');
    Route::get('/show/{id}', [App\Http\Controllers\SupplierController::class, 'show'])->name('admin.supplier.show');
    Route::get('/destroy/{id}', [App\Http\Controllers\SupplierController::class, 'destroy'])->name('admin.supplier.destroy');
});

// party transaction
Route::prefix('admin/transaction')->group(function () {
    Route::any('/', [App\Http\Controllers\PartyTransactionController::class, 'index'])->name('admin.transaction');
    Route::get('/create', [App\Http\Controllers\PartyTransactionController::class, 'create'])->name('admin.transaction.create');
    Route::post('/store', [App\Http\Controllers\PartyTransactionController::class, 'store'])->name('admin.transaction.store');
    Route::get('/edit/{id}', [App\Http\Controllers\PartyTransactionController::class, 'edit'])->name('admin.transaction.edit');
    Route::post('/update', [App\Http\Controllers\PartyTransactionController::class, 'update'])->name('admin.transaction.update');
    Route::get('/show/{id}', [App\Http\Controllers\PartyTransactionController::class, 'show'])->name('admin.transaction.show');
    Route::post('/party-info', [App\Http\Controllers\PartyTransactionController::class, 'partyInfo'])->name('admin.transaction.party-info');
    Route::get('/destroy/{id}', [App\Http\Controllers\PartyTransactionController::class, 'destroy'])->name('admin.transaction.destroy');
});


// Purchase route
Route::prefix('admin/purchase')->group(function () {
    Route::any('/', [App\Http\Controllers\PurchaseController::class, 'index'])->name('admin.purchase');
    Route::get('/create', [App\Http\Controllers\PurchaseController::class, 'create'])->name('admin.purchase.create');
    Route::post('/store', [App\Http\Controllers\PurchaseController::class, 'store'])->name('admin.purchase.store');
    Route::get('/edit', [App\Http\Controllers\PurchaseController::class, 'edit'])->name('admin.purchase.edit');
    Route::get('/show/{vno}', [App\Http\Controllers\PurchaseController::class, 'show'])->name('admin.purchase.show');
    Route::any('/item-report', [App\Http\Controllers\PurchaseController::class, 'itemReport'])->name('admin.purchase.item-report');
    Route::get('/destroy/{vno}', [App\Http\Controllers\PurchaseController::class, 'destroy'])->name('admin.purchase.destroy');
    Route::post('/product-info', [App\Http\Controllers\PurchaseController::class, 'productInfo'])->name('admin.purchase.product-info');
    Route::post('/cv-exists', [App\Http\Controllers\PurchaseController::class, 'cvExists'])->name('admin.purchase.cv-exists');
});

// stock route
Route::any('admin/stock', [App\Http\Controllers\StockController::class, 'index'])->name('admin.stock');

// Sale route
Route::prefix('admin/sale')->group(function () {
    Route::any('/', [App\Http\Controllers\SaleController::class, 'index'])->name('admin.sale');
    Route::get('/create', [App\Http\Controllers\SaleController::class, 'create'])->name('admin.sale.create');
    Route::post('/store', [App\Http\Controllers\SaleController::class, 'store'])->name('admin.sale.store');
    Route::get('/edit', [App\Http\Controllers\SaleController::class, 'edit'])->name('admin.sale.edit');
    Route::get('/show/{id}', [App\Http\Controllers\SaleController::class, 'show'])->name('admin.sale.show');
    Route::any('/report', [App\Http\Controllers\SaleController::class, 'report'])->name('admin.sale.report');
    Route::get('/destroy/{id}', [App\Http\Controllers\SaleController::class, 'destroy'])->name('admin.sale.destroy');
    Route::post('/check-info', [App\Http\Controllers\SaleController::class, 'checkInfo'])->name('admin.sale.check-info');
    Route::post('/sale-info', [App\Http\Controllers\SaleController::class, 'saleInfo'])->name('admin.sale.sale-info');
    Route::post('/retail-balance', [App\Http\Controllers\SaleController::class, 'retailBalance'])->name('admin.sale.retail-balance');
    Route::post('/cash-balance', [App\Http\Controllers\SaleController::class, 'cashBalance'])->name('admin.sale.cash-balance');
    Route::post('/machine-info', [App\Http\Controllers\SaleController::class, 'machineInfo'])->name('admin.sale.machine-info');
});

// income
Route::prefix('admin/income')->group(function () {
    Route::any('/', [App\Http\Controllers\IncomeController::class, 'index'])->name('admin.income');
    Route::get('/category', [App\Http\Controllers\IncomeController::class, 'category'])->name('admin.income.category');
    Route::get('/field', [App\Http\Controllers\IncomeController::class, 'field'])->name('admin.income.field');
    Route::get('/create', [App\Http\Controllers\IncomeController::class, 'create'])->name('admin.income.create');
    Route::post('/store', [App\Http\Controllers\IncomeController::class, 'store'])->name('admin.income.store');
    Route::get('/edit/{id}', [App\Http\Controllers\IncomeController::class, 'edit'])->name('admin.income.edit');
    Route::post('/update', [App\Http\Controllers\IncomeController::class, 'update'])->name('admin.income.update');
    Route::get('/show/{id}', [App\Http\Controllers\IncomeController::class, 'show'])->name('admin.income.show');
    Route::get('/destroy/{id}', [App\Http\Controllers\IncomeController::class, 'destroy'])->name('admin.income.destroy');
});

// cost
Route::prefix('admin/cost')->group(function () {
    Route::any('/', [App\Http\Controllers\CostController::class, 'index'])->name('admin.cost');
    Route::get('/category', [App\Http\Controllers\IncomeController::class, 'category'])->name('admin.cost.category');
    Route::get('/field', [App\Http\Controllers\IncomeController::class, 'field'])->name('admin.cost.field');
    Route::get('/create', [App\Http\Controllers\CostController::class, 'create'])->name('admin.cost.create');
    Route::post('/store', [App\Http\Controllers\CostController::class, 'store'])->name('admin.cost.store');
    Route::get('/edit/{id}', [App\Http\Controllers\CostController::class, 'edit'])->name('admin.cost.edit');
    Route::post('/update', [App\Http\Controllers\CostController::class, 'update'])->name('admin.cost.update');
    Route::get('/show/{id}', [App\Http\Controllers\CostController::class, 'show'])->name('admin.cost.show');
    Route::get('/destroy/{id}', [App\Http\Controllers\CostController::class, 'destroy'])->name('admin.cost.destroy');
});


// income
Route::prefix('admin/md-transaction')->group(function () {
    Route::any('/', [App\Http\Controllers\MdTransactionController::class, 'index'])->name('admin.md-transaction');
    Route::get('/create', [App\Http\Controllers\MdTransactionController::class, 'create'])->name('admin.md-transaction.create');
    Route::post('/store', [App\Http\Controllers\MdTransactionController::class, 'store'])->name('admin.md-transaction.store');
    Route::get('/edit/{id}', [App\Http\Controllers\MdTransactionController::class, 'edit'])->name('admin.md-transaction.edit');
    Route::post('/update', [App\Http\Controllers\MdTransactionController::class, 'update'])->name('admin.md-transaction.update');
    Route::get('/show/{id}', [App\Http\Controllers\MdTransactionController::class, 'show'])->name('admin.md-transaction.show');
    Route::get('/destroy/{id}', [App\Http\Controllers\MdTransactionController::class, 'destroy'])->name('admin.md-transaction.destroy');
});

// user route
Route::prefix('admin/user')->group(function () {
    Route::any('/', [App\Http\Controllers\UserController::class, 'index'])->name('admin.user');
    Route::get('/create', [App\Http\Controllers\UserController::class, 'create'])->name('admin.user.create');
    Route::post('/store', [App\Http\Controllers\UserController::class, 'store'])->name('admin.user.store');
    Route::get('/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('admin.user.edit');
    Route::post('/update', [App\Http\Controllers\UserController::class, 'update'])->name('admin.user.update');
    Route::post('/change-password', [App\Http\Controllers\UserController::class, 'changePassword'])->name('admin.user.change-password');
    Route::get('/show/{id}', [App\Http\Controllers\UserController::class, 'show'])->name('admin.user.show');
    Route::get('/destroy/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('admin.user.destroy');
});

// Settings route
Route::prefix('admin/settings')->group(function () {
    //Route::any('/', [App\Http\Controllers\SettingsController::class, 'index'])->name('admin.settings');
    //Route::get('/create', [App\Http\Controllers\SettingsController::class, 'create'])->name('admin.settings.create');
    //Route::get('/edit', [App\Http\Controllers\SettingsController::class, 'edit'])->name('admin.settings.edit');
    Route::get('/profile', [App\Http\Controllers\SettingsController::class, 'profile'])->name('admin.settings.profile');
});

Route::any('admin/privilege', [App\Http\Controllers\PrivilegeController::class, 'index'])->name('admin.privilege');
Route::post('admin/privilege/user-list', [App\Http\Controllers\PrivilegeController::class, 'userList'])->name('admin.privilege.user-list');
Route::post('admin/privilege/user-role', [App\Http\Controllers\PrivilegeController::class, 'userRole'])->name('admin.privilege.user-role');
