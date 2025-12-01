<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Hash;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    /**
     * Create a new repository instance.
     */
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    /**
     * {@inheritDoc}
     */
    public function findByEmail(string $email): ?User
    {
        /** @var User|null */
        return $this->findOneBy('email', $email);
    }

    /**
     * {@inheritDoc}
     */
    public function getVerifiedUsers(): Collection
    {
        return $this->model->whereNotNull('email_verified_at')->get();
    }

    /**
     * {@inheritDoc}
     */
    public function getUnverifiedUsers(): Collection
    {
        return $this->model->whereNull('email_verified_at')->get();
    }

    /**
     * {@inheritDoc}
     */
    public function getByDateRange(string $startDate, string $endDate): Collection
    {
        return $this->model
            ->whereBetween('created_at', [$startDate, $endDate])
            ->get();
    }

    /**
     * {@inheritDoc}
     */
    public function search(string $query): Collection
    {
        return $this->model
            ->where('name', 'like', "%{$query}%")
            ->orWhere('email', 'like', "%{$query}%")
            ->get();
    }

    /**
     * {@inheritDoc}
     */
    public function updatePassword(int|string $id, string $password): bool
    {
        return $this->update($id, [
            'password' => Hash::make($password),
        ]);
    }

    /**
     * {@inheritDoc}
     */
    public function markEmailAsVerified(int|string $id): bool
    {
        return $this->update($id, [
            'email_verified_at' => now(),
        ]);
    }

    /**
     * {@inheritDoc}
     */
    public function getRecentUsers(int $limit = 5): Collection
    {
        return $this->model
            ->orderBy('created_at', 'desc')
            ->limit($limit)
            ->get();
    }
}
