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
                <article class="noborder">
                    <div class="top-wrapper">
                    <div class="post-heading">
                        <h3><a href="#">{{ ucfirst($product->name) }}</a></h3>
                    </div>
                    <!-- start flexslider -->
                    <div class="portfolio-detail">
                        <img src="{{ asset('/img') .'/'. $product->image_url }}" alt="" />
                    </div>
                    <!-- end flexslider -->
                    </div>

                    <?=html_entity_decode($product->description, ENT_HTML5|ENT_COMPAT|ENT_QUOTES);?>
                    <div>
                        <button id="get_a_quote" class="btn btn-large btn-info">Get a quote</button>
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
        <h4 class="modal-title">Get a Quote</h4>
      </div>
      <div class="modal-body">        
        <!-- form -->
        <form id="get-a-quote-form">            
            <div class="form-group">
                <input type="email" id="email" placeholder="Email Address" />
            </div>
            <div class="form-group">
                <input type="text" id="name" placeholder="Full Name" />
            </div>
            <div class="form-group">
                <input type="text" id="contact" placeholder="Contact Number" />
            </div>
            <div class="form-group">
                <textarea id="message" rows="5" placeholder="Message"></textarea>
            </div>
            <input type="hidden" id="service_id" value="{{ $product->p_id }}"/>
            {{ csrf_field() }}
        </form>
        <!-- //form -->
      </div>
      <div class="modal-footer">        
        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
        <button id="submit-form" class="btn btn-success">Submit Form</button>
      </div>
    </div>

  </div>
</div>

<script>
    $(document).ready(function(){
        $("#get_a_quote").click(function(){
            $("#mdlInfo").modal();
        });
        $("#submit-form").click(function(){
            var email = $("#get-a-quote-form #email").val();
            if(email.length > 0 && isEmail(email)) {
                $.ajax({
                    url: "{{ url('/services/quote') }}",
                    dataType: 'json',
                    type: 'POST',
                    data: {
                        name: $("#get-a-quote-form #name").val(),
                        email: $("#get-a-quote-form #email").val(),
                        message: $("#get-a-quote-form #message").val(),
                        contact: $("#get-a-quote-form #contact").val(),
                        service_id: $("#get-a-quote-form #service_id").val(),
                        _token: $("#get-a-quote-form input[name=_token]").val()
                    },
                    beforeSend: function() {
                        $("#mdlInfo").modal('hide');
                    },
                    success: function(json) {
                        if(json.status) {
                            alert('Form has been submitted!');
                        } else {
                            alert('Error submitting form, please try again');
                        }
                    },
                    error: function(err) {
                        console.log(err);
                    },
                    complete: function() {
                        $("form").trigger('reset');
                    }
                });
            } else {
                alert('Email is required or invalid');
            }            
        });
    });

    function isEmail(email) {
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        return regex.test(email);
    }
</script>
@endsection