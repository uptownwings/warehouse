<?php declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Repositories\ItemPriceHistory\ItemPriceHistoryRepositoryInterface;

class ItemPriceHistoryController extends Controller
{
    private $historyRepository;

    public function __construct(ItemPriceHistoryRepositoryInterface $historyRepository)
    {
        $this->historyRepository = $historyRepository;
    }

    public function itemHistory(Request $request): JsonResponse
    {
        return response()->json(
            $this->historyRepository->itemPriceHistory((int)$request->itemId),
            Response::HTTP_OK
        );
    }
}
