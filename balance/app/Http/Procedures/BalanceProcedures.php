<?php

declare(strict_types=1);

namespace App\Http\Procedures;

use App\Models\BalanceHistory;
use Illuminate\Http\Request;
use Sajya\Server\Procedure;

class BalanceProcedures extends Procedure
{
    /**
     * The name of the procedure that will be
     * displayed and taken into account in the search
     *
     * @var string
     */
    public static string $name = 'balance';

    /**
     * Execute the procedure.
     *
     * @param Request $request
     *
     * @return array|string|integer
     */
    public function handle(Request $request)
    {
        // write your code
        return  0;
    }

    public function userBalance(Request $request){
        $user_id = $request->get('user_id');
        return BalanceHistory::query()->
            where('user_id', $user_id)->
            orderBy('id','DESC')->
            firstOrFail('balance');
    }
    public function history(Request $request){

        $user_id = $request->get('user_id');
        $limit = $request->get('limit');

        return BalanceHistory::query()->
        where('user_id', $user_id)->
        orderBy('id','DESC')->limit($limit)->get();

    }
}
