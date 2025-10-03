<?php

namespace App\Http\Controllers;

use App\Actions\UserRegister;
use App\DTO\Registration\User\UserRegisterDTO;
use App\Http\Requests\RegisterUserRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class RegistrationController extends Controller
{
    public function index(): View
    {
        return view('registration.index');
    }

    public function register(RegisterUserRequest $request, UserRegister $action): RedirectResponse
    {
        $dto = UserRegisterDTO::fromRequest($request);

        $user = $action->handle($dto);

        return redirect()->back();
    }
}
