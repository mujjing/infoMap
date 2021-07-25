<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/upload.css" />
    <title>지도 데이터 업로드</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
    tr th {
        text-align:center;
    }
    </style>
</head>

<body>
<div id="navbar">
<ul id="navbar">
        <li><a href="{{ route('map.index') }}">지도화면으로</a></li>
        </ul>
</div>
    <div class="container">
        <h3 align="center">엑셀 업로드 화면</h3>
        <br />
        @if(count($errors)>0)
        <div class="alert alert-danger">
            업로드 에러<br><br>
            <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @if($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">x</button>
            <strong>{{$message}}</strong>
        </div>
        @endif
        <form method="post" action="{{route('excel.upload')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
            <p style="text-align:center;font-size:25px;"><b>업로드 할 파일 선택<b></p>
                <table class="table">
                    <tr>
                        <td width="40%" align="right"></td>
                        <td width="30%">
                            <input type="file" name="file">
                        </td>
                        <td width="30%" align="left">
                            <button type="submit" class="btn btn-primary">업로드</button>
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <td width="40%" align="right"></td>
                        <td width="30"><span class="text-muted">.xls, .xslx</span></td>
                        <td width="30%" align="left">
                        <form method="post" action="{{route('excel.all_delete')}}" enctype="multipart/form-data" name="deleteList">
                            @csrf
                            <input type="button" class="btn btn-danger" onclick="button_event();" value="전체삭제"></input>
                            </form>
                        </td>
                    </tr>
                </table>
            </div>
        <br />
        <div class="panel panel-defalut">
            <div class="panel-heading">
                <h3 class="panel-title">지도 핀 데이터</h3><br>
                <p>데이터 건 수: {{ $data->count()}} / {{ $data->total() }}</p>
            </div>
            <ul>
                    {{ $data->appends(request()->input())->links() }}
                </ul>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>id</th>
                            <th>Location</th>
                            <th>Address</th>
                            <th>Latitude</th>
                            <th>Longitude</th>
                            <th>note</th>
                            <th>update</th>
                            <th>delete</th>
                        </tr>
                        <?php foreach ($data as $row) : ?>
                            <tr>
                                <td>{{$row->id}}</td>
                                <td>{{$row->Location}}</td>
                                <td>{{$row->Address}}</td>
                                <td>{{$row->Latitude}}</td>
                                <td>{{$row->Longitude}}</td>
                                <td>{{$row->note}}</td>
                                <!-- <td><a href="/execelUpload/update/{{ $row->id }}">데이터 수정</a></td> -->
                                <td><button type="button" class="btn btn-primary" onclick="location.href='/execelUpload/update/{{ $row->id }}'">데이터 수정</button></td>
                                <form method="post" action="{{route('excel.delete')}}" enctype="multipart/form-data" name="deleteParts">
                                @csrf
                                <input type="hidden" name="id" value="{{ $row->id }}">
                                <td><button type="submit" class="btn btn-danger" onclick="button_deleteParts_event();">데이터 삭제</button></td>
                                </form>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
</body>
<script type="text/javascript">
        function button_event(){
            if (confirm("전체 데이터를 삭제하시겠습니까??") == true){ 
                document.deleteList.submit();
            }else{
                return;
            }
        }
    </script>
</html>

