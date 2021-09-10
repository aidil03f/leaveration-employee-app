<?php
use App\Http\Controllers\{DepartmentController,PositionController,EmployeeController,LeaveController};
use Illuminate\Support\Facades\Route;


Route::view('/','welcome');

Route::middleware('auth')->group(function(){
    
    Route::view('/dashboard','dashboard')->name('dashboard');
    
    Route::get('/cuti',[LeaveController::class,'index'])->name('leave.index');
    Route::get('/cuti/submit',[LeaveController::class,'submit'])->name('leave.submit');
    Route::post('/cuti/submit',[LeaveController::class,'store'])->name('leave.store');
    Route::get('/cuti/{leave:id}/review',[LeaveController::class,'review'])->name('leave.review');
    Route::put('/cuti/{leave:id}/review',[LeaveController::class,'update'])->name('leave.update');
    Route::delete('/cuti/{leave:id}/delete',[LeaveController::class,'destroy'])->name('leave.delete');
    
    Route::get('/department',[DepartmentController::class,'index'])->name('department.index');
    Route::get('/department/create',[DepartmentController::class,'create'])->name('department.create');
    Route::post('/department/create',[DepartmentController::class,'store'])->name('department.store');
    Route::get('/department/{department:id}/edit',[DepartmentController::class,'edit'])->name('department.edit');
    Route::put('/department/{department:id}/edit',[DepartmentController::class,'update'])->name('department.update');
    Route::delete('/department/{department:id}/delete',[DepartmentController::class,'destroy'])->name('department.delete');
    
    Route::get('/position',[PositionController::class,'index'])->name('position.index');
    Route::get('/position/create',[PositionController::class,'create'])->name('position.create');
    Route::post('/position/create',[PositionController::class,'store'])->name('position.store');
    Route::get('/position/{position:id}/edit',[PositionController::class,'edit'])->name('position.edit');
    Route::put('/position/{position:id}/edit',[PositionController::class,'update'])->name('position.update');
    Route::delete('/position/{position:id}/delete',[PositionController::class,'destroy'])->name('position.delete');
    
    Route::get('/employee',[EmployeeController::class,'index'])->name('employee.index');
    Route::get('/employee/create',[EmployeeController::class,'create'])->name('employee.create');
    Route::post('/employee/create',[EmployeeController::class,'store'])->name('employee.store');
    Route::get('/employee/{employee:id}/edit',[EmployeeController::class,'edit'])->name('employee.edit');
    Route::put('/employee/{employee:id}/edit',[EmployeeController::class,'update'])->name('employee.update');
    Route::delete('/employee/{employee:id}/delete',[EmployeeController::class,'destroy'])->name('employee.delete');
        
});
    
   


require __DIR__.'/auth.php';
