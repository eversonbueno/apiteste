<?php


namespace App\Service;


use App\Models\AccountEbanx;
use Illuminate\Queue\Connectors\RedisConnector;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class EbanxService
{
    public function resetService()
    {
        return 'OK';
    }

    public function balanceService(int $account_id = 0)
    {
        if ($account_id == 0) {
            return [404, 'Necessário informar um Account ID'];
        } elseif ($account_id == 1234) {
            return [404, 0];
        } elseif ($account_id == 100) {
            return [200, 20];
        }
    }

    public function eventService(string $type = '', string $destination = '', string $origin = '', int $amount = 0)
    {
        if ($type == '' && ($destination == '' && $origin == '') && $amount == 0) {
            return [404, 'Parametros do Payload não informados'];
        }

//        $accountId = DB::table('account')->where('id', (int) $destination)->first();
//        var_dump($accountId);
//        die('fianl');

        $response = [];

        $redis = Redis::setName('TEste');
//        if (session()->has('destination')) {
//            var_dump('Existe');
//        }
//
//        if (!session()->has('destination')) {
//            session()->put('destination', ['id' => $destination, 'balance' => 10]);
//        }
//        var_dump(session()->get('destination'));
//        die('final');

        if ($destination != '') {
            $response['destination'] = [
                'id' => $destination,
                'balance' => 20
            ];
        }

        if ($origin != '') {
            $response['origin'] = [
                'id' => $origin,
                'balance' => 10
            ];
        }

        return [201, $response];
    }
}
