@extends('layouts.main')

@section('content')
  <div class="row">
    <div class="col-lg-6 offset-md-3">
      <div class="area-block mb-4">
        <div class="board-item">
          <img class="board-image" src="{{ URL::asset($post->path) }}" alt="test"/>
          <div class="board-metapanel">
            <div class="row">
              <div class="col-12 col-md-5">
                <a class="mr-2">
                  <img class="board-metapanel-userimage" src="{{ URL::asset('images/kiko-1.png') }}" />
                </a>
                <a class="mr-2 opacity-hover">{{ DB::table('users')->where('id', $post->user_id)->value('username') }}</a>
                <span class="opacity-nohover" id="postedTimeAgo"><time class="timeago" datetime="{{ date(DATE_ISO8601, strtotime($post->created_at)) }}"></time></span>
              </div>
              <div class="col-12 col-md-7 d-flex align-items-center">
                <div class="board-metaactions w-100 mt-3 mt-md-0">
                  <ul class="float-md-right float-sm-left">
                    <li>
                      <a id="like" class="
                        @guest
                          @php
                            echo 'board-metaactions-item';
                          @endphp
                        @else
                          @php
                              if (is_null(DB::table('post_ratings')->where('post_id', $post->id)->where('rating', 1)->first())) {
                                echo 'board-metaactions-item';
                              } else {
                                echo 'board-metaactions-item-clicked';
                              }
                          @endphp
                        @endguest
                        mr-3" data-id="{{ $post->id }}"><i class="fas fa-thumbs-up font-size-22 mr-1"></i>
                        <span id="numberOfLikes">{{ DB::table('post_ratings')->where('post_id', $post->id)->where('rating', 1)->count() }}</span>
                      </a>
                    </li>
                    <li>
                      <a id="dislike" class="
                        @guest
                          @php
                            echo 'board-metaactions-item';
                          @endphp
                        @else
                          @php
                              if (is_null(DB::table('post_ratings')->where('post_id', $post->id)->where('rating', 1)->first())) {
                                echo 'board-metaactions-item';
                              } else {
                                echo 'board-metaactions-item-clicked';
                              }
                          @endphp
                        @endguest
                        mr-3" data-id="{{ $post->id }}"><i class="fas fa-thumbs-down font-size-22 mr-1"></i>
                        <span id="numberOfDislikes">{{ DB::table('post_ratings')->where('post_id', $post->id)->where('rating', 0)->count() }}</span>
                      </a>
                    </li>
                    <li>
                      <a id="comment" class="board-metaactions-item" data-id="{{ $post->id }}">
                        <i class="fas fa-comments font-size-22 mr-1"></i>
                        {{ DB::table('post_comments')->where('post_id', $post->id)->count() }}
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12 mt-3">
                <div class="board-metatags">
                  <span class="mr-3">Tags:</span
                  ><ul>
                    @php
                      $tags = explode(',', $post->tags)
                    @endphp
                    @foreach ($tags as $tag)<li><a class="board-metatags-item mr-2">{{ $tag }}</a></li>@endforeach
                  </ul>
                </div>
              </div>
            </div>
            <!-- Comment section -->
            <div class="row">
              <div class="col-12 mt-5">
                <h6>Comments</h6>
                <hr />
              </div>
            </div>
            @foreach ($comments as $comment)
              <div class="board-metapanel-comment-block d-flex">
                <img class="board-metapanel-userimage mr-3" src="{{ URL::asset('images/kiko-1.png') }}" />
                <div class="board-metapanel-comment-block-body d-flex flex-column">
                  <div class="board-metapanel-comment-message">{{{ $comment->text }}}</div>
                  <div class="board-metapanel-comment-info mt-1">
                    <a class="board-metapanel-comment-user opacity-hover" id="comment-user" class="mr-2">{{{ DB::table('users')->where('id', $comment->user_id)->value('username') }}}</a>
                    <span class="opacity-nohover" id="comment-timeago"><time class="timeago" datetime="{{ date(DATE_ISO8601, strtotime($comment->created_at)) }}"></time></span>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
