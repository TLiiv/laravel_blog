@props(['trigger'])
<div x-data="{ show: false }" @click.away="show=false">
    {{-- trigger --}}
    <div @click="show = ! show">
        {{$trigger}}
    </div>
{{-- links --}}
    <div x-show="show" class="py-2 absolute bg-gray-200 w-full z-50 mt-2 rounded-xl"style="display:none">
        {{$slot}}
    </div>
</div>
