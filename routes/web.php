<?php

//use App\Http\Controllers\Auth\RegisterController;

use App\Http\Controllers\ClientController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
//use App\Http\Middleware\RedirectIfNotAuthenticated;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RolePermissionController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\AdminController;
///////////////////////Homepage///////////////////////
Route::get('/', [PageController::class, 'index']);


Route::get('/home', [PageController::class, 'index']);


//user login
Route::get('/login/{userType}', [App\Http\Controllers\AuthenController::class, 'showLoginForm'])->name('view.login');
Route::post('/login', [App\Http\Controllers\AuthenController::class, 'login'])->name('auth.login');
Route::post('/logout', [App\Http\Controllers\AuthenController::class, 'logout'])->name('logout');


//admin dashboard page
Route::get('/view/admin/dashboard', [AdminController::class, 'showAdminDashboard'])->name('admin.dashboard');


Route::get('/operator/dashboard', [OperatorController::class, 'dashboard'])
    ->name('operator.dashboard');

//operator area page
Route::get('/operator/{currentProjectIndex}/area', [OperatorController::class, 'area'])
    ->name('operator.area');


//client area page
Route::get('/client/{id}/area', [ClientController::class, 'area'])->name('client.area');


Route::post('/admin/add-user', [UserController::class, 'store'])->name('admin.addUser');
Route::get('/admin/users', [UserController::class, 'index'])->name('admin.userList');
Route::get('/admin/edit-user/{id}', [UserController::class, 'edit'])->name('admin.editUser');
Route::post('/admin/update-user/{id}', [UserController::class, 'update'])->name('admin.updateUser');

// Route to delete user
Route::delete('/admin/delete-user/{id}', [UserController::class, 'destroy'])->name('admin.deleteUser');

// Route for managing roles and permissions
Route::get('/admin/roles-permissions', [RolePermissionController::class, 'index'])->name('admin.rolesPermissions');


//Route::resource('projects', ProjectController::class);
Route::get('/projects/create', [ProjectController::class, 'create']);
Route::post('/projects/store', [ProjectController::class, 'store']);
Route::get('/active-projects', [ProjectController::class, 'index'])->name('projects.active');
Route::get('/projects/index', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/{id}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
Route::post('/projects/{id}/update', [ProjectController::class, 'update'])->name('projects.update');
Route::get('/admin/projects/archive', [ProjectController::class, 'archivePage'])->name('projects.archivePage');
Route::post('/admin/projects/archive', [ProjectController::class, 'batchArchive'])->name('projects.batchArchive');
Route::put('/projects/{id}/archive', [ProjectController::class, 'archive'])->name('projects.archive');
Route::post('/projects/{id}/unarchive', [ProjectController::class, 'unarchive'])->name('projects.unarchive');
Route::post('/projects/{id}/delete', [ProjectController::class, 'destroy'])->name('projects.delete');
Route::get('projects/export', [ProjectController::class, 'exportProjects'])->name('projects.export');



use App\Http\Controllers\TaskController;

Route::post('/tasks/store', [TaskController::class, 'store'])->name('tasks.store');
Route::post('/tasks/{task}/complete', [TaskController::class, 'complete'])->name('tasks.complete');
Route::post('/tasks/{task}/pause', [TaskController::class, 'pause'])->name('tasks.pause');
Route::post('/tasks/{task}/cancel', [TaskController::class, 'cancel'])->name('tasks.cancel');
Route::post('/tasks/{task}/under_review', [TaskController::class, 'underReview'])->name('tasks.under_review');
Route::post('/tasks/import', [TaskController::class, 'importTasks'])->name('tasks.import');




use App\Http\Controllers\UserRequestController;
use Illuminate\Http\Request;

Route::post('/freelancer_requests/store', [UserRequestController::class, 'store'])->name('requests.store');
Route::post('/freelancer_requests/{id}/update-status', [UserRequestController::class, 'updateStatus'])->name('requests.updateStatus');
Route::get('/freelancer_requests/showAll', [UserRequestController::class, 'showAll'])->name('requests.show_all');
Route::get('/freelancer_requests/test/{id}', function (Request $request) {
    return "request ID " . $request->id;
});

Route::post('/requests/create', [UserRequestController::class, 'createRequest'])->name('requests.create');
Route::post('/requests/{id}/respond', [UserRequestController::class, 'respondToRequest'])->name('requests.respond');
Route::get('/requests/{id}', [UserRequestController::class, 'viewRequest'])->name('requests.view');


use App\Http\Controllers\SupportTicketController;

Route::get('/operators_list', [SupportTicketController::class, 'getOperators'])->name('operators.list');
Route::post('/supportsTickets/store', [SupportTicketController::class, 'store'])->name('tickets.store');
Route::get('/supportsTickets/showAll', [SupportTicketController::class, 'showAll'])->name('tickets.show_all');



Route::get('/admin/notification-settings', [AdminController::class, 'showNotificationSettings'])
    ->name('admin.notificationSettings');

// Route to handle saving notification settings
Route::post('/admin/notification-settings', [AdminController::class, 'saveNotificationSettings'])
    ->name('admin.saveNotificationSettings');

use App\Http\Controllers\ProjectOptionController;

Route::get('/projects/{project}/options', [ProjectOptionController::class, 'edit'])->name('project.options.edit');
Route::post('/projects/{project}/options', [ProjectOptionController::class, 'update'])->name('project.options.update');


use App\Http\Controllers\NotificationSettingController;

Route::get('/notifications', [NotificationSettingController::class, 'index'])->name('admin.notification-settings');
Route::post('/notifications/store', [NotificationSettingController::class, 'create'])->name('admin.notification-settings.store');
Route::post('/notifications/update/', [NotificationSettingController::class, 'update'])->name('admin.notification-settings.update');



use App\Http\Controllers\ProjectBriefingController;

Route::get('/projects/{project}/briefing', [ProjectBriefingController::class, 'show'])->name('project_briefing.show');
Route::get('/projects/{project}/briefing/edit', [ProjectBriefingController::class, 'edit'])->name('project_briefing.edit');
Route::put('/projects/{project}/briefing', [ProjectBriefingController::class, 'update'])->name('project_briefing.update');


Route::post('/operator/daily-report', [OperatorController::class, 'submitDailyReport'])->name('operator.daily-report');

use App\Http\Controllers\WorkDiaryController;

Route::get('/work-diary/{projectId}', [WorkDiaryController::class, 'getWorkDiaryData']);

use App\Http\Controllers\DailyReportController;

// Route to show the daily reports list
Route::get('daily-reports/{id}', [DailyReportController::class, 'index'])->name('daily-reports.index');

use App\Events\example;

Route::get('/broadcast', function () {
    // broadcast(new example('hello world'));
    event(new example('hi'));

    return 'Event has been broadcast!';
});
Route::get('/broadcast/index', function () {
    return view('chat');
});
