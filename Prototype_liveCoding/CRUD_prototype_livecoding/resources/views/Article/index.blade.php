@extends('layouts.admin')

@section('content')
<div class="p-5">
    @if(session('success'))
    <div class="bg-green-500 p-2 raunded mb-4 text-white w-1/2 text-left ">
        {{ session('success') }}
    </div>
@endif
<div class="flex flex-col gap-6">


 
    <form action="{{ route('articles.index') }}" method="GET">
        
        <select name="category" id="category" onchange="this.form.submit()">
            <option value="" {{ request('category') == '' ? 'selected' : '' }}>All</option>
            <option value="sit" {{ request('category') == 'sit' ? 'selected' : '' }}>sit</option>
            <option value="nihil" {{ request('category') == 'nihil' ? 'selected' : '' }}>nihil</option>
            <option value="corrupti" {{ request('category') == 'corrupti' ? 'selected' : '' }}>corrupti</option>
        </select>
    </form>

<table class="w-full border border-gray-300 border-collapse">
    <tr class="text-left bg-gray-100">
        <th class="p-5 border border-gray-300">title</th>
        <th class="p-5 border border-gray-300">category</th>
        <th class="p-5 border border-gray-300">statut</th>
        <th class="p-5 border border-gray-300">date created</th>
        <th class="p-5 border border-gray-300">option</th>
    </tr>

    @foreach ($articles as $article)
        <tr class="p-2">
            <td class="p-3 border border-gray-300">{{ $article->title }}</td>
            <td class="p-3 border border-gray-300">{{ $article->category }}</td>
            <td class="p-3 border border-gray-300">
                <span class="px-2 py-1 rounded-full 
                    {{ $article->statuts == 'published' 
                        ? 'bg-green-100 text-green-700' 
                        : 'bg-yellow-100 text-yellow-700' }}">
                    {{ ucfirst($article->statuts) }}
                </span>
            </td>
            <td class="p-3 border border-gray-300">{{ $article->created_at->format('d/m/Y') }}</td>
            <td class="p-3 border border-gray-300 text-center">
                <form action="{{ route('articles.destroy', $article->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 text-white hover:bg-red-600 p-1 rounded transition transform hover:scale-105 text-xs"
                        onclick="return confirm('Are you sure you want to delete this article?')">
                        Delete
                    </button>
                </form>
            </td>
        </tr>
    @endforeach
</table>



    <div class=" flex justify-center mt-8 w-full">
        {{ $articles->links() }}
    </div>

</div>
</div>

@endsection
