<?php declare(strict_types=1);

namespace App\Repositories;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements BaseRepositoryInterface
{
    private $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function index(Request $request): Collection
    {
        return $this->model::query()->get();
    }

    public function create(Request $request): int
    {
        // TODO: Implement create() method.
    }

    public function store(Request $request): bool
    {
        // TODO: Implement store() method.
    }

    public function show(int $modelId): Model
    {
        return $this->model::query()->find($modelId)->first();
    }

    public function edit(Request $request): bool
    {
        // TODO: Implement edit() method.
    }

    public function update(Request $request): bool
    {
        // TODO: Implement update() method.
    }

    public function destroy(Request $request): bool
    {
        // TODO: Implement destroy() method.
    }

}
