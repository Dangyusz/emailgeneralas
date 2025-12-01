<?php

namespace App\Services;

use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Services\Interfaces\UserServiceInterface;
use Illuminate\Database\Eloquent\Collection;

class UserService implements UserServiceInterface
{
    public function __construct(
        private readonly UserRepositoryInterface $userRepository
    ) {
    }

    /**
     * {@inheritDoc}
     */
    public function getDashboardStats(): array
    {
        $totalUsers = $this->userRepository->count();
        $verificationStats = $this->getUserCountsByVerificationStatus();
        $recentUsers = $this->getRecentUsers(5);

        return [
            'total_users' => $totalUsers,
            'verified_users' => $verificationStats['verified'],
            'unverified_users' => $verificationStats['unverified'],
            'verification_rate' => $totalUsers > 0
                ? round(($verificationStats['verified'] / $totalUsers) * 100, 1)
                : 0,
            'recent_users' => $recentUsers,
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function getRecentUsers(int $limit = 5): Collection
    {
        return $this->userRepository->getRecentUsers($limit);
    }

    /**
     * {@inheritDoc}
     */
    public function getUserCountsByVerificationStatus(): array
    {
        $verified = $this->userRepository->getVerifiedUsers()->count();
        $unverified = $this->userRepository->getUnverifiedUsers()->count();

        return [
            'verified' => $verified,
            'unverified' => $unverified,
        ];
    }
}
