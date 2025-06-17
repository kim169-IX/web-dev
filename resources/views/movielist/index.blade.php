@extends('layouts.main')

@section('content')
<div class="container mx-auto px-4 pt-8">
    <section aria-labelledby="categories-heading" class="movie-genres">
        <h2 id="categories-heading" class="text-orange-400 uppercase tracking-wide text-2xl font-semibold mb-8 text-center sm:text-left">
            Movie Categories
        </h2>

        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-6">
            @foreach($genres as $genre)
                <div
                    class="genre-card bg-gray-900 rounded-lg p-5 flex items-center justify-center shadow-md hover:shadow-lg hover:bg-orange-500 transition duration-300 ease-in-out cursor-pointer"
                    role="link"
                    tabindex="0"
                    data-url="{{ route('movielist.show', $genre['id']) }}">
                    <span class="text-gray-200 hover:text-white text-base font-semibold select-none">
                        {{ $genre['name'] }}
                    </span>
                </div>
            @endforeach
        </div>
    </section>
</div>

<script>
    document.querySelectorAll('.genre-card').forEach(card => {
        card.addEventListener('click', () => {
            window.location = card.dataset.url;
        });
        card.addEventListener('keydown', (event) => {
            if (event.key === 'Enter' || event.key === ' ') {
                window.location = card.dataset.url;
            }
        });
    });
</script>
@endsection
