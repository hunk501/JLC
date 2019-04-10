@extends('layouts.shop')

@section('breadcrumb')
<section id="inner-headline">
    <div class="container">
    <div class="row">
        <div class="span12">
        <div class="inner-heading">
            <ul class="breadcrumb">
                @if(isset($content['breadcrumb']))
                    @foreach($content['breadcrumb'] as $bc)
                        @if(!empty($bc['class']))
                        <li class="active">{{ $bc['label'] }}</li>
                        @else
                        <li><a href="{{ $bc['href'] }}">{{ $bc['label'] }}</a> <i class="icon-angle-right"></i></li>
                        @endif                    
                    @endforeach
                @endif
            </ul>

            <h2>{{ $content['title'] }}</h2>
        </div>
        </div>
    </div>
    </div>
</section>
@endsection

@section('content')
<section id="content">      
  <div class="container">

    <!-- Alert -->
    @if(isset($cart_update))
    <div class="row">      
      <div class="alert alert-success alert-dismissible" role="alert">
        {{ $cart_update }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    </div>
    @endif
    <!-- //Alert -->

    <div class="row">
      <table class="table">
          <thead>
            <tr>
              <th>Product Name</th>
              <th>Qty</th>
              <th>Rate(Daily/Hourly)</th>
              <th>From-To</th>
              <th>Amount</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @if(count($cart_products))
              @foreach($cart_products as $product)
              <tr>
                <td>{{ ucfirst($product['name']) }}</td>
                <td>
                  <select id="qty_{{ $product['rp_id'] }}" data-id="{{ $product['rp_id'] }}" style="width: 55px;">
                    @for($x=1; $x <= $product['stock']; $x++)
                      @if($x == (int)$product['qty'])
                      <option value="{{ $x  }}" selected>{{ $x }}</option>
                      @else
                      <option value="{{ $x  }}">{{ $x }}</option>
                      @endif                    
                    @endfor
                  </select>
                </td>
                <td>{{ $product['rental_rate'] }}</td>
                <td></td>
                <td>{{ number_format($product['amount'], 2) }}</td>
                <td>
                  <a href="{{ url('/rental/view') .'/'. $product['rp_id'] }}" title="View product"><i class="icon-edit"></i></a> &nbsp;&nbsp;|&nbsp;&nbsp; 
                  <a href="javascript: void();" class="remove" title="Remove product in cart" data-id="{{ $product['rp_id'] }}"><i class="icon-trash"></i></a>
                </td>
              </tr>
              @endforeach
            @endif            
          </tbody>
          <tfoot>            
            <tr>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th>Total Php {{ number_format($total, 2) }}</th>
            </tr>
          </tfoot>
      </table>
    </div>
    <div class="row">
      <a href="{{ url('/checkout/confirm') }}" class="btn btn-large btn-info">Proceed to Checkout</a>
    </div>
  </div>
</section>

{{ csrf_field() }}


<!-- Info Modal -->
<div id="mdlInfo" class="modal fade" role="dialog" style="display: none;">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Message</h4>
      </div>
      <div class="modal-body">
        <p>Product has been added to cart!</p>
      </div>
      <div class="modal-footer">        
        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
      </div>
    </div>

  </div>
</div>

<!-- Delete Modal -->
<div id="mdlDelete" class="modal fade" role="dialog" style="display: none;">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Confirm</h4>
      </div>
      <div class="modal-body">
        <p>Delete selected product from cart.?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="button" id="delete" class="btn btn-success">Continue</button>
      </div>
    </div>

  </div>
</div>

<script>
$(document).ready(function(){

  var _remove = 0;

  $("select").each(function(){
    $(this).on('change', function(){
      var _this = $(this);
      var _data = {
          'qty': _this.val(),
          'rp_id': _this.attr('data-id'),
          '_token': $("input[name=_token]").val(),
          'action': 'add_qty'
      };  
      
      _callAjax( _data );

    });
  });
  
  // Remove
  $('.remove').each(function() {
    $(this).click(function(e){
      e.preventDefault();
      var _this = $(this);
      _remove = _this.attr('data-id');
      $("#mdlDelete").modal();      
      //console.log( _this.attr('data-id') );
    });
  });

  $("#delete").click(function(){
    //console.log( _remove );
    var _data = {        
        'rp_id': _remove,
        '_token': $("input[name=_token]").val(),
        'action': 'remove'
    };
    _callAjax( _data );
  });


  function _callAjax( _data ) {
    $.ajax({
      type: 'POST',
      url: "{{ url('/cart/update') }}",
      data: _data,
      dataType: 'json',
      beforeSend: function() {

      },
      success: function(json) {            
          if(json.status) {
            location.reload();
          } else {
            $("#mdlInfo .modal-body").html('<p>'+ json.msg + '</p>');
            $("#mdlInfo").modal();
          }
      },
      error: function(e) {
        //console.log(e.responseText);
        alert(e.responseText);
      },
      complete: function() {
        //location.reload();    
      }
    });
  } 

});
</script>
@endsection