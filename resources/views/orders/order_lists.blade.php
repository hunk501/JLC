@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
            <div class="col-lg-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">                        
                        <li class="breadcrumb-item active" aria-current="page">Product Categories</li>
                    </ol>
                </nav> 
            </div>
            <div class="col-lg-12">
                <div class="panel panel-default">                    
                    <div class="panel-heading">
                        <a class="btn btn-success" href="{{ url('category/form') }}">Add New</a> &nbsp;&nbsp;
                        <button id="remove" class="btn btn-danger">Remove</button>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" id="check-all"></th>                                        
                                        <th>Product</th>
                                        <th>Qty</th>
                                        <th>Amount</th>  
                                        <th>User</th>
                                        <th>Status</th>
                                        <th></th>                                      
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($records))
                                        @foreach($records as $record)
                                        <tr id="pcid_{{ $record->pc_id }}">
                                            <td><input type="checkbox" class="chk" name="chk[]" value="{{ $record->pc_id }}"/></td>                                            
                                            <td>{{ $record->getProduct->name }}</td>
                                            <td>{{ $record->qty }}</td>
                                            <td></td>
                                            <td>{{ $record->getUser->name }}</td>
                                            <td></td>
                                            <td>
                                                <a href="{{ url('category') .'/edit/'. $record->pc_id }}">[Edit]</a>&nbsp;|
                                                <a href="{{ url('product') .'/'. $record->pc_id }}">[ <span class="badge">0</span> Products]</a>&nbsp;
                                            </td>
                                        </tr>
                                        @endforeach
                                    @else
                                    <tr><td colspan="4">No records</td></tr>
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


{{ csrf_field() }}


<!-- Delete Modal -->
<div id="mdlDelete" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Warning</h4>
      </div>
      <div class="modal-body">
        <p>Delete selected category and products.?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="button" id="delete" class="btn btn-success">Continue</button>
      </div>
    </div>

  </div>
</div>

<!-- Info Modal -->
<div id="mdlInfo" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Message</h4>
      </div>
      <div class="modal-body">
        <p>No selected records!</p>
      </div>
      <div class="modal-footer">        
        <button type="button" class="btn btn-success" data-dismiss="modal">Okay</button>
      </div>
    </div>

  </div>
</div>


<script>
$(document).ready(function(){
    
    var cnt = 0;
    // Tr
    $('#check-all').click(function(){
        if($(this).is(":checked")) {
            console.log("checked");
            $(".chk").each(function(){
                $(this).prop('checked', true);
                cnt++;
            });
        } else {
            console.log("NOT");
            $(".chk").each(function(){
                $(this).prop('checked', false);
            });
            cnt = 0;
        }
        console.log(cnt);
    });

    // Remove btn
    $("#remove").click(function(){
        console.log("vdvs");        
        if( _getCheckbox() ) {
            $('#mdlDelete').modal();
        } else {
            $("#mdlInfo .modal-body").html('<p>No selected records!</p>');
            $('#mdlInfo').modal();
        }
    });

    $("#delete").click(function(){
        var _selected = [];

        $(".chk:checked").each(function(){
            _selected.push( $(this).val() );
        });
        console.log(_selected);
        $.ajax({
            type: 'POST',
            url: "{{ url('category') . '/delete' }}",
            data: {'_token': $("input[name='_token']").val(),'pc_id':_selected},
            dataType: 'json',
            beforeSend: function() {

            },
            success: function(json) {
                console.log(json);
                $('#mdlDelete').modal('hide');
                if(json.success) {
                    var _hasChecked = false;
                    $("input[type=checkbox]").each(function(){                        
                        $(this).prop('checked', false);
                    });
                    for(var x=0; x < _selected.length; x++) {
                        $("#pcid_"+ _selected[x]).remove();
                    }
                    $(".chk").each(function(){                        
                        _hasChecked = true;
                    });
                    if(!_hasChecked) {
                        $("#remove").remove();
                    }
                    $("#mdlInfo .modal-body").html('<p>'+ json.msg + '</p>');
                } else {
                    $("#mdlInfo .modal-body").html('<p>'+ json.msg + '</p>');
                }
                $('#mdlInfo').modal();
            },
            error: function(e) {
                console.log(e.responseText);
            }
        });
    });

    function _getCheckbox() {
        var _selected = 0;
        $(".chk").each(function(){
            if($(this).is(":checked")) {
                _selected++;
            }
        });

        return (_selected) ? true : false;
    }

});
</script>
@endsection