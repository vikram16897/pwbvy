<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\user\FrHomeController;
use App\Http\Controllers\user\FrAboutController;
use App\Http\Controllers\user\FrVolunteerController;
use App\Http\Controllers\user\FrChairmanController;
use App\Http\Controllers\user\FrMissionController;
use App\Http\Controllers\user\FrJoinController;
use App\Http\Controllers\user\FrDownloadController;
use App\Http\Controllers\user\FrVerifyController;
use App\Http\Controllers\user\FrBank_account_detailsController;
use App\Http\Controllers\user\FrProjectController;
use App\Http\Controllers\user\FrPwbvy_centerController;
use App\Http\Controllers\user\FrGalleryController;
use App\Http\Controllers\user\FrDonateController;
use App\Http\Controllers\user\FrEducationController;
use App\Http\Controllers\user\frPrdController;
use App\Http\Controllers\user\FrLoginController;

// admin
use App\Http\Controllers\admin\BeHomeController;
use App\Http\Controllers\admin\BeBranchController;
use App\Http\Controllers\admin\BeCustomerController;
use App\Http\Controllers\admin\BeDonationController;
use App\Http\Controllers\admin\BeDownloadController;
use App\Http\Controllers\admin\BeEmployeeController;
use App\Http\Controllers\admin\BeEnquiryController;
use App\Http\Controllers\admin\BeFaqController;
use App\Http\Controllers\admin\BeGalleryController;
use App\Http\Controllers\admin\BeNewsController;
use App\Http\Controllers\admin\BePragatiwadController;
use App\Http\Controllers\admin\BeProgramController;
use App\Http\Controllers\admin\BeProjectController;
use App\Http\Controllers\admin\BeRequirementController;
use App\Http\Controllers\admin\BeSliderController;
use App\Http\Controllers\admin\BeStaffController;
use App\Http\Controllers\admin\BeTeamMemberController;
use App\Http\Controllers\admin\BeVendorController;
use App\Http\Controllers\admin\BeVolunteerController;
use App\Http\Controllers\admin\BeProfileController;
use App\Http\Controllers\admin\ExaminationController;
use App\Http\Controllers\admin\BeRenewalController;
use App\Http\Controllers\NgoonlinetestregistrationController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('FrontEnd.index');
});

Route::prefix('/')->group(function () {
    Route::controller(FrHomeController::class)->group(function () {
        Route::get('/', 'index')->name('FrontEnd_index');
        Route::get('/terms-and-conditions', 'termsCondition')->name('FrontEnd_termsCondition');
        Route::get('/refund-policy', 'donation_refund_policy')->name('FrontEnd_donation_refund_policy');
        Route::get('/annual-report', 'annual_report')->name('FrontEnd_annual_report');
        Route::get('/exampanal', 'examapanal')->name('FrontEnd_examapanal');
        Route::get('/exampstart/{id}', 'exampstart')->name('FrontEnd_examastart');
        Route::post('/examsubmit', 'examsubmit')->name('exam.submit');
        // Route::get('/product/{slugtitle}', 'singleblogshow')->name('FrontEnd_single_product');
    });



    Route::controller(FrAboutController::class)->group(function () {
        Route::get('/about', 'index')->name('FrontEnd_about');
    });

    Route::prefix('/about')->group(function () {
        Route::controller(FrVolunteerController::class)->group(function () {
            Route::get('/volunteer', 'index')->name('FrontEnd_about_volunteer');
        });

        Route::controller(FrChairmanController::class)->group(function () {
            Route::get('/chairman', 'index')->name('FrontEnd_about_chairman');
        });

        Route::controller(FrMissionController::class)->group(function () {
            Route::get('/mission', 'index')->name('FrontEnd_about_mission');
        });
    });

    Route::prefix('/member')->group(function () {
        Route::controller(FrJoinController::class)->group(function () {
            Route::get('/join', 'index')->name('FrontEnd_member_join');
            Route::post('/join', 'create')->name('add.FrontEnd_member_join');
        });

        Route::controller(FrVerifyController::class)->group(function () {
            Route::get('/verify', 'index')->name('FrontEnd_member_verify');
            Route::post('/verify', 'find_data')->name('find.FrontEnd_member_verify');
            Route::get('/employee_verify', 'employee_verify')->name('FrontEnd_member_employee_verify');
            Route::post('/employee_verify', 'employee_verify_find_data')->name('find.FrontEnd_member_employee_verify');
            Route::get("/verificationData/{reg_no}", "verificationData")->name("FrontEnd_member_verificationData");
        });
    });

    Route::prefix('/centre')->group(function () {
        Route::controller(FrVerifyController::class)->group(function () {
            Route::post('/verify', 'find_data_center')->name('find.find_data_center');
            Route::get('/verify', 'centre_verify')->name('FrontEnd_centre_verify');
        });
    });

    Route::prefix('/Prd')->group(function () {
        Route::controller(frPrdController::class)->group(function () {
            Route::get('/', 'index')->name("FrontEnd_prd");
            Route::get('/notice', 'prd_notice')->name("FrontEnd_prd_notice");
            Route::get('/education', 'prd_education')->name("FrontEnd_prd_education");
        });
    });


    Route::controller(FrDownloadController::class)->group(function () {
        Route::get('/download', 'index')->name('FrontEnd_download');
    });

    Route::controller(FrBank_account_detailsController::class)->group(function () {
        Route::get('/bank_account_details', 'index')->name('FrontEnd_Bank_account_details');
    });

    Route::controller(FrProjectController::class)->group(function () {
        Route::get('/projects', 'index')->name('FrontEnd_Projects');
    });

    Route::controller(FrPwbvy_centerController::class)->group(function () {
        Route::get('/pwbvy_center', 'index')->name('FrontEnd_Pwbvy_center');
    });

    Route::controller(FrGalleryController::class)->group(function () {
        Route::get('/Gallery', 'index')->name('FrontEnd_Gallery');
    });

    Route::controller(FrDonateController::class)->group(function () {
        Route::get('/donate', 'index')->name('FrontEnd_Donate');
        Route::post("/donate", "create")->name("add.donation_data");
        Route::get("/donate-details", "donate_details")->name("donate_details");
        Route::post('donation/response', 'response')->name('Donation_response');
        Route::get('refund/{id}', 'refundProcess');
    });
    Route::controller(NgoonlinetestregistrationController::class)->group(function () {
        Route::get('/scholarship', 'index')->name('scholarship');
        Route::post('/send-otp', 'sendOtp')->name('sendOtp');
        Route::post('/verify-otp', 'verifyOtp')->name('verifyOtp');
        Route::post('/register', 'register')->name('register');
        Route::post('/uploadScreenshotAfterPop', 'uploadScreenshotAfterPop')->name('uploadScreenshotAfterPop');
        Route::post('/upload-screenshot', 'uploadScreenshotPop')->name('uploadScreenshot');
        Route::post('/phonepay', 'phonepay')->name('phonepay');
        Route::post('/phonepay-response', 'response')->name('responsegetway');
        // Route::post('/responsegetway/{id}', [YourController::class, 'yourMethod'])->name('responsegetway');

    });
    Route::get('/scholarship/referral/{encrypted_id}', [NgoonlinetestregistrationController::class, 'handleReferral'])->name('scholarship.referral');


    Route::controller(FrEducationController::class)->group(function () {
        Route::get('/education', 'index')->name("FrontEnd_education");
    });

    Route::controller(FrLoginController::class)->group(function () {
        Route::get("/master", "index")->name("login");
        Route::post('/master/login', 'Login_Account')->name('login.FrontEnd_login');
    });

    // admin route
    Route::prefix("/master")->middleware(['auth', 'isAdmin'])->group(function () {
        Route::controller(BeHomeController::class)->group(function () {
            Route::get('/dashboard', 'index')->name('admin_dashboard');
        });

        Route::controller(BeBranchController::class)->group(function () {
            Route::prefix("/branch")->group(function () {
                Route::get('/create', 'index')->name('admin_add_branch');
                Route::get('/', 'show')->name('admin_show_branch');
                Route::post('/create', 'create')->name('add.admin_add_branch');
                Route::get('/edit/{id}', 'edit')->name('admin_edit_branch');
                Route::post('/edit', 'update')->name('edit.admin_edit_branch');
                Route::get('/delete/{id}', 'destroy')->name('admin_delete_branch');
            });

            Route::controller(ExaminationController::class)->group(function () {
                Route::prefix("/examination")->group(function () {
                    Route::get('/create', 'create')->name('create_question');
                    Route::get('/list', 'index')->name('list_question');
                    Route::POST('/questions/store', 'store')->name('questions.store');
                    Route::get('/questions/edit', 'edit')->name('questions.edit');

                    // Route to update question details
                    Route::POST('/questions/udate', 'update')->name('questions.update');
                    Route::POST('/questions/delete', 'destroy')->name('questions.delete');
                    Route::get('/classlist', 'classList')->name('class_list');
                    Route::get('/clss/edit', 'classedit')->name('class.edit');
                    Route::POST('/class/delete', 'classdestroy')->name('class.delete');

                    Route::POST('/class/udate', 'classupdate')->name('class.update');

                    // routes/web.php
                    Route::post('/class/store', 'classstore')->name('class.store');
                    Route::get('/users-exam-results', 'usersExamResults')->name('users.exam.results');
                });
            });
            Route::get('/registrationlist', [NgoonlinetestregistrationController::class, 'registrationlist'])->name('registrationlist');
            Route::post('/registration/update-status', [NgoonlinetestregistrationController::class, 'updateStatus'])->name('registration.updateStatus');


        });

        Route::controller(BeCustomerController::class)->group(function () {
            Route::get('/customer', 'index')->name('admin_customer');
            // Route::get('/branch', 'show')->name('admin_show_branch');
        });

        Route::controller(BeDonationController::class)->group(function () {
            Route::get('/donation', 'index')->name('admin_donation');
            Route::get('/donation-menual/create', 'create')->name('admin_add_menual_donation');
            Route::get('/donation-menual', 'show')->name('admin_show_menual_donation');
        });

        Route::controller(BeDownloadController::class)->group(function () {
            Route::prefix("download")->group(function () {
                Route::get('/create', 'index')->name('admin_download');
                Route::get('/', 'show')->name('admin_show_download');
                Route::post('/create', 'create')->name('add.admin_add_download');
                Route::get('/edit/{id}', 'edit')->name('admin_edit_download');
                Route::post('/edit', 'update')->name('edit.admin_edit_download');
                Route::get('/delete/{id}', 'destroy')->name('admin_delete_download');
            });
        });


        Route::controller(BeEmployeeController::class)->group(function () {
            Route::prefix("employee")->group(function () {
                Route::get('/', 'index')->name('admin_employee');
                Route::get('/id_card/{id}', 'id_card')->name('admin_id_card_employee');
                Route::get('/welcome/{id}', 'welcome')->name('admin_welcome_employee');
                Route::get('/appointment/{id}', 'appointment')->name('admin_appointment_employee');
                Route::get('/edit/{id}', 'edit')->name('admin_edit_employee');
                Route::post('/edit', 'update')->name('edit.admin_edit_employee');
            });
        });

        Route::controller(BeRenewalController::class)->group(function () {
            Route::prefix("admin_renewal")->group(function () {
                Route::get('/', 'index')->name('admin_renewal');
            });
        });

        Route::controller(BeEnquiryController::class)->group(function () {
            Route::get('/contact/enquiry', 'contact_enquiry')->name('admin_contact_enquiry');
            Route::get('/subscription/enquiry', 'show_subscription_enquiry')->name('admin_subscription_enquiry');
        });

        Route::controller(BeFaqController::class)->group(function () {
            Route::get('/faq/create', 'index')->name('admin_add_faq');
            Route::get('/faq', 'show')->name('admin_show_faq');
        });

        Route::controller(BeGalleryController::class)->group(function () {
            Route::prefix("/gallery")->group(function () {
                Route::get('/create', 'index')->name('admin_add_gallery');
                Route::post('/create', 'create')->name('add.admin_add_gallery');
                Route::get('/', 'show')->name('admin_show_gallery');
                Route::get('/edit/{id}', 'edit')->name('admin_edit_gallery');
                Route::post('/edit', 'update')->name('edit.admin_edit_gallery');
                Route::get('/delete/{id}', 'destroy')->name('admin_delete_gallery');
            });
        });


        Route::controller(BeNewsController::class)->group(function () {
            Route::prefix("news")->group(function () {
                Route::get('/create', 'index')->name('admin_add_news');
                Route::get('/', 'show')->name('admin_show_news');
                Route::post('/create', 'create')->name('add.admin_add_news');
                Route::get('/edit/{id}', 'edit')->name('admin_edit_news');
                Route::post('/edit', 'update')->name('edit.admin_edit_news');
                Route::get('/delete/{id}', 'destroy')->name('admin_delete_news');
            });
        });

        Route::controller(BePragatiwadController::class)->group(function () {
            Route::get('/Pragativad', 'index')->name('admin_pragatiwad');
            Route::get('/Pragativad/delete/{id}', 'destroy')->name('admin_delete_pragatiwad');
            Route::get('/Pragativad/approve/{id}', 'approveData')->name('admin_approve_pragatiwad');
        });

        Route::controller(BeProgramController::class)->group(function () {
            Route::get('/program', 'index')->name('admin_program');
            Route::post('/program', 'store')->name('add.admin_program');
            Route::get('/program-show', 'show')->name('admin_show_program');
            Route::get('/program/edit/{id}', 'edit')->name('admin_edit_program');
            Route::post('/program/edit', 'update')->name('edit.admin_edit_program');
            Route::get('/program/delete/{id}', 'delete')->name('admin_delete_program');
        });

        Route::controller(BeProjectController::class)->group(function () {
            Route::get('/project/create', 'index')->name('admin_add_project');
            // Route::get('/project', 'show')->name('admin_show_project');
        });

        Route::controller(BeRequirementController::class)->group(function () {
            Route::prefix("requirement")->group(function () {
                Route::get('/create', 'index')->name('admin_add_requirement');
                Route::get('/', 'show')->name('admin_show_requirement');
                Route::post('/create', 'create')->name('add.admin_add_requirement');
                Route::get('/edit/{id}', 'edit')->name('admin_edit_requirement');
                Route::post('/edit', 'update')->name('edit.admin_edit_requirement');
                Route::get('/delete/{id}', 'destroy')->name('admin_delete_requirement');
            });
        });

        Route::controller(BeSliderController::class)->group(function () {
            Route::prefix('/slider')->group(function () {
                Route::get('/create', 'index')->name('admin_add_slider');
                Route::Post("/create", "create")->name('add.create_slider');
                Route::get('/', 'show')->name('admin_show_slider');
                Route::get('/edit/{id}', 'edit')->name('admin_edit_slider');
                Route::post('/edit', 'update')->name('edit.admin_edit_slider');
                Route::get('/delete/{id}', 'destroy')->name('admin_delete_slider');
            });
        });

        Route::controller(BeStaffController::class)->group(function () {
            Route::get('/staff/create', 'index')->name('admin_add_staff');
            Route::get('/staff', 'show')->name('admin_show_staff');
        });

        Route::controller(BeTeamMemberController::class)->group(function () {
            Route::get('/team-member/create', 'index')->name('admin_add_team_member');
            Route::Post("/team-member/create", "create")->name('add.create_team_member');
            Route::get('/team-member', 'show')->name('admin_show_team_member');
            Route::get('/team-member/edit/{id}', 'edit')->name('admin_edit_team_member');
            Route::post('/team-member/edit', 'update')->name('edit.admin_edit_team_member');
            Route::get('/team-member/delete/{id}', 'destroy')->name('admin_delete_team_member');
        });

        Route::controller(BeVendorController::class)->group(function () {
            Route::get('/vendor/create', 'index')->name('admin_add_vendor');
            Route::get('/vendor', 'show')->name('admin_show_vendor');
        });

        Route::controller(BeVolunteerController::class)->group(function () {
            Route::get('/volunteer', 'index')->name('admin_volunteer');
            // Route::get('/volunteer', 'show')->name('admin_show_volunteer');
        });

        Route::controller(BeProfileController::class)->group(function () {
            Route::get('/profile', 'index')->name('admin_profile');
            Route::post("/profile", "create")->name("add.admin_profile_create");
            Route::post("/profile/update", "update")->name("edit.admin_profile_update");
            Route::get("/edit/{id}", "edit")->name("admin_profile_edit");
            Route::get('/profile/logout', 'destroy')->name('admin_logout_profile');
        });













    });

});
