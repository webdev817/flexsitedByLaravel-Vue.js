<div class="col-12 col-md-6  mb-4">
    @if (getimagesize(Storage::path($attachment->path)))

    @include('supportPortal.project.show.modal', [ 'attachment'=> $attachment ])

    <div class="border">
        <div class="w-100 p-2">

            @if ($attachment->status == 2)

            <a href="javascript:void(0)" style="color:black;">

                Approved
            </a>
            @else
            <a href="javascript:void(0)" data-toggle="modal" data-target="#milestoneComment{{ $attachment->id }}">
                <i class="feather icon-message-circle"></i>
                Make comment
            </a>
            @endif


        </div>
        <a target="_blank" href="{{ Storage::url($attachment->path) }}">
            <img class="img-fluid" src="{{ Storage::url($attachment->path) }}" alt="">
        </a>


        <br>
        <div class="w-100 p-3">
            {{ $attachment->message }}
        </div>
    </div>

    @else
    <div class="border">
      @include('supportPortal.project.show.modal', [ 'attachment'=> $attachment ])

      <div class="w-100 p-2">

          @if ($attachment->status == 2)

          <a href="javascript:void(0)" style="color:black;">

              Approved
          </a>
          @else
          <a href="javascript:void(0)" data-toggle="modal" data-target="#milestoneComment{{ $attachment->id }}">
              <i class="feather icon-message-circle"></i>
              Make comment
          </a>
          @endif


      </div>
        <div class="p-3">
            <a target="_blank" href="{{ Storage::url($attachment->path) }}">
                {{ pathinfo(Storage::path($attachment->path))['basename'] }}
            </a>
            <br>
            <div class="w-100">
                {{ $attachment->message }}
            </div>
        </div>

    </div>
    @endif

</div>
