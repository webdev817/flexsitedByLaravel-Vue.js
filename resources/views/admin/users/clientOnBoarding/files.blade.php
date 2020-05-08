@if (
  $wizeredObj->logoUpload->count() || $wizeredObj->contentUpload->count() ||
  $wizeredObj->galleryImages->count() || $wizeredObj->logoExamples->count() ||
  $wizeredObj->contentUploadForFlyer->count() || $wizeredObj->imagesandlogoForFlyer->count() ||
  $wizeredObj->contentFront->count() || $wizeredObj->contentBack->count() ||
  $wizeredObj->logoImagesAndLogo->count()
)

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



    @if ($wizeredObj->logoExamples->count())
    <div class="card-header">
        <h5>Logo Examples</h5>
    </div>
    <div class="card-block task-attachment">
        <ul class="media-list p-0">
            @foreach ($wizeredObj->logoExamples as $logoExample)
            @php
            $obj = fileInfoWithClassObj(Storage::path($logoExample->path));
            @endphp

            <li class="media d-flex m-b-15">
                <div class="m-r-20 file-attach">
                    <i class="{{ $obj->class }} f-28 text-muted"></i>
                </div>
                <div class="media-body">
                    <a target="_blank" href="{{ Storage::url($logoExample->path) }}" class="m-b-5 d-block text-secondary text-break">{{ $obj->fullName }}</a>
                    <div class="text-muted">
                        <span>Size: {{ $obj->size }}</span>

                    </div>
                </div>
                <div class="float-right text-muted">
                    <a target="_blank" href="{{ Storage::url($logoExample->path) }}">
                        <i class="fas fa-download f-18"></i>
                    </a>

                </div>
            </li>
            @endforeach
        </ul>
    </div>
    @endif



    @if ($wizeredObj->contentUploadForFlyer->count())
    <div class="card-header">
        <h5>Content For Flyer</h5>
    </div>
    <div class="card-block task-attachment">
        <ul class="media-list p-0">
            @foreach ($wizeredObj->contentUploadForFlyer as $contentUploadForFlyer)
            @php
            $obj = fileInfoWithClassObj(Storage::path($contentUploadForFlyer->path));
            @endphp

            <li class="media d-flex m-b-15">
                <div class="m-r-20 file-attach">
                    <i class="{{ $obj->class }} f-28 text-muted"></i>
                </div>
                <div class="media-body">
                    <a target="_blank" href="{{ Storage::url($contentUploadForFlyer->path) }}" class="m-b-5 d-block text-secondary text-break">{{ $obj->fullName }}</a>
                    <div class="text-muted">
                        <span>Size: {{ $obj->size }}</span>

                    </div>
                </div>
                <div class="float-right text-muted">
                    <a target="_blank" href="{{ Storage::url($contentUploadForFlyer->path) }}">
                        <i class="fas fa-download f-18"></i>
                    </a>

                </div>
            </li>
            @endforeach
        </ul>
    </div>
    @endif





    @if ($wizeredObj->imagesandlogoForFlyer->count())
    <div class="card-header">
        <h5>Images and Logo For Flayer</h5>
    </div>
    <div class="card-block task-attachment">
        <ul class="media-list p-0">
            @foreach ($wizeredObj->imagesandlogoForFlyer as $imagesandlogoForFlyer)
            @php
            $obj = fileInfoWithClassObj(Storage::path($imagesandlogoForFlyer->path));
            @endphp

            <li class="media d-flex m-b-15">
                <div class="m-r-20 file-attach">
                    <i class="{{ $obj->class }} f-28 text-muted"></i>
                </div>
                <div class="media-body">
                    <a target="_blank" href="{{ Storage::url($imagesandlogoForFlyer->path) }}" class="m-b-5 d-block text-secondary text-break">{{ $obj->fullName }}</a>
                    <div class="text-muted">
                        <span>Size: {{ $obj->size }}</span>

                    </div>
                </div>
                <div class="float-right text-muted">
                    <a target="_blank" href="{{ Storage::url($imagesandlogoForFlyer->path) }}">
                        <i class="fas fa-download f-18"></i>
                    </a>

                </div>
            </li>
            @endforeach
        </ul>
    </div>
    @endif

    @if ($wizeredObj->contentFront->count())
    <div class="card-header">
        <h5>Business Card Front Content</h5>
    </div>
    <div class="card-block task-attachment">
        <ul class="media-list p-0">
            @foreach ($wizeredObj->contentFront as $contentFront)
            @php
            $obj = fileInfoWithClassObj(Storage::path($contentFront->path));
            @endphp

            <li class="media d-flex m-b-15">
                <div class="m-r-20 file-attach">
                    <i class="{{ $obj->class }} f-28 text-muted"></i>
                </div>
                <div class="media-body">
                    <a target="_blank" href="{{ Storage::url($contentFront->path) }}" class="m-b-5 d-block text-secondary text-break">{{ $obj->fullName }}</a>
                    <div class="text-muted">
                        <span>Size: {{ $obj->size }}</span>

                    </div>
                </div>
                <div class="float-right text-muted">
                    <a target="_blank" href="{{ Storage::url($contentFront->path) }}">
                        <i class="fas fa-download f-18"></i>
                    </a>

                </div>
            </li>
            @endforeach
        </ul>
    </div>
    @endif
    @if ($wizeredObj->contentBack->count())
    <div class="card-header">
        <h5>Business Card Back Content</h5>
    </div>
    <div class="card-block task-attachment">
        <ul class="media-list p-0">
            @foreach ($wizeredObj->contentBack as $contentBack)
            @php
            $obj = fileInfoWithClassObj(Storage::path($contentBack->path));
            @endphp

            <li class="media d-flex m-b-15">
                <div class="m-r-20 file-attach">
                    <i class="{{ $obj->class }} f-28 text-muted"></i>
                </div>
                <div class="media-body">
                    <a target="_blank" href="{{ Storage::url($contentBack->path) }}" class="m-b-5 d-block text-secondary text-break">{{ $obj->fullName }}</a>
                    <div class="text-muted">
                        <span>Size: {{ $obj->size }}</span>

                    </div>
                </div>
                <div class="float-right text-muted">
                    <a target="_blank" href="{{ Storage::url($contentBack->path) }}">
                        <i class="fas fa-download f-18"></i>
                    </a>

                </div>
            </li>
            @endforeach
        </ul>
    </div>
    @endif
    @if ($wizeredObj->logoImagesAndLogo->count())
    <div class="card-header">
        <h5>Logo And Images for Business Card</h5>
    </div>
    <div class="card-block task-attachment">
        <ul class="media-list p-0">
            @foreach ($wizeredObj->logoImagesAndLogo as $logoImagesAndLogo)
            @php
            $obj = fileInfoWithClassObj(Storage::path($logoImagesAndLogo->path));
            @endphp

            <li class="media d-flex m-b-15">
                <div class="m-r-20 file-attach">
                    <i class="{{ $obj->class }} f-28 text-muted"></i>
                </div>
                <div class="media-body">
                    <a target="_blank" href="{{ Storage::url($logoImagesAndLogo->path) }}" class="m-b-5 d-block text-secondary text-break">{{ $obj->fullName }}</a>
                    <div class="text-muted">
                        <span>Size: {{ $obj->size }}</span>

                    </div>
                </div>
                <div class="float-right text-muted">
                    <a target="_blank" href="{{ Storage::url($logoImagesAndLogo->path) }}">
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
