<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create News') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form method="POST" action="{{ route('news.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="p-6">
                        <div>
                            <label for="headline" class="block font-medium text-sm text-gray-700">Headline</label>
                            <input id="headline" type="text" name="headline" required class="mt-1 block w-full border-gray-300 rounded-md">
                        </div>

                        <div class="mt-4">
                            <label for="image" class="block font-medium text-sm text-gray-700">Image</label>
                            <input id="image" type="file" name="image" required class="mt-1 block w-full border-gray-300 rounded-md">
                        </div>

                        <div class="mt-4">
                            <label for="text" class="block font-medium text-sm text-gray-700">Text</label>
                            <textarea id="text" name="text" required class="mt-1 block w-full border-gray-300 rounded-md"></textarea>
                        </div>

                        <div class="mt-6">
                            <button type="submit" class="bg-blue-500 text-black rounded-md px-4 py-2">Create News</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
