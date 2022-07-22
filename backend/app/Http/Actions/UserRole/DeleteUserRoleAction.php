<?php

declare(strict_types=1);

namespace App\Http\Actions\UserRole;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use App\Models\User_role;

final class DeleteUserRoleAction extends Controller
{
    public function __invoke(Request $request): Redirector|RedirectResponse
    {
        User_role::where('id', $request->user_role_id)->delete();
        return redirect('administrator/role_rank');
    }
}