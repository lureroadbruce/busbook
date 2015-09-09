@extends('app')
@section('content')


        <div class="container">
            <div class="content">
 <a href="{{ URL('bus-book') }}" class="dm3-btn dm3-btn-medium">班车预订</a>
       <a href="{{ URL('email') }}" class="dm3-btn dm3-btn-medium">添加发送邮件</a>
            </div>
        </div>
@endsection
