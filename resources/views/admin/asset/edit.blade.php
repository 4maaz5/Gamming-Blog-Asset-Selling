
@section('content')
@extends('layouts.master')

@section('title', 'Add Asset')

@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-4">
            @if($errors->any())
            <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
            @endforeach
            </div>
            @endif
            <div class="card-header">
                <h4>Edit Asset
                </h4>
            </div>

            <div class="card-body">
                <form action="{{ route('update.asset',$edit->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="">Asset Title</label>
                        <input type="text" class="form-control" name="title" placeholder="Asset Title" value="{{ $edit->title }}">
                    </div>
                    <div class="mb-3">
                        <label for="">Asset Description</label>
                        <textarea type="text" class="form-control" rows="3" name="description" id="mysummernote">{{ $edit->description }}</textarea>
                    </div>
                    <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="">Main Image</label>
                        <input type="file" class="form-control" placeholder="Image" name="image">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="">Image</label>
                        <input type="file" class="form-control" placeholder="Image" name="imageone">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="">Image</label>
                        <input type="file" class="form-control" placeholder="Image" name="imagetwo">
                    </div>
                    </div>
                    <div class="mb-3">
                        <label for="">Price</label>
                        <input type="text" class="form-control" name="price" placeholder="Price" value="{{ $edit->price }}">
                    </div>
                    <div class="mb-3">
                     <select class="form-control" name="status">
                        <option>Paid</option>
                        <option>Free</option>
                        </select>
                    </div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary">Update Asset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

