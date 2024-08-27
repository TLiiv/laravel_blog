@extends('layout')
@section('content')
<section class="px-6 py-6">
   <main class="max-w-lg mx-auto mt-10">
    <x-panel>
    <h1 class="text-center font-bold text-xl">Log In</h1>
    <form method="POST" action="/sessions" class="mt-10">
        @csrf

        <x-form.input name="email" type="email" autocomplete="username"/>
        <x-form.input name="password" type="password" autocomplete="new-password"/>
        <div class="mt-6">
        <x-submit-button >Log In</x-submit-button>
    </div>
    </form>
</x-panel>
   </main>
</section>
@endsection
