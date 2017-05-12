@extends('layouts.app')

@section('content')

</script>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"></div>
                <div class="panel-body form-horizontal">
                    {{ Form::open(array('url' => '/save', 'method' => 'GET'))}}
                    {{ csrf_field() }}

                    
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name Artist</label>

                            <div class="col-md-6">
                                <input id="type" type="text" class="form-control" name="name_art" value="{{ old('name_album') }}" required autofocus>

                                @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name Album</label>

                            <div class="col-md-6">
                                <input id="type" type="text" class="form-control" name="name_album" value="{{ old('name_album') }}" required autofocus>

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
                                <input id="name" type="text" class="form-control" name="cost" value="{{ old('cost') }}" required autofocus>

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
                                <input id="name" type="text" class="form-control" name="price" value="{{ old('price') }}" required autofocus>

                                @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('number') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Count</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="count" value="{{ old('count') }}" required autofocus>

                                @if ($errors->has('number'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('number') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    insert
                                </button>                             

                            </div>
                        </div>

                        {{ Form::close() }}
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
