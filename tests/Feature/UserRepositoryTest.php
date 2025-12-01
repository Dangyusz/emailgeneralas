<?php

namespace Tests\Feature;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\UserRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserRepositoryTest extends TestCase
{
    use RefreshDatabase;

    private UserRepositoryInterface $userRepository;

    protected function setUp(): void
    {
        parent::setUp();
        $this->userRepository = app(UserRepositoryInterface::class);
    }

    public function test_can_resolve_user_repository_from_container(): void
    {
        $repository = app(UserRepositoryInterface::class);

        $this->assertInstanceOf(UserRepository::class, $repository);
    }

    public function test_can_create_user(): void
    {
        $userData = [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => 'password123',
        ];

        $user = $this->userRepository->create($userData);

        $this->assertInstanceOf(User::class, $user);
        $this->assertEquals('John Doe', $user->name);
        $this->assertEquals('john@example.com', $user->email);
        $this->assertDatabaseHas('users', [
            'email' => 'john@example.com',
        ]);
    }

    public function test_can_find_user_by_id(): void
    {
        $user = User::factory()->create();

        $foundUser = $this->userRepository->find($user->id);

        $this->assertNotNull($foundUser);
        $this->assertEquals($user->id, $foundUser->id);
    }

    public function test_can_find_user_by_email(): void
    {
        $user = User::factory()->create(['email' => 'test@example.com']);

        $foundUser = $this->userRepository->findByEmail('test@example.com');

        $this->assertNotNull($foundUser);
        $this->assertEquals($user->id, $foundUser->id);
    }

    public function test_find_by_email_returns_null_for_nonexistent_email(): void
    {
        $foundUser = $this->userRepository->findByEmail('nonexistent@example.com');

        $this->assertNull($foundUser);
    }

    public function test_can_get_all_users(): void
    {
        User::factory()->count(3)->create();

        $users = $this->userRepository->all();

        $this->assertCount(3, $users);
    }

    public function test_can_update_user(): void
    {
        $user = User::factory()->create(['name' => 'Original Name']);

        $result = $this->userRepository->update($user->id, ['name' => 'Updated Name']);

        $this->assertTrue($result);
        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'name' => 'Updated Name',
        ]);
    }

    public function test_can_delete_user(): void
    {
        $user = User::factory()->create();

        $result = $this->userRepository->delete($user->id);

        $this->assertTrue($result);
        $this->assertDatabaseMissing('users', ['id' => $user->id]);
    }

    public function test_can_get_verified_users(): void
    {
        User::factory()->count(2)->create(['email_verified_at' => now()]);
        User::factory()->count(3)->create(['email_verified_at' => null]);

        $verifiedUsers = $this->userRepository->getVerifiedUsers();

        $this->assertCount(2, $verifiedUsers);
    }

    public function test_can_get_unverified_users(): void
    {
        User::factory()->count(2)->create(['email_verified_at' => now()]);
        User::factory()->count(3)->create(['email_verified_at' => null]);

        $unverifiedUsers = $this->userRepository->getUnverifiedUsers();

        $this->assertCount(3, $unverifiedUsers);
    }

    public function test_can_search_users(): void
    {
        User::factory()->create(['name' => 'John Doe', 'email' => 'john@example.com']);
        User::factory()->create(['name' => 'Jane Smith', 'email' => 'jane@example.com']);
        User::factory()->create(['name' => 'Bob Johnson', 'email' => 'bob@test.com']);

        $results = $this->userRepository->search('john');

        $this->assertCount(2, $results);
    }

    public function test_can_update_password(): void
    {
        $user = User::factory()->create();
        $originalPassword = $user->password;

        $result = $this->userRepository->updatePassword($user->id, 'newpassword123');

        $this->assertTrue($result);
        $user->refresh();
        $this->assertNotEquals($originalPassword, $user->password);
    }

    public function test_can_mark_email_as_verified(): void
    {
        $user = User::factory()->create(['email_verified_at' => null]);

        $result = $this->userRepository->markEmailAsVerified($user->id);

        $this->assertTrue($result);
        $user->refresh();
        $this->assertNotNull($user->email_verified_at);
    }

    public function test_can_count_users(): void
    {
        User::factory()->count(5)->create();

        $count = $this->userRepository->count();

        $this->assertEquals(5, $count);
    }

    public function test_exists_returns_true_for_existing_user(): void
    {
        User::factory()->create(['email' => 'exists@example.com']);

        $exists = $this->userRepository->exists('email', 'exists@example.com');

        $this->assertTrue($exists);
    }

    public function test_exists_returns_false_for_nonexistent_user(): void
    {
        $exists = $this->userRepository->exists('email', 'nonexistent@example.com');

        $this->assertFalse($exists);
    }

    public function test_can_paginate_users(): void
    {
        User::factory()->count(25)->create();

        $paginated = $this->userRepository->paginate(10);

        $this->assertCount(10, $paginated->items());
        $this->assertEquals(25, $paginated->total());
        $this->assertEquals(3, $paginated->lastPage());
    }

    public function test_can_get_users_by_date_range(): void
    {
        User::factory()->create(['created_at' => now()->subDays(5)]);
        User::factory()->create(['created_at' => now()->subDays(3)]);
        User::factory()->create(['created_at' => now()->subDays(1)]);
        User::factory()->create(['created_at' => now()->subDays(10)]);

        $users = $this->userRepository->getByDateRange(
            now()->subDays(7)->toDateString(),
            now()->toDateString()
        );

        $this->assertCount(3, $users);
    }

    public function test_find_or_fail_throws_exception_for_nonexistent_user(): void
    {
        $this->expectException(\Illuminate\Database\Eloquent\ModelNotFoundException::class);

        $this->userRepository->findOrFail(99999);
    }

    public function test_update_returns_false_for_nonexistent_user(): void
    {
        $result = $this->userRepository->update(99999, ['name' => 'Test']);

        $this->assertFalse($result);
    }

    public function test_delete_returns_false_for_nonexistent_user(): void
    {
        $result = $this->userRepository->delete(99999);

        $this->assertFalse($result);
    }
}
