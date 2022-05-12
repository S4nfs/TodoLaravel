<div>
    <div class="flex justify-center pb-4 px-4">
        <h2 class="text-2xl pb-4">Add Steps for tasks</h2>
        <span wire:click="increment" class="bi bi-plus-circle px-2 py-2 cursor-pointer">
    </div>
    @foreach($steps as $list)
    <div class="flex justify-center py-2" wire:key="{{$list}}">
        <input type="text" name="steps[]" class="py-3 px-2 border rounded" placeholder="{{'step '.($list + 1)}}"> 
        {{-- $loop is variable given by laravel only for foreach --}}
        <span wire:click="decrement({{$list}})" class="bi bi-x px-2 text-2xl" style="color:red;">
</div>
        @endforeach
</div>
