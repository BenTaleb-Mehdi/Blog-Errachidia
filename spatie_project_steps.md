# Complete Guide: Laravel Project with Auth + Spatie Roles/Permissions

## 1. Create a new Laravel project

```bash

composer create-project laravel/laravel blog-project
cd blog-project
```

- Create a new Laravel project named blog-project and move into the project folder.

## 2. Create a new Laravel project

```bash
composer require laravel/ui
php artisan ui bootstrap --auth
npm install
npm run dev
```

- laravel/ui provides pre-built authentication pages
- php artisan ui bootstrap --auth generates login/register pages
- npm install && npm run dev compiles CSS & JS

## 3. Run default migrations

```bash
php artisan migrate
```

- Creates tables like users, password_resets, etc.

## 4. Install Spatie Roles & Permissions

```bash
composer require spatie/laravel-permission
php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
php artisan migrate
```

- Adds support for roles and permissions (Admin, Author, etc.)

## 5. Setup Roles and Permissions in Tinker

```bash
php artisan tinker
```

#### Inside Tinker :

```bash
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

// Create roles
$adminRole = Role::firstOrCreate(['name' => 'admin']);
$authorRole = Role::firstOrCreate(['name' => 'author']);

// Create permissions
$permissions = [
    'create articles',
    'edit own articles',
    'edit any articles',
    'delete own articles',
    'delete any articles',
    'view own articles',
    'view any articles',
];

foreach($permissions as $perm) {
    Permission::firstOrCreate(['name' => $perm]);
}

// Assign permissions to roles
$adminRole->givePermissionTo(Permission::all());
$authorRole->givePermissionTo([
    'create articles',
    'edit own articles',
    'delete own articles',
    'view own articles'
]);

// Assign role to a user
$user = User::where('email','author@example.com')->first();
$user->assignRole('author');

```

## 6. Add Middleware and Routes

```bash
Route::middleware('auth')->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');

    // Create + Store
    Route::middleware('permission:create articles')->group(function () {
        Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');
        Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');
    });

    // Edit + Update
    Route::middleware('permission:edit articles')->group(function () {
        Route::get('/articles/{article}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
        Route::put('/articles/{article}', [ArticleController::class, 'update'])->name('articles.update');
    });

    // Delete
    Route::middleware('permission:delete articles')->group(function () {
        Route::delete('/articles/{article}', [ArticleController::class, 'destroy'])->name('articles.destroy');
    });
});

```

## 7. Run the development server

```bash
php artisan serve
```

- Access your app at http://127.0.0.1:8000 and test login, article creation, and permissions.
