@extends('layouts.BlogUserMaster')
@extends('summernote.summernote')
@section('title', 'Update Pending Blog - Healthy Botic')
@section('BlogUserContent')

    <div class="pagetitle">
        <h1>Update Pending Article</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('blogusr.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('BlogUser.Insert') }}">Article List</a></li>
                <li class="breadcrumb-item"><a href="{{ route('BlogUser.pendingBlog') }}">Pending Article</a></li>
                <li class="breadcrumb-item active">Update Pending Article</li>

            </ol>
        </nav>
    </div>




@if (Session::get('err'))
  <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert">
      {{ Session::get('err') }}
      <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif
<form action="{{ route('BlogUser.pendingBlogShowUpdate') }}" method="POST" enctype="multipart/form-data">
  @csrf
  <input type="hidden" id="__articleid" name="__articleid" value="{{ $showData->id }}">
  <div class="row mb-3">
      <label for="inputText" class="col-sm-2 col-form-label">Article Name</label>
      <div class="col-sm-10">
          <input type="text" class="form-control" name="__postname" value="{{ $showData->blog_name }}"
          readonly="readonly">
      </div>
  </div>
  <div class="row mb-3">
      <label for="inputText" class="col-sm-2 col-form-label">Article Short Description</label>
      <div class="col-sm-10">
          <input type="text" class="form-control" name="__userEmail" value="{{ $showData->blog_short_desc }}"
          readonly="readonly" >
      </div>
  </div>
  <div class="row mb-3">
      <label for="inputText" class="col-sm-2 col-form-label">Category</label>
      <div class="col-sm-10">
          <input type="text" class="form-control" value="{{ $showData->sub_category_name }}" readonly="readonly">
      </div>
  </div>
  <div class="row mb-3">
    <label for="inputText" class="col-sm-2 col-form-label">Main Category</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" value="{{ $showData->super_category }}" readonly="readonly">
    </div>
</div>
<div class="row mb-3">
    <label for="inputText" class="col-sm-2 col-form-label">Added By</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" value="{{ $showData->username }}" readonly="readonly">
    </div>
</div>
  <div class="row mb-3">
      <label for="inputText" class="col-sm-2 col-form-label">Update time</label>
      <div class="col-sm-10">
          <input type="text" class="form-control" value="{{ $showData->updated_at->diffForHumans() }}"
              readonly="readonly">
      </div>
  </div>
  <div>
    <div class="row mb-3">
        <label for="inputText" class="col-sm-2 col-form-label">Article Description</label>
        <div class="col-sm-10">
            {!!  $showData->description  !!}
        </div>
    </div>
    <div>

  </div>
  <fieldset class="row mb-3">
      <legend class="col-form-label col-sm-2 pt-0">Active Article</legend>
      <div class="col-sm-10">
          <div class="form-check">
              <input class="form-check-input" type="radio" name="__articleActivate" id="__articleActivate" value="0"
                  checked>
              <label class="form-check-label" for="gridRadios1">
                  Active Article
              </label>
          </div>
          <div class="form-check">
              <input class="form-check-input" type="radio" name="__articleActivate" id="__articleActivate" value="3">
              <label class="form-check-label" for="gridRadios2">
                  Block Article
              </label>
          </div>

      </div>
  </fieldset>


  <div class="row mb-3">
      <label class="col-sm-2 col-form-label">Save Article</label>
      <div class="col-sm-10">
          <button type="submit" class="btn btn-primary">Update Article</button>
      </div>
  </div>

</form>


@endsection
