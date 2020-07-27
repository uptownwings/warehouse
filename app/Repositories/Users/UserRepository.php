<?php declare(strict_types=1);

namespace App\Repositories\Users;

use App\User;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function show(int $userId): User
    {
        return $this->showModel($userId);
    }
}
