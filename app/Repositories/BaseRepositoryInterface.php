<?php declare(strict_types=1);

namespace App\Repositories;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;

interface BaseRepositoryInterface
{
    public function index(Request $request): Collection;

    public function create(Request $request): int;

    public function store(Request $request): bool;

    public function show(int $modelId): Model;

    public function edit(Request $request): bool;

    public function update(Request $request): bool;

    public function destroy(Request $request): bool;
}
