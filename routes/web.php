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

Route::group(['midlleware' => 'web'], function() {

    // Auth
    Auth::routes();

    // Index
    Route::get('/', 'HomeController@index');

    Route::get('/home', 'HomeController@index');

    Route::get('accountLock/cari', ['as' => 'search-accountLock', 'uses' => 'accountLockController@cari']);
    Route::get('accountLock/excel', 'accountLockController@Excel');
    Route::delete('accountLock/reset', 'accountLockController@reset');
    Route::resource('accountLock', 'accountLockController');
    Route::post('accountLock/cari2', 'accountLockController@import');
    Route::get('export/accountLock', ['as' => 'export.accountLock','uses' => 'accountLockController@export']);
    Route::post('export/accountLock', ['as' => 'export.accountLock.post','uses' => 'accountLockController@exportPost']);

    Route::get('cekAp/cari', ['as' => 'search-cekAp', 'uses' => 'cekApController@cari']);
    Route::resource('cekAp', 'cekApController');
    Route::get('export/cekAp', ['as' => 'export.cekAp','uses' => 'cekApController@export']);
    Route::post('export/cekAp', ['as' => 'export.cekAp.post','uses' => 'cekApController@exportPost']);

    
    Route::get('paymentneed/cari', ['as' => 'search-payment', 'uses' => 'paymentneedController@cari']);
    Route::resource('paymentneed', 'paymentneedController');
    Route::get('export/paymentneed', ['as' => 'export.paymentneed','uses' => 'paymentneedController@export']);
    Route::post('export/paymentneed', ['as' => 'export.paymentneed.post','uses' => 'paymentneedController@exportPost']);
    Route::post('/paymentneed/account', 'paymentneedController@account')->name('paymentneed.account');

    Route::get('ncx/cari', ['as' => 'search-ncx', 'uses' => 'ncxController@cari']);
    Route::resource('ncx', 'ncxController');
    Route::get('export/ncx', ['as' => 'export.ncx','uses' => 'ncxController@export']);
    Route::post('export/ncx', ['as' => 'export.ncx.post','uses' => 'ncxController@exportPost']);
    Route::post('/ncx/account', 'ncxController@account')->name('ncx.account');


    Route::get('ncrmbillaccount/cariperiode20182019', ['as' => 'search-cariperiode20182019', 'uses' => 'ncrmbillaccountcontroller@cariperiode20182019']);
    Route::get('ncrmbillaccount/cariperiodeall', ['as' => 'search-cariperiodeall', 'uses' => 'ncrmbillaccountcontroller@cariperiodeall']);
    Route::get('ncrmbillaccount/periode20182019', ['as' => 'periode20182019', 'uses' => 'ncrmbillaccountcontroller@periode20182019']);
    Route::get('ncrmbillaccount/periodeall', ['as' => 'periodeall', 'uses' => 'ncrmbillaccountcontroller@periodeall']);

  

    Route::get('CBASEDIVES/standardname', ['as' => 'standardname', 'uses' => 'CBASEDIVEScontroller@standardname']);
    Route::get('CBASEDIVES/nipnas', ['as' => 'nipnas', 'uses' => 'CBASEDIVEScontroller@nipnas']);
    Route::get('CBASEDIVES/caristandardname', ['as' => 'CBASEDIVES-caristandardname', 'uses' => 'CBASEDIVEScontroller@caristandardname']);
    Route::get('CBASEDIVES/carinipnas', ['as' => 'CBASEDIVES-carinipnas', 'uses' => 'CBASEDIVEScontroller@carinipnas']);
    Route::get('CBASEDIVES/cari', ['as' => 'cari', 'uses' => 'CBASEDIVEScontroller@cari']);
    Route::get('CBASEDIVES/excel', 'CBASEDIVEScontroller@Excel');
    Route::resource('CBASEDIVES', 'CBASEDIVEScontroller');
    Route::post('CBASEDIVES/cari2', 'CBASEDIVEScontroller@import');


    Route::get('RMARACCNUM/accountnum', ['as' => 'account_num', 'uses' => 'RMARACCNUMcontroller@accountnum']);
    Route::get('RMARACCNUM/nipnas', ['as' => 'nipnas', 'uses' => 'RMARACCNUMcontroller@nipnas']);
    Route::get('RMARACCNUM/standardname', ['as' => 'standardname', 'uses' => 'RMARACCNUMcontroller@standardname']);
    Route::get('RMARACCNUM/cariaccountnum', ['as' => 'RMARACCNUM-cariaccountnum', 'uses' => 'RMARACCNUMcontroller@cariaccountnum']);
    Route::get('RMARACCNUM/carinipnas', ['as' => 'RMARACCNUM-carinipnas', 'uses' => 'RMARACCNUMcontroller@carinipnas']);
    Route::get('RMARACCNUM/caristandardname', ['as' => 'RMARACCNUM-caristandardname', 'uses' => 'RMARACCNUMcontroller@caristandardname']);
    Route::resource('RMARACCNUM', 'RMARACCNUMcontroller');
    Route::get('RMARACCNUM/cari', ['as' => 'search-rmart', 'uses' => 'RMARACCNUMcontroller@cari']);
    Route::get('ncrmbillaccount-caricc/{account_num}','RMARACCNUMcontroller@caricc')->name('ncrmbillaccount-caricc/{account_num}');

    Route::get('ncx-index','ncxController@index')->name('ncx-index');

    //NPK
    Route::get('data-npk','NpkController@index')->name('data-npk');
    Route::post('tambah-kl','NpkController@create')->name('tambah-kl');
    Route::get('data-npk-id/{id}','NpkController@edit')->name('data-npk-id');
    Route::get('search-data', 'NpkController@search')->name('search-data');
    Route::post('npk-download/{id}','NpkController@DownloadPdf')->name('npk-download/{id}');
    Route::get('coba-pdf','NpkController@CobaPdf')->name('coba-pdf');
    Route::post('npk-preview-download','NpkController@PreviewDownloadPdf')->name('npk-preview-download');
    Route::get('npk-delete/{id}','NpkController@destroy')->name('npk-delete/{id}');
    Route::post('edit-kl','NpkController@update')->name('edit-kl');
    Route::get('export-excel','NpkController@exportExcel')->name('export-excel');
    Route::post('excel-upload','NpkController@import')->name('excel-upload');
    Route::get('data-surat-pembayaran','NpkController@DataSuratPembayaran')->name('data-surat-pembayaran');
    Route::post('cetak-surat-pembayaran','NpkController@CetakSuratPembayaran')->name('cetak-surat-pembayaran');
    Route::get('create-npk','NpkController@viewCreateNpk')->name('create-npk');
    Route::get('view-upload-excel','NpkController@viewUploadExcel')->name('view-upload-excel');
    Route::get('create-npk-mkt','NpkController@viewCreateNpkMkt')->name('create-npk-mkt');
    Route::post('tambah-npk-mkt','NpkController@CreateNpkMkt')->name('tambah-npk-mkt');
    Route::get('data-npk-mkt','NpkController@IndexNpkMkt')->name('data-npk-mkt');
    Route::get('data-npk-mkt-id/{id}','NpkController@getNpkMkt')->name('data-npk-mkt-id');
    Route::post('edit-npk-mkt','NpkController@updateNpkMkt')->name('edit-npk-mkt');
    Route::get('npk-mkt-delete/{id}','NpkController@delete')->name('npk-mkt-delete/{id}');
    Route::get('search-data-mkt', 'NpkController@searchNpk')->name('search-data-mkt');


    //Surat Pembayaran
    Route::get('view-cek-pembayaran/{account}','ncxController@ViewCekPembayaran')->name('view-cek-pembayaran/{account}');
    
    //Request billing
    Route::get('data-billing','BillingController@index')->name('data-billing');
    Route::get('data-billing-202001','BillingController@jan')->name('data-billing-202001');
    Route::get('data-billing-202002','BillingController@feb')->name('data-billing-202002');
    Route::get('data-billing-202003','BillingController@mar')->name('data-billing-202003');
    Route::get('data-billing-202004','BillingController@apr')->name('data-billing-202004');
    Route::get('data-billing-202005','BillingController@mei')->name('data-billing-202005');
    Route::get('data-billing-202006','BillingController@jun')->name('data-billing-202006');
    Route::get('data-billing-202007','BillingController@jul')->name('data-billing-202007');
    Route::get('data-billing-202008','BillingController@agus')->name('data-billing-202008');
    Route::get('data-billing-202009','BillingController@sep')->name('data-billing-202009');
    Route::get('search-billing', 'BillingController@search')->name('search-billing');
    Route::get('download-file2/{id}','BillingController@download2')->name('download-file2');
    Route::get('download-file3/{id}','BillingController@download3')->name('download-file3');
    Route::get('spliting-tagihan','BillingController@spliting')->name('spliting-tagihan');
    Route::get('request-ba','BillingController@viewCreateRequest')->name('request-ba');
    Route::post('tambah-request','BillingController@create')->name('tambah-request');
    Route::get('data-billingperiod','BillingController@billingperiod')->name('data-billingperiod');
    Route::get('data-requestba-approval','BillingController@requesbaapproval')->name('data-requestba-approval');
    Route::get('data-requestba-non-approval','BillingController@requesbanonapproval')->name('data-requestba-non-approval');


    //api billing
    Route::get('data-requestba','ApiBillingController@index')->name('data-requestba');
    Route::get('data-requestba-new','ApiBillingController@indexnew')->name('data-requestba-new');
    Route::post('request_ba','ApiBillingController@tempRequest')->name('request_ba');
    Route::post('request_ba_existing','ApiBillingController@requestBaExist')->name('request_ba_existing');
    Route::get('download-file1/{id}','ApiBillingController@download1')->name('download-file1');
    Route::post('edit-epic','ApiBillingController@update')->name('edit-epic');
    Route::post('create-epic','ApiBillingController@createbilling')->name('create-epic');
    Route::post('proses-ba-epic','ApiBillingController@prosesbilling')->name('proses-ba-epic');
    Route::get('data-epic-id/{id}','ApiBillingController@edit')->name('data-epic-id');
    Route::get('data-create-billing','ApiBillingController@createbaepic')->name('data-create-billing');
    Route::get('data-approved-billing','ApiBillingController@prosesbaepic')->name('data-approved-billing');
    
    Route::post('test-post-data', 'ApiBillingController@postData');
    //Ajax
    Route::post('get-account','NpkController@getAccount')->name('get-account');
    Route::post('get-pks-number','NpkController@getPksNumber')->name('get-pks-number');
    Route::get('home/mitra/{mitra}','HomeController@getKLMitra')->name('home/mitra/');
    Route::get('home/getNilaiNpkBulanTerakhir','HomeController@getNilaiNpkBulanTerakhir')->name('home/getNilaiNpkBulanTerakhir');
    Route::get('home/getJumlahNpkBulanTerakhir','HomeController@getJumlahNpkBulanTerakhir')->name('home/getJumlahNpkBulanTerakhir');

    Route::resource('members', 'MembersController');
    Route::post('tambah-member','MembersController@create')->name('tambah-member');
    Route::get('member-delete/{id}','MembersController@destroy')->name('member-delete/{id}');
    Route::post('edit-member','MembersController@update')->name('edit-member');
    Route::get('home/mitra/mkt/{mitra}','HomeController@getKLMkt')->name('home/mitra/mkt/');

    

    //Invoice
    Route::get('data-invoice','InvoiceController@index')->name('data-invoice');
    Route::get('search-invoice', 'InvoiceController@search')->name('search-invoice');
    Route::get('invoice-edit/{id?}','InvoiceController@edit')->name('invoice-edit');
    Route::get('invoice-edit-pickup/{id}','InvoiceController@editpickup')->name('invoice-edit-pickup');
    Route::get('invoice-edit-kirim/{id}','InvoiceController@editkirim')->name('invoice-edit-kirim');
    Route::get('view-upload-invoice','InvoiceController@viewUploadInvoice')->name('view-upload-invoice');
    Route::get('view-upload-invoice-custome','InvoiceController@viewUploadCustome')->name('view-upload-invoice-custome');
    Route::get('view-upload-pickup-invoice','InvoiceController@viewUploadPickup')->name('view-upload-pickup-invoice');
    Route::get('view-upload-kirim-invoice','InvoiceController@viewUploadKirim')->name('view-upload-kirim-invoice');
    Route::get('format-invoice', 'InvoiceController@format')->name('format-invoice');
    Route::get('format-custome-invoice', 'InvoiceController@formatcustome')->name('format-custome-invoice');
    Route::get('format-pickup-invoice', 'InvoiceController@formatpickup')->name('format-pickup-invoice');
    Route::get('format-kirim-invoice', 'InvoiceController@formatkirim')->name('format-kirim-invoice');
    Route::get('get-akun-bpnumber-cc', 'InvoiceController@getcari')->name('get-akun-bpnumber-cc');
    Route::get('dashboard-invoice-system','InvoiceController@dashboardsystem')->name('dashboard-invoice-system');
    Route::get('dashboard-invoice-custom','InvoiceController@dashboardcustom')->name('dashboard-invoice-custom');
    
    Route::post('edit-invoice','InvoiceController@update')->name('edit-invoice');
    Route::post('edit-invoice-pickup','InvoiceController@updatepickup')->name('edit-invoice-pickup');
    Route::post('edit-invoice-kirim','InvoiceController@updatekirim')->name('edit-invoice-kirim');
    Route::post('excel-invoice','InvoiceController@import')->name('excel-invoice');
    Route::post('custome-invoice','InvoiceController@importcustome')->name('custome-invoice');
    Route::post('pickup-invoice','InvoiceController@importpickup')->name('pickup-invoice');
    Route::post('kirim-invoice','InvoiceController@importkirim')->name('kirim-invoice');
    Route::post('simpan-upload-invoice','InvoiceController@saveimport')->name('simpan-upload-invoice');
    Route::post('simpan-upload-invoice-custom','InvoiceController@saveimportcustom')->name('simpan-upload-invoice-custom');
    Route::post('simpan-upload-pickup-invoice','InvoiceController@saveimportpickup')->name('simpan-upload-pickup-invoice');
    Route::post('simpan-upload-kirim-invoice','InvoiceController@saveimportkirim')->name('simpan-upload-kirim-invoice');
    

    
    Route::get('view-invoice-id/{id}','InvoiceController@show')->name('view-invoice-id');
    Route::get('data-invoice-cetak-pos','InvoiceController@cetakpos')->name('data-invoice-cetak-pos');
    Route::get('data-invoice-kirim-pos','InvoiceController@kirimpos')->name('data-invoice-kirim-pos');
    Route::get('data-invoice-sampai-cc','InvoiceController@sampaicc')->name('data-invoice-sampai-cc');
    Route::get('data-invoice-manual','InvoiceController@manual')->name('data-invoice-manual');
    Route::get('data-invoice-cetak-cdm','InvoiceController@cetakcdm')->name('data-invoice-cetak-cdm');
    Route::get('data-invoice-kirim-cdm','InvoiceController@kirimcdm')->name('data-invoice-kirim-cdm');
    Route::get('data-invoice-belum-cetak','InvoiceController@belumcetak')->name('data-invoice-belum-cetak');
    
   
    
    

    //keterangan manual
    Route::get('daftar-keterangan-manual','DaftarKeterangancontroller@index')->name('daftar-keterangan-manual');
    Route::get('create-keterangan-manual','DaftarKeterangancontroller@viewCreate')->name('create-keterangan-manual');
    Route::post('tambah-keterangan-manual','DaftarKeterangancontroller@create')->name('tambah-keterangan-manual');
    Route::get('data-keterangan-manual-id/{id}','DaftarKeterangancontroller@edit')->name('data-keterangan-manual-id');
    Route::post('edit-keterangan-manual','DaftarKeterangancontroller@update')->name('edit-keterangan-manual');

    //kurir
    Route::get('daftar-kurir','Daftarkurircontroller@index')->name('daftar-kurir');
    Route::get('create-kurir','Daftarkurircontroller@viewCreate')->name('create-kurir');
    Route::post('tambah-kurir','Daftarkurircontroller@create')->name('tambah-kurir');
    Route::get('data-kurir-id/{id}','Daftarkurircontroller@edit')->name('data-kurir-id');
    Route::post('edit-kurir','Daftarkurircontroller@update')->name('edit-kurir');

    //status
    Route::get('daftar-status','Daftarstatuscontroller@index')->name('daftar-status');
    Route::get('create-status','Daftarstatuscontroller@viewCreate')->name('create-status');
    Route::post('tambah-status','Daftarstatuscontroller@create')->name('tambah-status');
    Route::get('data-status-id/{id}','Daftarstatuscontroller@edit')->name('data-status-id');
    Route::post('edit-status','Daftarstatuscontroller@update')->name('edit-status');


    //alamat pengiriman
    Route::get('data-alamat-pengiriman','AlamatPengirimanController@index')->name('data-alamat-pengiriman');
    Route::get('data-alamat-pengiriman-id/{id}','AlamatPengirimanController@edit')->name('data-alamat-pengiriman-id');
    Route::post('edit-alamat-pengiriman','AlamatPengirimanController@update')->name('edit-alamat-pengiriman');
    Route::get('detail-alamat-pengiriman-id/{id}','AlamatPengirimanController@show')->name('detail-alamat-pengiriman-id');
    Route::get('view-upload-alamat','AlamatPengirimanController@viewUploadAlamat')->name('view-upload-alamat');
    Route::post('excel-alamat','AlamatPengirimanController@import')->name('excel-alamat');
    Route::get('format-alamat', 'AlamatpengirimanController@format')->name('format-alamat');
    Route::get('search-alamat', 'AlamatpengirimanController@search')->name('search-alamat');
    Route::get('alamat-pengiriman-delete/{id}','AlamatpengirimanController@destroy')->name('alamat-pengiriman-delete/{id}');


    
    // Profile
    Route::get('settings/profile', 'SettingsController@profile');

    // Edit Profile
    Route::get('settings/profile/edit', 'SettingsController@editProfile');

    // Update Profile
    Route::post('settings/profile', 'SettingsController@updateProfile');

    // Ubah password
    Route::get('settings/password', 'SettingsController@editPassword');
    Route::post('settings/password', 'SettingsController@updatePassword');

 
});
