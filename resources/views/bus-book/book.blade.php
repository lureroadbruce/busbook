@extends('app')
@section('content')


        <div class="container">
            <div class="content">
      @include('partials.layout.errors')
                {!! Form::open(array('url'=>'bus-book/save','method'=>'POST', 'class' => 'form-horizontal')) !!}


                <div class="form-group">
                    <label for="name" class="col-xs-5 control-label">姓名*(必填项)</label>

                    <div class="col-xs-7">
                        {!! Form::text("name",null,array('class' => 'form-control width-168px text-right','required' => 'required')) !!}

                    </div>
                </div>

                <div class="form-group">
                    <label for="telephone" class="col-xs-5 control-label">手机号*(必填项)</label>

                    <div class="col-xs-7">
                        {!! Form::text("telephone",null,array('class' => 'form-control width-168px text-right','required' => 'required')) !!}

                    </div>
                </div>




                <div class="form-group ">
                    <label for="station" class="col-xs-5 control-label">搭车站点</label>

                    <div class="col-xs-7">
                        {!! Form::select('station', [
                            "0"=>"请选择站点",
                            "徐家汇"=>"徐家汇 7:15",
                            "龙阳路"=>"龙阳路 7:40",
                            "浦东机场T1"=>"浦东机场T1 8:10",
                        ],0,["class"=>"form-control"]) !!}

                    </div>
                </div>


                <div class="form-group ">
                    <label for="date" class="col-xs-5 control-label">预订时间</label>

                    <div class="col-xs-7">
                        {!! Form::select('date', [
                            "0"=>"时间",
                            "周六"=>"周六",
                            "周日"=>"周日",
                        ],0,["class"=>"form-control"]) !!}

                    </div>
                </div>


                <div class="form-group">
                    <label for="confirm_button" class="col-xs-5 control-label"></label>

                    <div class="col-xs-7">
                        {!! Form::submit('确定',['class' => 'dm3-btn dm3-btn-medium button-large']) !!}
                    </div>
                </div>
                {!! Form::close()!!}


            </div>
@include('bus-book.list')
        </div>
@endsection
