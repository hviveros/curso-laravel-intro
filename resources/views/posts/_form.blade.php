<!-- Para que Laravel sepa que los formularios son generados por él mismo -->
@csrf

<label class="uppercase text-gray-700 text-sx">Título</label>

<!-- mensaje de error -->
<span class="text-xs text-red-600"> @error('title') {{ $message }} @enderror </span>

<input type="text" name="title" class="rounded border-gray-200 w-full mb-4" value="{{ old('title', $post->title) }}">

<label class="uppercase text-gray-700 text-sx">Contenido</label>

<!-- mensaje de error -->
<span class="text-xs text-red-600"> @error('body') {{ $message }} @enderror </span>

<textarea name="body" id="" rows="10" class="rounded border-gray-200 w-full mb-4">{{ old('body', $post->body) }}</textarea>

<div class="flex justify-between items-center">
    <a href="{{ route('posts.index') }}" class="text-indigo-600">Volver</a>

    <input type="submit" value="Guardar" class="bg-gray-800 text-white rounded px-4 py-2">
</div>