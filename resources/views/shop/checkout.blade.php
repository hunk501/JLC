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
      <!-- Personal Details -->
      <div class="span8">
        <h4>Personal Details</h4>

        <div id="sendmessage">Your message has been sent. Thank you!</div>
        <div id="errormessage"></div>
        <form action="{{ url('/checkout/confirm') }}" method="post" role="form" class="contactForm">
          <div class="row">
            <div class="span4 form-group field">
              <input type="text" name="firstname" id="firstname" placeholder="Firstname" value="{{ old('firstname') }}"/>
              <div class="validation">{{ $errors->first('firstname') }}</div>
            </div>
            <div class="span4 form-group field">
              <input type="text" name="lastname" id="lastname" placeholder="Lastname" value="{{ old('lastname') }}"/>
              <div class="validation">{{ $errors->first('lastname') }}</div>
            </div>
            <div class="span4 form-group field">
              <input type="text" name="contact_number" id="contact_number" placeholder="Mobile Number" value="{{ old('contact_number') }}"/>
              <div class="validation">{{ $errors->first('contact_number') }}</div>
            </div>
            <div class="span4 form-group">
              <input type="email" name="email" id="email" placeholder="Email Address" data-rule="email" value="{{ old('email') }}"/>
              <div class="validation">{{ $errors->first('email') }}</div>
            </div>
            <div class="span8 form-group">
              <textarea name="address" rows="5" data-rule="required" placeholder="Address">{{ old('address') }}</textarea>
              <div class="validation">{{ $errors->first('address') }}</div>
              <div class="text-center">
                <button class="btn btn-theme btn-medium margintop10" type="submit">Submit Form</button>
              </div>
            </div>
          </div>
          {{ csrf_field() }}
        </form>
      </div>
      <!-- // Personal Details -->
      
      <!-- Cart details -->
      <div class="span4">
        <div class="clearfix"></div>
        <aside class="right-sidebar">

          <div class="widget">
            <h5 class="widgetheading">My Cart Details<span></span></h5>

            <ul class="contact-info">
              <li><label>Products :</label> 
                Yamaha Sniper <br /> 
                Honda CBR 150r - Indonesia
              </li>
              <li><label>Total :</label>Php 130.90</li>
            </ul>

          </div>
        </aside>
      </div>
      <!-- // Cart details -->
    </div>
  </div>
</section>
<script>
$(document).ready(function(){
    $('.validation').show();
});
</script>
@endsection