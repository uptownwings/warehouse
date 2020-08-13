<?php declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\UpdateItemRequest;
use App\Http\Requests\WarehouseItemCreateRequest;
use App\Repositories\WarehouseItems\WarehouseItemRepositoryInterface;

class WarehouseItemController extends Controller
{
    private $itemRepository;

    public function __construct(WarehouseItemRepositoryInterface $itemRepository)
    {
        $this->itemRepository = $itemRepository;
    }

    public function index(): JsonResponse
    {
        $data = $this->itemRepository->getWarehouseData();

        return response()->json($data, Response::HTTP_OK);
    }

    public function show(Request $request): JsonResponse
    {
        $data = $this->itemRepository->getWarehouseItem((int)$request->itemId);

        return response()->json($data, (null !== $data) ? Response::HTTP_OK : Response::HTTP_NOT_FOUND);
    }

    public function showWithHistory(Request $request): JsonResponse
    {
        $data = $this->itemRepository->getWarehouseItemWithHistory((int)$request->itemId);

        return response()->json($data, (null !== $data) ? Response::HTTP_OK : Response:: HTTP_NOT_FOUND);
    }

    public function update(UpdateItemRequest $request): JsonResponse
    {
        $data = $this->itemRepository->updateWarehouseItem($request);

        return response()->json($data, (null !== $data) ? Response::HTTP_OK : Response::HTTP_NOT_FOUND);
    }

    public function destroy(Request $request): JsonResponse
    {
        $result = $this->itemRepository->deleteWarehouseItem((int)$request->id);

        return response()->json(
            ['result' => ($result) ? 'success' : 'failure'],
            $result ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
        );
    }

    public function create(WarehouseItemCreateRequest $request): JsonResponse
    {
        $result = $this->itemRepository->createWarehouseItem($request);

        return response()->json(
            ['result' => ($result) ? 'success' : 'failure'],
            $result ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
        );
    }
}
