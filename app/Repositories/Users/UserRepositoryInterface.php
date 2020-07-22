<?php declare(strict_types=1);

namespace App\Repositories\Users;

use Illuminate\Http\Request;

interface UserRepositoryInterface
{
    public function create(Request $user): bool;
}
