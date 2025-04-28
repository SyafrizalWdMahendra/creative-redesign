@props(['studies' => [], 'searchQuery' => []])
<div class="container" data-aos="fade-up" data-aos-delay="100">
    <h2>Search Results for "{{ $searchQuery }}"</h2>

    @if($studies->count() > 0)
        @foreach($studies as $study)
            <div class="portfolio-info mb-3" data-aos="fade-up" data-aos-delay="200">
                <a href="{{ route('study.show', $study->id) }}" class="strecthed-link">
                    <h5>{{ $study->name }}</h5>
                    <p class="card-text text-black">{{ $study->title }}</p>
                </a>
            </div>
        @endforeach
        <div class="d-flex justify-content-center">
            {{ $studies->appends(['query' => $searchQuery])->links() }}
        </div>
    @else
        <div class="alert alert-info">
            No studies found matching your search criteria.
        </div>
    @endif
</div>