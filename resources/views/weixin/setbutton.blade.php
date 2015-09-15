@extends('app')
@section('content')


    <div class="container">
        <div class="content">
            {!! Form::open(array('url'=>'https://api.weixin.qq.com/cgi-bin/menu/create?access_token=8cuMZW-d3n44CeOQxNcc-lSPrAOXTa12bVKMpLJbTtSzXgtCT0dUON8LZq_BlWzXBtnXt1ppDouNBK5TZwTq5pIEF4t8E8aIphm3nqR7Lhg','method'=>'POST','files'=>true))!!}
            <input type="hidden"  value={{$data}}>
             <button class="dm3-btn dm3-btn-medium">发布</button>
            {!! Form::close() !!}
            
        </div>
    </div>
@endsection
