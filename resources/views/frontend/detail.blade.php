Route::get('banner/trash', [BannerController::class, 'trash'])->name('banner.trash');
    Route::resource('/banner', BannerController::class);
    Route::prefix('banner')->group(function () {
        Route::get('delete/{banner}', [BannerController::class, 'delete'])->name('banner.delete');
        Route::get('restore/{banner}', [BannerController::class, 'restore'])->name('banner.restore');
        Route::get('status/{banner}', [BannerController::class, 'status'])->name('banner.status');
        Route::get('destroy/{banner}', [BannerController::class, 'destroy'])->name('banner.destroy');
    });