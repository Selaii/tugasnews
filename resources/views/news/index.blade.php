<x-app-layout>
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold">Latest News</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4 mt-4">
            @foreach($news as $newsItem)
                <div class="border rounded-lg bg-white shadow-md transition-shadow duration-300 transform hover:scale-105 hover:shadow-xl p-4 flex flex-col">
                    <a href="{{ route('news.show', $newsItem) }}" class="text-center flex-1">
                        <h2 class="text-2xl font-bold">{{ $newsItem->headline }}</h2>
                        <img src="{{ asset('storage/' . $newsItem->image) }}" alt="{{ $newsItem->headline }}" class="mx-auto my-4" style="width: 100%; height: auto; object-fit: cover;">
                        <p class="mt-2">{{ Str::limit($newsItem->text, 100, '...') }}</p>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
