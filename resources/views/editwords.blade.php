<!-- resources/views/words/edit.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Word') }}
        </h2>
    </x-slot>

    <div class="container mx-auto mt-8">
        <h1>Edit word</h1>
        
        <form action="{{ route('updateWord', $word->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="word" class="block text-gray-700 text-sm font-bold mb-2">Word:</label>
                <input type="text" name="word" id="word" value="{{ old('word', $word->word) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                @error('word')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="theme_id" class="block text-gray-700 text-sm font-bold mb-2">Themes:</label>
                <select name="theme_id[]" id="theme_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" multiple required>
                    @foreach ($themes as $theme)
                        <option value="{{ $theme->id }}" {{ in_array($theme->id, $selectedThemeIds) ? 'selected' : '' }}>
                            {{ $theme->theme }}
                        </option>
                    @endforeach
                </select>
                @error('theme_id')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Update word
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
