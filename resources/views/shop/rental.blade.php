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
            <ul class="team-categ filter">
                <li class="all active"><a href="#">All</a></li>
                @if(count($categories))
                    @foreach($categories as $category)
                    <li class="rc_id_{{ $category->rc_id }}"><a href="#" title="">{{ ucfirst($category->category_name) }}</a></li>    
                    @endforeach
                @endif
            </ul>

            <div class="clearfix"></div>
                <div class="row">
                    <section id="team">
                        <ul id="thumbs" class="team">

                            @if(count($products))
                                @foreach($products as $product)
                                <!-- Item Project and Filter Name -->
                                <li class="item-thumbs span3 rc_id_{{ $product['rc_idfk'] }}" data-id="id-0" data-type="rc_id_{{ $product['rc_idfk'] }}">
                                    <a href="{{ url('rental').'/view/'. $product['rp_id'] }}">
                                    <div class="team-box thumbnail">
                                        <img src="{{ asset('img/dummies/team/4.jpg') }}" alt="" />
                                        <div class="caption">                                        
                                            <p>{{ ucfirst($product['name']) }}</p>
                                            <div class="meta-post">
                                                <ul>                                                    
                                                    <li><a href=""></a></li>                                                    
                                                    <li>Rate: <a href="{{ url('rental').'/view/'. $product['rp_id'] }}">Php {{ $product['rental_rate']}}/{{ ($product['rental_type']==1)?'day':'hour' }}</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    </a>
                                </li>
                                <!-- End Item Project -->
                                @endforeach
                            @endif

                            
                        </ul>
                    </section>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection