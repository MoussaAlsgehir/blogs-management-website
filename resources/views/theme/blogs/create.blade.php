@section('title', 'Add New Blog')
@extends('theme.master')
@section('content')
    @include('theme.partials.hero', ['title' => 'Add New Blog'])

    <!-- ================ contact section start ================= -->
    <section class="section-margin--small section-margin">
        <div class="container">

            <div class="row">
                <div class="col-12">
                    <form action="{{ route('blogs.store') }}" class="form-contact contact_form" method="post" id="contactForm"
                        novalidate="novalidate" enctype="multipart/form-data">
                        @csrf

                        @if (session('successNewBlog'))
                            <div class="alert alert-success">
                                {{ session('successNewBlog') }}
                            </div>
                        @endif
                        
                        <div class="form-group">
                            <input class="form-control border" name="name" id="name" type="text"
                                placeholder="Enter your title" value="{{ old('name') }}">
                            @error('name')
                                <span style="color: red">{{ $message }}</span>
                            @enderror

                        </div>

                        <div class="form-group">
                            <input class="form-control border" name="image" id="image" type="file"
                                placeholder="Upload image" value="{{ old('image') }}">
                            @error('image')
                                <span style="color: red">{{ $message }}</span>
                            @enderror

                        </div>

                        <div class="form-group">
                            <select class="form-control border" name="category_id" id="category_id"
                                placeholder="Select category" value="{{ old('category_id') }}">
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <span style="color: red">{{ $message }}</span>
                            @enderror

                        </div>


                        <div class="form-group">
                            <textarea class="w-100 border" rows="5" name="description" id="description" placeholder="Enter your description">{{ old('description') }}</textarea>
                            @error('description')
                                <span style="color: red">{{ $message }}</span>
                            @enderror

                        </div>

                        <div class="form-group text-center text-md-right mt-3">
                            <button type="submit" class="button button--active button-contactForm">Add Blog</button>
                        </div>

                    </form>

                </div>

            </div>
        </div>
    </section>
    <!-- ================ contact section end ================= -->

@endsection
