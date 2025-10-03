<?php

namespace App\Http\Controllers;

use App\Actions\PlayGameAction;
use App\Actions\UserDeactivateAccessLink;
use App\Actions\UserGenerateAccessLink;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Random\RandomException;

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

    /**
     * @throws RandomException
     */
    public function play(PlayGameAction $action): RedirectResponse
    {
        $gameResult = $action->handle(Auth::user());

        return redirect()->back()->with('gameResult', $gameResult);
    }
}
