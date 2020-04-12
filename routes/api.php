<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Ixudra\Curl\Facades\Curl;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::middleware(['auth:api'])->group(function () {
    Route::resource('textnow', 'TextNowController');
});

Route::prefix('auth')->group(function () {
    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login');
});

Route::get('test-get-sms', function() {
    $response = Curl::to('https://www.textnow.com/api/v3/contacts?page_size=50')
    ->withHeader('Cookie: __cfduid=d9edbe1248272b651e3799ffe821675821586426590; _ga=GA1.2.1052093367.1586426592; _gid=GA1.2.593369676.1586426592; tatari-session-cookie=c772fe41-37cc-5172-b941-b3381505ea70; t-ip=1; _gcl_au=1.1.2000423845.1586426594; _gat=1; G_ENABLED_IDPS=google; G_AUTHUSER_H=0; _fbp=fb.1.1586426610608.308574020; UserDidVisitApp=true; language=vi; __rtgt_sid=k8slg35wxdup5w; d7s_uid=k8slg35wxdup5w; d7s_spc=1; puntCookie=true; tatari-cookie-test=76344986; stc117823=tsa:1586426594176.795891017.2559886.04917023460689407.:20200409103355|env:1%7C20200510100314%7C20200409103355%7C3%7C1073241:20210409100355|uid:1586426594176.1655968587.5034065.117823.228303182.:20210409100355|srchist:1073241%3A1%3A20200510100314:20210409100355; connect.sid=s%3Adq23Tm9fEx7bERHvp3l9fp5oufKh86FU.s4iMPdajWckN49p349ghEyQlQmWRWdwbacwFMi5%2Fouo; XSRF-TOKEN=BHIGnoxu-hl6acXxK3xTOsD92SvbAyY-XcKc')
    ->asJson()
    ->get();
    return response()->json($response);
});
