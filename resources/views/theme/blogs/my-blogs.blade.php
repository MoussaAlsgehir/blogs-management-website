@section('title', 'My Blogs')
@extends('theme.master')
@section('content')
    @include('theme.partials.hero', ['title' => 'My Blogs'])

    <!-- ================ contact section start ================= -->
    <section class="section-margin--small section-margin">
        <div class="container">

            <div class="row">
                <div class="col-12">
                    @if (session('successDeleteBlog'))
                        <div class="alrt alrt-success">
                            {{ session('successDeleteBlog') }}
                        </div>
                    @endif
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Title</th>
                                <th scope="col" width="15%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($blogs) > 0)
                                @foreach ($blogs as $blog)
                                    <tr>
                                        <td><a href="{{ route('blogs.show', ['blog' => $blog]) }}">
                                                {{ $blog->name }}
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ route('blogs.edit', ['blog' => $blog]) }}"
                                                class="btn btn-sm btn-primary mr-2">Edit</a>
                                            <form action="{{ route('blogs.destroy', ['blog' => $blog]) }}" id="delete_form"
                                                method="post" class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <a href="javascript:$('form#delete_form').submit();"
                                                    class="btn btn-sm btn-danger mr-2">Delete</a>

                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>


            </div>


            
                    <div class="row">
                        <div class="col-lg-12">
                            {{ $blogs->render('pagination::bootstrap-4') }}
                        </div>
                    </div>
        </div>

    </section>
    <!-- ================ contact section end ================= -->

@endsection
