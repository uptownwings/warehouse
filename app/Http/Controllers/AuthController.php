<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\ResetRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\CreateUserRequest;
use Illuminate\Auth\Events\PasswordReset;
use App\Http\Requests\ChangePasswordRequest;
use Illuminate\Foundation\Auth\ResetsPasswords;
use App\Repositories\Users\UserRepositoryInterface;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use App\Repositories\PasswordResets\PasswordResetRepositoryInterface;

class AuthController extends Controller
{
    use SendsPasswordResetEmails, ResetsPasswords {
        SendsPasswordResetEmails::broker insteadof ResetsPasswords;
        ResetsPasswords::credentials insteadof SendsPasswordResetEmails;
    }

    public function register(CreateUserRequest $request, UserRepositoryInterface $repository): JsonResponse
    {
        $user = $repository->createUser($request);

        return response()->json(['status' => 'success', 'user' => $user], Response::HTTP_OK);
    }

    public function login(LoginRequest $request): JsonResponse
    {
        $user = User::query()->where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(
                [
                    'message' => ['These credentials do not match a record in our database.']
                ],
                Response::HTTP_NOT_FOUND
            );
        }

        $token = $user->createToken('my-app-token')->plainTextToken;

        return response()->json(
            [
                'user' => $user,
                'token' => $token
            ],
            Response::HTTP_OK
        );
    }

    public function logout(): JsonResponse
    {
        $this->guard()->logout();

        return response()->json([
            'status' => 'success',
            'msg' => 'Logged out Successfully.'
        ], 200);
    }

    public function user(UserRepositoryInterface $repository): JsonResponse
    {
        $user = $repository->show(Auth::user()->id);

        return response()->json([
            'status' => 'success',
            'data' => $user
        ]);
    }

    public function doReset(ResetRequest $request)
    {
        return $this->sendPasswordResetLink($request);
    }

    public function sendPasswordResetLink(Request $request)
    {
        return $this->sendResetLinkEmail($request);
    }

    public function changepassword(
        ChangePasswordRequest $request,
        PasswordResetRepositoryInterface $resetRepository,
        UserRepositoryInterface $userRepository
    ): JsonResponse {
        $userId = $resetRepository->getUserId($request);

        if ($userRepository->changePassword($userId, $request->password)) {
            $response = response()->json(['status', 'success'], Response::HTTP_OK);
        } else {
            $response = response()->json(['status', 'failure'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return $response;
    }

    public function callResetPassword(Request $request): JsonResponse
    {
        return $this->reset($request);
    }

    protected function sendResetLinkResponse($response): JsonResponse
    {
        return response()->json([
            'message' => 'Password reset email sent.',
            'data' => $response
        ]);
    }

    protected function sendResetLinkFailedResponse(): JsonResponse
    {
        return response()->json(['message' => 'Email could not be sent to this email address.']);
    }

    protected function resetPassword($user, $password): void
    {
        $user->password = Hash::make($password);
        $user->save();
        event(new PasswordReset($user));
    }

    protected function sendResetResponse(): JsonResponse
    {
        return response()->json(['message' => 'Password reset successfully.']);
    }

    protected function sendResetFailedResponse(): JsonResponse
    {
        return response()->json(['message' => 'Failed, Invalid Token.']);
    }
}
