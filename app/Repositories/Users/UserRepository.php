<?php declare(strict_types=1);

namespace App\Repositories\Users;

use App\User;
use App\Repositories\BaseRepository;
use App\Http\Requests\CreateUserRequest;

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

    public function createUser(CreateUserRequest $request): User
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = 0;
        $user->save();
        return $user;
    }
}
