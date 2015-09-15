<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;

class WeixinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $signature = Input::get('signature');

        $timestamp = Input::get('timestamp');
        $nonce     = Input::get('nonce');


        $token = 'lureroad';


        $our_signature = array($token, $timestamp, $nonce);
        sort($our_signature, SORT_STRING);
        $our_signature = implode($our_signature);
        $our_signature = sha1($our_signature);


        if ($our_signature != $signature) {
            return false;

        }
        else
            return Input::get('echostr');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
    public function getMessage(Request $request)
    {

        $message = $request->instance()->getContent();
        $message = simplexml_load_string($message, 'SimpleXMLElement', LIBXML_NOCDATA);
        if($message->MsgType == 'text')
        {
            if(strpos($message->Content,'test')!==false)
            {
                $message->Content = 'get key word test';
                error_log("from user id:"$message->FromUserName);
            } 
            
        }
        elseif($message->MsgType == 'event')
        {
            if($message->Event == 'VIEW')
            {
                error_log("get view".$message->EventKey);
            }
        }
        return view('weixin.message')->with('message', $message);

    }
    public function setButton()
    {
        
        $data = '{
     "button":[
     {	
          "type":"click",
          "name":"今日歌曲",
          "key":"V1001_TODAY_MUSIC"
      },
      {
           "name":"菜单",
           "sub_button":[
           {	
               "type":"view",
               "name":"搜索",
               "url":"http://www.soso.com/"
            },
            {
               "type":"view",
               "name":"视频",
               "url":"http://v.qq.com/"
            },
            {
               "type":"click",
               "name":"赞一下我们",
               "key":"V1001_GOOD"
            }]
       }]
 }';
        return view('weixin.setbutton')->with('data',$data);
    }
}
