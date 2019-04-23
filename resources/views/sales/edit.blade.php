@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
            <div class="col-lg-12">
                <nav aria-label="breadcrumb">
                    @if(Auth::user()->user_level == 1)
                    <ol class="breadcrumb">                        
                        <li class="breadcrumb-item"><a href="{{ url('sales') }}">Reports</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Application</li>
                    </ol>
                    @else
                    <ol class="breadcrumb">                        
                        <li class="breadcrumb-item"><a href="{{ url('sales') }}">My Application</a></li>
                        <li class="breadcrumb-item active" aria-current="page">View</li>
                    </ol>
                    @endif                    
                </nav> 
            </div>
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">                        
                        Application Details
                    </div>
                    <!-- /.panel-heading -->
                    <form method="POST" action="{{ url('sales/edit') .'/'. $transaction_id }}">
                        <div class="panel-body">
                            <!-- Product Details -->
                            <div class="form-group">
                                <label>Date Added:</label>
                                <div class="form-action">
                                    <p>{{ date('Y-m-d h:i:s a', strtotime($record->created_at)) }}</p>                                    
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Product Name:</label>
                                <div class="form-action">
                                    <p>{{ ucfirst($record->getProduct->name) }}</p>                                    
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Stock:</label>
                                <div class="form-action">
                                    <p>{{ $record->getProduct->stock }}</p>                                    
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Rental rate:</label>
                                <div class="form-action">
                                    <p>{{ number_format($record->getProduct->rental_rate, 2) }}</p>                                    
                                </div>
                            </div>                
                            <div class="form-group">
                                <label>Total Amount:</label>
                                <div class="form-action">
                                    <p>{{ number_format(($record->getProduct->rental_rate * $record->qty), 2) }}</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Qty:</label>
                                <div class="form-action">
                                    <p>{{ $record->qty }}</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Date(From-To):</label>
                                <div class="form-action">                                    
                                    <p></p>
                                </div>
                            </div>
                            <hr>
                            <!-- Customer Details -->
                            <div class="form-group">
                                <label>Customer Name:</label>
                                <div class="form-action">
                                    <p>{{ $record->getUser->name }}</p>                                    
                                </div>
                            </div>                
                            <div class="form-group">
                                <label>Contact No:</label>
                                <div class="form-action">
                                    <p>{{ $record->getUser->contact_number }}</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Email:</label>
                                <div class="form-action">
                                    <p>{{ $record->getUser->email }}</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Address:</label>
                                <div class="form-action">                                    
                                    <p>{{ $record->getUser->address }}</p>
                                </div>
                            </div>
                            <hr>                            
                            @if(Auth::user()->user_level == 1)
                            <div class="form-group">
                                <label>Status:</label>
                                <div class="form-action">                                    
                                    <select name="status">
                                        <option value="0" {{ ($record->status == 0) ? 'selected':'' }} >Pending</option>
                                        <option value="1" {{ ($record->status == 1) ? 'selected':'' }} >Approved</option>
                                        <option value="2" {{ ($record->status == 2) ? 'selected':'' }} >Declined</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success">Update</button>
                            </div>
                            @else
                            <div class="form-group">
                                <label>Status:</label>
                                <div class="form-action">                                    
                                    <p>
                                    @if($record->status <= 0)
                                    Pending
                                    @elseif($record->status == 1)
                                    Approved
                                    @elseif($record->status == 2)
                                    Declined
                                    @endif
                                    </p>
                                </div>
                            </div>
                            @endif                            
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
