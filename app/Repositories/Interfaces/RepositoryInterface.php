<?php

namespace App\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

interface RepositoryInterface
{
    /**
     * Get all records.
     *
     * @param array<string> $columns
     * @return Collection<int, Model>
     */
    public function all(array $columns = ['*']): Collection;

    /**
     * Get paginated records.
     *
     * @param int $perPage
     * @param array<string> $columns
     * @return LengthAwarePaginator<Model>
     */
    public function paginate(int $perPage = 15, array $columns = ['*']): LengthAwarePaginator;

    /**
     * Find a record by its primary key.
     */
    public function find(int|string $id): ?Model;

    /**
     * Find a record by its primary key or throw an exception.
     */
    public function findOrFail(int|string $id): Model;

    /**
     * Find records by a specific column value.
     *
     * @param array<string> $columns
     * @return Collection<int, Model>
     */
    public function findBy(string $column, mixed $value, array $columns = ['*']): Collection;

    /**
     * Find a single record by a specific column value.
     */
    public function findOneBy(string $column, mixed $value): ?Model;

    /**
     * Create a new record.
     *
     * @param array<string, mixed> $data
     */
    public function create(array $data): Model;

    /**
     * Update a record by its primary key.
     *
     * @param array<string, mixed> $data
     */
    public function update(int|string $id, array $data): bool;

    /**
     * Delete a record by its primary key.
     */
    public function delete(int|string $id): bool;

    /**
     * Get the count of all records.
     */
    public function count(): int;

    /**
     * Check if a record exists by a specific column value.
     */
    public function exists(string $column, mixed $value): bool;
}
