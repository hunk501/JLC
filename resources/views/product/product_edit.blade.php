@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
            <div class="col-lg-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('category') }}">Categories</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('product') .'/'. $pc_id }}">{{ ucfirst($pc_name) }}</a></li>
                    </ol>
                </nav> 
            </div>
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">                        
                        Product Details
                    </div>
                    <!-- /.panel-heading -->
                    <form method="POST" action="{{ url('product/edit') .'/'. $pc_id .'/'. $p_id }}">
                        <div class="panel-body">
                            <div class="form-group">
                                <label>Name:</label>
                                <div class="form-action">
                                    <input type="text" name="name" value="{{ $product->name }}">
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
                                    <input type="text" name="image" value="{{ $product->emage }}">
                                    @if($errors->has('image'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Stock</label>
                                <div class="form-action">
                                    <select name="stock">
                                    @for($x=0; $x<=100; $x++)
                                        <option value="{{ $x }}" {{ ( $product->stock == $x ? "selected":"") }}>{{ $x }}</option>
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
                                    <textarea name="description">{{ $product->description }}</textarea>
                                    @if($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success">Update Product</button>
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
