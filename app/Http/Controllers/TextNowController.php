<?php

namespace App\Http\Controllers;

use App\Http\Requests\TextNow\TextNowRequest;
use App\Http\Resources\TextNow\TextNowCollection;
use App\Http\Resources\TextNow\TextNowResource;
use App\Repositories\TextNow\TextNowRepositoryInterface;

use App\TextNow;

class TextNowController extends Controller
{
    private $textNowRepository;

    public function __construct(TextNowRepositoryInterface $textNowRepository) {
        $this->textNowRepository = $textNowRepository;
    }

    public function index()
    {
        $textNows = $this->textNowRepository->getDataPagination(20);
        return new TextNowCollection($textNows);
    }


    public function store(TextNowRequest $request)
    {
        $data = $request->all();
        $data['create_by'] = $request->user()->id;
        $textNow = $this->textNowRepository->createOne($data);
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
