<?php

namespace App\Services\Interfaces;

use Illuminate\Database\Eloquent\Collection;

interface UserServiceInterface
{
    /**
     * Get dashboard statistics for users.
     *
     * @return array<string, mixed>
     */
    public function getDashboardStats(): array;

    /**
     * Get recent users.
     *
     * @return Collection<int, \App\Models\User>
     */
    public function getRecentUsers(int $limit = 5): Collection;

    /**
     * Get user count by verification status.
     *
     * @return array<string, int>
     */
    public function getUserCountsByVerificationStatus(): array;
}
