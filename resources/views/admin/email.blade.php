@extends('app')
@section('js')
    {!! Html::script('js/view.operation.js') !!}
    @append
    @section('content')


        <div class="panel panel-announcement">
            <br>
            @include('partials.layout.errors')
            
            请添加需要发送的邮件
            
            <br>
            <br>
            <div class="login-form clearfix">
                <form  action="{{ URL('email/save') }}" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">


                    <div id="listNUM">
                        <input type="hidden" id="emailNUM" name="emailNUM" value="{{count($users)}}">
                    </div>


                    <div id="emailPlace">
                        @for($i=1;$i<=count($users);$i++)
                            <div id="emaildiv_{{$i}}">
                                <table>
                                    <tr>
                                        <td>
                                                <input type="text" name="name{{$i}}" class="form-control" required="required" value="{{$users[$i-1]->name}}" >
                                        </td>
                                        <td>
                                            <input type="text" name="email{{$i}}" class="form-control" required="required" value="{{$users[$i-1]->email}}" >
                                        </td>
                                        <td><input type="button" value="删除" class="dm3-btn dm3-btn-medium button-large"  onclick="delEmail({{$i}})"/></td>
                                    </tr>
                                </table>
                            </div>
                        @endfor
                    </div>

                    
                    
                    <div class="form-group">
                        <label for="confirm_button" class="col-xs-4 control-label"></label>

                        <div class="col-xs-8">
                            <button class="dm3-btn dm3-btn-medium button-large" type="submit">
                                <i class="fa fa-check"></i>&nbsp;确认
                                
                            </button>
                            <input type="button" class="dm3-btn dm3-btn-medium button-large" id="addEmailBTN" onClick="addEmail()" value="添加邮件"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        </div>
    @endsection
