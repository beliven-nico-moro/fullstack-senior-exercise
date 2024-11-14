<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Game;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GameController extends Controller
{
    public function index()
    {
        // start queues

        // show game
        return view('game.production');
    }

    public function sales()
    {
        // start queues

        // show game
        return view('game.sales');
    }

    public function hr()
    {
        // start queues

        // show game
        return view('game.hr');
    }

    public function start()
    {
        $user_id = Auth::user()->id;

        // create new game
        // link game to user
        // add 5000€ to game balance
        $game = Game::create([
            'name'      => fake()->company(),
            'user_id'   => $user_id,
            'balance'   => 5000,
        ]);

        // create and hire 1 developer and 1 sale
        Employee::factory()->create([
            'position'      => 'developer',
            'game_id'       => $game->id,
            'hired'         => true,
            'seniority'     => 2,
            'salary'        => 1000,
        ]);
        Employee::factory()->create([
            'position'      => 'sale',
            'game_id'       => $game->id,
            'hired'         => true,
            'seniority'     => 2,
            'salary'        => 1000,
        ]);

        // create first task
        Project::factory()->count(3)->create([
            'game_id'       => $game->id,
            'difficulty'    => 2,
            'reward'        => 1000,
        ]);

        // set game to session
        session(['current_game_id' => $game->id]);

        // set starting time
        session(['current_game_starting_time' => now()]);

        // start game
        return redirect()->route('game.production');
    }

    public function resume(Request $request)
    {
        // set game to session
        session(['current_game_id' => $request->game_id]);

        // set starting time
        session(['current_game_starting_time' => now()]);

        // resume game
        return redirect()->route('game.production');
    }

    public function stop(Request $request)
    {
        // remove game from session
        if (session()->has('current_game_id')) {
            $game = Game::find(session('current_game_id'));
            $game->updated_at = now();
            $game->save();
        }
        session()->forget('current_game_id');

        // stop all queues

        // stop game
        return redirect()->route('dashboard');
    }

    public function delete(Request $request)
    {
        // (soft) delete game
        $game = Game::find($request->game_id);
        $game->is_over = true;
        $game->save();

        // remove game from session
        if (session()->has('current_game_id')) {
            $game = Game::find(session('current_game_id'));
            $game->updated_at = now();
            $game->save();
        }
        session()->forget('current_game_id');

        // stop all queues

        // stop game
        return redirect()->route('dashboard');
    }
}
