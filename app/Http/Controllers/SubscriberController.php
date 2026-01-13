<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscribeRequest;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Inertia\Inertia;

class SubscriberController extends Controller
{
    public function index()
    {
        return Inertia::render('subscriber/view');
    }

    public function store(SubscribeRequest $request)
    {
        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'status' => Subscriber::$statuses[$request->input('status')]
        ];

        //$subscriber = new Subscriber($data);
        //
        //if (!$subscriber->save()) {
        //    return response()->json(['status' => 'failed'], 500);
        //}

        Redis::rpush('subscribers', json_encode($data));

        return response()->json(['status' => 'ok']);
    }
}
