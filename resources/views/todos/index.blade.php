@extends('todos/layout')
@section('content')
    <div class="flex justify-center">
        <div class="text-center pt-10">
            <h1 class="text-4xl">All your To-DOs</h1>
            <x-Alert />
            <a href="/todos/create"><button
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full mt-5 z-10"
                    type="submit">Create new</button></a>
        </div>
    </div>
    <div class="flex justify-center pt-20">
        <div class="grid grid-cols-12 max-w-8xl gap-12 px-8">
            @forelse ($mytodos as $items)
                <!-- Card 1 -->
                <div class="grid col-span-4 relative">
                    <!-- delete icon -->
                    <div class="absolute top-0 right-0"><i class="bi bi-x" style="color:red;"
                            onclick="document.getElementById('form-delete-{{ $items->id }}').submit()"></i>
                        <form action="{{ '/todos/' . $items->id . '/delete' }}" method="post" style="display: none"
                            id="{{ 'form-delete-' . $items->id }}">
                            @csrf
                            @method('delete')
                            <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full"
                                type="submit">Delete</button>
                        </form>
                    </div>

                    <a class="group shadow-lg hover:shadow-2xl duration-200 delay-75 w-full bg-white rounded-sm py-6 pr-6 pl-9"
                        href="{{ '/todos/' . $items->id . '/edit' }}">



                        <!-- Title -->
                        <p class="text-sm font-semibold text-500 group-hover:text-gray-700 mt-2 leading-6 px-8">
                            {{ $items->title }} </p>

                        <!-- Description -->
                        <span
                            class="text-xs text-500 group-hover:text-gray-700 mt-2 leading-6 px-8">{{ $items->description }}
                        </span>

                        @if ($items->steps->count() > 0)
                            <div>
                                @for ($i = 0; $i < $items->steps->count(); $i++)
                                    <h5 class="text-xs text-500 group-hover:text-gray-700 mt-2 leading-6 px-8">
                                       Step: {{ $i + 1 }}---------------->
                                        
                                    </h5>
                                    <span
                                        class="text-xs text-500 group-hover:text-gray-700 mt-2 leading-6 px-8">{{ $items->steps[$i]->name }}
                                    </span>
                                @endfor

                            </div>
                        @endif
                    </a>

                    <!-- Color -->
                    @if ($items->completed)
                        <span
                            onclick="event.preventDefault();document.getElementById('form-incomplete-{{ $items->id }}').submit()"
                            class="bg-green-400 group-hover:bg-green-600 h-full w-4 absolute top-0 left-0"> </span>

                        <form action="{{ '/todos/' . $items->id . '/incomplete' }}" style="display:none" method="post"
                            id="{{ 'form-incomplete-' . $items->id }}">
                            @csrf
                            @method('delete')
                        </form>
                    @else
                        <span
                            onclick="event.preventDefault();document.getElementById('form-complete-{{ $items->id }}').submit()"
                            class="bg-blue-400 group-hover:bg-blue-600 h-full w-4 absolute top-0 left-0"> </span>

                        <form action="{{ '/todos/' . $items->id . '/complete' }}" style="display:none" method="post"
                            id="{{ 'form-complete-' . $items->id }}">
                            @csrf
                            @method('put')
                        </form>
                    @endif
                </div>
            @empty
                <div class="grid col-span-4 relative text-center">
                    <p>No todos yet</p>
                </div>
            @endforelse
        </div>
    </div>

    {{-- small note in footer : --}}
    <div class="flex justify-center">
        <div class="text-center pt-20">
            <p class="text-xs">
                <span class="text-gray-500">Note:</span>
                <span class="text-gray-700">
                    Hit the blue strip to mark the task as completed.
                </span>
            </p>
        </div>
    </div>
@endsection
