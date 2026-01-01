<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Mahasiswa;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Share data mahasiswa ke semua view jika sudah login
        View::composer('*', function ($view) {
            $mahasiswa = null;
            $idMahasiswa = session('id_mahasiswa');
            
            if ($idMahasiswa) {
                $mahasiswa = Mahasiswa::find($idMahasiswa);
            }
            
            $view->with('currentMahasiswa', $mahasiswa);
        });
    }
}