<?php declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Repositories\ItemPriceHistory\ItemPriceHistoryRepositoryInterface;

class ItemPriceHistoryController extends Controller
{
    public function itemHistory(Request $request, ItemPriceHistoryRepositoryInterface $historyRepository): JsonResponse
    {
        return response()->json(
            $historyRepository->itemPriceHistory((int)$request->itemId),
            Response::HTTP_OK
        );
    }
}
