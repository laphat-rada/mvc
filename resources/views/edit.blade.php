@extends('layouts.app')

@section('content')

</script>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"></div>
                <div class="panel-body form-horizontal">
                    @if($check)
                    {{ Form::open(array('url' => '/edit', 'method' => 'GET'))}}
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="sel5" class="col-md-4 control-label">เลือกอลบั้ม</label>
                        <div class="col-md-6">
                            {{ Form::select('album', $album, null, ['class'=>'form-control']) }} 
                        </div>
                        <div class="col-md-1 ">
                            <button type="submit" class="btn btn-primary">
                                OK
                            </button>                             

                        </div>
                    </div>

                    {{ Form::close() }}
                    
                    
                    @else
                    {{ Form::open(array('url' => '/update', 'method' => 'GET'))}}
                    <div class="form-group">

                        <div class="col-md-6">
                            {{ Form::hidden('id', $album->id_album, array('required','class' => 'form-control')) }}
                            
                        </div>
                    </div>
                    
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                       
                        <label for="name" class="col-md-4 control-label">Name Album</label>

                        <div class="col-md-6">
                            {{ Form::text('name_album', null , array('class' => 'form-control','placeholder'=>$album->name_album)) }}
                            @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">Cost</label>

                        <div class="col-md-6">
                           {{ Form::text('cost', null , array('class' => 'form-control','placeholder'=>$album->cost)) }}

                            @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">Price</label>

                        <div class="col-md-6">
                            {{ Form::text('price', null , array('class' => 'form-control','placeholder'=>$album->price)) }}

                            @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">Count</label>

                        <div class="col-md-6">
                            {{ Form::text('count', null , array('class' => 'form-control','placeholder'=>$album->count)) }}

                            @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                update
                            </button>                             

                        </div>
                    </div>
                    {{ Form::close() }} 
                    @endif
                </div>


            </div>
        </div>
    </div>
</div>
</div>
@endsection
