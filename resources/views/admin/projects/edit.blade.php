<x-layouts.admin title="Project bewerken: {{ $project->title }}">
    @section('breadcrumbs')
        {{ Breadcrumbs::render('projects') }}
    @endsection

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    <form method="POST" action="{{ route('project.update', $project->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row gx-5">
            <div class="col-lg-9 col-sm-12">
                <x-admin.card>
                    <x-slot name="title">
                        <h3 class="fw-bold mb-1">Project Bewerken</h3>
                        <span class="fs-6 text-gray-400">Je bent momenteel het project "{{ $project->title }}" aan het werken.</span>
                    </x-slot>

                    <div class="mb-7">
                        <label for="title" class="mb-1">Titel:</label>
                        <input type="text" name="title" id="title" value="{{ $project->title }}" class="form-control">

                        @error('title') {{ $message }} @enderror
                    </div>

                    <div class="mb-7">
                        <label for="slug" class="mb-1">Slug:</label>
                        <input type="text" name="slug" id="slug" value="{{ $project->slug }}" class="form-control" disabled>
                    </div>

                    <div class="mb-7">
                        <label for="description" class="mb-1">Omschrijving:</label>
                        <textarea name="description" id="description" rows="5" class="form-control">{{ $project->description }}</textarea>

                        @error('description') {{ $message }} @enderror
                    </div>

                    <div class="mb-7">
                        <label for="images" class="mb-1">Carousel afbeeldingen:</label>
                        <input type="file" name="images[]" id="images" class="form-control" multiple>

                        @error('images[]') {{ $message }} @enderror
                    </div>
                </x-admin.card>
            </div>

            <div class="col-lg-3 col-sm-12">
                <x-admin.card>
                    <x-slot name="title">
                        <h3 class="fw-bold mb-1">Project Info</h3>
                        <span class="fs-6 text-gray-400">Specifieke informatie</span>
                    </x-slot>

                    <div class="mb-7">
                        <label for="thumbnail" class="mb-1">Thumbnail:</label>
                        <input type="file" name="thumbnail" id="thumbnail" class="form-control">

                        @error('thumbnail') {{ $message }} @enderror
                    </div>

                    <div class="mb-7">
                        <label for="size" class="mb-1">Thumbnail grootte:</label>
                        <select name="size" id="size" class="form-select">
                            <option value="{{ $project->size }}">{{ $project->size }}</option>
                            <option value="big">Groot</option>
                            <option value="small">Klein</option>
                        </select>
                    </div>

                    <div class="mb-7">
                        <label for="category" class="mb-1">Categorie:</label>
                        <select name="category" id="category" class="form-select">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $category->id == $project->category_id ? 'selected' : '' }}>
                                    {{ $category->title }}
                                </option>
                            @endforeach
                        </select>

                        @error('category') {{ $message }} @enderror
                    </div>

                    <div class="mb-7">
                        <label for="status" class="mb-1">Status:</label>
                        <select name="status" id="status" class="form-select">
                            <option value="{{ $project->status }}">Huidige: {{ $project->status }}</option>
                            <option value="published">Publiceren</option>
                            <option value="concept">Concept</option>
                            <option value="hidden">Verbergen</option>
                        </select>
                    </div>

                    <x-button variant="primary">Bijwerken</x-button>
                </x-admin.card>
            </div>
        </div>
    </form>
</x-layouts.admin>
