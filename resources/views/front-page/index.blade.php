@extends('layout.front-end')

@section('style')
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f3f4f6;
            min-height: 100vh;
        }

        .blog-card {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .blog-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        .blog-card img {
            height: 200px;
            object-fit: cover;
        }

        .blog-modal-img {
            width: 860px;
            height: 160px;
            object-fit: contain;
        }
    </style>
@endsection

@section('content')
    <div class="container py-5">
        <!-- Blog Posts Grid -->
        <div class="row g-4">
            @forelse ($blogs as $blog)
                <div class="col-md-6 col-lg-4">
                    <div class="card blog-card h-100 shadow-sm border-0">
                        <img src="{{ asset('storage/' . $blog->cover_image) }}" class="card-img-top" alt="{{ $blog->title }}"
                            onerror="this.onerror=null;this.src='https://placehold.co/800x600/0d6efd/ffffff?text=Image+Unavailable'">

                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $blog->title }}</h5>
                            <p class="card-text text-muted small mb-2">
                                By {{ $blog->creator->name ?? 'Admin' }} | {{ $blog->created_at->format('M d, Y') }}
                            </p>
                            <p class="card-text flex-grow-1">
                                {{ Str::limit(strip_tags($blog->content), 120, '...') }}
                            </p>

                            <!-- Button triggers modal -->
                            <button class="btn btn-primary mt-auto" data-bs-toggle="modal"
                                data-bs-target="#blogModal{{ $blog->id }}">
                                Read More
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="blogModal{{ $blog->id }}" tabindex="-1"
                    aria-labelledby="blogModalLabel{{ $blog->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="blogModalLabel{{ $blog->id }}">{{ $blog->title }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <img src="{{ asset('storage/' . $blog->cover_image) }}"
                                    class="img-fluid blog-modal-img mb-3" alt="{{ $blog->title }}"
                                    onerror="this.onerror=null;this.src='https://placehold.co/800x400/0d6efd/ffffff?text=Image+Unavailable'">
                                <p class="text-muted small mb-3">
                                    By {{ $blog->createdBy->name ?? 'Admin' }} | {{ $blog->created_at->format('M d, Y') }}
                                </p>
                                <div class="blog-content">
                                    {!! nl2br(e($blog->content)) !!}
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p class="text-muted">No blog posts available.</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection
