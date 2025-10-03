<?php

namespace App\Http\Controllers;

use App\Actions\UserDeactivateAccessLink;
use App\Actions\UserGenerateAccessLink;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class GameController extends Controller
{
    public function index(): View
    {
        return view('game.index');
    }

    public function regenerate(UserGenerateAccessLink $action): RedirectResponse
    {
        $accessLink = $action->handle(Auth::user());

        return redirect()->route('game.index', ['token' => $accessLink->token]);
    }

    public function deactivate(UserDeactivateAccessLink $action): RedirectResponse
    {
        $action->handle(Auth::user());

        return redirect()->route('home');
    }
}
