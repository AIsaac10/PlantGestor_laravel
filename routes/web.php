<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlantController;
use App\Http\Controllers\HarvestController;

Route::get("/",[PlantController::class, "index"]);

Route::get("/plants",[PlantController::class, "index"])->name("plants.index");
Route::get("/plants/create",[PlantController::class, "create"])->name("plants.create");
Route::post("/plants",[PlantController::class, "store"])->name("plants.store");
Route::get("/plants/{plant}",[PlantController::class, "show"])->name("plants.show");
Route::get("/plants/{plant}/edit",[PlantController::class, "edit"])->name("plants.edit");
Route::put("/plants/{plant}",[PlantController::class, "update"])->name("plants.update");
Route::delete("/plants/{plant}",[PlantController::class, "destroy"])->name("plants.destroy");

Route::get("/harvests",[HarvestController::class, "index"])->name("harvests.index");
Route::get("/harvests/create",[HarvestController::class, "create"])->name("harvests.create");
Route::post("/harvests",[HarvestController::class, "store"])->name("harvests.store");
Route::get("/harvests/{harvest}",[HarvestController::class, "show"])->name("harvests.show");
Route::get("/harvests/{harvest}/edit",[HarvestController::class, "edit"])->name("harvests.edit");
Route::put("/harvests/{harvest}",[HarvestController::class, "update"])->name("harvests.update");
Route::delete("/harvests/{harvest}",[HarvestController::class, "destroy"])->name("harvests.destroy");