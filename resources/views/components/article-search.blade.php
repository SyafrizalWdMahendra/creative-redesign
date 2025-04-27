@props(['articles' => [], 'searchQuery' => []])
<div class="container" data-aos="fade-up" data-aos-delay="100">
    <h2>Search Results for "{{ $searchQuery }}"</h2>

    @if($articles->count() > 0)
        @foreach($articles as $article)
            <div class="portfolio-info mb-3" data-aos="fade-up" data-aos-delay="200">
                <a href="{{ route('article.show', $article->id) }}" class="strecthed-link">
                    <h5>{{ $article->title }}</h5>
                    <p class="card-text text-black">{{ $article->description }}</p>
                </a>
            </div>
        @endforeach
        <div class="d-flex justify-content-center">
            {{ $articles->appends(['query' => $searchQuery])->links() }}
        </div>
    @else
        <div class="alert alert-info">
            No articles found matching your search criteria.
        </div>
    @endif
</div>