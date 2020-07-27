<?php declare(strict_types=1);

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class BaseRepository implements BaseRepositoryInterface
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function showModel(int $modelId): Model
    {
        return $this->model::query()->find($modelId);
    }

    public function showAll(): Collection
    {
        return $this->model::query()->get();
    }
}
