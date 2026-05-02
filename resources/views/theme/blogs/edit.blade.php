@section('title', 'Edit Blog')
@extends('theme.master')
@section('content')
    @include('theme.partials.hero', ['title' => $blog->name])

    <!-- ================ contact section start ================= -->
    <section class="section-margin--small section-margin">
        <div class="container">

            <div class="row">
                <div class="col-12">
                    <form action="{{ route('blogs.update',['blog'=>$blog]) }}" class="form-contact contact_form" method="post" id="contactForm"
                        novalidate="novalidate" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        @if (session('successEditBlog'))
                            <div class="alert alert-success">
                                {{ session('successEditBlog') }}
                            </div>
                        @endif

                        <div class="form-group">
                            <input class="form-control border" name="name" id="name" type="text"
                                placeholder="Enter your title" value="{{ $blog->name }}">
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
                                placeholder="Select category" value="{{ $blog->category_id }}">
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $blog->category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <span style="color: red">{{ $message }}</span>
                            @enderror

                        </div>


                        <div class="form-group">
                            <textarea class="w-100 border" rows="5" name="description" id="description" placeholder="Enter your description">{{ $blog->description }}</textarea>
                            @error('description')
                                <span style="color: red">{{ $message }}</span>
                            @enderror

                        </div>

                        <div class="form-group text-center text-md-right mt-3">
                            <button type="submit" class="button button--active button-contactForm">Edit Blog</button>
                        </div>


                    </form>

                </div>

            </div>
        </div>
    </section>
    <!-- ================ contact section end ================= -->

@endsection
