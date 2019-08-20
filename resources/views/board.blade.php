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
                  <a class="mr-2">Jared</a>
                  <span>4h</span>
                </div>
                <div class="col-12 col-md-7 d-flex align-items-center">
                  <div class="board-metaactions w-100 mt-3 mt-md-0">
                    <ul class="float-md-right float-sm-left">
                      <li>
                        <a class="board-metaactions-item mr-3"><i class="fas fa-thumbs-up font-size-22 mr-1"></i>13.2k</a>
                      </li>
                      <li>
                        <a class="board-metaactions-item mr-3"><i class="fas fa-thumbs-down font-size-22 mr-1"></i>12.4k</a>
                      </li>
                      <li>
                        <a class="board-metaactions-item"><i class="fas fa-comments font-size-22 mr-1"></i>12.4k</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12 mt-3">
                  <div class="board-metatags">
                    <span class="mr-3">Tags:</span>
                    <ul>
                      <li><a class="board-metatags-item mr-2">hi</a></li>
                      <li><a class="board-metatags-item mr-2">hi</a></li>
                      <li><a class="board-metatags-item mr-2">hi</a></li>
                      <li><a class="board-metatags-item mr-2">hi</a></li>
                      <li><a class="board-metatags-item mr-2">hi</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      @endforeach

      <div class="area-block">
        <div class="board-item">
          <img class="board-image" src="https://raw.githubusercontent.com/aajaredc/PokeWalkerSimulator/master/screenshots/PokeWalkerSimulator_Setup.PNG" alt="test"/>
          <div class="board-metapanel">
            <div class="row">
              <div class="col-12 col-md-5">
                <a class="mr-2">
                  <img class="board-metapanel-userimage" src="{{ URL::asset('images/kiko-1.png') }}" />
                </a>
                <a class="mr-2">Jared</a>
                <span>4h</span>
              </div>
              <div class="col-12 col-md-7 d-flex align-items-center">
                <div class="board-metaactions w-100 mt-3 mt-md-0">
                  <ul class="float-md-right float-sm-left">
                    <li>
                      <a class="board-metaactions-item mr-3"><i class="fas fa-thumbs-up font-size-22 mr-1"></i>13.2k</a>
                    </li>
                    <li>
                      <a class="board-metaactions-item mr-3"><i class="fas fa-thumbs-down font-size-22 mr-1"></i>12.4k</a>
                    </li>
                    <li>
                      <a class="board-metaactions-item"><i class="fas fa-comments font-size-22 mr-1"></i>12.4k</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12 mt-3">
                <div class="board-metatags">
                  <span class="mr-3">Tags:</span>
                  <ul>
                    <li><a class="board-metatags-item mr-2">hi</a></li>
                    <li><a class="board-metatags-item mr-2">hi</a></li>
                    <li><a class="board-metatags-item mr-2">hi</a></li>
                    <li><a class="board-metatags-item mr-2">hi</a></li>
                    <li><a class="board-metatags-item mr-2">hi</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


    </div>
  </div>

  @foreach ($posts as $post)
    {{ $post->image }}
  @endforeach

@endsection
