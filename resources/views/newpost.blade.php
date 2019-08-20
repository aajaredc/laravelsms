@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('New Post') }}</div>

                <div class="card-body">
                    <form method="POST" action="/newpost" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>

                            <div class="col-md-6">
                                <input id="image" type="file" class="@error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" requiredautofocus>

                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                          <label for="tags" class="col-md-4 col-form-label text-md-right">{{ __('Tags') }}</label>

                          <div class="col-md-6">
                            <input id="tags" class="form-control" name="tags" data-role="tagsinput"/>
                          </div>
                        </div>

                        <div class="form-group row">
                          <div class="col-md-6">
                            <input type="submit" />
                          </div>
                        </div>

                        <img src="{{ URL::asset('storage/posts/8fCsy7XmeWjk1HZ7xsnRu4oLMJ6QXX0p7MCJaS2B.png') }}" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
