@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
            <div class="col-lg-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">                        
                        <li class="breadcrumb-item active" aria-current="page">Product Category</li>
                    </ol>
                </nav> 
            </div>
            <div class="col-lg-12">
                <div class="panel panel-default">                    
                    <div class="panel-heading">
                        <a class="btn btn-success" href="{{ url('category/form') }}">Add New</a> &nbsp;&nbsp;
                        <!-- <button class="btn btn-danger">Remove</button> -->
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Image</th>                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($records))
                                        @foreach($records as $record)
                                        <tr style="cursor: pointer;" data-id="{{ $record->pc_id }}">
                                            <td>{{ $record->pc_id }}</td>
                                            <td>{{ $record->name }}</td>
                                            <td>{{ $record->image_url }}</td>
                                        </tr>
                                        @endforeach
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
<script>
$(document).ready(function(){
    
    // Tr
    $('tr').click(function(){
        var pc_id = $(this).attr('data-id');
        //console.log(pc_id);
        location = "{{ url('product') }}" +'/'+ pc_id;
    });
});
</script>
@endsection