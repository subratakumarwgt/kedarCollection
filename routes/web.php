<?php

use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;



//Language Change
Route::get('lang/{locale}', function ($locale) {
    if (! in_array($locale, ['en', 'de', 'es','fr','pt', 'cn', 'ae'])) {
        abort(400);
    }   
    Session()->put('locale', $locale);
    Session::get('locale');
    return redirect()->back();
})->name('lang');
    
Route::prefix('dashboard')->group(function () {
    Route::view('index', 'dashboard.index')->name('index');
    Route::view('dashboard-02', 'dashboard.dashboard-02')->name('dashboard-02');
});

Route::prefix('widgets')->group(function () {
    Route::view('general-widget', 'widgets.general-widget')->name('general-widget');
    Route::view('chart-widget', 'widgets.chart-widget')->name('chart-widget');
});

Route::prefix('page-layouts')->group(function () {
    Route::view('box-layout', 'page-layout.box-layout')->name('box-layout');    
    Route::view('layout-rtl', 'page-layout.layout-rtl')->name('layout-rtl');    
    Route::view('layout-dark', 'page-layout.layout-dark')->name('layout-dark');    
    Route::view('hide-on-scroll', 'page-layout.hide-on-scroll')->name('hide-on-scroll');    
    Route::view('footer-light', 'page-layout.footer-light')->name('footer-light');    
    Route::view('footer-dark', 'page-layout.footer-dark')->name('footer-dark');    
    Route::view('footer-fixed', 'page-layout.footer-fixed')->name('footer-fixed');    
}); 

Route::prefix('project')->group(function () {
    Route::view('projects', 'project.projects')->name('projects');
    Route::view('projectcreate', 'project.projectcreate')->name('projectcreate');
});

Route::view('file-manager', 'file-manager')->name('file-manager');
Route::view('kanban', 'kanban')->name('kanban');

Route::prefix('ecommerce')->group(function () {
    Route::view('product', 'apps.product')->name('product');
    Route::view('product-page', 'apps.product-page')->name('product-page');
    Route::view('list-products', 'apps.list-products')->name('list-products');
    Route::view('payment-details', 'apps.payment-details')->name('payment-details');
    Route::view('order-history', 'apps.order-history')->name('order-history');
    Route::view('invoice-template', 'apps.invoice-template')->name('invoice-template');
    Route::view('cart', 'apps.cart')->name('cart');
    Route::view('list-wish', 'apps.list-wish')->name('list-wish');
    // Route::view('checkout', 'apps.checkout')->name('checkout');
    Route::view('pricing', 'apps.pricing')->name('pricing');
});

Route::prefix('email')->group(function () {
    Route::view('email-application', 'apps.email-application')->name('email-application');
    Route::view('email-compose', 'apps.email-compose')->name('email-compose');
});

Route::prefix('chat')->group(function () {
    Route::view('chat', 'apps.chat')->name('chat');
    Route::view('chat-video', 'apps.chat-video')->name('chat-video');
});

Route::prefix('users')->group(function () {
    Route::view('user-profile', 'apps.user-profile')->name('user-profile');
    Route::view('edit-profile', 'apps.edit-profile')->name('edit-profile');
    Route::view('user-cards', 'apps.user-cards')->name('user-cards');
});


Route::view('bookmark', 'apps.bookmark')->name('bookmark');
Route::view('contacts', 'apps.contacts')->name('contacts');
Route::view('task', 'apps.task')->name('task');
Route::view('calendar-basic', 'apps.calendar-basic')->name('calendar-basic');
Route::view('social-app', 'apps.social-app')->name('social-app');
Route::view('to-do', 'apps.to-do')->name('to-do');
Route::view('search', 'apps.search')->name('search');

Route::prefix('ui-kits')->group(function () {
    Route::view('state-color', 'ui-kits.state-color')->name('state-color');
    Route::view('typography', 'ui-kits.typography')->name('typography');
    Route::view('avatars', 'ui-kits.avatars')->name('avatars');
    Route::view('helper-classes', 'ui-kits.helper-classes')->name('helper-classes');
    Route::view('grid', 'ui-kits.grid')->name('grid');
    Route::view('tag-pills', 'ui-kits.tag-pills')->name('tag-pills');
    Route::view('progress-bar', 'ui-kits.progress-bar')->name('progress-bar');
    Route::view('modal', 'ui-kits.modal')->name('modal');
    Route::view('alert', 'ui-kits.alert')->name('alert');
    Route::view('popover', 'ui-kits.popover')->name('popover');
    Route::view('tooltip', 'ui-kits.tooltip')->name('tooltip');
    Route::view('loader', 'ui-kits.loader')->name('loader');
    Route::view('dropdown', 'ui-kits.dropdown')->name('dropdown');
    Route::view('accordion', 'ui-kits.accordion')->name('accordion');
    Route::view('tab-bootstrap', 'ui-kits.tab-bootstrap')->name('tab-bootstrap');
    Route::view('tab-material', 'ui-kits.tab-material')->name('tab-material');
    Route::view('box-shadow', 'ui-kits.box-shadow')->name('box-shadow');
    Route::view('list', 'ui-kits.list')->name('list');
});

Route::prefix('bonus-ui')->group(function () {
    Route::view('new', 'userpanel.newhome')->name('mewhome');
    Route::view('scrollable', 'bonus-ui.scrollable')->name('scrollable');
    Route::view('tree', 'bonus-ui.tree')->name('tree');
    Route::view('bootstrap-notify', 'bonus-ui.bootstrap-notify')->name('bootstrap-notify');
    Route::view('rating', 'bonus-ui.rating')->name('rating');
    Route::view('dropzone', 'bonus-ui.dropzone')->name('dropzone');
    Route::view('tour', 'bonus-ui.tour')->name('tour');
    Route::view('sweet-alert2', 'bonus-ui.sweet-alert2')->name('sweet-alert2');
    Route::view('modal-animated', 'bonus-ui.modal-animated')->name('modal-animated');
    Route::view('owl-carousel', 'bonus-ui.owl-carousel')->name('owl-carousel');
    Route::view('ribbons', 'bonus-ui.ribbons')->name('ribbons');
    Route::view('pagination', 'bonus-ui.pagination')->name('pagination');
    Route::view('breadcrumb', 'bonus-ui.breadcrumb')->name('breadcrumb');
    Route::view('range-slider', 'bonus-ui.range-slider')->name('range-slider');
    Route::view('image-cropper', 'bonus-ui.image-cropper')->name('image-cropper');
    Route::view('sticky', 'bonus-ui.sticky')->name('sticky');
    Route::view('basic-card', 'bonus-ui.basic-card')->name('basic-card');
    Route::view('creative-card', 'bonus-ui.creative-card')->name('creative-card');
    Route::view('tabbed-card', 'bonus-ui.tabbed-card')->name('tabbed-card');
    Route::view('dragable-card', 'bonus-ui.dragable-card')->name('dragable-card');
    Route::view('timeline-v-1', 'bonus-ui.timeline-v-1')->name('timeline-v-1');
    Route::view('timeline-v-2', 'bonus-ui.timeline-v-2')->name('timeline-v-2');
    Route::view('timeline-small', 'bonus-ui.timeline-small')->name('timeline-small');
});

Route::prefix('builders')->group(function () {
    Route::view('form-builder-1', 'builders.form-builder-1')->name('form-builder-1');
    Route::view('form-builder-2', 'builders.form-builder-2')->name('form-builder-2');
    Route::view('pagebuild', 'builders.pagebuild')->name('pagebuild');
    Route::view('button-builder', 'builders.button-builder')->name('button-builder');
});

Route::prefix('animation')->group(function () {
    Route::view('animate', 'animation.animate')->name('animate');
    Route::view('scroll-reval', 'animation.scroll-reval')->name('scroll-reval');
    Route::view('aos', 'animation.aos')->name('aos');
    Route::view('tilt', 'animation.tilt')->name('tilt');
    Route::view('wow', 'animation.wow')->name('wow');
});


Route::prefix('icons')->group(function () {
    Route::view('flag-icon', 'icons.flag-icon')->name('flag-icon');
    Route::view('font-awesome', 'icons.font-awesome')->name('font-awesome');
    Route::view('ico-icon', 'icons.ico-icon')->name('ico-icon');
    Route::view('themify-icon', 'icons.themify-icon')->name('themify-icon');
    Route::view('feather-icon', 'icons.feather-icon')->name('feather-icon');
    Route::view('whether-icon', 'icons.whether-icon')->name('whether-icon');
    Route::view('simple-line-icon', 'icons.simple-line-icon')->name('simple-line-icon');
    Route::view('material-design-icon', 'icons.material-design-icon')->name('material-design-icon');
    Route::view('pe7-icon', 'icons.pe7-icon')->name('pe7-icon');
    Route::view('typicons-icon', 'icons.typicons-icon')->name('typicons-icon');
    Route::view('ionic-icon', 'icons.ionic-icon')->name('ionic-icon');
});

Route::prefix('buttons')->group(function () {
    Route::view('buttons', 'buttons.buttons')->name('buttons');
    Route::view('buttons-flat', 'buttons.buttons-flat')->name('buttons-flat');
    Route::view('buttons-edge', 'buttons.buttons-edge')->name('buttons-edge');
    Route::view('raised-button', 'buttons.raised-button')->name('raised-button');
    Route::view('button-group', 'buttons.button-group')->name('button-group');
});

Route::prefix('forms')->group(function () {
    Route::view('form-validation', 'forms.form-validation')->name('form-validation');
    Route::view('base-input', 'forms.base-input')->name('base-input');
    Route::view('radio-checkbox-control', 'forms.radio-checkbox-control')->name('radio-checkbox-control');
    Route::view('input-group', 'forms.input-group')->name('input-group');
    Route::view('megaoptions', 'forms.megaoptions')->name('megaoptions');
    Route::view('datepicker', 'forms.datepicker')->name('datepicker');
    Route::view('time-picker', 'forms.time-picker')->name('time-picker');
    Route::view('datetimepicker', 'forms.datetimepicker')->name('datetimepicker');
    Route::view('daterangepicker', 'forms.daterangepicker')->name('daterangepicker');
    Route::view('touchspin', 'forms.touchspin')->name('touchspin');
    Route::view('select2', 'forms.select2')->name('select2');
    Route::view('switch', 'forms.switch')->name('switch');
    Route::view('typeahead', 'forms.typeahead')->name('typeahead');
    Route::view('clipboard', 'forms.clipboard')->name('clipboard');
    Route::view('default-form', 'forms.default-form')->name('default-form');
    Route::view('form-wizard', 'forms.form-wizard')->name('form-wizard');
    Route::view('form-wizard-two', 'forms.form-wizard-two')->name('form-wizard-two');
    Route::view('form-wizard-three', 'forms.form-wizard-three')->name('form-wizard-three');
    Route::post('form-wizard-three', function(){
        return redirect()->route('form-wizard-three');
    })->name('form-wizard-three-post');
});

Route::prefix('tables')->group(function () {
    Route::view('bootstrap-basic-table', 'tables.bootstrap-basic-table')->name('bootstrap-basic-table');
    Route::view('bootstrap-sizing-table', 'tables.bootstrap-sizing-table')->name('bootstrap-sizing-table');
    Route::view('bootstrap-border-table', 'tables.bootstrap-border-table')->name('bootstrap-border-table');
    Route::view('bootstrap-styling-table', 'tables.bootstrap-styling-table')->name('bootstrap-styling-table');
    Route::view('table-components', 'tables.table-components')->name('table-components');
    Route::view('datatable-basic-init', 'tables.datatable-basic-init')->name('datatable-basic-init');
    Route::view('datatable-advance', 'tables.datatable-advance')->name('datatable-advance');
    Route::view('datatable-styling', 'tables.datatable-styling')->name('datatable-styling');
    Route::view('datatable-ajax', 'tables.datatable-ajax')->name('datatable-ajax');
    Route::view('datatable-server-side', 'tables.datatable-server-side')->name('datatable-server-side');
    Route::view('datatable-plugin', 'tables.datatable-plugin')->name('datatable-plugin');
    Route::view('datatable-api', 'tables.datatable-api')->name('datatable-api');
    Route::view('datatable-data-source', 'tables.datatable-data-source')->name('datatable-data-source');
    Route::view('datatable-ext-autofill', 'tables.datatable-ext-autofill')->name('datatable-ext-autofill');
    Route::view('datatable-ext-basic-button', 'tables.datatable-ext-basic-button')->name('datatable-ext-basic-button');
    Route::view('datatable-ext-col-reorder', 'tables.datatable-ext-col-reorder')->name('datatable-ext-col-reorder');
    Route::view('datatable-ext-fixed-header', 'tables.datatable-ext-fixed-header')->name('datatable-ext-fixed-header');
    Route::view('datatable-ext-html-5-data-export', 'tables.datatable-ext-html-5-data-export')->name('datatable-ext-html-5-data-export');
    Route::view('datatable-ext-key-table', 'tables.datatable-ext-key-table')->name('datatable-ext-key-table');
    Route::view('datatable-ext-responsive', 'tables.datatable-ext-responsive')->name('datatable-ext-responsive');
    Route::view('datatable-ext-row-reorder', 'tables.datatable-ext-row-reorder')->name('datatable-ext-row-reorder');
    Route::view('datatable-ext-scroller', 'tables.datatable-ext-scroller')->name('datatable-ext-scroller');
    Route::view('jsgrid-table', 'tables.jsgrid-table')->name('jsgrid-table');
});

Route::prefix('charts')->group(function () {
    Route::view('echarts', 'charts.echarts')->name('echarts');
    Route::view('chart-apex', 'charts.chart-apex')->name('chart-apex');
    Route::view('chart-google', 'charts.chart-google')->name('chart-google');
    Route::view('chart-sparkline', 'charts.chart-sparkline')->name('chart-sparkline');
    Route::view('chart-flot', 'charts.chart-flot')->name('chart-flot');
    Route::view('chart-knob', 'charts.chart-knob')->name('chart-knob');
    Route::view('chart-morris', 'charts.chart-morris')->name('chart-morris');
    Route::view('chartjs', 'charts.chartjs')->name('chartjs');
    Route::view('chartist', 'charts.chartist')->name('chartist');
    Route::view('chart-peity', 'charts.chart-peity')->name('chart-peity');
});

Route::view('sample-page', 'pages.sample-page')->name('sample-page');
Route::view('internationalization', 'pages.internationalization')->name('internationalization');

Route::prefix('starter-kit')->group(function () {
});

Route::prefix('others')->group(function () {
    Route::view('400', 'errors.400')->name('error-400');
    Route::view('401', 'errors.401')->name('error-401');
    Route::view('403', 'errors.403')->name('error-403');
    Route::view('404', 'errors.404')->name('error-404');
    Route::view('500', 'errors.500')->name('error-500');
    Route::view('503', 'errors.503')->name('error-503');
});

Route::prefix('authentication')->group(function () {
    Route::view('login', 'authentication.login')->name('login-fake');
    Route::view('login-one', 'authentication.login-one')->name('login-one');
    Route::view('login-two', 'authentication.login-two')->name('login-two');
    Route::view('login-bs-validation', 'authentication.login-bs-validation')->name('login-bs-validation');
    Route::view('login-bs-tt-validation', 'authentication.login-bs-tt-validation')->name('login-bs-tt-validation');
    Route::view('login-sa-validation', 'authentication.login-sa-validation')->name('login-sa-validation');
    Route::view('sign-up', 'authentication.sign-up');
    Route::view('sign-up-one', 'authentication.sign-up-one')->name('sign-up-one');
    Route::view('sign-up-two', 'authentication.sign-up-two')->name('sign-up-two');
    Route::view('sign-up-wizard', 'authentication.sign-up-wizard')->name('sign-up-wizard');
    Route::view('unlock', 'authentication.unlock')->name('unlock');
    Route::view('forget-password', 'authentication.forget-password')->name('forget-password');
    Route::view('reset-password', 'authentication.reset-password')->name('reset-password');
    Route::view('maintenance', 'authentication.maintenance')->name('maintenance');
});

Route::view('comingsoon', 'comingsoon.comingsoon')->name('comingsoon');
Route::view('comingsoon-bg-video', 'comingsoon.comingsoon-bg-video')->name('comingsoon-bg-video');
Route::view('comingsoon-bg-img', 'comingsoon.comingsoon-bg-img')->name('comingsoon-bg-img');

Route::view('basic-template', 'email-templates.basic-template')->name('basic-template');
Route::view('email-header', 'email-templates.email-header')->name('email-header');
Route::view('template-email', 'email-templates.template-email')->name('template-email');
Route::view('template-email-2', 'email-templates.template-email-2')->name('template-email-2');
Route::view('ecommerce-templates', 'email-templates.ecommerce-templates')->name('ecommerce-templates');
Route::view('email-order-success', 'email-templates.email-order-success')->name('email-order-success');


Route::prefix('gallery')->group(function () {
    Route::view('/', 'apps.gallery')->name('gallery');
    Route::view('gallery-with-description', 'apps.gallery-with-description')->name('gallery-with-description');
    Route::view('gallery-masonry', 'apps.gallery-masonry')->name('gallery-masonry');
    Route::view('masonry-gallery-with-disc', 'apps.masonry-gallery-with-disc')->name('masonry-gallery-with-disc');
    Route::view('gallery-hover', 'apps.gallery-hover')->name('gallery-hover');
});

Route::prefix('blog')->group(function () {
    Route::view('/', 'apps.blog')->name('blog');
    Route::view('blog-single', 'apps.blog-single')->name('blog-single');
    Route::view('add-post', 'apps.add-post')->name('add-post');
});


Route::view('faq', 'apps.faq')->name('faq');

Route::prefix('job-search')->group(function () {
    Route::view('job-cards-view', 'apps.job-cards-view')->name('job-cards-view');
    Route::view('job-list-view', 'apps.job-list-view')->name('job-list-view');
    Route::view('job-details', 'apps.job-details')->name('job-details');
    Route::view('job-apply', 'apps.job-apply')->name('job-apply');
});

Route::prefix('learning')->group(function () {
    Route::view('learning-list-view', 'apps.learning-list-view')->name('learning-list-view');
    Route::view('learning-detailed', 'apps.learning-detailed')->name('learning-detailed');
});

Route::prefix('maps')->group(function () {
    Route::view('map-js', 'apps.map-js')->name('map-js');
    Route::view('vector-map', 'apps.vector-map')->name('vector-map');
});

Route::prefix('editors')->group(function () {
    Route::view('summernote', 'apps.summernote')->name('summernote');
    Route::view('ckeditor', 'apps.ckeditor')->name('ckeditor');
    Route::view('simple-mde', 'apps.simple-mde')->name('simple-mde');
    Route::view('ace-code-editor', 'apps.ace-code-editor')->name('ace-code-editor');
});

Route::view('knowledgebase', 'apps.knowledgebase')->name('knowledgebase');
Route::view('support-ticket', 'apps.support-ticket')->name('support-ticket');
Route::view('landing-page', 'pages.landing-page')->name('landing-page');
Route::view('home-page', 'pages.home-page')->name('home-page');

Route::prefix('layouts')->group(function () {
    Route::view('compact-sidebar', 'admin_unique_layouts.compact-sidebar'); //default //Dubai
    Route::view('box-layout', 'admin_unique_layouts.box-layout');    //default //New York //
    Route::view('dark-sidebar', 'admin_unique_layouts.dark-sidebar');

    Route::view('default-body', 'admin_unique_layouts.default-body');
    Route::view('compact-wrap', 'admin_unique_layouts.compact-wrap');
    Route::view('enterprice-type', 'admin_unique_layouts.enterprice-type');

    Route::view('compact-small', 'admin_unique_layouts.compact-small');
    Route::view('advance-type', 'admin_unique_layouts.advance-type');
    Route::view('material-layout', 'admin_unique_layouts.material-layout');

    Route::view('color-sidebar', 'admin_unique_layouts.color-sidebar');
    Route::view('material-icon', 'admin_unique_layouts.material-icon');
    Route::view('modern-layout', 'admin_unique_layouts.modern-layout');
});

Route::get('layout-{light}', function($light){
    session()->put('layout', $light);
    session()->get('layout');
    if($light == 'vertical-layout')
    {
        return redirect()->route('pages-vertical-layout');
    }
    return redirect()->route('index');
    return 1;
});


Route::get('/clear-cache', function() {
    Artisan::call('config:cache');
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    return "Cache is cleared";
})->name('clear.cache');
//Clientside routes
Route::view("/terms-services","userpanel.terms-services")->name("terms-services");
Route::view("/privacy-policies","userpanel.privacy-policy")->name("privacy-policies");
Route::view("/delivery-shipping","userpanel.delivery-shipping")->name("delivery-services");
Route::view("/refund-policies","userpanel.refund-policy")->name("refund-policies");


Route::group(['namespace' => '\App\Http\Controllers'],function () {

    

    Route::get('/','UserDashboardController@index')->name('/');

    Route::get('/login','UserDashboardController@loginView')->name('login');

    Route::get('/register','UserDashboardController@registerView')->name('sign-up');

    Route::get('/product-dashboard','UserDashboardController@dashboardView')->name('product-dashboard');

    Route::get('/doctors','UserDashboardController@doctorView')->name('doctors-list');

    Route::get('/doctor/{doctor_id}','UserDashboardController@doctorProfile')->name('doctors-profile');

    Route::get('/diagnostic-centres','UserDashboardController@doctorView')->name('diagnostic-centres-list');

     Route::get('/my-bookings/{booking_id}','UserDashboardController@myBookingView')->name('my-booking-details');
     
     Route::get('/track-order/{order_id}','UserDashboardController@orderTrackView')->name('track-order');

     Route::get('/my-bookings','UserDashboardController@myBookingList')->name('my-booking-list');

    Route::get('/pathological-labs','UserDashboardController@doctorView')->name('pathological-labs-list');

    Route::post('/auth/login-new','AuthenticationController@login')->name('auth-login');
    

    Route::get('/profile-password','UserDashboardController@profileEdit')->name('profile-password');

    Route::get('/menu','UserDashboardController@productView')->name('menu');

    Route::get('/shop','UserDashboardController@productView')->name('shop');

    Route::get('/cart-items','UserDashboardController@cartView')->name('cart-items');

    Route::get('/checkout','UserDashboardController@checkout')->name('checkout');

    Route::get('/shop-by-category/{id}','UserDashboardController@shopByCategory')->name('shop-by-category');
    Route::get('/shop-by-category','UserDashboardController@shopByCategory')->name('category-list');
    Route::get('/shop-by-collection/{id}','UserDashboardController@shopByCollection')->name('shop-by-collection');
    Route::get('/shop-by-collection','UserDashboardController@shopByCollection')->name('collection-list');
    Route::get('/shop-by-offers/{id}','UserDashboardController@shopByOffer')->name('shop-by-offers');
    Route::get('/shop-by-offers','UserDashboardController@shopByOffer')->name('offers-list');
    Route::get('/shop-by-items/{id}','UserDashboardController@shopByItem')->name('shop-by-items');
    Route::post('/add-to-cart', '\App\Http\Controllers\CrudController@addToCart')->name('add-to-cart');

    Route::get('/pages/{slug}','UserDashboardController@customPage')->name('custom-page');




    Route::get('/testing','SystemController@index')->name('testing');
  
    
});



//Adminside Routes
Route::group(['namespace' => '\App\Http\Controllers',"prefix"=>"operation"],function () {
    Route::get('/slot/list', 'AdminDashboardController@slotList')->name('slot-list');
    Route::post('/slot/update/{id}', 'AdminDashboardController@slotUpdate')->name('slot-edit'); 
    Route::get('/slot/bind', 'AdminDashboardController@slotBind')->name('slot-bind');
    Route::get('/slot/create', 'OperationController@slotCreate')->name('slot-create');
    Route::get('/slot/delete/{id}', 'AdminDashboardController@slotDelete')->name('slot-delete');  

});
Route::group(array('domain' => '{subdomain}.kedarcollections.com'), function () {

    Route::get('/', function ($subdomain) {
        if ($subdomain == 'admin') {
            return redirect('/management/dashboard');
        }
         else{
            
            return abort(400);
        }
       
      
    });

});
Route::get('log-out', function(){
    Auth::logout();
    redirect()->back();
})->name('log-out');
Route::group(['namespace' => '\App\Http\Controllers',"prefix"=>"management" ,'middleware'=>'auth.admin'],function () {
    Route::get('/dashboard', 'ExpenseController@dashboardView')->name('admin-dashboard');
    Route::get('/static-assets', 'AdminDashboardController@assetList')->name('static-assets');
    Route::get('/asset/bind', 'AdminDashboardController@assetBind')->name('asset-bind');
    Route::get('/asset/edit/{id}', 'AdminDashboardController@assetEdit')->name('asset-edit');
    Route::get('/asset/delete/{id}', 'AdminDashboardController@assetDelete')->name('asset-delete');
  
    Route::get('/contact/list', 'AdminDashboardController@contactList')->name('contact-list');
    Route::get('/contact/bind', 'AdminDashboardController@contactBind')->name('contact-bind');
    Route::get('/contact/import', 'AdminDashboardController@contactImport')->name('contact-import');
    Route::get('/contact/delete/{id}', 'AdminDashboardController@contactDelete')->name('contact-delete');
    Route::post('/contact/import/data', 'AdminDashboardController@contactImportData')->name('contact-import-data');
    
    
    Route::get('/centre/list', 'AdminDashboardController@centreList')->name('centre-list');
    Route::get('/centre/edit/{id}', 'AdminDashboardController@centreEdit')->name('centre-edit');
    Route::post('/centre/edit', 'AdminDashboardController@centreEditData')->name('centre-edit-data');
    Route::get('/centre/bind', 'AdminDashboardController@centreBind')->name('centre-bind');
    Route::get('/centre/import', 'AdminDashboardController@centreImport')->name('centre-import');
    Route::get('/centre/delete/{id}', 'AdminDashboardController@centreDelete')->name('centre-delete');
    Route::post('/centre/import/data', 'AdminDashboardController@centreImportData')->name('centre-import-data');

    Route::get('/doctor/list', 'AdminDashboardController@doctorList')->name('doctor-list');
    Route::get('/doctor/bind', 'AdminDashboardController@doctorBind')->name('doctor-bind');
    Route::get('/doctor/edit/{id}', 'AdminDashboardController@doctorEdit')->name('doctor-edit');
    Route::post('/doctor/edit', 'AdminDashboardController@doctorEditData')->name('doctor-edit-data');
    Route::get('/doctor/import', 'AdminDashboardController@doctorImport')->name('doctor-import');
    Route::get('/doctor/delete/{id}', 'AdminDashboardController@doctorDelete')->name('doctor-delete');
    Route::post('/doctor/import/data', 'AdminDashboardController@doctorImportData')->name('doctor-import-data');

    Route::get('/diagnosis/list', 'AdminDashboardController@diagnosisList')->name('diagnosis-list');
    Route::get('/diagnosis/bind', 'AdminDashboardController@diagnosisBind')->name('diagnosis-bind');
    Route::get('/diagnosis/edit/{id}', 'AdminDashboardController@diagnosisEdit')->name('diagnosis-edit');
    Route::post('/diagnosis/edit', 'AdminDashboardController@diagnosisEditData')->name('diagnosis-edit-data');
    Route::get('/diagnosis/import', 'AdminDashboardController@diagnosisImport')->name('diagnosis-import');
    Route::get('/diagnosis/delete/{id}', 'AdminDashboardController@diagnosisDelete')->name('diagnosis-delete');
    Route::post('/diagnosis/import/data', 'AdminDashboardController@diagnosisImportData')->name('diagnosis-import-data');

    Route::get('/content/list', 'AdminDashboardController@contentList')->name('content-list');
    Route::get('/content/bind', 'AdminDashboardController@contentBind')->name('content-bind');
    Route::get('/content/edit/{id}', 'AdminDashboardController@contentEdit')->name('content-edit');
    Route::post('/content/edit', 'AdminDashboardController@contentEditData')->name('content-edit-data');
    Route::get('/content/import', 'AdminDashboardController@contentImport')->name('content-import');

    Route::get('/offer/list', 'AdminDashboardController@offerList')->name('offer-list');
    Route::get('/offer/bind', 'AdminDashboardController@offerBind')->name('offer-bind');
    Route::get('/offer/edit/{id}', 'AdminDashboardController@offerEdit')->name('offer-edit');
    Route::post('/offer/edit', 'AdminDashboardController@offerEditData')->name('offer-edit-data');
    Route::get('/offer/import', 'AdminDashboardController@offerImport')->name('offer-import');

    Route::get('/collection/list', 'AdminDashboardController@collectionList')->name('collection-list');
    Route::get('/collection/bind', 'AdminDashboardController@collectionBind')->name('collection-bind');
    Route::get('/collection/edit/{id}', 'AdminDashboardController@collectionEdit')->name('collection-edit');
    Route::post('/collection/edit', 'AdminDashboardController@collectionEditData')->name('collection-edit-data');
    Route::get('/collection/import', 'AdminDashboardController@collectionImport')->name('collection-import');

    Route::get('/template/email/add', 'AdminDashboardController@addEmailTemplate')->name('email-template-add');
    Route::get('/template/email/list', 'AdminDashboardController@listEmailTemplate')->name('email-template-list');
    Route::get('/template/email/edit/{id}', 'AdminDashboardController@editEmailTemplate')->name('email-template-edit');

    Route::get('/section/add', 'AdminDashboardController@addSection')->name('section-add');
    Route::get('/section/list', 'AdminDashboardController@listSection')->name('section-list');
    
    Route::get('/section/edit/openingbanner', 'AdminDashboardController@editSectionBanner')->name('section-openingbanner');
    Route::get('/section/edit/collections', 'AdminDashboardController@editSectionCollection')->name('section-collections');
    Route::get('/section/edit/categories', 'AdminDashboardController@editSectionCategory')->name('section-categories');
    Route::get('/section/edit/offers', 'AdminDashboardController@editSectionOffers')->name('section-offers');
    Route::get('/section/edit/top_sellers', 'AdminDashboardController@editSectionSeller')->name('section-top_sellers');
    Route::get('/section/edit/{id}', 'AdminDashboardController@editSection')->name('section-edit');

    Route::get('/page/add', 'AdminDashboardController@addPage')->name('page-add');
    Route::get('/page/list', 'AdminDashboardController@listPage')->name('page-list');
    Route::get('/page/bind', 'AdminDashboardController@bindPage')->name('page-bind');
    Route::get('/page/edit/{id}', 'AdminDashboardController@editPage')->name('page-edit');

    Route::get('/page/edit/2', 'AdminDashboardController@editPage')->name('page-edit-privacy');
    Route::get('/page/edit/1', 'AdminDashboardController@editPage')->name('page-edit-terms');
    Route::get('/page/edit/3', 'AdminDashboardController@editPage')->name('page-edit-delivery');
    Route::get('/page/edit/4', 'AdminDashboardController@editPage')->name('page-edit-refund');

    Route::get('/varient/list', 'AdminDashboardController@listVariant')->name('varient-list');
    Route::get('/varient/edit/{id}', 'AdminDashboardController@variantEdit')->name('varient-edit');
    Route::get('/varient/add', 'AdminDashboardController@addVariant')->name('varient-add');
    Route::get('/varient/bind', 'AdminDashboardController@bindVariant')->name('varient-bind');

    Route::get('/user/list', 'AdminDashboardController@userList')->name('user-list');
    Route::get('/user/bind', 'AdminDashboardController@userBind')->name('user-bind');
    Route::get('/user/register', 'AdminDashboardController@userImport')->name('user-import');
    Route::get('/user/edit/{id}', 'AdminDashboardController@userEdit')->name('user-edit');
    Route::post('/user/edit', 'AdminDashboardController@userEditData')->name('user-edit-data');
    Route::get('/user/delete/{id}', 'AdminDashboardController@userDelete')->name('user-delete');
    Route::post('/user/import/data', 'AdminDashboardController@userImportData')->name('user-import-data');
    Route::get('online-users', 'AdminDashboardController@onlineUsers')->name('online-users');

    Route::get('/category', 'AdminDashboardController@categoryView')->name('category');
    
    Route::get('/category/bind', 'AdminDashboardController@categoryBind')->name('category-bind');
    Route::get('/category/{id}', 'AdminDashboardController@categoryEdit')->name('category-update');

    Route::get('/product/list', 'AdminDashboardController@productList')->name('product-list');
    Route::get('/product/bind', 'AdminDashboardController@productBind')->name('product-bind');
    Route::get('/product-select/bind', 'AdminDashboardController@productSelectBind')->name('product-select-bind');
    Route::get('/product/edit/{id}', 'AdminDashboardController@productEdit')->name('product-edit');
    Route::post('/product/edit', 'AdminDashboardController@productEditData')->name('product-edit-data');
    Route::get('/product/import', 'AdminDashboardController@productImport')->name('product-import');
    Route::get('/product/import/excel', 'AdminDashboardController@productExcelImport')->name('contact-import-data');
    Route::get('/product/delete/{id}', 'AdminDashboardController@productDelete')->name('product-delete');
    Route::post('/product/import/data', 'AdminDashboardController@productImportData')->name('product-import-data');

     Route::get('/module/list', 'AdminDashboardController@moduleList')->name('module-list');
     Route::post('/module/create', 'ModuleController@createNewModule')->name('module-create');
    Route::get('/module/bind', 'ModuleController@moduleBind')->name('module-bind');


     Route::post('/check-route', 'AdminDashboardController@checkRoute')->name('check-route');

     Route::get('/check-error', 'AdminDashboardController@checkRoute')->name('error-list');
     Route::get('/order-history', 'AdminDashboardController@orderHistory')->name('order-history');
     
     //HTML returning ROUTES
     Route::get('/sales/orders/bind', 'AdminDashboardController@orderCouponBind')->name('online-orders-bind');    
     Route::get('/sales/orders/timeline', 'AdminDashboardController@getOrderTimelineHTML')->name('online-orders-timeline');
     Route::get('/sales/orders/details', 'AdminDashboardController@getOrderDetailsHTML')->name('online-orders-details');
     Route::get('/sales/orders/info', 'AdminDashboardController@getOrderInfoHTML')->name('online-orders-info');
     Route::get('/sales/items/box', 'AdminDashboardController@itemBoxBind')->name('get-item-box');



     Route::get('/module-permission', 'ModuleController@modulePermission')->name('module-permission');
     Route::get('module-permission/{view_type}', 'ModuleController@modulePermission')->name('module-permission-view');
     Route::get('module-permission/{view_type}/{view_type_id}', 'ModuleController@modulePermission')->name('module-permission-view-id');
     Route::get('get-view-type', 'ModuleController@getViewTypeSelect2')->name('get-view-type');
     Route::post('get-module-view-type', 'ModuleController@getViewResources')->name('get-module-view-type');
     Route::post('modules-permission-update', 'ModuleController@modulePermissionUpdate')->name('modules-permission-update');
     Route::get('role-setup', 'RoleController@roleSetup')->name('role-setup');
     Route::get('role/bind', 'RoleController@roleBind')->name('role-bind');
     Route::post("role/assign-users","RoleController@assignUsers")->name("assign-users");     
     Route::post('/role/create', 'RoleController@createNewrole')->name('role-create');
    Route::get('/module/bind', 'ModuleController@moduleBind')->name('module-bind');
     Route::get('render-sidebar', 'ModuleController@renderSideBar')->name('render-sidebar');
     Route::get('general-statistics', 'ModuleController@generalStatistics')->name('statistics');

     Route::get('general-page', 'ModuleController@orderEasy')->name('gen-pag');

     Route::post('push-notification-subscription', 'ModuleController@saveSubscription')->name('push-notification-subscription');

     Route::get('send-push', 'ModuleController@sendPush')->name('send-push');   


     Route::get('chats', 'AdminDashboardController@chats')->name('chats');




     //Expense Routes
    //  Route::get('/expense/bind', 'AdminDashboardController@expenseBind')->name('expense-bind');
    //  Route::get('/expense/edit/{id}', 'AdminDashboardController@expenseEdit')->name('expense-edit');
    
     Route::get('/sales/quick-order', 'ExpenseController@viewQuickOrder')->name('quick-order');
     Route::get('/sales/quick-order/{id}', 'ExpenseController@viewQuickOrder')->name('quick-order-id');
     Route::get('/sales/report', 'ExpenseController@viewSalesReport')->name('sales-report');
     Route::get('/sales/bind', 'ExpenseController@bindSales')->name('sales-bind');
     Route::get('/sales/products', 'ExpenseController@viewProductList')->name('products-list');
     Route::get('/sales/products/bind', 'ExpenseController@bindProducts')->name('products-bind');

     Route::get('/expense/daily-expense', 'ExpenseController@viewDailyExpense')->name('daily-expense');
     Route::get('/expense/other-expense', 'ExpenseController@viewOtherExpense')->name('other-expense');
     Route::get('/expense/bind', 'ExpenseController@bindExpense')->name('expense-bind');
     Route::get('/expense/all-expense', 'ExpenseController@viewAllExpense')->name('all-expense');
     Route::get('/expense/wastages', 'ExpenseController@viewAllExpense')->name('wastages');
     Route::get('/expense/report', 'ExpenseController@viewExpenseReport')->name('expense-report');  
     Route::get('/expense/items', 'ExpenseController@viewItemList')->name('items-list');
     Route::get('/expense/items/bind', 'ExpenseController@binditems')->name('items-bind');
     Route::get('/expense/quick-expense', 'ExpenseController@quickExpense')->name('quick-expense');
     Route::post('/expense/quick-expense/add', 'ExpenseController@addQuickExpense')->name('quick-expense-add');
     Route::get('/update-resource/{id}', 'ExpenseController@editResource')->name('resource-edit');
     Route::post('/update-resource/{id}', 'ExpenseController@updateResource')->name('resource-update');
     Route::get('/crud/{model_name}/create', 'ExpenseController@editResource')->name('resource-edit');

     
     



    
});

