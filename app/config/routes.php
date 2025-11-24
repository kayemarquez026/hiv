<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * ------------------------------------------------------------------
 * LavaLust - URI Routing
 * ------------------------------------------------------------------
 */

/*
|--------------------------------------------------------------------------
| Default / Homepage Route
|--------------------------------------------------------------------------
| Guests will see the register/login pages, logged-in users redirected
| to dashboard.
*/
$router->get('/', 'Dashboard::index'); // Root URL shows dashboard (or homepage)

// Auth routes
$router->match('/auth/register', 'UsersController::register', ['GET','POST']);
$router->match('/auth/login', 'UsersController::login', ['GET','POST']);
$router->get('/auth/logout', 'UsersController::logout');

// Email verification
$router->get('/auth/verify/{id}', 'UsersController::verify');

// User pages
$router->get('/users', 'UsersController::index');              // list of users
$router->get('/users/dashboard', 'UsersController::dashboard'); // user dashboard

// ========================
// DASHBOARD ROUTES
// ========================
$router->get('/dashboard', 'Dashboard::index');
$router->get('/dashboard/patients', 'PatientsController::index');
$router->get('/dashboard/iot-devices', 'Dashboard::iot_devices');
$router->get('/dashboard/blockchain', 'Dashboard::blockchain');
$router->get('/dashboard/system-activities', 'Dashboard::system_activities');
$router->get('/dashboard/patient-details/{id}', 'Dashboard::patient_details');
$router->get('/dashboard/logout', 'Dashboard::logout');

// ========================
// PATIENTS ROUTES
// ========================
$router->get('/patients', 'PatientsController::index');
$router->post('/patients/add', 'PatientsController::add');
$router->get('/patients/edit/{id}', 'PatientsController::edit');
$router->match('/patients/update/{id}', 'PatientsController::update', ['GET', 'POST']);
$router->get('/patients/delete/{id}', 'PatientsController::delete');
$router->post('/patients/exportCSV', 'PatientsController::exportCSV');

// ========================
// OTHER MODULES
// ========================
$router->get('/analytics', 'Analytics::index');
$router->get('/settings', 'Settings::index');
$router->get('/reports', 'Reports::index');

// ========================
// BLOCKCHAIN ROUTES
// ========================
$router->get('/blockchain', 'Blockchain::index');
$router->get('/blockchain/create', 'Blockchain::create');
$router->post('/blockchain/store', 'Blockchain::store');
$router->get('/blockchain/edit/{id}', 'Blockchain::edit');
$router->post('/blockchain/update/{id}', 'Blockchain::update');
$router->get('/blockchain/delete/{id}', 'Blockchain::delete');

// ========================
// TRANSACTIONS ROUTES
// ========================
$router->get('/transactions', 'Transactions::index');
$router->post('/transactions/add', 'Transactions::add');
$router->get('/transactions/print_receipt/{id}', 'Transactions::print_receipt');

// ========================
// IOT DEVICES ROUTES
// ========================
$router->get('/iot-devices', 'IotDevices::index');
$router->post('/iot-devices/store', 'IotDevices::store');
$router->get('/iot-devices/edit/{id}', 'IotDevices::edit');
$router->post('/iot-devices/update/{id}', 'IotDevices::update');
$router->get('/iot-devices/delete/{id}', 'IotDevices::delete');

// ========================
// APPOINTMENTS ROUTES
// ========================
$router->get('/appointments', 'Appointments::index');
$router->get('/appointments/create', 'Appointments::create');
$router->post('/appointments/create', 'Appointments::create');
$router->get('/appointments/edit/{id}', 'Appointments::edit');
$router->post('/appointments/edit/{id}', 'Appointments::edit');
$router->get('/appointments/delete/{id}', 'Appointments::delete');

// ========================
// USER MANAGEMENT (ADMIN ONLY)
// ========================
$router->get('/users', 'UsersController::index');
$router->get('/users/edit/{id}', 'UsersController::edit');
$router->post('/users/update/{id}', 'UsersController::update');
$router->get('/users/delete/{id}', 'UsersController::delete');

// ========================
// PROFILE ROUTES
// ========================
$router->get('/profile', 'Profile::index');
$router->get('/profile/edit', 'Profile::edit');
$router->post('/profile/update', 'Profile::update');

// ========================
// MEDICAL RECORDS ROUTES
// ========================
$router->get('/medical-records', 'MedicalRecords::index');
