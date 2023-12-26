
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
                <h4>Add Asset
                </h4>
            </div>

            <div class="card-body">
                <form action="{{ route('store.asset') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="">Asset Title</label>
                        <input type="text" class="form-control" name="title" placeholder="Asset Title">
                    </div>
                    <div class="mb-3">
                        <label for="">Asset Description</label>
                        <textarea type="text" class="form-control" rows="3" name="description" id="mysummernote"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="">Slug</label>
                        <input type="text" class="form-control" name="slug" placeholder="slug">
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
                        <input type="text" class="form-control" rows="3" name="price" placeholder="Price">
                    </div>
                    @php
                        $category=App\Models\Category::where('navbar_status','0')->where('status','0')->get();
                        @endphp
                        <div class="mb-3">
                            <select class="form-control" name="status">
                        @foreach ($category as $key)
                        <option>{{ $key->name }}</option>
                    @endforeach
                </select>
                    </div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary">Save Asset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

