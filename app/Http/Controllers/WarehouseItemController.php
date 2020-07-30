<?php declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\UpdateItemRequest;
use App\Repositories\WarehouseItems\WarehouseItemRepositoryInterface;

class WarehouseItemController extends Controller
{
    public function index(WarehouseItemRepositoryInterface $itemRepository): JsonResponse
    {
        $data = $itemRepository->getWarehouseData();

        return response()->json($data, Response::HTTP_OK);
    }

    public function item(Request $request, WarehouseItemRepositoryInterface $itemRepository): JsonResponse
    {
        $data = $itemRepository->getWarehouseItem((int)$request->itemId);

        return response()->json($data, (null !== $data) ? Response::HTTP_OK : Response::HTTP_NOT_FOUND);
    }

    public function update(UpdateItemRequest $request, WarehouseItemRepositoryInterface $itemRepository): JsonResponse
    {
        $data = $itemRepository->updateWarehouseItem($request);

        return response()->json($data, (null !== $data) ? Response::HTTP_OK : Response::HTTP_NOT_FOUND);
    }
}
