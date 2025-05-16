<?php

use Illuminate\Support\Facades\Route;

[
    $controllers,
    $prefix,
    $as,
    $middleware,
] = Base::getRouteConfigFromRepo(repo: \Callmeaf\TicketReply\App\Repo\Contracts\TicketReplyRepoInterface::class);

Route::apiResource($prefix, $controllers['ticket_reply'])->only([
    'store',
    'update',
    'destroy',
])->middleware($middleware);
// Route::prefix($prefix)->as($as)->middleware($middleware)->controller($controllers['ticket_reply'])->group(function () {
    // Route::get('trashed/list', 'trashed');
    // Route::prefix('{ticket_reply}')->group(function () {
        // Route::patch('/status', 'statusUpdate');
        // Route::patch('/type', 'typeUpdate');
        // Route::patch('/restore', 'restore');
        // Route::delete('/force', 'forceDestroy');
    // });
// });
