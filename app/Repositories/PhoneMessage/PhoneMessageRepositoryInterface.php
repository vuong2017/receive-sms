<?php
namespace App\Repositories\PhoneMessage;

use App\Repositories\Base\BaseRepositoryInterface;

interface PhoneMessageRepositoryInterface extends BaseRepositoryInterface{
    public function getMessageSiteTextNow($phone);
}
