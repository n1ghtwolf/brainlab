<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

class UserService
{
    private Model $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function index(array $filters = []): LengthAwarePaginator
    {
        return $this->model
            ->query()
            ->when($filters['search'] ?? null, function ($q, $search) {
                $q->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%");
                });
            })
            ->when($filters['status'] ?? null, function ($q, $status) {
                $q->where('status', $status);
            })
            ->paginate(10);
    }

    public function createAdmin(array $data): Model
    {
        return $this->model->query()->create($data);
    }

    public function updateAdmin(User $admin, array $data): bool
    {
        if (!empty($data['password'])) {
            $admin->password = $data['password'];
        }

        return $admin->update($data);
    }
}
