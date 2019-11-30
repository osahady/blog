@extends('layouts.blog-home')

@section('content')

    
    
 

    <div class="row">
        <div class="col-md-8">
            <!-- Blog Post -->
            @include('includes.flash_message')

    <!-- Title -->
    <h1>{{ $post->title }}</h1>

    <!-- Author -->
    <p class="lead">
        by <a href="#">{{ $post->user->name }}</a>
    </p>

    <hr>

    <!-- Date/Time -->
    <p><span class="glyphicon glyphicon-time"></span> Posted {{ $post->created_at->diffForHumans() }}</p>

    <hr>

    <!-- Preview Image -->
    <img class="img-responsive" src="{{ $post->photo ? $post->photo->file : $post->photoPlaceholder() }}" alt="">

    <hr>

    <!-- Post Content -->
   <p class="lead">  {!! $post->body !!} </p>
    <hr>

        
{{-- row --}}
    {{-- <div id="disqus_thread"></div>
<script> --}}
{{-- 
/**
*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
/*
var disqus_config = function () {
this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};
*/ --}}
{{-- (function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = 'https://blogosa.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                             --}}
    <!-- Blog Comments -->

    @if (Auth::check())       
    
        <!-- Comments Form -->
        <div class="well">
            <h4>Leave a Comment:</h4>
            <form role="form" action="{{ route('comments.store') }}" method="POST">
                @csrf
                <input type="hidden" name="post_id" value="{{ $post->id }}">
                <div class="form-group">
                    <textarea class="form-control" rows="3" name="body"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    @endif
    <hr>

    <!-- Posted Comments -->

    @if (count($comments) > 0)
        @foreach ($comments as $comment)
            <!-- Comment -->
            <div class="media">
                <a class="pull-left" href="#">
                    <img height="64" class="media-object" src="{{ $comment->photo }}" alt="photo">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">{{ $comment->author }}
                        <small>{{ $comment->created_at->diffForHumans() }}</small>
                    </h4>
                    <p>{{ $comment->body }}</p>


                    {{-- testing if there is a reply --}}
                    @if (count($comment->replies) > 0)
                        @foreach ($comment->replies as $reply)
                            @if ($reply->is_active)
                                <!-- Nested Comment -->
                                <div id="nested-comment" class="media">
                                    <a class="pull-left" href="#">
                                        <img height="64" class="media-object" src="{{ $reply->photo }}" alt="">
                                    </a>
                                    <div class="media-body">
                                        <h4 class="media-heading">{{ $reply->author }}
                                            <small>{{ $reply->created_at->diffForHumans() }}</small>
                                        </h4>
                                        <p>{{ $reply->body }}</p>                                
                                    </div>                                            
                                </div>
                                <!-- End Nested Comment --> 
                            @endif                                
                        @endforeach                        
                    @endif
                   

                    <div class="comment-reply-container">
                        <button class="toggle-reply btn btn-primary pull-right">Reply</button>
                        <div class="col-sm-10 comment-reply">
                            <form action="{{ route('replies.createReply') }}" method="post">
                                @csrf
                                <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                                <div class="form-group">
                                    <label for="body">Reply</label>
                                    <textarea class="form-control" name="body"  cols="30" rows="1"></textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-outline-primary">Submit</button>
                                </div>                        
                            </form>
                        </div>
                         
                    </div>
                    {{-- end of comment-reply-container --}}
                      

                </div>
            </div>
        @endforeach   
    @endif 
    
</div>
{{-- col-md-8 --}}


@include('includes.front_sidebar')

</div>
  

@stop

@section('scripts')
    <script>
        $(".comment-reply-container .toggle-reply").click(function(){
            $(this).next().slideToggle('slow');
        });
    </script>
@endsection

