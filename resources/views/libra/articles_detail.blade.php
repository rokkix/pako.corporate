<div id="content-blog" class="span9 content group">
    <div class="post type-post status-publish format-standard hentry hentry-post group blog-libra-big row">
        <!-- post featured & title -->
        @if($article)
        <div class="date-comments span1">
            <p class="date"><span class="month">{{ $article->created_at->format('M') }}</span><span class="day">{{ $article->created_at->format('d') }}</span></p>

            <p class="comments">
                <i class="icon-comment"></i>
                                    <span>
                                        <a href="#comments" title="{{ $article->title }}">{{ count($article->comments) ? count($article->comments) : '0'}}</a>
                                    </span>
            </p>
        </div>

        <div class="thumbnail span8">
            <!-- post title -->

            <img width="760" height="290" src="{{ asset(env('THEME')) }}/images/blog/{{ $article->img->max }}" class="attachment-blog_libra_big wp-post-image" alt="23"/>
            <!-- post meta -->
            <h1 class="post-title">
                <a href="#">{{ $article->title }}</a>
            </h1>
        </div>

        <div class="clear"></div>
        <!-- post content -->
        <div class="the-content single span8 group">
            <p>
                {!! $article->text !!}
            </p>

            <p>
                <span class="author">Posted by <a href="#" title="{{ $article->title }}" rel="author"> {{ $article->user->name }}</a></span>
                                    <span class="categories"> in <a href="{{ route('articlesCat',['cat_alias'=>$article->category->alias]) }}" title="View all posts in {{ $article->category->title }}" rel="category tag">{{ $article->category->title }}</a></span>

            </p>

        </div>

        <div class="clear"></div>


    </div>

    <!-- START COMMENTS -->
    <div id="comments">
        <div id="respond">
            <h3 id="reply-title">Leave a <span>Reply</span>
                <small>
                    <a rel="nofollow" id="cancel-comment-reply-link" href="/libra/2012/11/20/nice-clean-the-best-for-your-blog/#respond" style="display:none;">Cancel
                        reply</a></small>
            </h3>
            <form action="#" method="post" id="commentform">
                <div class="row"><p class="comment-form-author span3">
                        <label class="hide-label" for="author">Name</label><i class="icon-user"></i><input id="author" name="author" type="text" value="" size="30" aria-required='true'/>
                    </p>

                    <p class="comment-form-email  span3">
                        <label class="hide-label" for="email">Email</label><i class="icon-envelope"></i><input id="email" name="email" type="text" value="" size="30" aria-required='true'/>
                    </p>

                    <p class="comment-form-url  span3">
                        <label class="hide-label" for="url">Website</label><i class="icon-globe"></i><input id="url" name="url" type="text" value="" size="30"/>
                    </p>

                    <p class="comment-form-comment span9"><label class="hide-label" for="comment">Your
                            comment</label><i class="icon-pencil"></i><textarea id="comment" name="comment" cols="45" rows="8"></textarea>
                    </p>

                    <div class="clear"></div>
                    <div class="span9">
                        <p class="form-submit">
                            <input name="submit" type="submit" id="commentsubmit" value="Post Comment"/>
                            <input type='hidden' name='comment_post_ID' value='147' id='comment_post_ID'/>
                            <input type='hidden' name='comment_parent' id='comment_parent' value='0'/>
                        </p>

                    </div>
                </div>
            </form>
        </div>
        <!-- #respond -->
    </div>
    @endif
    <!-- END COMMENTS -->

</div>