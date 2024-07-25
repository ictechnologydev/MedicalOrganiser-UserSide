<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

// Auth routes
Route::get('/',function(){ session()->forget('token'); return view('UserPanel.Auth.signin'); });
Route::get('/sponsors',function(){ return view('UserPanel.Auth.sponsor'); });
Route::get('/register',function(){ return view('UserPanel.Auth.signup'); });
Route::get('/VerifyUser',function(){ return view('UserPanel.Auth.verifyUser');});
Route::get('/forgot',function(){ return view('UserPanel.Auth.forgot-password'); });
Route::get('/forgot-password-otp',function(){ return view('UserPanel.Auth.forgot-password-otp');});
Route::get('/reset-password',function(){return view('UserPanel.Auth.reset-password');});
Route::get('/pages/{pageId}', function(){ return view('UserPanel.PageDetail');});

Route::get('/shareProfile-allied-professional', function(){ return view('UserPanel.Patient.share-with-professional');});
Route::get('/shareProfileForm-allied-professional', function(){ return view('UserPanel.Patient.profile-view-professional');});

// Patient routes
Route::get('/dashboard', function(){return view('UserPanel.Patient.dashboard');})->name('Patient.Dashboard');
Route::get('/shareProfile', function(){ return view('UserPanel.Patient.share-with-doctor');});
Route::get('/shareProfileForm', function(){ return view('UserPanel.Patient.shareProfileView');});
Route::get('/rejected-Requests', function(){ return view('UserPanel.Patient.rejectedlist');});
Route::get('/section', function(){ return view('UserPanel.sections');});
Route::get('/medications',function(){return view('UserPanel.section');});
Route::get('/module/{module_id}', function(){ return view('UserPanel.Module.module');})->name('Module.module');
Route::get('/requests', function(){ return view('UserPanel.request');});
Route::get('/AppSupport', function(){ return view('UserPanel.Patient.AppSupport');});
Route::get('/reminders', function(){ return view('UserPanel.Patient.reminders');});
Route::get('/patient-health-summary', function(){ return view('UserPanel.Patient.PatientHealthSummary');});
Route::get('/module/hide/{module_id}', function(){ return view('UserPanel.Module.module_hide');})->name('Module.module_hide');
Route::get('/manage-history', function(){ return view('UserPanel.Patient.manage_history');});

// Doctors routes old
Route::get('/doctor/dashboard', function(){ return view('UserPanel.Doctor.doctor-dashboard');})->name('Doctor.Dashboard');
Route::get('/requests', function(){ return view('UserPanel.request');});
Route::get('/doctor/patient-profile', function(){ return view('UserPanel.Doctor.patient-profile');});
Route::get('/doctor/AppSupport', function(){ return view('UserPanel.Doctor.AppSupport');});
Route::get('/doctor/reminders', function(){ return view('UserPanel.Doctor.reminders');});


Route::get('/show-patient-health-summary-to-doctor', function(){ return view('UserPanel.Patient.PatientHealthSummaryShowToDoctor');});
Route::get('/show-section-data-list-to-doctor', function(){ return view('UserPanel.Module.ShowSectionDataListToDoctor');});








