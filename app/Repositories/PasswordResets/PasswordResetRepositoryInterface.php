<?php declare(strict_types=1);

namespace App\Repositories\PasswordResets;

use App\Http\Requests\ChangePasswordRequest;
use App\Repositories\BaseRepositoryInterface;

interface PasswordResetRepositoryInterface extends BaseRepositoryInterface
{
    public function getUserId(ChangePasswordRequest $request): int;
}
