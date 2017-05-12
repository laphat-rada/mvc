@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{$text}}</div>
                <div class="panel-body form-horizontal">
                    {{ Form::open(array('url' => '/test2', 'method' => 'GET'))}}
                    {{ csrf_field() }}

                    <div class="panel-body">
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-3 control-label">Name Album</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="col-md-2" >
                                <button type="submit" class="btn btn-primary">
                                    search
                                </button>                             

                            </div>


                        </div>

                    </div>
                    {{ Form::close() }}
                    @if($show)
                    {{ Form::open(array('url' => '/delete1', 'method' => 'GET'))}}
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr> 
                                <th class="center">ชื่อศิลปิน</th>
                                <th class="center">ชื่ออลบั้ม</th>                                
                                <th class="center">ราคาทุน</th>
                                <th class="center">ราคาขาย</th>
                                <th class="center">จำนวน</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for($i = 0 ; $i<$num;$i++)
                            <tr class=" gradeX">
                                <td>{{$qry[$i]->name_art}}{{ Form::hidden('name', $qry[$i]->name_art, array('required','class' => 'form-control')) }}</td>
                                <td>{{$qry[$i]->name_album}} </td>
                                <td>{{$qry[$i]->cost}}</td>
                                <td>{{$qry[$i]->price}}</td>
                                <td>{{$qry[$i]->count}}</td>
                                <td>{{ Form::hidden('id', $qry[$i]->id_album, array('required','class' => 'form-control')) }}
                                    <button type="submit" class="btn btn-primary">
                                        ลบ
                                    </button>
                                </td>
                                {{ Form::close() }}
                            </tr>
                            @endfor
                        </tbody>
                    </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">

            <div class="panel-body form-horizontal">
                {{ Form::open(array('url' => '/test3', 'method' => 'GET'))}}
                {{ csrf_field() }}

                <div class="panel-body">
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-3 control-label">Name Artist</label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                            @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="col-md-2" >
                            <button type="submit" class="btn btn-primary">
                                search
                            </button>                             
                        </div>
                    </div>                           
                </div>
                {{ Form::close() }}

                @if($shows)
                {{ Form::open(array('url' => '/delete2', 'method' => 'GET'))}}

                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr> 
                            <th class="center">ชื่อศิลปินp</th>
                            <th class="center">ชื่ออลบั้ม</th>                                
                            <th class="center">ราคาทุน</th>
                            <th class="center">ราคาขาย</th>
                            <th class="center">จำนวน</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for($i = 0 ; $i<$num;$i++) 
                        <tr class=" gradeX">                                  
                            <td>{{$qry[$i]->name_art}} {{ Form::hidden('name', $qry[$i]->name_art, array('required','class' => 'form-control')) }}</td>
                            <td>{{$qry[$i]->name_album}}</td>
                            <td>{{$qry[$i]->cost}}</td>
                            <td>{{$qry[$i]->price}}</td>
                            <td>{{$qry[$i]->count}}</td>
                            <td>{{ Form::hidden('id', $qry[$i]->id_album, array('required','class' => 'form-control')) }}
                                <button type="submit" class="btn btn-primary">
                                    ลบ
                                </button>
                            </td>
                            {{ Form::close() }}
                        </tr>
                        @endfor
                    </tbody>
                </table>  
                @endif
            </div>
        </div>
    </div>
</div>
</div>
@endsection
