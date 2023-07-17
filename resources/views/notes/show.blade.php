<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800  leading-tight">
            {{ !$note->trashed() ? __('Notes') : _('Trash') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-alert-success>
                {{ session('success') }}
            </x-alert-success>
            <div class="flex">
                @if(!$note->trashed())
                    <p class="opacity-70 text-dark">
                        <strong>Created:</strong> {{ $note->created_at->diffForHumans() }}
                    </p>
                    <p class="opacity-70 ml-3 text-dark" >
                        <strong>Updated:</strong> {{ $note->updated_at->diffForHumans() }}

                    </p>
                    <a href="{{ route('notes.edit', $note) }}" class="btn-link ml-12">Edit Note</a>
                    <form action="{{ route('notes.destroy', $note) }}" method="post">
                        @method('delete')
                        @csrf
                        <x-danger-button type="submit" class="btn btn-danger ml-4" onclick="return confirm('Are you sure you wish to move this note to trash?')">Move to Trash</x-danger-button>
                    </form>
                @else
                    
                <p class="opacity-70 text-dark">
                    <strong>Deleted:</strong> {{ $note->deleted_at->diffForHumans() }}
                </p>
                
                <form action="{{ route('trashed.update', $note) }}" method="post" class="ml-12">
                    @method('put')
                    @csrf
                <button type="submit" class="btn-link">Restore Note</button>
                </form>
                
                <form action="{{ route('trashed.destroy', $note) }}" method="post">
                @method('delete')
                @csrf
                <x-danger-button type="submit" class="btn btn-danger ml-4" onclick="return confirm('Are you sure you want to delete this note forever? This action cannot be undone')">Delete Forever</x-danger-button>
                </form>
                @endif
            </div>

            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <h2 class="font-bold text-5xl">
                    {{  $note->title }}
                </h2>
                <p class="mt-3 whitespace-pre-wrap">{{ $note->text }}</p>

            </div>
                
        </div>
    </div>
</x-app-layout>
