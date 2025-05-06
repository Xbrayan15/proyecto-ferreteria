<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\TaxController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductImageController;
use App\Http\Controllers\ProductPriceHistoryController;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\ProductReviewController;
use App\Http\Controllers\ProductTaxController;
use App\Http\Controllers\StockMovementController;
use App\Http\Controllers\ShoppingCartController;
use App\Http\Controllers\CartItemController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\OrderStatusHistoryController;
use App\Http\Controllers\InvoiceItemController;
use App\Http\Controllers\InvoiceTaxController;
use App\Http\Controllers\InvoiceStatusHistoryController;

use App\Models\Product;

Route::get('/', function () {
    if (auth()->check()) {
        return view('dashboard');
    } else {
        return view('welcome');
    }
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




Route::middleware(['auth'])->group(function () {
    Route::get('/addresses', [AddressController::class, 'index'])->name('addresses.index');
    Route::get('/addresses/create', [AddressController::class, 'create'])->name('addresses.create');
    Route::post('/addresses', [AddressController::class, 'store'])->name('addresses.store');
    Route::get('/addresses/{address}', [AddressController::class, 'show'])->name('addresses.show');
    Route::get('/addresses/{address}/edit', [AddressController::class, 'edit'])->name('addresses.edit');
    Route::put('/addresses/{address}', [AddressController::class, 'update'])->name('addresses.update');
    Route::delete('/addresses/{address}', [AddressController::class, 'destroy'])->name('addresses.destroy');
});



Route::middleware(['auth'])->group(function () {
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
    Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/subcategories', [SubcategoryController::class, 'index'])->name('subcategories.index');
    Route::get('/subcategories/create', [SubcategoryController::class, 'create'])->name('subcategories.create');
    Route::post('/subcategories', [SubcategoryController::class, 'store'])->name('subcategories.store');
    Route::get('/subcategories/{subcategory}', [SubcategoryController::class, 'show'])->name('subcategories.show');
    Route::get('/subcategories/{subcategory}/edit', [SubcategoryController::class, 'edit'])->name('subcategories.edit');
    Route::put('/subcategories/{subcategory}', [SubcategoryController::class, 'update'])->name('subcategories.update');
    Route::delete('/subcategories/{subcategory}', [SubcategoryController::class, 'destroy'])->name('subcategories.destroy');
});



Route::middleware(['auth'])->group(function () {
    Route::get('/brands', [BrandController::class, 'index'])->name('brands.index');
    Route::get('/brands/create', [BrandController::class, 'create'])->name('brands.create');
    Route::post('/brands', [BrandController::class, 'store'])->name('brands.store');
    Route::get('/brands/{brand}', [BrandController::class, 'show'])->name('brands.show');
    Route::get('/brands/{brand}/edit', [BrandController::class, 'edit'])->name('brands.edit');
    Route::put('/brands/{brand}', [BrandController::class, 'update'])->name('brands.update');
    Route::delete('/brands/{brand}', [BrandController::class, 'destroy'])->name('brands.destroy');
});







Route::middleware(['auth'])->group(function () {
    Route::get('/taxes', [TaxController::class, 'index'])->name('taxes.index');
    Route::get('/taxes/create', [TaxController::class, 'create'])->name('taxes.create');
    Route::post('/taxes', [TaxController::class, 'store'])->name('taxes.store');
    Route::get('/taxes/{tax}/edit', [TaxController::class, 'edit'])->name('taxes.edit');
    Route::put('/taxes/{tax}', [TaxController::class, 'update'])->name('taxes.update');
    Route::delete('/taxes/{tax}', [TaxController::class, 'destroy'])->name('taxes.destroy');
});



Route::middleware(['auth'])->group(function () {
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

    Route::post('/product-reviews', [ProductReviewController::class, 'store'])->name('product-reviews.store');
});





Route::prefix('products/{productId}/images')->name('product.images.')->group(function() {
    Route::get('/', [ProductImageController::class, 'index'])->name('index');
    Route::get('create', [ProductImageController::class, 'create'])->name('create');
    Route::post('store', [ProductImageController::class, 'store'])->name('store');
    Route::get('{imageId}/edit', [ProductImageController::class, 'edit'])->name('edit');
    Route::put('{imageId}', [ProductImageController::class, 'update'])->name('update');
    Route::delete('{imageId}', [ProductImageController::class, 'destroy'])->name('destroy');
    Route::post('{imageId}/set-main', [ProductImageController::class, 'setMain'])->name('setMain');
});



// Dentro de grupo auth si aplica


Route::resource('product_price_history', ProductPriceHistoryController::class);




Route::resource('payment_methods', PaymentMethodController::class);




Route::post('/product-reviews', [ProductReviewController::class, 'store'])->name('product-reviews.store');

Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');


Route::get('products/{product}', [ProductController::class, 'show'])->name('products.show');


Route::post('/products/{product}/taxes', [ProductTaxController::class, 'attach'])->name('products.taxes.attach');
Route::delete('/products/{product}/taxes/{tax}', [ProductTaxController::class, 'detach'])->name('products.taxes.detach');



Route::resource('stock-movements', StockMovementController::class);





Route::resource('shopping-carts', ShoppingCartController::class);




Route::resource('cart-items', CartItemController::class);




Route::resource('coupons', CouponController::class);






// Ruta personalizada para hacer checkout desde el carrito
Route::middleware('auth')->group(function () {
    Route::resource('orders', OrderController::class);
    Route::post('/checkout', [OrderController::class, 'checkoutFromCart'])->name('orders.checkout');
});




Route::resource('order-items', OrderItemController::class);



Route::resource('order-status-history', OrderStatusHistoryController::class);

// routes/web.php



Route::resource('invoice-items', InvoiceItemController::class);




Route::resource('invoice-taxes', InvoiceTaxController::class);




Route::resource('invoice-status-history', InvoiceStatusHistoryController::class);








require __DIR__.'/auth.php';
