<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserRoleController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\ResponseController;
use App\Http\Controllers\AsignaturaController;
use App\Http\Controllers\EncuestaController;
use App\Http\Controllers\PreguntaController;
use App\Http\Controllers\EncuestaPreguntaController;
use App\Http\Controllers\RespuestaController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\OpcioneController;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum', 
    config('jetstream.auth_session'), 
    'verified', // Aseguramos que el usuario esté verificado
])->group(function () {
    Route::middleware('role:admin')->get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::middleware('role:docente')->get('/docente/dashboard', [DocenteController::class, 'dashboard'])->name('docente.dashboard');
    Route::middleware('role:estudiante')->get('/estudiante/dashboard', [EstudianteController::class, 'index'])->name('estudiante.dashboard');
    
})->name('dashboard');



// Rutas solo accesibles por el rol 'admin'
Route::middleware('role:admin')->group(function () {
    //Route::get('/admin_dashboard', [AdminController::class, 'index'])->name('admin.index');
    Route::get('admin/users', [UserRoleController::class, 'index'])->name('admin.users.index');
    Route::post('admin/users/{user}/update-role', [UserRoleController::class, 'update'])->name('admin.users.update-role');
});


// Rutas para los docentes
Route::middleware(['auth', 'role:docente'])->group(function () {
    Route::resource('surveys', SurveyController::class);
    //Route::get('/docente/surveys/create', [SurveyController::class, 'create'])->name('surveys.create');
    //Route::post('/docente/surveys', [SurveyController::class, 'store'])->name('surveys.store');
    Route::get('/docente/surveys/{uuid}', [SurveyController::class, 'generated'])->name('surveys.generated');
    //Route::get('/docente/surveys', [SurveyController::class, 'index'])->name('surveys.index');
});

Route::middleware(['auth'])->group(function () {
    // Rutas para responder encuestas
    Route::get('/survey/{uuid}', [ResponseController::class, 'show'])->name('survey.respond');
    Route::post('/survey/{uuid}', [ResponseController::class, 'store']);
});


Route::resource('cursos', CursoController::class);
Route::resource('asignaturas', AsignaturaController::class);
Route::resource('docentes', DocenteController::class);
Route::resource('encuestas', EncuestaController::class);
Route::resource('preguntas', PreguntaController::class);
Route::resource('encuesta-pregunta', EncuestaPreguntaController::class);
Route::resource('respuestas', RespuestaController::class);

Route::resource('opciones', OpcioneController::class);