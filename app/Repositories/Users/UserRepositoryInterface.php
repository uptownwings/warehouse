<?php declare(strict_types=1);

namespace App\Repositories\Users;

use App\User;
use App\Http\Requests\CreateUserRequest;

interface UserRepositoryInterface
{
    public function show(int $userId): User;

    public function createUser(CreateUserRequest $request): User;
}
