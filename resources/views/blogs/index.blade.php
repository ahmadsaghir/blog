@extends('layout')

@section('content')
        <!--? Hero Start -->
        <div class="slider-area2">
            <div class="slider-height2 hero-overly2 d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap hero-cap2 text-center">
                                <h2>Blog</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero End -->
        <!--================Blog Area =================-->
        <section class="blog_area section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mb-5 mb-lg-0">
                        <div class="blog_left_sidebar">
                            @foreach( $posts ?? '' as $post )
                            <article class="blog_item">
                                <div class="blog_item_img">
                                    <img src="{{url('uploads/'.$post->image)}}" alt="{{$post->title}}" width="600">
                                    <a href="posts/{{$post->id}}" class="blog_item_date">
                                        <h3>{{ $post->updated_at->format('d') }}</h3>
                                        <p>{{ $post->updated_at->format('M') }}</p>
                                    </a>
                                </div>
                                <div class="blog_details">
                                    <a class="d-inline-block" href="posts/{{$post->id}}">
                                        <h2>{{$post -> title}}</h2>
                                    </a>
                                    <p>{{$post -> body}}</p>
                                    <ul class="blog-info-link">
                                        <li>
                                            @foreach($categories ?? '' as $category)
                                                @if($post->category_id==$category->id)
                                                <a href="/categories/{{$category->id}}"><i class="fa fa-user"></i>{{$category-> name}}</a>
                                                @endif
                                            @endforeach
                                        </li>
                                        <li>
                                            @foreach($post->tags ?? '' as $tag)
                                                <a href="/tags/{{$tag->id}}"><i class="fa fa-tag" aria-hidden="true"></i>{{$tag-> name}}</a>
                                            @endforeach
                                        </li>
                                        @if($post->comments)
                                            <li><a href="/posts/"><i class="fa fa-comments"></i> {{$post->comments->count()}} Comments</a></li>
                                        @endif
                                        <li><a href="{{route('blogs.delete',$post->id)}}"><i class="fas fa-trash-alt"></i>Delete Post</a></li>
                                    </ul>
                                </div>
                            </article>
                            @endforeach
                            {{ $posts -> links() }}
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="blog_right_sidebar">
                            <aside class="single_sidebar_widget search_widget">
                                <form action="{{url('/posts/create')}}">
                                    <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                                            type="submit">Create New Post</button>
                                </form>
                            </aside>
                            @include('includes.aside')
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================Blog Area =================-->
@endsection
