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

                </article>                
            </div>        
        </div>
    </div>
</section>
@endsection