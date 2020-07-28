<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\WarehouseItem;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Repositories\WarehouseItems\WarehouseItemRepositoryInterface;

class WarehouseItemController extends Controller
{
    private $itemRepository;

    public function __construct(WarehouseItemRepositoryInterface $itemRepository)
    {
        $this->itemRepository = $itemRepository;
    }

    public function index(WarehouseItemRepositoryInterface $itemRepository): JsonResponse
    {
        $data = $itemRepository->getWarehouseData();
        return response()->json($data, Response::HTTP_OK);
    }
}
