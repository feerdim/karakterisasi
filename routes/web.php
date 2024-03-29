<?php

// Sementara
// Route::get('del/{user}', 'AdminController@del')->name('del');

// Route::get('liatsemua', 'HistoryController@liatsemua')->name('liatsemua');
// Route::get('dtliatsemua', 'HistoryController@dtliatsemua')->name('dt.liatsemua');


Route::get('/', 'HomeController@welcome')->name('welcome');

Auth::routes(['verify' => true, 'register' => false]);

Route::prefix('register')->group(function(){
	Route::get('/', 'Auth\RegisterController@showRegistrationForm')->name('register');
	Route::get('form/{user}', 'Auth\RegisterController@createForm')->name('register.create');
	Route::post('store', 'Auth\RegisterController@storeForm')->name('register.store');
	Route::get('datatable/faculty', 'Auth\RegisterController@dataFaculty')->name('faculty.datatable');
	Route::get('datatable/studyprogram/{id}', 'Auth\RegisterController@dataStudyProgram')->name('studyprogram.datatable');
});

Route::prefix('lab')->group(function(){
	Route::get('/', 'LabController@index')->name('lab.index');
	Route::get('show/{id}', 'LabController@show')->name('lab.show');
	Route::get('show/{id}/datatable', 'ToolController@datatableLab')->name('tool.dt.lab');
	Route::get('datatable', 'LabController@datatable')->name('lab.dt');
});
Route::prefix('tool')->group(function(){
	Route::get('/', 'ToolController@index')->name('tool.index');
	Route::get('show/{id}', 'ToolController@show')->name('tool.show');
	Route::get('datatable', 'ToolController@datatable')->name('tool.dt');
	Route::get('datatableclient', 'ToolController@datatableClient')->name('tool.dt.client');
	Route::get('datatableschedule', 'ToolController@datatableSchedule')->name('tool.dt.schedule');
	Route::get('datatableadmin', 'ToolController@datatableAdmin')->name('tool.dt.admin');
});
Route::prefix('price')->group(function(){
	Route::get('/', 'PriceController@index')->name('price.index');
	Route::get('datatable', 'PriceController@datatable')->name('price.dt');
});

Route::middleware('auth', 'verified')->group(function(){
	Route::get('/home', 'HomeController@index')->name('home');

	Route::prefix('lab')->group(function(){
		Route::get('create', 'LabController@create')->name('lab.create');
		Route::post('store', 'LabController@store')->name('lab.store');
		Route::get('edit/{id}', 'LabController@edit')->name('lab.edit');
		Route::put('update/{id}', 'LabController@update')->name('lab.update');
		Route::delete('delete/{id}', 'LabController@delete')->name('lab.delete');
	});
	Route::prefix('tool')->group(function(){
		Route::get('create', 'ToolController@create')->name('tool.create');
		Route::post('store', 'ToolController@store')->name('tool.store');
		Route::get('edit/{id}', 'ToolController@edit')->name('tool.edit');
		Route::put('update/{id}', 'ToolController@update')->name('tool.update');
		Route::delete('delete/{id}', 'ToolController@delete')->name('tool.delete');
	});
	Route::prefix('price')->group(function(){
		Route::get('create', 'PriceController@create')->name('price.create');
		Route::post('store', 'PriceController@store')->name('price.store');
		Route::get('edit/{id}', 'PriceController@edit')->name('price.edit');
		Route::put('update/{id}', 'PriceController@update')->name('price.update');
		Route::delete('delete/{id}', 'PriceController@delete')->name('price.delete');
	});
	Route::prefix('schedule')->group(function(){
		Route::get('/', 'ScheduleController@index')->name('schedule.index');
		Route::get('dataschedule', 'ScheduleController@dataindex')->name('schedule.dataindex');
		Route::get('{id}/show', 'ScheduleController@show')->name('schedule.show');
		Route::get('{id}', 'ScheduleController@data')->name('schedule.data');
	});

	Route::prefix('active')->group(function(){
		Route::get('/', 'ActiveController@index')->name('active.index');
		Route::get('create', 'ActiveController@create')->name('active.create');
		Route::post('store', 'ActiveController@store')->name('active.store');
		Route::get('edit/{id}', 'ActiveController@edit')->name('active.edit');
		Route::put('update/{id}', 'ActiveController@update')->name('active.update');
		Route::delete('delete/{id}', 'ActiveController@delete')->name('active.delete');
		Route::get('datatable', 'ActiveController@datatable')->name('active.dt');
	});
	Route::prefix('usage')->group(function(){
		Route::get('/', 'UsageController@index')->name('usage.index');
		Route::get('create', 'UsageController@create')->name('usage.create');
		Route::post('store', 'UsageController@store')->name('usage.store');
		Route::get('edit/{id}', 'UsageController@edit')->name('usage.edit');
		Route::put('update/{id}', 'UsageController@update')->name('usage.update');
		Route::delete('delete/{id}', 'UsageController@delete')->name('usage.delete');
		Route::get('datatable', 'UsageController@datatable')->name('usage.dt');
	});
	Route::prefix('time')->group(function(){
		Route::get('/', 'TimeController@index')->name('time.index');
		Route::get('create', 'TimeController@create')->name('time.create');
		Route::post('store', 'TimeController@store')->name('time.store');
		Route::get('edit/{id}', 'TimeController@edit')->name('time.edit');
		Route::put('update/{id}', 'TimeController@update')->name('time.update');
		Route::delete('delete/{id}', 'TimeController@delete')->name('time.delete');
		Route::get('datatable', 'TimeController@datatable')->name('time.dt');
	});
	Route::prefix('timeofusage')->group(function(){
		Route::get('/', 'TimeofUsageController@index')->name('timeusage.index');
		Route::get('create', 'TimeofUsageController@create')->name('timeusage.create');
		Route::post('store', 'TimeofUsageController@store')->name('timeusage.store');
		Route::get('edit/{id}', 'TimeofUsageController@edit')->name('timeusage.edit');
		Route::put('update/{id}', 'TimeofUsageController@update')->name('timeusage.update');
		Route::delete('delete/{id}', 'TimeofUsageController@delete')->name('timeusage.delete');
		Route::get('datatable', 'TimeofUsageController@datatable')->name('timeusage.dt');
	});

	Route::prefix('activities')->group(function(){
		Route::prefix('register')->group(function(){
			// Cara Registrasi
			Route::get('/', 'ActivitiesController@index')->name('activities.index');
			// Pilih Alat yang ingin digunakan
			Route::get('form', 'ActivitiesController@showform')->name('activities.showform');
			Route::get('dataform', 'ActivitiesController@dataform')->name('activities.dataform');
			// Isi formulir
			Route::get('form/{id}', 'ActivitiesController@create')->name('activities.create');
			Route::post('store', 'ActivitiesController@store')->name('activities.store');
		});
		Route::get('edit/{id}', 'ActivitiesController@edit')->name('activities.edit');
		Route::put('update/{id}', 'ActivitiesController@update')->name('activities.update');
		Route::delete('delete/{id}', 'ActivitiesController@delete')->name('activities.delete');

		Route::prefix('status')->group(function(){
			// Booking Request 1,2
			Route::prefix('booking')->group(function(){
				Route::get('/', 'ActivitiesController@booking')->name('status.booking');
				Route::get('datatable', 'ActivitiesController@datatableBooking')->name('status.booking.dt');
				Route::get('data', 'ActivitiesController@adminBooking')->name('admin.booking');
			});
			// Approved by Lecturer 3
			Route::prefix('lecturer')->group(function(){
				Route::get('/', 'ActivitiesController@lecturer')->name('status.lecturer');
				Route::get('datatable', 'ActivitiesController@datatableLecturer')->name('status.lecturer.dt');
			});
			// Confirmation Schedule 4
			Route::prefix('confirmation')->group(function(){
				Route::get('/', 'ActivitiesController@confirmation')->name('status.confirmation');
				Route::get('datatable', 'ActivitiesController@datatableConfirmation')->name('status.confirmation.dt');
			});
			// Reschedule Offered List 5
			Route::prefix('reschedule')->group(function(){
				Route::get('/', 'ActivitiesController@reschedule')->name('status.reschedule');
				Route::get('datatable', 'ActivitiesController@datatableReschedule')->name('status.reschedule.dt');
			});
			// Approved Schedule 6
			Route::prefix('approved')->group(function(){
				Route::get('/', 'ActivitiesController@approved')->name('status.approved');
				Route::get('datatable', 'ActivitiesController@datatableApproved')->name('status.approved.dt');
				Route::get('data', 'ActivitiesController@adminApproved')->name('admin.approved');
			});
			// Rejected List 7,8
			Route::prefix('rejected')->group(function(){
				Route::get('/', 'ActivitiesController@rejected')->name('status.rejected');
				Route::get('datatable', 'ActivitiesController@datatableRejected')->name('status.rejected.dt');
				Route::get('data', 'ActivitiesController@adminRejected')->name('admin.rejected');
			});
			// Canceled List 9
			Route::prefix('canceled')->group(function(){
				Route::get('/', 'ActivitiesController@canceled')->name('status.canceled');
				Route::get('datatable', 'ActivitiesController@datatableCanceled')->name('status.canceled.dt');
			});

		});
	});

	Route::prefix('student')->group(function(){
		Route::get('list', 'StudentController@index')->name('student.index');
		Route::get('delete/{id}', 'StudentController@delete')->name('student.delete');
		Route::get('datatable', 'StudentController@datatable')->name('student.dt');
		Route::get('booking', 'StudentController@booking')->name('student.booking');
		Route::get('booking/datatable', 'StudentController@dataBooking')->name('student.databooking');
	});

	Route::prefix('payment')->group(function(){
		// Cara Pembayaran
		Route::get('information', 'PaymentController@index')->name('payment.info');

		Route::get('form/{id}', 'PaymentController@form')->name('payment.form');
		Route::get('upload/form/{id}', 'PaymentController@formUpload')->name('payment.formUpload');
		Route::put('upload/update/{id}', 'PaymentController@updateUpload')->name('payment.updateUpload');

		// Informasi Tagihan (Invoice) dan Upload Bukti Transfer
		Route::get('bill', 'PaymentController@bill')->name('payment.bill');
		Route::get('bill/show/{id}', 'PaymentController@showBill')->name('payment.showBill');
		Route::get('bill/form/{id}', 'PaymentController@formBill')->name('payment.formBill');
		Route::put('bill/update/{id}', 'PaymentController@updateBill')->name('payment.updateBill');
		Route::get('bill/data', 'PaymentController@dataBill')->name('payment.dataBill');
		Route::get('bill/datatable', 'PaymentController@datatableBill')->name('payment.datatableBill');
		Route::get('bill/pdf/{id}', 'PaymentController@pdfBill')->name('payment.pdfBill');
		// Informasi Terima Pembayaran (Receipt)
		Route::get('receipt', 'PaymentController@receipt')->name('payment.receipt');
		Route::get('receipt/show/{id}', 'PaymentController@showReceipt')->name('payment.showReceipt');
		Route::put('receipt/form/{id}', 'PaymentController@formReceipt')->name('payment.formReceipt');
		Route::put('receipt/update/{id}', 'PaymentController@updateReceipt')->name('payment.updateReceipt');
		Route::get('receipt/data', 'PaymentController@dataReceipt')->name('payment.dataReceipt');
		Route::get('receipt/datatable', 'PaymentController@datatableReceipt')->name('payment.datatableReceipt');
		Route::get('receipt/pdf/{id}', 'PaymentController@pdfReceipt')->name('payment.pdfReceipt');
		// Udah ada receipt masuk ke history
		Route::get('history', 'PaymentController@history')->name('payment.history');
		Route::get('history/show/{id}', 'PaymentController@showHistory')->name('payment.showHistory');
		Route::get('history/data', 'PaymentController@dataHistory')->name('payment.dataHistory');
		Route::get('history/datatable', 'PaymentController@datatableHistory')->name('payment.datatableHistory');
	});

	Route::prefix('complete')->group(function(){
		Route::get('/', 'ActivitiesController@completed')->name('status.completed');
		Route::get('datatable', 'ActivitiesController@datatableCompleted')->name('status.completed.dt');
		Route::put('update/{id}', 'ActivitiesController@updateCompleted')->name('status.updateCompleted');
	});
	Route::prefix('history')->group(function(){
		Route::get('/', 'HistoryController@activities')->name('activities.history');
		Route::prefix('tool')->group(function(){
			Route::get('/', 'HistoryController@tool')->name('history.tool');
			Route::get('datatable', 'HistoryController@dataTool')->name('history.dataTool');
			Route::get('{id}/show', 'HistoryController@showTool')->name('history.showTool');
			Route::get('{id}', 'HistoryController@dataShowTool')->name('history.dataShowTool');
		});
		Route::prefix('user')->group(function(){
			Route::get('/', 'HistoryController@user')->name('history.user');
			Route::get('datatable', 'HistoryController@dataUser')->name('history.dataUser');
			Route::get('{id}/show', 'HistoryController@showUser')->name('history.showUser');
			Route::get('{id}', 'HistoryController@dataShowUser')->name('history.dataShowUser');
		});
		Route::get('show/{id}', 'HistoryController@showHistory')->name('history.show');
		Route::get('datatable', 'HistoryController@data')->name('history.data');
	});

	Route::prefix('verification')->group(function(){
		Route::get('confirm/{id}', 'VerificationController@showConfirm')->name('verify.showConfirm');
		Route::get('reschedule/{id}', 'VerificationController@showReschedule')->name('verify.showReschedule');
		Route::get('reject/{id}', 'VerificationController@showReject')->name('verify.showReject');
		Route::put('update/confirm/{id}', 'VerificationController@updateConfirm')->name('verify.updateConfirm');
		Route::put('update/reschedule/{id}', 'VerificationController@updateReschedule')->name('verify.updateReschedule');
		Route::put('update/reject/{id}', 'VerificationController@updateReject')->name('verify.updateReject');
		Route::put('update/cancel/{id}', 'VerificationController@updateCancel')->name('verify.updateCancel');
		Route::put('hide/{id}', 'VerificationController@hide')->name('verify.hide');
		Route::get('resend/{id}', 'VerificationController@resend')->name('verify.resend');
	});

	Route::prefix('settings')->group(function(){
		Route::get('/', 'AdminController@settings')->name('settings');
		Route::get('edit', 'AdminController@edit')->name('settings.edit');
		Route::get('editemail', 'AdminController@editEmail')->name('settings.edit.email');
		Route::get('editlecturer', 'AdminController@editLecturer')->name('settings.edit.lecturer');
		Route::put('update', 'AdminController@update')->name('settings.update');
		Route::put('updateemail', 'AdminController@updateEmail')->name('settings.update.email');
		Route::put('updatelecturer', 'AdminController@updateLecturer')->name('settings.update.lecturer');
		Route::put('password', 'AdminController@password')->name('settings.password');
	});

	Route::prefix('export')->group(function(){
		Route::get('/', 'ExportController@index')->name('export.index');
		Route::post('download', 'ExportController@download')->name('export.download');
	});

	Route::prefix('account')->group(function(){
		Route::get('/', 'AdminController@account')->name('account');
		Route::get('editaccount/{id}', 'AdminController@editAccount')->name('account.edit');
		Route::put('updateaccount/{id}', 'AdminController@updateAccount')->name('account.update');
		Route::get('show/{id}', 'AdminController@showAccount')->name('account.show');
		Route::get('datatable', 'AdminController@dataAccount')->name('account.dt');
	});

	Route::get('contact', function () {
		return view('contact');
	})->name('contact');
});

Route::prefix('verification')->group(function(){
	Route::prefix('request')->group(function(){
		Route::get('{token}', 'VerificationController@verify')->name('verify');
		Route::get('{token}/confirm', 'VerificationController@confirm')->name('verify.confirm');
		Route::get('{token}/reject', 'VerificationController@reject')->name('verify.reject');
		Route::get('{token}/cancel', 'VerificationController@cancel')->name('verify.cancel');
	});
	Route::get('success', 'VerificationController@success')->name('verify.success');
});
