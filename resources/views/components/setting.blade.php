@props(['heading'])

@section('content')
<section class="py-8 max-w-2xl mx-auto">
    <h1 class="text-lg font-bold mb-8 pb-2 border-b">{{$heading}}</h1>
<div class="flex">
    <aside class="w-48">
        <h4 class="font-semibold mb-4">Links</h4>
        <ul>
            <li>
                <a href="/admin/dashboard" class="{{request()->is('admin/dashboard') ? 'text-blue-500' : ''}}">Dashboard</a>
            </li>
            <li>
                <a href="/admin/posts/create" class="{{request()->is('admin/posts/create') ? 'text-blue-500' : ''}}">New Post</a>
            </li>
        </ul>
    </aside>
</div>
    <main class="flex-1">
<x-panel >
   {{$slot}}
</x-panel>
</main>
</section>
@endsection
