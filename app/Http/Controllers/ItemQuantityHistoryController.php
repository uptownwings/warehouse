<?php declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Repositories\ItemQuantityHistory\ItemQuantityHistoryProviderInterface;

class ItemQuantityHistoryController extends Controller
{
    public function itemHistory(Request $request, ItemQuantityHistoryProviderInterface $historyProvider): JsonResponse
    {
        return response()->json($historyProvider->itemQuantityHistory((int)$request->itemId), Response::HTTP_OK);
    }
}
