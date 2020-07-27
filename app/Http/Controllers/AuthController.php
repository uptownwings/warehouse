<?php declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateUserRequest;
use Symfony\Component\HttpFoundation\Response;
use App\Repositories\Users\UserRepositoryInterface;

class AuthController extends Controller
{
    public function register(CreateUserRequest $request, UserRepositoryInterface $userRepository): JsonResponse
    {
        $userRepository->create($request);

        return new JsonResponse([
            'status' => 'success',
            'errors' => [],
        ], Response::HTTP_OK);
    }

    public function login(Request $request): JsonResponse
    {
        $credentials = $request->only('email', 'password');
        if ($token = $this->guard()->attempt($credentials)) {
            return response()->json(['status' => 'success'], 200)->header('Authorization', $token);
        }
        return response()->json(['error' => 'login_error'], 401);
    }

    public function logout(): JsonResponse
    {
        $this->guard()->logout();

        return new JsonResponse([
            'status' => 'success',
            'msg' => 'Logged out successfully'
        ], Response::HTTP_OK);
    }

    public function user(Request $request, UserRepositoryInterface $userRepository): JsonResponse
    {
        $user = $userRepository->show((int) $request->id);
        return new JsonResponse($user, Response::HTTP_OK);
    }

    public function refresh(): JsonResponse
    {
        if ($token = $this->guard()->refresh()) {
            return new JsonResponse(['status' => 'success'], Response::HTTP_OK, ['Authorization' => $token]);
        }

        return new JsonResponse(['error' => 'refresh_token_error'], Response::HTTP_UNAUTHORIZED);
    }

    public function store(Request $request)
    {
        // Nothing to do here.
    }

    private function guard()
    {
        return Auth::guard();
    }
}
