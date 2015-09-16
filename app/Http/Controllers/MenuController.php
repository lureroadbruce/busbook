<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\BusBook;
use App\Models\EmailTemplet;
use App\Models\User;
use App\Jobs\SendEmail;
use Mail;
use Input;
use Validator;
use Redirect;
class MenuController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if($request->has('code'))
        {
            error_log("get code".$request->input('code'));
            $code = $request->input('code');
            $ch = curl_init();
            // 2. 设置选项，包括URL
            curl_setopt($ch, CURLOPT_URL, "https://api.weixin.qq.com/sns/oauth2/access_token?appid=wxb4f7bc9204383c8b&secret=e52eedfbc0baababb308b8fa8096d85b&code=".$code."&grant_type=authorization_code");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            // 3. 执行并获取HTML文档内容
            $output = curl_exec($ch);
            error_log("get back".$output);
            // 4. 释放curl句柄
            curl_close($ch);
        }
        //return view('menu/index');
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
    public function AddEmail()
    {
        return view('admin/email')->withUsers(User::orderBy('created_at','desc')->paginate(10));
    }
    public function SaveEmail(Request $request)
    {
        error_log("save");
        $users = User::get();
        foreach($users as $user)
        {
            $user->delete();
        }
        $emailNum = Input::get('emailNUM');
        for($i = 1;$i<=$emailNum; $i++)
        {

            $user = new User;
            $user->email = Input::get('email'.$i);
            $user->name = Input::get('name'.$i);
            $user->save();
        }
        return Redirect::back();
            
    }
    public function BusBook()
    {
        return view('bus-book/book')->withBooks(BusBook::orderBy('created_at','desc')->paginate(10)); 
    }
    public function StoreBook(Request $request)
    {
        $input = $request->only('name','telephone','station','date');
        $validator = Validator::make($input, [
            'name'              => 'required',
            'telephone'          => 'required|regex:/^[0-9\d\-\_]+$/',
            'station'           => 'required',
            'date'              => 'required',
        ]);
        if ( $validator->fails() )
        {
             
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }
        $name = Input::get('name');
        $telephone = Input::get('telephone');
        $station = Input::get('station');
        $date = Input::get('date');
        $book = BusBook::where('date',$date)->where('station',$station)->where('name',$name)->first();
        if($book)
        {
             return redirect()->back()->withErrors("请勿重复预约")->withInput();
        }
        if($date == "0")
        {
            return redirect()->back()->withErrors("请选择日期")->withInput();
        }
         if($station == "0")
        {
            return redirect()->back()->withErrors("请选择站点")->withInput();
        }

        $book = new BusBook;
        $book->name = $name;
        $book->telephone = $telephone;
        $book->station = $station;
        $book->date = $date;
        $book->save();
        $users = User::all();
        foreach($users as $user)
        {
            error_log("send email");

            $email = EmailTemplet::whereType(1)->first();

            $email->body = str_replace('{{用户姓名}}',$book->name,$email->body);
            $email->body = str_replace('{{用户手机}}',$book->telephone,$email->body);
            $email->body = str_replace('{{预订日期}}',$book->date,$email->body);
            $email->body = str_replace('{{预订站点}}',$book->station,$email->body);
            $this->dispatch(new SendEmail($email,$user));

        }
        
        return Redirect::back()->withInput()->withErrors('您已完成预约！');
         
    }
    
}
