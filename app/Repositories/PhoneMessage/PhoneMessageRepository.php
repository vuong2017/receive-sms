<?php
namespace App\Repositories\PhoneMessage;

use App\Repositories\Base\BaseRepository;
use App\Repositories\PhoneMessage\PhoneMessageRepositoryInterface;
use App\PhoneMessage;
use Ixudra\Curl\Facades\Curl;


class PhoneMessageRepository extends BaseRepository implements PhoneMessageRepositoryInterface {

    public function getModel() {
        return PhoneMessage::class;
    }

    public function getMessageSiteTextNow($phone) {
        $user_name_textnow = $phone->text_nows->user_name_textnow;
        $cookie = $phone->text_nows->cookie;
        $response = Curl::to("https://www.textnow.com/api/users/${user_name_textnow}/messages")
        ->withHeader("Cookie: ${cookie}")
        ->asJson()
        ->get();
        return $response;
    }

}
