<?php

namespace App\Http\Controllers;

use App\Services\Interfaces\UserServiceInterface;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public function __construct(
        private readonly UserServiceInterface $userService
    ) {}

    /**
     * Display the home page with user statistics.
     */
    public function index(): View
    {
        $stats = $this->userService->getDashboardStats();

        return view('home', [
            'stats' => [
                'totalUsers' => $stats['total_users'],
                'verifiedUsers' => $stats['verified_users'],
                'unverifiedUsers' => $stats['unverified_users'],
                'verificationRate' => $stats['verification_rate'],
            ],
            'recentUsers' => $stats['recent_users'],
        ]);
    }
}
