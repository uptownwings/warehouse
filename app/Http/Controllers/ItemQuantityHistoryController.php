<?php declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Repositories\ItemQuantityHistory\ItemQuantityHistoryRepositoryInterface;

class ItemQuantityHistoryController extends Controller
{
    private $historyProvider;

    public function __construct(ItemQuantityHistoryRepositoryInterface $historyProvider)
    {
        $this->historyProvider = $historyProvider;
    }

    public function itemHistory(Request $request): JsonResponse
    {
        return response()->json($this->historyProvider->itemQuantityHistory((int)$request->itemId), Response::HTTP_OK);
    }
}
