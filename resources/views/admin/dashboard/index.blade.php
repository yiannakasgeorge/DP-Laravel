@extends('admin.dashboard.master')

@section('main')
<div class="row">
<div class="col-sm-12">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div>
  @endif
  <div>
    <a  href="{{ route('content.create')}}" class="btn btn-primary">Add new post</a>
    <a  href="{{ route('admin.logout')}}" class="btn btn-primary">Logout</a>
    </div>  

    @foreach($contentsGrouped as $contentGroup => $contents)
    <h3>Section: {{$contentGroup}}</h3>    
  <table class="table table-striped table-sortable">
    <thead>
        <tr>
          <td>ID</td>
          <td>Title</td>
          <td>Content</td>
          <td>Image</td>
          <td>Section</td>
          <td>Date</td>
          <td>Active</td>
    
        </tr>
    </thead>
    <tbody>
    @foreach ($contents as $content) 
        <tr>
            <td>{{$content->id}}</td>
            <td>{{$content->title}}</td>
            <td>{!!$content->content!!}</td>
            <td>{{$content->image}}</td>
            <td>{{$content->section}}</td>
            <td>{{$content->created_at}}</td>
            <td>
              <input type="checkbox" class="form-control status" data-id="{{$content->id}}" name="active" value="1" {{ $content->active == 1 ? 'checked' : '' }}/>
            </td>

            <td>
                <a href="{{ route('content.edit',$content->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('content.destroy', $content->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
          @endforeach
        
    </tbody>
  </table>
  @endforeach
  <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
</div>
<div>
</div>
@endsection
