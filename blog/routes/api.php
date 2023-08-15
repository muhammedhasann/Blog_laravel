
<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\AdminController;


// Public routes

Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/tags', [TagController::class, 'index']);
Route::get('/posts', [BlogPostController::class, 'index']);
Route::get('/posts/{post}', [BlogPostController::class, 'show']);

// Protected routes (require authentication)

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::post('/posts', [BlogPostController::class, 'store']);
    Route::put('/posts/{post}', [BlogPostController::class, 'update']);
    Route::delete('/posts/{post}', [BlogPostController::class, 'destroy']);
    Route::post('/images/upload', [ImageController::class, 'upload']);
    Route::delete('/images/{id}', [ImageController::class, 'destroy']);
    Route::post('/posts/{post}/tags', [PostController::class, 'addTags']);
});

// Admin routes (require authentication and admin role)

Route::middleware(['auth:sanctum', 'role:admin'])->group(function () {
    Route::post('/admin/create-role', [AdminController::class, 'createRole']);
    Route::post('/admin/create-permission', [AdminController::class, 'createPermission']);
    Route::post('/admin/assign-permission-to-role/{role}', [AdminController::class, 'assignPermissionToRole']);
    Route::post('/admin/assign-role-to-user/{role}/{user}', [AdminController::class, 'assignRoleToUser']);
    Route::post('/admin/remove-permission-from-role/{role}', [AdminController::class, 'removePermissionFromRole']);
    Route::post('/admin/remove-role-from-user/{role}/{user}', [AdminController::class, 'removeRoleFromUser']);
});
