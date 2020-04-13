<?php

namespace App\Http\Controllers;

use App\Http\Requests\Phone\PhoneRequest;
use App\Http\Resources\Phone\PhoneCollection;
use App\Http\Resources\Phone\PhoneResource;
use App\Repositories\Phone\PhoneRepositoryInterface;
use Illuminate\Http\Request;


class PhoneController extends Controller
{

    private $phoneRepository;

    public function __construct(PhoneRepositoryInterface $phoneRepository) {
        $this->phoneRepository = $phoneRepository;
    }

    public function index(Request $request)
    {
        $with = [];
        if ($request->with) {
            $with = explode(",", $request->with);
        }
        $phones = $this->phoneRepository->getDataPagination($with, 20);
        return new PhoneCollection($phones);
    }


    public function store(PhoneRequest $request)
    {
        $data = $request->all();
        $textNow = $this->phoneRepository->createOne($data);
        return new PhoneResource($textNow);
    }


    public function show($id)
    {
        $textNow = $this->phoneRepository->getOneById($id);
        return new PhoneResource($textNow);
    }


    public function update(PhoneRequest $request, $id)
    {
        $textNow = $this->phoneRepository->updateOneById($id, $request->all());
        return new PhoneResource($textNow);
    }


    public function destroy($id)
    {
        return $this->phoneRepository->removeOneById($id);
    }
}
