@extends('admin.dashboard.master')
@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
    <a  href="{{ route('content.index')}}" class="btn btn-primary">Back to main</a>
        <h2>Update post</h2>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br /> 
        @endif
       
        <form method="post" action="{{ route('content.update', $content->id) }}">
            @method('PATCH') 
            @csrf

            <div class="form-group">    
              <label for="title">Title</label>
              <input type="text" class="form-control" name="title" value="{{$content->title}}"/>
          </div>

          <div class="form-group">
              <label for="content">Content</label>
              <textarea  class="form-control froala" name="content">
              {{ $content->content }}
              </textarea>
          </div>

          <div class="form-group">
              <label for="section">Section:</label>
              <select name="section">
              @for ($i = 0; $i < count($sections); $i++)
                  <option value="{{ $sections[$i] }}" {{ $content->section == $sections[$i] ? 'selected' : '' }}>{{ $sections[$i] }}</option>
              @endfor
              </select>
          </div>
          <div class="form-group">
              <label for="image">Image path:</label>
              <input type="text" class="form-control" name="image" value="{{ $content->image }}"/>
          </div>
          <div class="form-group">
              <label for="active">Active</label>
              <input type="checkbox" class="form-control" name="active" value="1"  {{ $content->active == 1 ? 'checked' : '' }}/>
          </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
<!-- Initialize the editor. -->
<script>
  new FroalaEditor('textarea');
</script>
@endsection