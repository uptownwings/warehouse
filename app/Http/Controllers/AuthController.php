<?php declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\ResetRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\CreateUserRequest;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Foundation\Auth\ResetsPasswords;
use App\Repositories\Users\UserRepositoryInterface;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

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
        $credentials = $request->only('email', 'password');
        if ($token = $this->guard()->attempt($credentials)) {
            return response()->json(
                ['status' => 'success', 'token' => $token],
                Response::HTTP_OK
            )->header('Authorization', $token);
        }

        return response()->json(['error' => 'login_error'], Response::HTTP_UNAUTHORIZED);
    }

    private function guard()
    {
        return Auth::guard();
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

    public function refresh(): JsonResponse
    {
        if ($token = $this->guard()->refresh()) {
            return response()
                ->json(['status' => 'successs'], 200)
                ->header('Authorization', $token);
        }
        return response()->json(['error' => 'refresh_token_error'], 401);
    }

    public function doReset(ResetRequest $request)
    {
        return $this->sendPasswordResetLink($request);
    }

    public function sendPasswordResetLink(Request $request)
    {
        return $this->sendResetLinkEmail($request);
    }

    public function callResetPassword(Request $request): JsonResponse
    {
        return $this->reset($request);
    }

    protected function sendResetLinkResponse(Request $request, $response): JsonResponse
    {
        return response()->json([
            'message' => 'Password reset email sent.',
            'data' => $response
        ]);
    }

    protected function sendResetLinkFailedResponse(Request $request, $response): JsonResponse
    {
        return response()->json(['message' => 'Email could not be sent to this email address.']);
    }

    protected function resetPassword($user, $password): void
    {
        $user->password = Hash::make($password);
        $user->save();
        event(new PasswordReset($user));
    }

    protected function sendResetResponse(Request $request, $response): JsonResponse
    {
        return response()->json(['message' => 'Password reset successfully.']);
    }

    protected function sendResetFailedResponse(Request $request, $response): JsonResponse
    {
        return response()->json(['message' => 'Failed, Invalid Token.']);
    }
}
