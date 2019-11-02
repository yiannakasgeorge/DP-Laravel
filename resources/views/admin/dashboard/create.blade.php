@extends('admin.dashboard.master')
@section('main')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
 <a  href="{{ route('content.index')}}" class="btn btn-primary">Back to main</a>
    <h3 >Add new post</h3>
  <div>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
   
    
      <form method="post" action="{{ route('content.store') }}">
          @csrf
          <div class="form-group">    
              <label for="title">Title</label>
              <input type="text" class="form-control" name="title"/>
          </div>

          <div class="form-group">
              <label for="content">Content</label>
              <textarea  class="form-control froala" name="content">
            
              </textarea>
          </div>

          <div class="form-group">
              <label for="section">Section:</label>
              <select name="section">
              @for ($i = 0; $i < count($sections); $i++)
                  <option value="{{ $sections[$i] }}">{{ $sections[$i] }}</option>
              @endfor
              </select>
          </div>
          <div class="form-group">
              <label for="image">Image path:</label>
              <input type="text" class="form-control" name="image"/>
          </div>
          <div class="form-group">
              <label for="active">Active</label>
              <input type="checkbox" class="form-control" name="active" />
          </div>
                          
          <button type="submit" class="btn btn-primary">Add post</button>
      </form>
  </div>
</div>
</div>
<!-- Initialize the editor. -->
<script>
  new FroalaEditor('textarea');
</script>
@endsection

