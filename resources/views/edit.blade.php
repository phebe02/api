<!-- resources/views/themes/edit.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Theme') }}
        </h2>
    </x-slot>

    <div class="container mx-auto mt-8">
        <h1>Edit Theme</h1>
        
        <form action="{{ route('updateTheme', $theme->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="theme" class="block text-gray-700 text-sm font-bold mb-2">Theme:</label>
                <input type="text" name="theme" id="theme" value="{{ old('theme', $theme->theme) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                @error('theme')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Update Theme
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
