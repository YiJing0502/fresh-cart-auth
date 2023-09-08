<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\ReplyToMessage;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // dd(123);
        $messages = Message::get();
        // foreach ($messages as $message) {
        //     $replys = $message->replyToMessage; // 訪問每個 Message 的回覆
        //     // 在這裡使用 $replys
        // }
        // $replys = ReplyToMessage::all();
        // $replys = ReplyToMessage::all();
        //找尋第一筆資料，寫all會是一整包陣列，就找不到
        // $messages = ReplyToMessage::first();
        // dd($messages->message);
        // $typesImg = ProductTypeImg::all();
        return view('message.messageBoard', compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function replayStore(Request $request)
    {
        //
        // dd($id);
        // dd(ReplyToMessage::all());
        $messageId = $request->message_id;
        // dd($messageId);
        ReplyToMessage::create([
            'replay_message' => $request->reply,
            'message_id' => $messageId,
        ]);
        return redirect(route('messageIndex'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // dd($request->all());

        $messageBoard = Message::create([
            'message' => $request->message,
        ]);

        // value是每一筆回覆訊息

        return redirect(route('messageIndex'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        // dd($id);
    }
    public function replayUpdate(Request $request, string $id)
    {
        //
        // dd($request->all());
        // $messageId = $request->input('message_id');
        // ReplyToMessage::update([
        //     'replay_message' => $request->reply,
        //     'message_id' => $messageId,
        // ]);
        $reply = ReplyToMessage::find($id);
        // dd($reply);
        $reply->update([
            'replay_message' => $request->reply ?? '',
        ]);

        return redirect(route('messageIndex'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        // dd($request->all());
        $message = Message::find($id);
        $message->update([
            'message' => $request->message,
        ]);
        return redirect(route('messageIndex'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $message = Message::find($id);
        // dd($message->replyToMessage);
        foreach ($message->replyToMessage as $reply) {
            $reply->delete();
        }
        $message->delete();
        return redirect(route('messageIndex'));
    }

    public function replayDestroy($id)
    {
        // dd($id);
        $reply = ReplyToMessage::find($id);
        $result ='success';
        if($reply) {
            $reply->delete();
        } else {
            $result = 'fail';
        }
        return $result;
    }
}
