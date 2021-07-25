<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/upload.css" />
    <title>지도 데이터 업데이트</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
<div id="navbar">
<ul id="navbar">
        <li><a href="{{ route('map.index') }}">지도화면으로</a></li>
        <li style="float: right;"><a class="active" href="/execelUpload">엑셀 데이터 화면</a></li>
      </ul>
      </div>
    <div class="container">
        <h3 align="center">엑셀 업데이트 화면</h3>
        <br />
        <form method="post" action="{{route('excel.update')}}" enctype="multipart/form-data">
            @csrf
        <br />
        <div class="panel panel-defalut">
            <div class="panel-heading">
                <h3 class="panel-title">지도 핀 데이터</h3>
            </div>
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
                        </tr>
                            <tr>
                                <td>{{$data->id}}</td>
                                <input type="hidden" class="form-control" name="id" value= "{{ $data->id }}" />
                                <td><input type="text" class="form-control" name="Location" value= "{{ $data->Location }}" style="width: 150px;text-align:left;" /></td>
                                <td><input type="text" class="form-control" name="Address" value= "{{ $data->Address }}" style="width: 300px;text-align:left;" /></td>
                                <td><input type="text" class="form-control" name="Latitude" value= "{{ $data->Latitude }}" style="width: 140px;text-align:left;" /></td>
                                <td><input type="text" class="form-control" name="Longitude" value= "{{ $data->Longitude }}" style="width: 200px;text-align:left;" /></td>                            
                                <td><input type="text" class="form-control" name="note" value= "{{ $data->note }}" style="width: 140px;text-align:left;" /></td>
                            </tr>
                    </table>

                    <table class="table">
                    <tr>
                        <td width="80%" align="center">
                        <button type="submit" class="btn btn-primary" width= "100%">업데이트</button>
                        <a onclick="goBack()" class="btn btn-danger">취소</a>
                        </td>
                    </tr>       
                    </form>
                </table>
                </div>
            </div>
        </div>
</body>
<script>
function goBack() {
  window.history.back();
}
</script>
</html>