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
            <h4 class="title">What we do</h4>
            <p>
              Ei mel semper vocent persequeris, nominavi patrioque vituperata id vim, cu eam gloriatur philosophia deterruisset. Meliore perfecto repudiare ea nam, ne mea duis temporibus. Id quo accusam consequuntur, eum ea debitis urbanitas. Nibh reformidans vim ne.
            </p>


          </div>

        </div>


        <div class="row">

            @if(!empty($products))
                @foreach($products as $product)
                <div class="span3">
                    <a href="{{ url('projects/view') .'/'. $product->p_id }}">                    
                        <div class="service-box aligncenter {{ $product->animation }}">
                            <div class="icon">
                                <img src="{{ asset('/img') .'/'. $product->image_url }}" alt="" />
                            </div>
                            <h5><span class="colored">{{ $product->name }}</span></h5>                        
                        </div>
                    </a>               
                </div>
                @endforeach
            @endif
        </div>

        <div class="row">
                    
        </div>

      </div>
    </section>
@endsection