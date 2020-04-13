<?php

namespace App\Http\Controllers;

use App\Http\Requests\TextNow\TextNowRequest;
use App\Http\Resources\TextNow\TextNowCollection;
use App\Http\Resources\TextNow\TextNowResource;
use App\Repositories\Phone\PhoneRepositoryInterface;
use App\Repositories\TextNow\TextNowRepositoryInterface;

use Illuminate\Http\Request;

class TextNowController extends Controller
{
    private $textNowRepository;

    private $phoneRepository;

    public function __construct(TextNowRepositoryInterface $textNowRepository, PhoneRepositoryInterface $phoneRepository) {
        $this->textNowRepository = $textNowRepository;
        $this->phoneRepository = $phoneRepository;
    }

    public function index(Request $request)
    {
        $with = [];
        if ($request->with) {
            $with = explode(",", $request->with);
        }
        $textNows = $this->textNowRepository->getDataPagination($with, 20);
        return new TextNowCollection($textNows);
    }


    public function store(TextNowRequest $request)
    {
        $data = $request->all();
        $data['create_by'] = $request->user()->id;
        $textNow = $this->textNowRepository->createOne($data);
        $bodyPhone = [
            "textnow_id" => $textNow->id,
            "phone_country_id" => $request->phone_country_id,
            "phone_number" => $request->phone_number,
        ];
        $phone = $this->phoneRepository->createOne($bodyPhone);
        $textNow->phones = [$phone];
        return new TextNowResource($textNow);
    }


    public function show($id)
    {
        $textNow = $this->textNowRepository->getOneById($id);
        return new TextNowResource($textNow);
    }


    public function update(TextNowRequest $request, $id)
    {
        $textNow = $this->textNowRepository->updateOneById($id, $request->all());
        return new TextNowResource($textNow);
    }


    public function destroy($id)
    {
        return $this->textNowRepository->removeOneById($id);
    }
}
