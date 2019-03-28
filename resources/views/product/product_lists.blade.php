@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
            <div class="col-lg-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('category') }}">Product Category</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ ucfirst($pc_name) }}</li>
                    </ol>
                </nav> 
            </div>
            <div class="col-lg-12">
                <div class="panel panel-default">                    
                    <div class="panel-heading">
                        <a class="btn btn-success" href="{{ url('product/add') .'/'. $pc_id  }}">Add New</a> &nbsp;&nbsp;
                        <!-- <button class="btn btn-danger">Remove</button> -->
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>                                        
                                        <th>Name</th>
                                        <th>Stock</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($records))
                                        @foreach($records as $record) 
                                            <tr>
                                                <td>{{ $record->name }}</td>
                                                <td>{{ $record->stock }}</td>
                                                <td>
                                                    @if($record->status == 1)
                                                    <span class="badge badge-success">Active</span>
                                                    @else 
                                                    <span class="badge badge-danger">Disabled</span>
                                                    @endif
                                                </td>                                                
                                            </td>
                                        @endforeach
                                    @else 
                                    <tr><td colspan="3">No records</td></tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-6 -->
    </div>

</div>
@endsection
