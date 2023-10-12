<!-- Para que Laravel sepa que los formularios son generados por él mismo -->
@csrf

<label class="uppercase text-gray-700 text-sx">Título</label>
<input type="text" name="title" class="rounded border-gray-200 w-full mb-4" value="{{ $post->title }}">

<label class="uppercase text-gray-700 text-sx">Contenido</label>
<textarea name="body" id="" rows="10" class="rounded border-gray-200 w-full mb-4">{{ $post->body }}</textarea>

<div class="flex justify-between items-center">
    <a href="{{ route('posts.index') }}" class="text-indigo-600">Volver</a>

    <input type="submit" value="Guardar" class="bg-gray-800 text-white rounded px-4 py-2">
</div>