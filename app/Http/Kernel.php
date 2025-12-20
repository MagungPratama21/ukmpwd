protected $routeMiddleware = [
    'auth' => \App\Http\Middleware\Authenticate::class,

    'admin.auth' => \App\Http\Middleware\AdminAuth::class,
];
