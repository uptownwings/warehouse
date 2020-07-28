<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): JsonResponse
    {
        $users = User::all();
        return response()->json(
            [
                'status' => 'success',
                'users' => $users->toArray()
            ],
            Response::HTTP_OK
        );
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($userId): JsonResponse
    {
        $user = User::query()->find($userId);
        return response()->json(
            [
                'status' => 'success',
                'user' => $user->toArray()
            ],
            Response::HTTP_OK
        );
    }
}
