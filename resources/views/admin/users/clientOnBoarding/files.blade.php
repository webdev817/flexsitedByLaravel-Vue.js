@if ($wizeredObj->logoUpload->count() || $wizeredObj->contentUpload->count() || $wizeredObj->galleryImages->count() )

<div class="card">
    @if ($wizeredObj->logoUpload->count())
    <div class="card-header">
        <h5>Attached Logo Files</h5>
    </div>
    <div class="card-block task-attachment">
        <ul class="media-list p-0">
            @foreach ($wizeredObj->logoUpload as $logoFile)
            @php
            $obj = fileInfoWithClassObj(Storage::path($logoFile->path));
            @endphp

            <li class="media d-flex m-b-15">
                <div class="m-r-20 file-attach">
                    <i class="{{ $obj->class }} f-28 text-muted"></i>
                </div>
                <div class="media-body">
                    <a  target="_blank" href="{{ Storage::url($logoFile->path) }}" class="m-b-5 d-block text-secondary text-break">{{ $obj->fullName }}</a>
                    <div class="text-muted">
                        <span>Size: {{ $obj->size }}</span>

                    </div>
                </div>
                <div class="float-right text-muted">
                    <a target="_blank" href="{{ Storage::url($logoFile->path) }}">
                        <i class="fas fa-download f-18"></i>

                    </a>

                </div>
            </li>
            @endforeach
        </ul>
    </div>
    @endif

    @if ($wizeredObj->contentUpload->count())
    <div class="card-header">
        <h5>Content Upload</h5>
    </div>
    <div class="card-block task-attachment">
        <ul class="media-list p-0">
            @foreach ($wizeredObj->contentUpload as $contentFile)
            @php
            $obj = fileInfoWithClassObj(Storage::path($contentFile->path));
            @endphp

            <li class="media d-flex m-b-15">
                <div class="m-r-20 file-attach">
                    <i class="{{ $obj->class }} f-28 text-muted"></i>
                </div>
                <div class="media-body">
                    <a target="_blank" href="{{ Storage::url($contentFile->path) }}" class="m-b-5 d-block text-secondary text-break">{{ $obj->fullName }}</a>
                    <div class="text-muted">
                        <span>Size: {{ $obj->size }}</span>

                    </div>
                </div>
                <div class="float-right text-muted">
                    <a target="_blank" href="{{ Storage::url($contentFile->path) }}">
                        <i class="fas fa-download f-18"></i>
                    </a>

                </div>
            </li>
              @endforeach
        </ul>
    </div>
    @endif

    @if ($wizeredObj->galleryImages->count())
    <div class="card-header">
        <h5>Gallery Images</h5>
    </div>
    <div class="card-block task-attachment">
        <ul class="media-list p-0">
            @foreach ($wizeredObj->galleryImages as $galleryImage)
            @php
            $obj = fileInfoWithClassObj(Storage::path($galleryImage->path));
            @endphp

            <li class="media d-flex m-b-15">
                <div class="m-r-20 file-attach">
                    <i class="{{ $obj->class }} f-28 text-muted"></i>
                </div>
                <div class="media-body">
                    <a target="_blank" href="{{ Storage::url($galleryImage->path) }}" class="m-b-5 d-block text-secondary text-break">{{ $obj->fullName }}</a>
                    <div class="text-muted">
                        <span>Size: {{ $obj->size }}</span>

                    </div>
                </div>
                <div class="float-right text-muted">
                    <a target="_blank" href="{{ Storage::url($galleryImage->path) }}">
                        <i class="fas fa-download f-18"></i>
                    </a>

                </div>
            </li>
            @endforeach
        </ul>
    </div>
    @endif



</div>


@endif
