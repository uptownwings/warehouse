<?php declare(strict_types=1);

namespace App\Repositories\Users;

use App\User;

interface UserRepositoryInterface
{
    public function show(int $userId): User;
}
