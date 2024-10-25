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
            //'name' => __('Game') . ' ' . (Game::where('user_id', $user_id)->count() + 1),
            'name'      => fake()->company(),
            'user_id'   => $user_id,
            'balance'   => 5000,
        ]);

        // create and hire 1 developer and 1 sale
        $gender = fake()->randomElement(['male', 'female']);
        Employee::create([
            'position'      => 'developer',
            'first_name'    => fake()->firstName(),
            'last_name'     => fake()->lastName(),
            'gender'        => $gender,
            'status'        => 'unloaded',
            'game_id'       => $game->id,
            'hired'         => true,
            'seniority'     => 2,
        ]);

        $gender = fake()->randomElement(['male', 'female']);
        Employee::create([
            'position'      => 'sale',
            'first_name'    => fake()->firstName(),
            'last_name'     => fake()->lastName(),
            'gender'        => $gender,
            'status'        => 'unloaded',
            'game_id'       => $game->id,
            'hired'         => true,
            'seniority'     => 2,
        ]);

        // create first task
        Project::create([
            'name'          => fake()->sentence(),
            'reward'        => 1000,
            'game_id'       => $game->id,
            'difficulty'    => 2,
        ]);

        // set game to session
        session(['current_game_id' => $game->id]);

        // start game
        return redirect()->route('game.production');
    }

    public function resume(Request $request)
    {
        // set game to session
        session(['current_game_id' => $request->game_id]);

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
