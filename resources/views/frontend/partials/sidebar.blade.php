<div class="card mb-4">
    <div class="card-header">Categories</div>
    <ul class="list-group list-group-flush">
        @foreach ($categories as $cat)
            <li class="list-group-item">
                <a href="{{ route('category.products', $cat->slug) }}">{{ $cat->name }}</a>
            </li>
        @endforeach
    </ul>
</div>
