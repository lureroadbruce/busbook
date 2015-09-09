<div>

已预订人员
    <div class="table-responsive">
        <div class="courseTable text-center">
            <div style="overflow-x: auto; overflow-y: auto; height: 100%; width:100%;">
                <table id="table" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>姓名</th>
                            <th>手机号码</th>
                            <th>预订站点</th>
                            <th>预订日期</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($books as $book)
                            <tr>
                                <td class="vertical-align-middle">{{ $book->name }}</td>
                                <td class="vertical-align-middle">{{ $book->telephone }}</td>
                                <td class="vertical-align-middle">{{ $book->station }}</td>
                                <td class="vertical-align-middle">{{ $book->date }}</td>
                            </tr><!-- end ngRepeat: trainee in trainees -->
                        @endforeach
                    </tbody>
                </table>
            </div>
            {!! $books->render() !!}
        </div>
        



    </div>
</div>
