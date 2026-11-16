
<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\VeiculoController;
use App\Http\Controllers\AgendamentoController;

Route::get('/', function () {
    return redirect('/dashboard');
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::post('/login', function (\Illuminate\Http\Request $request) {

    if (Auth::attempt($request->only('email', 'password'))) {

        $request->session()->regenerate();

        return redirect('/dashboard');
    }

    return back()->withErrors([
        'email' => 'E-mail ou senha incorretos.'
    ]);
});

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    });

    Route::post('/logout', function (\Illuminate\Http\Request $request) {

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    });

    // Clientes
    Route::get('/clientes', [ClienteController::class, 'index'])->name('clientes.index');
    Route::get('/clientes/create', [ClienteController::class, 'create'])->name('clientes.create');
    Route::post('/clientes', [ClienteController::class, 'store'])->name('clientes.store');
    Route::get('/clientes/{id}/edit', [ClienteController::class, 'edit'])->name('clientes.edit');
    Route::put('/clientes/{id}', [ClienteController::class, 'update'])->name('clientes.update');

    // Veículos
    Route::get('/veiculos', [VeiculoController::class, 'index'])->name('veiculos.index');
    Route::get('/veiculos/create', [VeiculoController::class, 'create'])->name('veiculos.create');
    Route::post('/veiculos', [VeiculoController::class, 'store'])->name('veiculos.store');
    Route::get('/veiculos/{id}/edit', [VeiculoController::class, 'edit'])->name('veiculos.edit');
    Route::put('/veiculos/{id}', [VeiculoController::class, 'update'])->name('veiculos.update');

    // Agendamentos
    Route::get('/agendamentos', [AgendamentoController::class, 'index'])->name('agendamentos.index');
    Route::get('/agendamentos/create', [AgendamentoController::class, 'create'])->name('agendamentos.create');
    Route::post('/agendamentos', [AgendamentoController::class, 'store'])->name('agendamentos.store');
    Route::get('/agendamentos/{id}/edit', [AgendamentoController::class, 'edit'])->name('agendamentos.edit');
    Route::put('/agendamentos/{id}', [AgendamentoController::class, 'update'])->name('agendamentos.update');

});
