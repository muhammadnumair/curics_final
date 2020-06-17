<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', 'Frontend\PageController@index')->name('home');
Route::get('/doctors/{city?}/{speciality?}', 'Frontend\DoctorsController@index')->name('doctors');
Route::get('/doctor/booking/{alias}/{clinic}', 'Frontend\DoctorsController@booking')->name('doctor_booking')->middleware('auth');;
Route::get('/doctor/booking/confirm', 'Frontend\DoctorsController@confirm')->name('confirm');
Route::get('/doctor/{alias}', 'Frontend\DoctorsController@detail')->name('doctor_detail');
Route::post('/booking_confirm', 'Frontend\DoctorsController@booking_confirm')->name('booking_confirm');
Route::post('/gettimeslots', 'Frontend\DoctorsController@gettimeslots')->name('gettimeslots');
Route::get('/register/doctor', 'Frontend\PageController@register_doctor')->name('register_doctor');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('/register/patient', 'Frontend\PageController@register_patient')->name('register_patient');
Route::get('doctor/{alias}/submit-review', 'Frontend\DoctorsController@review')->name('doctor_review');
Route::post('/doctor/{alias}/submit-review', 'Frontend\DoctorsController@submit_review')->name('submit_review');
Route::get('/all-specializations', 'Frontend\PageController@all_specializations')->name('all_specializations');
Route::get('/all-cities', 'Frontend\PageController@all_cities')->name('all_cities');
Route::get('/all-diseases', 'Frontend\PageController@all_diseases')->name('all_diseases');
Route::get('/patient/dashboard', 'Frontend\PatientController@dashboard')->name('patient_dashboard');
Route::get('/patient/dashboard/logout', 'Frontend\PatientController@logout')->name('patient_logout');
Route::delete('/patient/dashboard/appointments/{id}', 'Frontend\PatientController@destroy');
Route::get('/patient/dashboard/appointments', 'Frontend\PatientController@appointments')->name('patient_appointments');
Route::get('/patient/dashboard/appointment/invoice/{id}', 'Frontend\PatientController@invoice');

Route::get('/patient/dashboard/reviews', 'Frontend\PatientController@reviews')->name('patient_reviews');
Route::get('/patient/dashboard/settings', 'Frontend\PatientController@settings')->name('patient_settings');

Auth::routes();

//Doctor Routes
Route::get('/account/clinics', 'Backend\Clinics\ClinicController@index')->name('clinics');
Route::get('/account/chooseclinic/{clinic}', 'Backend\Clinics\ClinicController@chooseclinic')->name('chooseclinic');

Route::get('/account/schedule', 'Backend\Schedule\ScheduleController@index')->name('schedule');
Route::get('/account/schedule/create', 'Backend\Schedule\ScheduleController@create')->name('create_schedule');
Route::post('/account/schedule/create', 'Backend\Schedule\ScheduleController@store')->name('add_schedule');
Route::get('/account/schedule/edit/{id}', 'Backend\Schedule\ScheduleController@edit')->name('edit_schedule');
Route::post('/account/schedule/update/{id}', 'Backend\Schedule\ScheduleController@update')->name('update_schedule');
Route::delete('/account/schedule/{id}', 'Backend\Schedule\ScheduleController@destroy');

Route::get('/account/patient/history/{id}', 'Backend\DoctorPatient\HistoryController@index');
Route::get('/account/patients', 'Backend\DoctorPatient\DoctorPatientController@index')->name('doctorpatient');
Route::get('/account/patient/create', 'Backend\DoctorPatient\DoctorPatientController@create')->name('create_patient');
Route::post('/account/patient/create', 'Backend\DoctorPatient\DoctorPatientController@store')->name('add_patient');
Route::get('/account/patient/edit/{id}', 'Backend\DoctorPatient\DoctorPatientController@edit')->name('edit_patient');
Route::post('/account/patient/update/{id}', 'Backend\DoctorPatient\DoctorPatientController@update')->name('update_patient');
Route::delete('/account/patient/{id}', 'Backend\DoctorPatient\DoctorPatientController@destroy');
Route::get('/account/patient/payments', 'Backend\DoctorPatient\PatientPaymentController@index');
Route::get('/account/patient/payment/history/{id}', 'Backend\DoctorPatient\PatientPaymentController@history');

Route::get('/account/qualification', 'Backend\DoctorQualification\DoctorQualificationController@index')->name('qualification');
Route::get('/account/qualification/create', 'Backend\DoctorQualification\DoctorQualificationController@create')->name('create_qualification');
Route::post('/account/qualification/create', 'Backend\DoctorQualification\DoctorQualificationController@store')->name('add_qualification');
Route::get('/account/qualification/edit/{id}', 'Backend\DoctorQualification\DoctorQualificationController@edit')->name('edit_qualification');
Route::post('/account/qualification/update/{id}', 'Backend\DoctorQualification\DoctorQualificationController@update')->name('update_qualification');
Route::delete('/account/qualification/{id}', 'Backend\DoctorQualification\DoctorQualificationController@destroy');

Route::get('/account/experience', 'Backend\DoctorExperience\DoctorExperienceController@index')->name('experience');
Route::get('/account/experience/create', 'Backend\DoctorExperience\DoctorExperienceController@create')->name('create_experience');
Route::post('/account/experience/create', 'Backend\DoctorExperience\DoctorExperienceController@store')->name('add_experience');
Route::get('/account/experience/edit/{id}', 'Backend\DoctorExperience\DoctorExperienceController@edit')->name('edit_experience');
Route::post('/account/experience/update/{id}', 'Backend\DoctorExperience\DoctorExperienceController@update')->name('update_experience');
Route::delete('/account/experience/{id}', 'Backend\DoctorExperience\DoctorExperienceController@destroy');

Route::get('/account/achievements', 'Backend\DoctorAchievement\DoctorAchievementController@index')->name('achievements');
Route::get('/account/achievement/create', 'Backend\DoctorAchievement\DoctorAchievementController@create')->name('create_achievement');
Route::post('/account/achievement/create', 'Backend\DoctorAchievement\DoctorAchievementController@store')->name('add_achievement');
Route::get('/account/achievement/edit/{id}', 'Backend\DoctorAchievement\DoctorAchievementController@edit')->name('edit_achievement');
Route::post('/account/achievement/update/{id}', 'Backend\DoctorAchievement\DoctorAchievementController@update')->name('update_achievement');
Route::delete('/account/achievement/{id}', 'Backend\DoctorAchievement\DoctorAchievementController@destroy');

Route::get('/account/dashboard', 'Backend\Dashboard\DashboardController@index')->name('dashboard');

Route::get('/account/appointments', 'Backend\DoctorAppointment\DoctorAppointmentController@index')->name('appointments');
Route::get('/account/appointment/create', 'Backend\DoctorAppointment\DoctorAppointmentController@create')->name('create_appointments');
Route::post('/backend/gettimeslots', 'Backend\DoctorAppointment\DoctorAppointmentController@gettimeslots');
Route::post('/account/appointment/get_patient_record', 'Backend\DoctorAppointment\DoctorAppointmentController@get_patient_record');
Route::post('/account/appointment/create', 'Backend\DoctorAppointment\DoctorAppointmentController@store');
Route::post('/account/appointment/changesettings/{id}', 'Backend\DoctorAppointment\DoctorAppointmentController@ChangeSettings');
Route::get('/account/appointment/invoice/{id}', 'Backend\DoctorAppointment\DoctorAppointmentController@invoice');
Route::get('/account/appointment/settings/{id}', 'Backend\DoctorAppointment\DoctorAppointmentController@settings');
Route::delete('/account/appointment/{id}', 'Backend\DoctorAppointment\DoctorAppointmentController@destroy');

Route::post('/save/user_location', 'Frontend\PageController@savelocation');

Route::get('/account/expenses', 'Backend\DoctorExpense\DoctorExpensesController@index')->name('expenses');
Route::get('/account/expense/create', 'Backend\DoctorExpense\DoctorExpensesController@create')->name('create_expense');
Route::post('/account/expense/create', 'Backend\DoctorExpense\DoctorExpensesController@store')->name('add_expense');
Route::get('/account/expense/edit/{id}', 'Backend\DoctorExpense\DoctorExpensesController@edit')->name('edit_expense');
Route::post('/account/expense/update/{id}', 'Backend\DoctorExpense\DoctorExpensesController@update')->name('update_expense');
Route::delete('/account/expense/{id}', 'Backend\DoctorExpense\DoctorExpensesController@destroy');
Route::get('/account/ledger', 'Backend\Dashboard\DashboardController@ledger')->name('ledger');
Route::get('/account/prescription/{id}', 'Backend\DoctorPrescription\DoctorPrescriptionController@index')->name('prescription');
Route::get('/account/prescription/create/{id?}', 'Backend\DoctorPrescription\DoctorPrescriptionController@create');
Route::post('/account/prescription/create/{id?}', 'Backend\DoctorPrescription\DoctorPrescriptionController@store');
Route::get('/account/settings', 'Backend\DoctorSettings\DoctorSettingsController@index')->name('settings');
Route::post('/account/settings/general', 'Backend\DoctorSettings\DoctorSettingsController@general_settings');
Route::post('/account/settings/clinic', 'Backend\DoctorSettings\DoctorSettingsController@clinic_settings');
Route::post('/account/settings/save_specialization', 'Backend\DoctorSettings\DoctorSettingsController@add_specialization');
Route::post('/account/settings/remove_specialization', 'Backend\DoctorSettings\DoctorSettingsController@remove_specialization');

Route::post('/account/load_notifications', 'Backend\Dashboard\DashboardController@load_notifications');
Route::post('/account/change_notification_status', 'Backend\Dashboard\DashboardController@change_notification_status');

Route::get('/register/hospital', 'Frontend\PageController@register_hospital')->name('register_hospital');

// Hospital Routes
Route::get('/account/hospital/doctors', 'Backend\Hospital\DoctorController@index')->name('hospital_doctors');
Route::get('/account/hospital/doctors/history', 'Backend\Hospital\DoctorController@treatment_history');
Route::get('/account/hospital/doctor/create', 'Backend\Hospital\DoctorController@create');
Route::post('/account/hospital/doctor/create', 'Backend\Hospital\DoctorController@store');
Route::delete('/account/hospital/doctor/delete/{id}', 'Backend\Hospital\DoctorController@destroy');

Route::get('/account/hospital/patients', 'Backend\Hospital\PatientController@index')->name('hospital_patient');

Route::get('/account/hospital/appointments/{id?}', 'Backend\Hospital\AppointmentController@index')->name('hospital_appointments');
Route::get('/account/hospital/appointment/create/{id?}', 'Backend\Hospital\AppointmentController@create');
Route::post('/account/hospital/appointment/create', 'Backend\Hospital\AppointmentController@store');
Route::delete('/account/hospital/appointment/{id}', 'Backend\Hospital\AppointmentController@destroy');

// Admin Routes
Route::get('/admin/hospitals', 'Backend\Admin\HospitalController@index')->name('admin_hospitals');
Route::get('/admin/hospital/status/{id}', 'Backend\Admin\HospitalController@change_status');
Route::get('/admin/hospital/create', 'Backend\Admin\HospitalController@create')->name('create_hospital');
Route::post('/admin/hospital/create', 'Backend\Admin\HospitalController@store');
Route::get('/admin/hospital/edit/{id}', 'Backend\Admin\HospitalController@edit');
Route::post('/admin/hospital/update/{id}', 'Backend\Admin\HospitalController@update');
Route::delete('/admin/hospital/{id}', 'Backend\Admin\HospitalController@destroy');

Route::get('/admin/modules', 'Backend\Admin\ModuleController@index')->name('modules');
Route::get('/admin/module/create', 'Backend\Admin\ModuleController@create');
Route::post('/admin/module/create', 'Backend\Admin\ModuleController@store');
Route::get('/admin/module/edit/{id}', 'Backend\Admin\ModuleController@edit');
Route::post('/admin/module/update/{id}', 'Backend\Admin\ModuleController@update');
Route::delete('/admin/module/{id}', 'Backend\Admin\ModuleController@destroy');

Route::get('/admin/packages', 'Backend\Admin\PackageController@index')->name('packages');
Route::get('/admin/package/create', 'Backend\Admin\PackageController@create');
Route::post('/admin/package/create', 'Backend\Admin\PackageController@store');
Route::get('/admin/package/edit/{id}', 'Backend\Admin\PackageController@edit');
Route::post('/admin/package/update/{id}', 'Backend\Admin\PackageController@update');
Route::delete('/admin/package/{id}', 'Backend\Admin\PackageController@destroy');

Route::get('/account/language', 'Backend\CommonModules\UserLanguageController@index');
Route::post('/account/language', 'Backend\CommonModules\UserLanguageController@store');

Route::get('/account/languages', 'Backend\CommonModules\LanguageController@index')->name('languages');
Route::get('/account/language/create', 'Backend\CommonModules\LanguageController@create');
Route::post('/account/language/create', 'Backend\CommonModules\LanguageController@store');
Route::get('/account/language/edit/{id}', 'Backend\CommonModules\LanguageController@edit');
Route::post('/account/language/update/{id}', 'Backend\CommonModules\LanguageController@update');
Route::delete('/account/language/{id}', 'Backend\CommonModules\LanguageController@destroy');

Route::get('/account/language/transcript/{id}', 'Backend\CommonModules\LanguageTranscriptController@index');
Route::get('/account/language/transcript/create/{id}', 'Backend\CommonModules\LanguageTranscriptController@create');
Route::post('/account/language/transcript/create/{id}', 'Backend\CommonModules\LanguageTranscriptController@store');
Route::get('/account/language/transcript/edit/{id}', 'Backend\CommonModules\LanguageTranscriptController@edit');
Route::post('/account/language/transcript/update/{id}', 'Backend\CommonModules\LanguageTranscriptController@update');
Route::delete('/account/language/transcript/{id}', 'Backend\CommonModules\LanguageTranscriptController@destroy');

Route::get('/account/hospital/doctors', 'Backend\Hospital\DoctorController@index')->name('hospital_doctors');


Route::get('/account/hospital/departments', 'Backend\Hospital\DepartmentController@index')->name('hospital_departments');
Route::get('/account/hospital/department/create', 'Backend\Hospital\DepartmentController@create');
Route::post('/account/hospital/department/create', 'Backend\Hospital\DepartmentController@store');
Route::get('/account/hospital/department/edit/{id}', 'Backend\Hospital\DepartmentController@edit');
Route::post('/account/hospital/department/update/{id}', 'Backend\Hospital\DepartmentController@update');
Route::delete('/account/hospital/department/{id}', 'Backend\Hospital\DepartmentController@destroy');

Route::get('/account/hospital/doctor/schedule/{id}', 'Backend\Hospital\DoctorScheduleController@index');
Route::get('/account/hospital/doctor/schedule/create/{id}', 'Backend\Hospital\DoctorScheduleController@create');
Route::post('/account/hospital/doctor/schedule/create/{id}', 'Backend\Hospital\DoctorScheduleController@store');
Route::get('/account/hospital/doctor/schedule/edit/{id}', 'Backend\Hospital\DoctorScheduleController@edit');
Route::post('/account/hospital/doctor/schedule/update/{id}', 'Backend\Hospital\DoctorScheduleController@update');
Route::delete('/account/hospital/doctor/schedule/{id}', 'Backend\Hospital\DoctorScheduleController@destroy');

Route::get('/account/hospital/appointment/settings/{id}', 'Backend\Hospital\AppointmentController@settings');
Route::post('/account/hospital/appointment/changesettings/{id}', 'Backend\Hospital\AppointmentController@ChangeSettings');


Route::get('/account/companies', 'Backend\CommonModules\CompanyController@index')->name('companies');
Route::get('/account/company/create', 'Backend\CommonModules\CompanyController@create');
Route::post('/account/company/create', 'Backend\CommonModules\CompanyController@store');
Route::get('/account/company/edit/{id}', 'Backend\CommonModules\CompanyController@edit');
Route::post('/account/company/update/{id}', 'Backend\CommonModules\CompanyController@update');
Route::delete('/account/company/{id}', 'Backend\CommonModules\CompanyController@destroy');


Route::get('/account/donors', 'Backend\Hospital\DonorController@index')->name('donors');
Route::get('/account/donor/create', 'Backend\Hospital\DonorController@create')->name('create_donor');
Route::post('/account/donor/create', 'Backend\Hospital\DonorController@store')->name('add_donor');
Route::get('/account/donor/edit/{id}', 'Backend\Hospital\DonorController@edit')->name('edit_donor');
Route::post('/account/donor/update/{id}', 'Backend\Hospital\DonorController@update')->name('update_donor');
Route::delete('/account/donor/{id}', 'Backend\Hospital\DonorController@destroy');

Route::get('/account/bloodBank', 'Backend\Hospital\BloodBankController@index')->name('bloodBank');
Route::get('/account/bloodBank/create', 'Backend\Hospital\BloodBankController@create');
Route::post('/account/bloodBank/create', 'Backend\Hospital\BloodBankController@store');
Route::get('/account/bloodBank/edit/{id}', 'Backend\Hospital\BloodBankController@edit');
Route::post('/account/bloodBank/update/{id}', 'Backend\Hospital\BloodBankController@update');
Route::delete('/account/bloodBank/{id}', 'Backend\Hospital\BloodBankController@destroy');

Route::get('/account/bedCategory', 'Backend\Hospital\BedCategoryController@index')->name('bed_category');
Route::get('/account/bedCategory/create', 'Backend\Hospital\BedCategoryController@create');
Route::post('/account/bedCategory/create', 'Backend\Hospital\BedCategoryController@store');
Route::get('/account/bedCategory/edit/{id}', 'Backend\Hospital\BedCategoryController@edit');
Route::post('/account/bedCategory/update/{id}', 'Backend\Hospital\BedCategoryController@update');
Route::delete('/account/bedCategory/{id}', 'Backend\Hospital\BedCategoryController@destroy');

Route::get('/account/bed', 'Backend\Hospital\BedController@index')->name('bed');
Route::get('/account/bed/create', 'Backend\Hospital\BedController@create');
Route::post('/account/bed/create', 'Backend\Hospital\BedController@store');
Route::get('/account/bed/edit/{id}', 'Backend\Hospital\BedController@edit');
Route::post('/account/bed/update/{id}', 'Backend\Hospital\BedController@update');
Route::delete('/account/bed/{id}', 'Backend\Hospital\BedController@destroy');

Route::get('/account/bedAllotment', 'Backend\Hospital\BedAllotmentController@index')->name('bedAllotment');
Route::get('/account/bedAllotment/create', 'Backend\Hospital\BedAllotmentController@create');
Route::post('/account/bedAllotment/create', 'Backend\Hospital\BedAllotmentController@store');
Route::get('/account/bedAllotment/edit/{id}', 'Backend\Hospital\BedAllotmentController@edit');
Route::post('/account/bedAllotment/update/{id}', 'Backend\Hospital\BedAllotmentController@update');
Route::delete('/account/bedAllotment/{id}', 'Backend\Hospital\BedAllotmentController@destroy');

Route::get('/account/lab/template', 'Backend\Hospital\LabTemplateController@index')->name('lab_template');
Route::get('/account/lab/template/create', 'Backend\Hospital\LabTemplateController@create');
Route::post('/account/lab/template/create', 'Backend\Hospital\LabTemplateController@store');
Route::get('/account/lab/template/edit/{id}', 'Backend\Hospital\LabTemplateController@edit');
Route::post('/account/lab/template/update/{id}', 'Backend\Hospital\LabTemplateController@update');
Route::delete('/account/lab/template/{id}', 'Backend\Hospital\LabTemplateController@destroy');

Route::get('/account/lab/reports', 'Backend\Hospital\LabReportController@index')->name('lab_report');
Route::get('/account/lab/report/create', 'Backend\Hospital\LabReportController@create');
Route::post('/account/lab/report/create', 'Backend\Hospital\LabReportController@store');
Route::get('/account/lab/report/edit/{id}', 'Backend\Hospital\LabReportController@edit');
Route::post('/account/lab/report/update/{id}', 'Backend\Hospital\LabReportController@update');
Route::delete('/account/lab/report/{id}', 'Backend\Hospital\LabReportController@destroy');
Route::get('/account/lab/report/invoice/{id}', 'Backend\Hospital\LabReportController@invoice');

Route::post('/account/get_report_template', 'Backend\Hospital\LabReportController@get_template_content');

Route::get('/account/report/birth', 'Backend\Hospital\HospitalReportController@birth')->name('birth_report');
Route::get('/account/report/expire', 'Backend\Hospital\HospitalReportController@expire')->name('expire_report');
Route::get('/account/report/operation', 'Backend\Hospital\HospitalReportController@operation')->name('operation_report');

Route::get('/account/report/create', 'Backend\Hospital\HospitalReportController@create');
Route::post('/account/report/create', 'Backend\Hospital\HospitalReportController@store');
Route::get('/account/report/edit/{id}', 'Backend\Hospital\HospitalReportController@edit');
Route::post('/account/report/update/{id}', 'Backend\Hospital\HospitalReportController@update');
Route::delete('/account/report/{id}', 'Backend\Hospital\HospitalReportController@destroy');


Route::get('/account/expenseCategory', 'Backend\Hospital\ExpenseCategoryController@index')->name('expense_category');
Route::get('/account/expenseCategory/create', 'Backend\Hospital\ExpenseCategoryController@create');
Route::post('/account/expenseCategory/create', 'Backend\Hospital\ExpenseCategoryController@store');
Route::get('/account/expenseCategory/edit/{id}', 'Backend\Hospital\ExpenseCategoryController@edit');
Route::post('/account/expenseCategory/update/{id}', 'Backend\Hospital\ExpenseCategoryController@update');
Route::delete('/account/expenseCategory/{id}', 'Backend\Hospital\ExpenseCategoryController@destroy');

Route::get('/account/expense', 'Backend\Hospital\ExpenseController@index')->name('expenses');
Route::get('/account/expense/create', 'Backend\Hospital\ExpenseController@create');
Route::post('/account/expense/create', 'Backend\Hospital\ExpenseController@store');
Route::get('/account/expense/edit/{id}', 'Backend\Hospital\ExpenseController@edit');
Route::post('/account/expense/update/{id}', 'Backend\Hospital\ExpenseController@update');
Route::delete('/account/expense/{id}', 'Backend\Hospital\ExpenseController@destroy');


Route::get('/account/paymentProcedure', 'Backend\Hospital\PaymentProcedureController@index')->name('payment_procedure');
Route::get('/account/paymentProcedure/create', 'Backend\Hospital\PaymentProcedureController@create');
Route::post('/account/paymentProcedure/create', 'Backend\Hospital\PaymentProcedureController@store');
Route::get('/account/paymentProcedure/edit/{id}', 'Backend\Hospital\PaymentProcedureController@edit');
Route::post('/account/paymentProcedure/update/{id}', 'Backend\Hospital\PaymentProcedureController@update');
Route::delete('/account/paymentProcedure/{id}', 'Backend\Hospital\PaymentProcedureController@destroy');

Route::get('/account/finance/payments', 'Backend\Hospital\PaymentController@index')->name('hospital_payments');
Route::get('/account/finance/payment/create', 'Backend\Hospital\PaymentController@create');
Route::post('/account/finance/payment/create', 'Backend\Hospital\PaymentController@store');
Route::get('/account/finance/payment/edit/{id}', 'Backend\Hospital\PaymentController@edit');
Route::post('/account/finance/payment/update/{id}', 'Backend\Hospital\PaymentController@update');
Route::delete('/account/finance/payment/{id}', 'Backend\Hospital\PaymentController@destroy');

Route::post('/account/get_procedure_detail', 'Backend\Hospital\PaymentController@get_procedure_detail');
Route::get('/account/finance/payment/invoice/{id}', 'Backend\Hospital\PaymentController@invoice');

Route::get('/account/medicineCategory', 'Backend\Hospital\MedicineCategoryController@index')->name('medicine_category');
Route::get('/account/medicineCategory/create', 'Backend\Hospital\MedicineCategoryController@create');
Route::post('/account/medicineCategory/create', 'Backend\Hospital\MedicineCategoryController@store');
Route::get('/account/medicineCategory/edit/{id}', 'Backend\Hospital\MedicineCategoryController@edit');
Route::post('/account/medicineCategory/update/{id}', 'Backend\Hospital\MedicineCategoryController@update');
Route::delete('/account/medicineCategory/{id}', 'Backend\Hospital\MedicineCategoryController@destroy');

Route::get('/account/hospital/medicine', 'Backend\Hospital\MedicineController@index')->name('hospital_medicine');
Route::get('/account/hospital/medicine/create', 'Backend\Hospital\MedicineController@create');
Route::post('/account/hospital/medicine/create', 'Backend\Hospital\MedicineController@store');
Route::get('/account/hospital/medicine/edit/{id}', 'Backend\Hospital\MedicineController@edit');
Route::post('/account/hospital/medicine/update/{id}', 'Backend\Hospital\MedicineController@update');
Route::delete('/account/hospital/medicine/{id}', 'Backend\Hospital\MedicineController@destroy');

Route::get('/account/hospital/dashboard', 'Backend\Hospital\DashboardController@index');
Route::get('/account/hospital/financialReport', 'Backend\Hospital\FinancialReportController@index');
Route::get('/account/hospital/finance/commission', 'Backend\Hospital\FinancialReportController@commission');

Route::get('/account/pharmacy/dashboard', 'Backend\Hospital\PharmacySaleController@index')->name('pharmacy_dashboard');
Route::get('/account/pharmacy/sales', 'Backend\Hospital\PharmacySaleController@sales')->name('pharmacy_sales');
Route::get('/account/pharmacy/create', 'Backend\Hospital\PharmacySaleController@create');
Route::post('/account/pharmacy/create', 'Backend\Hospital\PharmacySaleController@store');
Route::get('/account/pharmacy/edit/{id}', 'Backend\Hospital\PharmacySaleController@edit');
Route::post('/account/pharmacy/update/{id}', 'Backend\Hospital\PharmacySaleController@update');
Route::delete('/account/pharmacy/{id}', 'Backend\Hospital\PharmacySaleController@destroy');

Route::get('/account/pharmacy/invoice/{id}', 'Backend\Hospital\PharmacySaleController@invoice');

Route::post('/account/get_medicine_detail', 'Backend\Hospital\PharmacySaleController@get_medicine_detail');

Route::get('/account/caseManager', 'Backend\Hospital\CaseManagerController@index')->name('case_manager');
Route::get('/account/caseManager/create', 'Backend\Hospital\CaseManagerController@create');
Route::post('/account/caseManager/create', 'Backend\Hospital\CaseManagerController@store');
Route::get('/account/caseManager/edit/{id}', 'Backend\Hospital\CaseManagerController@edit');
Route::post('/account/caseManager/update/{id}', 'Backend\Hospital\CaseManagerController@update');
Route::delete('/account/caseManager/{id}', 'Backend\Hospital\CaseManagerController@destroy');

Route::get('/account/hospital/finance/commission/details/{id?}', 'Backend\Hospital\FinancialReportController@commission_details');
