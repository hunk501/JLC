@extends('layouts.shop')

@section('content')
<section id="content">
    <div class="container">
        <div class="row">

            <div class="span4">
                <aside class="left-sidebar">
                    <div class="widget">
                    <form method='get' action="{{ url('products') }}">
                        <div class="input-append">
                        <input name='q' class="span2" id="appendedInputButton" type="text" placeholder="Type here">
                        <button class="btn btn-theme" type="submit">Search</button>
                        </div>
                    </form>
                    </div>

                    <div class="widget"> <!-- Categories widget -->
                        <h5 class="widgetheading">Categories</h5>
                        <ul class="cat">                        
                            @if(count($categories))
                                @foreach($categories as $category)
                                    @if($category->pc_id == $default_link_id)
                                    <li style="color: #e96b56;">
                                    @else
                                    <li>
                                    @endif                                    
                                        <i class="icon-angle-right"></i>                                         
                                        @if($category->pc_id == $default_link_id)
                                        <a href="{{ url('products') .'?pcid='. $category->pc_id }}" style="color: #e96b56;">{{ ucfirst($category->name) }}</a>
                                        @else
                                        <a href="{{ url('products') .'?pcid='. $category->pc_id }}">{{ ucfirst($category->name) }}</a>
                                        @endif
                                        <span> ({{ count($category->getProducts) }})</span>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div> <!-- // Categories widget -->
                        
                </aside>
            </div>

            <div class="span8">
                
                @if(isset($default->getProducts))                    
                    @foreach($default->getProducts as $product)
                    <article>
                        <div class="row">
                            <div class="span8">
                                <div class="post-image">
                                    <div class="post-heading">
                                        <h3><a href="#">{{ $product->name }}</a></h3>
                                    </div>

                                    <img src="img/dummies/blog/img1.jpg" alt="" />
                                </div>
                                <div class="meta-post">
                                    <ul>                            
                                        <li>Status <a href="#" class="author">{{ ($product->status) ? 'Active':'In-Active' }}</a></li>
                                        <li>Stock <a href="#" class="date">{{ $product->stock }}</a></li>                            
                                    </ul>
                                </div>
                                <div class="post-entry">
                                <p>{{ $product->description }}</p>
                                <a href="#" class="readmore">Read more <i class="icon-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </article>
                    @endforeach
                @endif                
                

                @if(isset($search)) 
                    @foreach($search as $product)
                    <article>
                        <div class="row">
                            <div class="span8">
                                <div class="post-image">
                                    <div class="post-heading">
                                        <h3><a href="#">{{ $product->name }}</a></h3>
                                    </div>

                                    <img src="img/dummies/blog/img1.jpg" alt="" />
                                </div>
                                <div class="meta-post">
                                    <ul>                            
                                        <li>Status <a href="#" class="author">{{ ($product->status) ? 'Active':'In-Active' }}</a></li>
                                        <li>Stock <a href="#" class="date">{{ $product->stock }}</a></li>                            
                                    </ul>
                                </div>
                                <div class="post-entry">
                                <p>{{ $product->description }}</p>
                                <a href="#" class="readmore">Read more <i class="icon-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </article>
                    @endforeach
                @endif

                <!-- <div id="pagination">
                    <span class="all">Page 1 of 3</span>
                    <span class="current">1</span>
                    <a href="#" class="inactive">2</a>
                    <a href="#" class="inactive">3</a>
                </div> -->

            </div>
        </div>
    </div>
</section>
@endsection