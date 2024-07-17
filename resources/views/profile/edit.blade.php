<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form method="POST" action="{{ route('profile.update') }}">
                    @csrf
                    @method('PUT')

                    <div class="p-6">
                        @if (session('status'))
                        <div class="bg-green-500 text-black p-4 rounded">
                            {{ session('status') }}
                        </div>

                        @endif

                        <div>
                            <label for="name" class="block font-medium text-sm text-gray-700">Name</label>
                            <input id="name" type="text" name="name" value="{{ old('name', $user->name) }}" required autofocus class="mt-1 block w-full border-gray-300 rounded-md">
                        </div>

                        <div class="mt-4">
                            <label for="email" class="block font-medium text-sm text-gray-700">Email</label>
                            <input id="email" type="email" name="email" value="{{ old('email', $user->email) }}" required class="mt-1 block w-full border-gray-300 rounded-md">
                        </div>

                        <div class="mt-6">
                            <button type="submit" class="bg-blue-500 text-black rounded-md px-4 py-2">Update Profile</button>
                        </div>
                    </div>
                </form>

                <div class="p-6 border-t">
                    <form method="POST" action="{{ route('profile.destroy') }}">
                        @csrf
                        @method('DELETE')

                        <div>
                            <label for="password" class="block font-medium text-sm text-gray-700">Password</label>
                            <input id="password" type="password" name="password" required class="mt-1 block w-full border-gray-300 rounded-md">
                        </div>

                        <div class="mt-6">
                            <button type="submit" class="bg-red-500 text-black rounded-md px-4 py-2">Delete Account</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
