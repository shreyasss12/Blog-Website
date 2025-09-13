@extends('layout.admin-master')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Create Blog</h1>

    <!-- Validation Errors -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.
            <ul class="mb-0 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Create Blog Form -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Title -->
                <div class="form-group">
                    <label for="title">Title <span class="text-danger">*</span></label>
                    <input type="text" 
                           name="title" 
                           id="title" 
                           class="form-control" 
                           value="{{ old('title') }}" 
                           required>
                </div>

                <!-- Content -->
                <div class="form-group">
                    <label for="content">Content <span class="text-danger">*</span></label>
                    <textarea name="content" 
                              id="content" 
                              rows="5" 
                              class="form-control" 
                              required>{{ old('content') }}</textarea>
                </div>

                <!-- Cover Image -->
                <div class="form-group">
                    <label for="cover_image">Cover Image <span class="text-danger">*</span></label>
                    <input type="file" 
                           name="cover_image" 
                           id="cover_image" 
                           class="form-control-file" 
                           accept="image/*" 
                           required>
                </div>

                <!-- Status -->
                <div class="form-group">
                    <label for="is_active">Status <span class="text-danger">*</span></label>
                    <select name="is_active" id="is_active" class="form-control" required>
                        <option value="1" {{ old('is_active') == '1' ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ old('is_active') == '0' ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary">Create Blog</button>
                <a href="{{ route('blogs.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
