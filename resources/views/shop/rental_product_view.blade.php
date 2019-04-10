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
        <div class="row">
            <div class="span12">

                <article>
                    <div class="row">

                        <div class="span8">
                        <div class="post-image">
                            <div class="post-heading">
                            <h3><a href="#">{{ ucfirst($product->name) }}</a></h3>
                            </div>

                            <img src="{{ asset('img/dummies/team/4.jpg') }}" alt="" />
                        </div>

                        </div>
                        <div class="span4">
                        <div class="meta-post">
                            <ul>
                            <li></li>
                            <li>Status: <a href="#">Active</a></li>
                            <li>Stock: <a href="#">{{ $product->stock }}</a></li>
                            <li>Rate: <a href="#">Php {{ $product->rental_rate }}/{{ ($product->rental_type==1)?'day':'hour' }}</a></li>
                            </ul>
                        </div>
                        <div class="post-entry">
                            <p>{{ $product->description }}</p>
                            @if($product->stock)
                            <a href="#" class="add-to-cart btn btn-primary"><i class="icon-shopping-cart"></i> Add to Cart</a>
                            @else
                            <span class="badge">Out of Stock</span>
                            @endif
                        </div>
                        </div>
                    </div>
                </article>

            </div>
        </div>
    </div>
</section>

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
        <a href="{{ url('/rental') }}" class="btn btn-primary">View other products</a>
        <a href="{{ url('/cart') }}" class="btn btn-success">View my cart</a>
      </div>
    </div>

  </div>
</div>

{{ csrf_field() }}

<script>
$(document).ready(function(){

    $(".add-to-cart").click(function(e){
        e.preventDefault();

        var _data = {
            'rp_id': '{{ $product->rp_id }}',
            '_token': $("input[name=_token]").val()
        };
        $.ajax({
            type: 'POST',
            url: "{{ url('/rental/add_to_cart') }}",
            data: _data,
            dataType: 'json',
            beforeSend: function() {

            },
            success: function(json) {
                $('#mdlInfo').modal();
                console.log(json);                
            },
            error: function(e) {

            },
            complete: function() {
                
            }
        });
    });

    // modal
    $("#mdlInfo").on('hidden.bs.modal', function(){        
        window.location.reload();
    });
});
</script>
@endsection