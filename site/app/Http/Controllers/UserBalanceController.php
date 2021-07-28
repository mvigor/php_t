<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use JsonRpc\Client;

class UserBalanceController extends Controller
{
    public function index(Request $request)
    {
        return View('user_balance' );
    }

    public function show(Request $request)
    {
        $server = env('BALANCE_SERVER'); // getting url for json-rpc balance server
        $client = new Client($server);


        $validator =  Validator::make($request->post(),[
            'user_id' => 'required|integer',
            'limit' => 'integer'
        ]); // validating our post request


        if ($validator->fails()) {
            return View('user_balance', [ 'error_message' => 'post validation error.' ]);
        }


        $user_id = $request->post('user_id');
        $limit  =  ($request->post('limit') == "" ? 50 : $request->post('limit'));


        if ( $client->call(
                'balance.userBalance',
                ['user_id' => $user_id] ) ) {
                $balance = $client->result->balance;
        }
        else
        {
            return View('user_balance', [
                'error_message' => 'Unknown userid.',
            ]);

        }

        if ( $client->call(
            'balance.history',
            ['user_id' => $user_id, 'limit' => $limit]) ) {
            $records = $client->result;
        }

        return View('user_balance', [
            'user_id' => $user_id,
            'balance' => $balance,
            'limit' => $limit,
            'records' => $records
        ]);
    }
}
