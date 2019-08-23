@extends('layouts/main')

@section('title')

  <hi>Welcome to Laravel</hi>

@endsection

@section('content')


  <div class="row">
    <!-- Popular tags -->
    {{-- <div class="col-lg-3">
      <div class="area-block px-4 py-3">
        <p class="font-size-20">Popular Tags</p>
        <hr />
        <ul class="popular-tags-list">
          <a class="popular-tags-item">Spice</a>
          <a class="popular-tags-item">Cats</a>
          <a class="popular-tags-item">Funny</a>
          <a class="popular-tags-item">Music</a>
          <a class="popular-tags-item">Shopping Carts</a>
          <a class="popular-tags-item">Food</a>
          <a class="popular-tags-item">Video Games</a>
          <a class="popular-tags-item">Integrity</a>
        </ul>
      </div>
    </div> --}}
    <!-- Area with the pictures ("board") -->
    <div class="col-lg-6 offset-md-3">
      @foreach ($posts as $post)
        <div class="area-block mb-4">
          <div class="board-item">
            <img class="board-image" src="{{ URL::asset($post->path) }}" alt="test"/>
            <div class="board-metapanel">
              <div class="row">
                <div class="col-12 col-md-5">
                  <a class="mr-2">
                    <img class="board-metapanel-userimage" src="{{ URL::asset('images/kiko-1.png') }}" />
                  </a>
                  <a class="mr-2">{{ DB::table('users')->where('id', $post->user_id)->value('username') }}</a>
                  <span>4h</span>
                </div>
                <div class="col-12 col-md-7 d-flex align-items-center">
                  <div class="board-metaactions w-100 mt-3 mt-md-0">
                    <ul class="float-md-right float-sm-left">
                      <li>
                        <a id="like" class="
                          @php
                              if (is_null(DB::table('post_ratings')->where('post_id', $post->id)->where('rating', 1)->first())) {
                                echo 'board-metaactions-item';
                              } else {
                                echo 'board-metaactions-item-clicked';
                              }
                          @endphp
                          mr-3" data-id="{{ $post->id }}"><i class="fas fa-thumbs-up font-size-22 mr-1"></i>
                          {{ DB::table('post_ratings')->where('post_id', $post->id)->where('rating', 1)->count() }}
                        </a>
                      </li>
                      <li>
                        <a id="dislike" class="
                          @php
                              if (is_null(DB::table('post_ratings')->where('post_id', $post->id)->where('rating', 0)->first())) {
                                echo 'board-metaactions-item';
                              } else {
                                echo 'board-metaactions-item-clicked';
                              }
                          @endphp
                          mr-3" data-id="{{ $post->id }}"><i class="fas fa-thumbs-up font-size-22 mr-1"></i>
                          {{ DB::table('post_ratings')->where('post_id', $post->id)->where('rating', 0)->count() }}
                        </a>
                      </li>
                      <li>
                        <a id="comment" class="board-metaactions-item" data-id="{{ $post->id }}"><i class="fas fa-comments font-size-22 mr-1"></i>12.4k</a>
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
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>

@endsection

@section('additionalscripts')
  <script src="{{ asset('js/rating.js') }}"></script>
@endsection
