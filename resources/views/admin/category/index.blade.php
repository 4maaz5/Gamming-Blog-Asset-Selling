@extends('layouts.master')

@section('title','View Category')

@section('content')
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="{{ url('admin/delete-category') }}" method="Post">
            @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete Category with its Post</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <input type="hidden" name="category_delete_id" id="category_id">
         <h5>Are you sure you want to delete this category with all its posts. ?</h5>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger">Yes Delete</button>
        </div>
    </form>
      </div>
    </div>
  </div>


<div class="container-fluid px-4">
    <div class="card mt-5">
        <div class="card-header">
<h4>View Category<a href="{{ route('create.category') }}" class="btn btn-primary btn-sm float-end">Add Category</a></h4>
        </div>
        <div class="card-body">
            @if(session()->has('message'))
            <div class="alert alert-success"> {{ session('message') }}</div>
         @endif
<table id="myTable" class="table table-bordered">
<thead>
    <tr>
        <td>ID</td>
        <td>Category Name</td>
        <td>Image</td>
        <td>Status</td>
        <td>Edit</td>
    </tr>
</thead>
<tbody>
    @foreach($category as $key)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $key->name }}</td>
            @if ($key->image)
            <td><img src="{{ asset($key->image) }}" alt="{{ $key->name }} Image"
                    style="width: 60px;height:60px;"></td>
        @endif
            <td>{{ $key->status=='1'?'Hidden':'Shown' }}</td>
            <td>
                <a href="{{ route('edit.category',$key->id) }}" class="btn btn-secondary">Edit</a>&nbsp
                {{-- <a href="{{ route('delete.category',$key->id) }}" class="btn btn-danger">Delete</a> --}}
                <button type="button" class="btn btn-danger deleteCategoryBtn" value="{{ $key->id }}">Delete</button>
            </td>
    @endforeach
</tbody>
</table>

        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
$(document).ready(function(){
$('.deleteCategoryBtn').click(function(e){
    e.preventDefault();
    var category_id=$(this).val();
    $('#category_id').val(category_id);
    $('#deleteModal').modal('show')
})
});

</script>

@endsection
