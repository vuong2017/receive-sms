<?php
namespace App\Repositories\TextNow;

use App\Repositories\Base\BaseRepository;
use App\Repositories\TextNow\TextNowRepositoryInterface;
use App\TextNow;
use Illuminate\Http\Request;


class TextNowRepository extends BaseRepository implements TextNowRepositoryInterface {

    public function getModel() {
        return TextNow::class;
    }

}
