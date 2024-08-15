@extends('layout')

@section('content')
    <section class="py-8 max-w-md mx-auto">
        <h1 class="text-lg font-bold mb-4">Publish New Post</h1>
    <x-panel >
       <form action="/admin/posts" method="post" enctype="multipart/form-data">
       @csrf
       <div class="mb-6">
        <label class="block-mb2 uppercase font-bold text-xs text-gray-700" for="title">
            Title
        </label>
        <input
        class="border border-gray-400 p-2 w-full"
        type="text" name="title" id="title" required  value="{{old('title')}}"/>
        @error('title')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
    @enderror
    </div>


    <div class="mb-6">
        <label class="block-mb2 uppercase font-bold text-xs text-gray-700" for="slug">
            Slug
        </label>
        <input
        class="border border-gray-400 p-2 w-full"
        type="slug"
        name="slug"
        id="slug"
        value="{{old('slug')}}"
        required/>
        @error('slug')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
    @enderror
    </div>

    <div class="mb-6">
        <label class="block-mb2 uppercase font-bold text-xs text-gray-700" for="thumbnail">
            Thumbnail
        </label>
        <input
        class="border border-gray-400 p-2 w-full"
        type="file" name="thumbnail" id="thumbnail" required  value="{{old('thumbnail')}}"/>
        @error('title')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
    @enderror
    </div>

        <div class="mb-6">
            <label class="block-mb2 uppercase font-bold text-xs text-gray-700" for="excerpt">
               Excerpt
            </label>
            <textarea class="border border-gray-400 p-2 w-full"  name="excerpt" id="excerpt" cols="30" rows="10">
                {{old('excerpt')}}
            </textarea>
            @error('excerpt')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
        </div>


    <div class="mb-6">
        <label class="block-mb2 uppercase font-bold text-xs text-gray-700" for="body">
           Body
        </label>
        <textarea class="border border-gray-400 p-2 w-full"  name="body" id="body" cols="30" rows="10">{{old('body')}}</textarea>
        @error('body')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
    @enderror
    </div>


<div class="mb-6">
<label class="block-mb2 uppercase font-bold text-xs text-gray-700" for="category" >
   Category
</label>
<select name="category_id" id="category_id">

    @foreach (\App\Models\Category::all() as $category )
    <option value="{{$category->id}}" {{old('category_id')==$category->id ?'selected' :''}}>{{ucwords($category->name)}}</option>

    @endforeach
</select>
@error('category')
<p class="text-red-500 text-xs mt-1">{{$message}}</p>
@enderror
</div>

    <x-submit-button>Publish</x-submit-button>
    </form>
</x-panel>
    </section>
@endsection

