<?php
namespace App\Repositories\Phone;

use App\Repositories\Base\BaseRepository;
use App\Repositories\Phone\PhoneRepositoryInterface;
use App\Phone;


class PhoneRepository extends BaseRepository implements PhoneRepositoryInterface {

    public function getModel() {
        return Phone::class;
    }

}
