<?php


namespace App\Http\Controllers;


use App\Service\EbanxService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Psy\Util\Json;

class EbanxController extends Controller
{
    public function reset()
    {
        return new JsonResponse($this->service()->resetService(), 200);
    }

    public function balance(Request $request)
    {
        $accountId = $request->input('account_id');
        if (!isset($accountId)){
            return new JsonResponse([404, 'Account ID deve ser informado!'], 404);
        }

        $service = $this->service()->balanceService($accountId);

        return new JsonResponse($service[1], $service[0]);
    }

    public function event(Request $request)
    {
        $type = $request->input('type');
        $destination = $request->input('destination');
        $amount = $request->input('amount');

        if (!isset($type) || !isset($destination) || !isset($amount)) {
            return new JsonResponse('Um ou mais campos não foram informados no payload', 404);
        }

        $service = $this->service()->eventService($type, $destination, $amount);

        return new JsonResponse($service[1], $service[0]);
    }

    public function service()
    {
        return new EbanxService;
    }
}
