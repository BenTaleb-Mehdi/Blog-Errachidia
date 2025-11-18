@extends('layouts.admin')

@section('content')
<div class="p-5">
    @if(session('success'))
    <div class="bg-green-500 p-2 raunded mb-4 text-white w-1/2 text-left ">
        {{ session('success') }}
    </div>
@endif
<div class="flex flex-col gap-6">


    {{-- FILTER --}}
    <form action="{{ route('articles.index') }}" method="GET" class="mb-6 ">
        <label for="category" class="block text-sm font-semibold text-gray-700 mb-2 ml-1">Filter by Category</label>
        <select name="category" id="category" onchange="this.form.submit()" class="w-full md:w-64 px-4 py-2 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 bg-white text-gray-700 font-medium hover:border-gray-400 transition duration-200">
            <option value="" {{ request('category') == '' ? 'selected' : '' }}>All Categories</option>
            @foreach($categories as $category)
                <option value="{{ $category->slug }}" {{ request('category') == $category->slug ? 'selected' : '' }}>{{ $category->name }}</option>
            @endforeach
        </select>
    </form>

<table class="w-full border-collapse shadow-lg rounded-lg overflow-hidden bg-white">
    <tr class="text-left bg-gradient-to-r from-blue-500 to-blue-600 text-white">
        <th class="p-4 font-semibold">Title</th>
        <th class="p-4 font-semibold">Categories</th>
        <th class="p-4 font-semibold">Status</th>
        <th class="p-4 font-semibold">Date Created</th>
        <th class="p-4 font-semibold text-center">Actions</th>
    </tr>

    @foreach ($articles as $article)
        <tr class="p-2 border-b border-gray-200 hover:bg-gray-50 transition duration-200">
            <td class="p-4 text-gray-800 font-medium">{{ $article->title }}</td>
            <td class="p-4">
                <div class="flex flex-wrap gap-2">
                    @foreach($article->categories as $category)
                        <span class="inline-block px-3 py-1 rounded-full bg-blue-100 text-blue-700 text-sm font-medium">{{ $category->name }}</span>
                    @endforeach
                </div>
            </td>
            <td class="p-4">
                <span class="px-3 py-1 rounded-full text-sm font-semibold
                    {{ $article->statut == 'published' 
                        ? 'bg-green-100 text-green-700' 
                        : ($article->statut == 'draft' ? 'bg-yellow-100 text-yellow-700' : 'bg-gray-100 text-gray-700') }}">
                    {{ ucfirst($article->statut) }}
                </span>
            </td>
            <td class="p-4 text-gray-600 text-sm">{{ $article->created_at->format('d/m/Y') }}</td>
            <td class="p-4 text-center">
                <form action="{{ route('articles.destroy', $article->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 text-white hover:bg-red-600 px-3 py-2 rounded-lg transition transform hover:scale-105 text-sm font-medium"
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
