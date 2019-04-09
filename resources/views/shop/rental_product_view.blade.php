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
                            <li>Rate: <a href="#">Php {{ $product->rental_rate }}/{{ ($product->rental_type==1)?'day':'hour' }}</a></li>
                            </ul>
                        </div>
                        <div class="post-entry">
                            <p>{{ $product->description }}</p>
                            <a href="#" class="btn btn-primary"><i class="icon-rocket icon-white"></i> Add to Cart</a>
                        </div>
                        </div>
                    </div>
                </article>

            </div>
        </div>
    </div>
</section>
@endsection