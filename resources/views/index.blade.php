@extends('layouts.shop')

@section('breadcrumb')
<section id="featured">

  <!-- slideshow start here -->

  <div class="camera_wrap" id="camera-slide">

    @if(isset($settings['homepage_slider']))
    <?=html_entity_decode($settings['homepage_slider'], ENT_HTML5|ENT_COMPAT|ENT_QUOTES);?>
    @endif

  </div>

  <!-- slideshow end here -->

</section>
@endsection

@section('content')
<section id="content">
      <div class="container">

        @if(isset($settings['homepage_main_content']))
        <?=html_entity_decode($settings['homepage_main_content'], ENT_HTML5|ENT_COMPAT|ENT_QUOTES);?>
        @endif

        <div class="row">
          <div class="span12">
            <div class="solidline"></div>
          </div>
        </div>

        <div class="row">
          @if(isset($settings['homepage_comment_slider']))
          <?=html_entity_decode($settings['homepage_comment_slider'], ENT_HTML5|ENT_COMPAT|ENT_QUOTES);?>
          @endif
        </div>

      </div>
    </section>
@endsection