@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
            <div class="col-lg-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('rent_cat') }}">Rental Categories</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('rent_prod') .'/'. $rc_id }}">{{ ucfirst($category_name) }}</a></li>
                    </ol>
                </nav> 
            </div>
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">                        
                        Product Details
                    </div>
                    <!-- /.panel-heading -->
                    <form method="POST" action="{{ url('rent_prod/add') .'/'. $rc_id }}" enctype="multipart/form-data">
                        <div class="panel-body">
                            <div class="form-group">
                                <label>Name:</label>
                                <div class="form-action">
                                    <input type="text" name="name" value="{{ old('name') }}">
                                    @if($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>                
                            <div class="form-group">
                                <label>Image:</label>
                                <div class="form-action">
                                    <input type="file" name="images">
                                    @if($errors->has('images'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('images') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Rental Type</label>
                                <div class="form-action">
                                    <select name="rental_type">
                                        <option value="1">Daily</option>
                                        <option value="2">Hourly</option>                                        
                                    </select>
                                    @if($errors->has('rental_type'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('rental_type') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Rental Rate:</label>
                                <div class="form-action">
                                    <input type="text" name="rental_rate" value="{{ old('rental_rate') }}">
                                    @if($errors->has('rental_rate'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('rental_rate') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Stock</label>
                                <div class="form-action">
                                    <select name="stock">
                                    @for($x=0; $x<=100; $x++)
                                        <option value="{{ $x }}" {{ ( old("stock") == $x ? "selected":"") }}>{{ $x }}</option>
                                    @endfor
                                    </select>
                                    @if($errors->has('stock'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('stock') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <div class="form-action">
                                    <textarea id="wysiwg" name="description">{{ old('description') }}</textarea>
                                    @if($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success">Submit</button>
                            </div>
                        </div>
                        {{ csrf_field() }}
                    </form>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-6 -->
    </div>

</div>
@endsection
