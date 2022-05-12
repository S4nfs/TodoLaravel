@extends('todos/layout')
@section('content')
    <div class="text-center py-10 flex justify-center items-center">
        <div class="text-center py-20 ">
            <h1 class="text-4xl">What next you need To-DO</h1>
            <x-Alert />
            <form action="/todos/create" method="post" class="py-5">
                @csrf
                <div class="py-1">
                    <input type="text" name="title" class="py-3 px-2 border rounded" placeholder="Title">
                </div>
                <div class="py-1">
                    <textarea name="description" id="" class="p-2 rounded border" placeholder="Description"></textarea>
                </div>
                <div class="py-1">
                    @livewire('todosteps')
                </div>

                <div class="py-1"><button
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-10 mt-5 rounded-full"
                        type="submit">Create</button>
                </div>
            </form>
            <a href="/todos/"><button
                    class="text-white bg-gradient-to-br from-pink-500 to-orange-400 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800 font-bold py-1 px-5 rounded-full"
                    type="submit">Back</button>
            </a>

        </div>
    </div>
@endsection
