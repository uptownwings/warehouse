<?php declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Repositories\WarehouseItems\WarehouseItemRepositoryInterface;

class WarehouseItemController extends Controller
{
    private $itemRepository;

    public function __construct(WarehouseItemRepositoryInterface $itemRepository)
    {
        $this->itemRepository = $itemRepository;
    }

    public function index(Request $request): JsonResponse
    {
        return new JsonResponse($this->itemRepository->index($request), 200);
    }
}
