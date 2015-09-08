<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    protected $Token = "lureroad";
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
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
    public function BusBook()
    {
	
        error_log("get post");
        if (Input::get('echostr')) 
        {
            file_put_contents('log.txt',"post test ",FILE_APPEND);
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
    }
}
