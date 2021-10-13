<!DOCTYPE html>
<html>

<head>
    <title>Zadanie rekrutacyjne</title>
    <!-- Meta -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('dropzone/dist/min/dropzone.min.css')}}">  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> 
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">  
    <!-- JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="{{asset('dropzone/dist/min/dropzone.min.js')}}" type="text/javascript"></script>
    <script type="application/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
        
</head>

<body>

    <div class='content' id="content">
        <div class="filtr">
            <label for="myInput">Wprowadź wartość: </label>
            <input type="text" id="Input" placeholder="Filtruj..." title="Type in a name">
        </div>
        <div class="table">
            <table id="tabela" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th onclick="sortTable('tblSort')" style="cursor:pointer">Nazwa pliku</th>
                        <th onclick="sortTable('tblSort')" style="cursor:pointer">Typ</th>
                        <th onclick="sortTable('tblSort')" style="cursor:pointer">Rozmiar</th>
                        <th onclick="sortTable('tblSort')" style="cursor:pointer">Data modyfikacji</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($files) > 0)
                    @foreach($files as $key => $value)
                    <tr id="{{$value['name']}}">
                        <td>{{$value['name']}}</td>
                        <td>{{$value['type']}}</td>
                        <td>{{$value['size']}}</td>
                        <td>{{$value['time']}}</td>
                        <td><a href="#" class="btn btn btn-danger deletebtn">Usuń</a>
                        <a href="{{route('download',$value['name'])}}" class="btn btn-primary">  Pobierz </a></td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
        <form action="{{route('dropzoneFileUpload')}}" class='dropzone'>
        </form>
    </div>

    <!-- JS -->
    <script src="{{asset('js/filtr.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/sort.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/dropzone.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/remove_file.js')}}" type="text/javascript"></script>
</body>

</html>
