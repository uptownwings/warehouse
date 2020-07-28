<?php declare(strict_types=1);

namespace App\Repositories\PasswordResets;

use App\PasswordReset;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ChangePasswordRequest;
use App\Repositories\Users\UserRepositoryInterface;

class PasswordResetRepository extends BaseRepository implements PasswordResetRepositoryInterface
{
    private $userRepository;

    public function __construct(PasswordReset $model, UserRepositoryInterface $userRepository)
    {
        parent::__construct($model);
        $this->userRepository = $userRepository;
    }

    public function getUserId(ChangePasswordRequest $request): int
    {
        $email = null;
        $userId = 0;
        $resets = $this->model::query()->get();

        foreach ($resets as $reset) {
            if (Hash::check($request->token, $reset->token)) {
                $email = $reset->email;
                $this->model::query()->where('email', '=', $email)->delete();
            }
        }

        if (null !== $email) {
            $userId = $this->userRepository->getUserByEmail($email)->id;
        }

        return $userId;
    }
}
