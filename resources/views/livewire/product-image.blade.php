<div class="card" wire:init="loadImages">
    <div class="card-header float-right">

        @if ($photo)
            Photo Preview:
            <img src="{{ $photo->temporaryUrl() }}" height="100px" width="100px">
        @endif

        <form wire:submit.prevent="save">
            <input type="file" wire:model="photo">

            @error('photo') <span class="error">{{ $message }}</span> @enderror

            @if ($photo)
                <button class="btn btn-primary" type="submit">Save Photo</button>
            @endif
        </form>
        
    </div>
    <div class="card-body table-responsive">
        <table class="table" id="categories-table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($photos as $image)
                    <tr>
                        <td>{{ $image->id }}</td>
                        <td>
                            <img src="{{ get_image_path($image->path) }}" height="150px" width="100px" alt="">
                        </td>
                        <td>
                            <button class="btn btn-danger" wire:click.prevent="deleteImage('{{ $image->path }}')">
                                <i class="fa fa-trash"></i>
                                <span wire:loading wire:target="deleteImage('{{ $image->path }}')">Deleting</span>
                            </button>
                        </td>
                    </tr>

                @empty
                    <tr>
                        <td>
                            No data exists
                        </td>
                    </tr>
                @endforelse

            </tbody>
        </table>
    </div>

    <div wirewire:loading.class="show" class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-body text-center">
                    <div class="spinner-border text-primary" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
