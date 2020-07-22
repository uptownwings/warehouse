<?php declare(strict_types=1);

namespace App\Repositories\Users;

use Illuminate\Http\Request;
use App\Repositories\BaseRepository;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function create(Request $user): bool
    {

    }

}
