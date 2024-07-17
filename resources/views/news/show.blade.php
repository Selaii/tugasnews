<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $news->headline }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 text-center">
                    <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->headline }}" class="mx-auto" style="width: 500px; height: auto; object-fit: cover;">
                    <p>{{ $news->text }}</p>
                </div>

                <div class="p-6 border-t">
                    <form method="POST" action="{{ route('news.comment', $news) }}">
                        @csrf
                        <div>
                            <label for="comment" class="block font-medium text-sm text-gray-700">Comment</label>
                            <textarea id="comment" name="body" required class="mt-1 block w-full border-gray-300 rounded-md"></textarea>
                        </div>

                        <div class="mt-6">
                            <button type="submit" class="bg-blue-500 text-black rounded-md px-4 py-2">Add Comment</button>
                        </div>
                    </form>

                    <div class="mt-4">
                        <h3 class="font-semibold">Comments:</h3>
                        @foreach ($news->comments as $comment)
                            <div class="mt-2">
                                <p>{{ $comment->body }}</p>
                                <small class="text-gray-500">Commented by: {{ $comment->user->name }}</small>

                                @if (Auth::check() && Auth::id() === $comment->user_id)
                                    <button class="text-blue-500 mt-2 edit-button" data-comment-id="{{ $comment->id }}">Edit</button>

                                    <div class="edit-form hidden mt-2" id="edit-form-{{ $comment->id }}">
                                        <form method="POST" action="{{ route('comments.update', $comment) }}">
                                            @csrf
                                            @method('PUT')
                                            <input type="text" name="body" value="{{ $comment->body }}" required class="border rounded-md">
                                            <button type="submit" class="text-blue-500">Update</button>
                                        </form>
                                    </div>

                                    <form method="POST" action="{{ route('comments.destroy', $comment) }}" class="mt-2">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500">Delete</button>
                                    </form>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('.edit-button').forEach(button => {
            button.addEventListener('click', () => {
                const commentId = button.getAttribute('data-comment-id');
                const editForm = document.getElementById('edit-form-' + commentId);
                editForm.classList.toggle('hidden');
            });
        });
    </script>
</x-app-layout>
