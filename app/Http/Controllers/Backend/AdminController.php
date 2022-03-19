<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\VerifiesEmails;

class AdminController extends Controller
{
    public function showAdminName(): string
    {
        return 'Ahmed Reda';
}
}
