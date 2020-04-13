<?php

namespace App\Http\Controllers;

use App\Repositories\Phone\PhoneRepositoryInterface;
use App\Repositories\PhoneMessage\PhoneMessageRepositoryInterface;


class PhoneMessageController extends Controller
{
    private $phoneMessageRepository;
    private $phoneRepository;

    public function __construct(PhoneRepositoryInterface $phoneRepository, PhoneMessageRepositoryInterface $phoneMessageRepository)
    {
        $this->phoneMessageRepository = $phoneMessageRepository;
        $this->phoneRepository = $phoneRepository;
    }

    public function index($phoneId)
    {
        $phone = $this->phoneRepository->getOneById('text_nows', $phoneId);
        $messageTextNow = $this->phoneMessageRepository->getMessageSiteTextNow($phone);
        return response()->json($messageTextNow);
    }


    public function store()
    {

    }


    public function show($id)
    {

    }


    public function update()
    {

    }


    public function destroy($id)
    {

    }
}
