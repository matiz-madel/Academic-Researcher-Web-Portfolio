<?php

namespace App\Http\Controllers;
use App\Models\Profile;
use Spatie\LaravelPdf\Facades\Pdf;;

abstract class Controller
{
    public function download()
    {
        $profile = Profile::first();
        // Você renderiza uma view Blade específica (ou a mesma view)
        return Pdf::view('welcome', ['profile' => $profile])
            ->format('a4')
            ->name('Matiz_Madel_CV_'. date('Y') .'.pdf')
            ->download();
    }

}
