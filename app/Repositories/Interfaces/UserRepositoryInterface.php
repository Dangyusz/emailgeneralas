<?php

namespace App\Repositories\Interfaces;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

interface UserRepositoryInterface extends RepositoryInterface
{
    /**
     * Find a user by email address.
     */
    public function findByEmail(string $email): ?User;

    /**
     * Get users who have verified their email.
     *
     * @return Collection<int, User>
     */
    public function getVerifiedUsers(): Collection;

    /**
     * Get users who have not verified their email.
     *
     * @return Collection<int, User>
     */
    public function getUnverifiedUsers(): Collection;

    /**
     * Get users created within a date range.
     *
     * @return Collection<int, User>
     */
    public function getByDateRange(string $startDate, string $endDate): Collection;

    /**
     * Search users by name or email.
     *
     * @return Collection<int, User>
     */
    public function search(string $query): Collection;

    /**
     * Update user's password.
     */
    public function updatePassword(int|string $id, string $password): bool;

    /**
     * Mark email as verified.
     */
    public function markEmailAsVerified(int|string $id): bool;

    /**
     * Get recent users ordered by creation date.
     *
     * @return Collection<int, User>
     */
    public function getRecentUsers(int $limit = 5): Collection;
}
