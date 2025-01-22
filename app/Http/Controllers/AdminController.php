<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminController extends Controller
{
    protected UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $admins = $this->userService->index($request->only('search', 'status'));
        return view('admin.users.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request): RedirectResponse
    {
        $this->userService->createAdmin($request->validated());
        return redirect()->route('admins.index')->with('success', 'Администратор успешно добавлен!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $admin): View
    {
        return view('admin.users.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $admin): RedirectResponse
    {
        $this->userService->updateAdmin($admin, $request->validated());
        return redirect()->route('admins.index')->with('success', 'Администратор успешно обновлен!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $admin): RedirectResponse
    {
        $currentUser = auth()->user();
        if ($currentUser->is($admin)) {
            return redirect()
                ->route('admins.index')
                ->with('error', 'Вы не можете удалить сами себя');
        }

        $admin->delete();

        return redirect()
            ->route('admins.index')
            ->with('success', 'Администратор успешно удален!');
    }
}
