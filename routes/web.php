<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GameController;
use App\Http\Middleware\HasGame;
use App\Models\Game;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    // remove game id from session
    if (session()->has('current_game_id')) {
        $game = Game::find(session('current_game_id'));
        $game->updated_at = now();
        $game->save();

        session()->forget('current_game_id');
    }

    return view('dashboard', [
        'games' => Auth::user()->games,
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    /** PROFILE **/
    //Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    //Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    //Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    /** GAME **/
    Route::middleware([HasGame::class])->group(function () {
        Route::get('/game', [GameController::class, 'index'])->name('game.production');
        Route::get('/game/production', [GameController::class, 'index'])->name('game.production');
        Route::get('/game/sales', [GameController::class, 'sales'])->name('game.sales');
        Route::get('/game/hr', [GameController::class, 'hr'])->name('game.hr');
    });
    Route::post('/game/start', [GameController::class, 'start'])->name('game.start');
    Route::post('/game/resume', [GameController::class, 'resume'])->name('game.resume');
    Route::post('/game/stop', [GameController::class, 'stop'])->name('game.stop');
    Route::post('/game/delete', [GameController::class, 'delete'])->name('game.delete');
});

require __DIR__.'/auth.php';
