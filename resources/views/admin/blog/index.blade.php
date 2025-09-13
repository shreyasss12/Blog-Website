@extends('layout.admin-master')

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Blogs</h1>

        <!-- Flash Messages -->
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <!-- Blogs Table -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">All Blogs</h6>
                <a href="{{ route('blogs.create') }}" class="btn btn-primary btn-sm">+ Add Blog</a>
            </div>
            <div class="card-body">
                @if ($blogs->count())
                    <div class="row">
                        @foreach ($blogs as $blog)
                            <div class="col-md-6 col-lg-4 mb-4">
                                <div class="card h-100 shadow-sm border-0">
                                    @if ($blog->cover_image)
                                        <img src="{{ asset('storage/' . $blog->cover_image) }}" class="card-img-top"
                                            alt="Cover Image" style="height: 180px; object-fit: cover;">
                                    @else
                                        <div class="bg-light d-flex align-items-center justify-content-center"
                                            style="height: 180px;">
                                            <span class="text-muted">No Image</span>
                                        </div>
                                    @endif

                                    <div class="card-body d-flex flex-column">
                                        <h5 class="card-title text-primary">{{ $blog->title }}</h5>
                                        <p class="card-text text-muted">
                                            {{ Str::limit($blog->content, 100) }}
                                        </p>

                                        <div class="mt-auto">
                                            <span
                                                class="badge {{ $blog->is_active ? 'badge-success' : 'badge-secondary' }}">
                                                {{ $blog->is_active ? 'Active' : 'Inactive' }}
                                            </span>
                                            <small class="text-muted d-block mt-1">
                                                {{ $blog->created_at->format('d M, Y') }}
                                            </small>
                                        </div>
                                    </div>

                                    <div class="card-footer bg-white d-flex justify-content-between">
                                        <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-sm btn-warning"
                                            title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="{{ route('blogs.delete', $blog->id) }}" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure you want to delete this blog?');"
                                            title="Delete">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-muted">No blogs found.</p>
                @endif
            </div>
        </div>

    </div>
@endsection
