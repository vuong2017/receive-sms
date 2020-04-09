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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('auth')->group(function () {
    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login');
});

Route::get('test-get-sms', function() {
    // $response = Curl::to('https://www.textnow.com/api/v3/contacts?page_size=50')
    // ->withHeader('Cookie: __cfduid=d9edbe1248272b651e3799ffe821675821586426590; _ga=GA1.2.1052093367.1586426592; _gid=GA1.2.593369676.1586426592; tatari-session-cookie=c772fe41-37cc-5172-b941-b3381505ea70; t-ip=1; _gcl_au=1.1.2000423845.1586426594; _gat=1; G_ENABLED_IDPS=google; G_AUTHUSER_H=0; _fbp=fb.1.1586426610608.308574020; UserDidVisitApp=true; language=vi; __rtgt_sid=k8slg35wxdup5w; d7s_uid=k8slg35wxdup5w; d7s_spc=1; puntCookie=true; tatari-cookie-test=76344986; stc117823=tsa:1586426594176.795891017.2559886.04917023460689407.:20200409103355|env:1%7C20200510100314%7C20200409103355%7C3%7C1073241:20210409100355|uid:1586426594176.1655968587.5034065.117823.228303182.:20210409100355|srchist:1073241%3A1%3A20200510100314:20210409100355; connect.sid=s%3Adq23Tm9fEx7bERHvp3l9fp5oufKh86FU.s4iMPdajWckN49p349ghEyQlQmWRWdwbacwFMi5%2Fouo; XSRF-TOKEN=BHIGnoxu-hl6acXxK3xTOsD92SvbAyY-XcKc')
    $response = Curl::to('https://www.facebook.com/ajax/metacomposer/attachment/og/typeahead/bootstrap/action_type_loader?fb_dtsg_ag=AQyyiKRnpgTVLf5rDzfAAptnM-2w2jdFIAlPchs7f3IHqw%3AAQxgW3QWNmepx586o5s2R4cMEKkEHKvcUAV4SK1k_ZjPTw&request_id=7f314b99-d10e-4b6d-9fd1-32d51e7b4b6d&is_prefetching=true&place_id&rank_verbs=false&viewer=100010505923372&__user=100010505923372&__a=1&__dyn=7AzHK4HUO5A9xGHAzGomzFEbEyGgS8zXheCq2W3i2Ou6oG5UK3u2a16DyUJ3orxuF8iz8K7HzE4q3ycwXyEn-2i6oO78nwoFokxS6Ehwj8eEswgazU9828wlUowhXG7ooxu2O44WwgFobUKaw9W4e5aGfwwwqopxa4oaLwExLwzxmfxaUpwAwAyE9UcA2a15ABxyeKi8wGxm4UGqfwnU9U2pgK7oboixO58ix22m1fxWEb8ow_xe1TzEdouxy0D81485G&__csr=&__req=2&__beoa=0&__pc=PHASED%3ADEFAULT&dpr=1.5&__rev=1001960041&__s=1p4a3d%3Alhfqlu%3Aujey5a&__hsi=6813652109768286673-0&__comet_req=0&jazoest=28011&__spin_r=1001960041&__spin_b=trunk&__spin_t=1586357827')
    ->withHeaders(
        array(
            'Cookie: sb=ybKNXEo2YAjZ2Ao33f2ztJv0; datr=ybKNXB0lB6X_g_oqSmtYjVTV; dpr=1.25; c_user=100010505923372; xs=34%3AodLQ734hK-RBEA%3A2%3A1585268241%3A1854%3A6249; spin=r.1001960041_b.trunk_t.1586357827_s.1_v.2_; ; fr=1DTAWpBv44AJTaGhu.AWU_incqDzPqEE_jaqkbxdfqihs.BcjbLJ.vP.F6N.0.0.Beju93.AWVrj2SU; wd=1130x792; presence=EDvF3EtimeF1586426962EuserFA21B10505923372A2EstateFDsb2F1586426922268EatF1586426962950Et3F_5bDiFA2user_3a1B04612784382A2EoF2EfF1C_5dEutc3F1586426962956G586426962994Elm3FnullCEchF_7bCC; act=1586426980506%2F45'
            , 'referer: https://www.facebook.com/VuongPhan97'
            )
    )
    // ->asJson()
    ->get();
    dd($response);
    return response()->json($response);
});
