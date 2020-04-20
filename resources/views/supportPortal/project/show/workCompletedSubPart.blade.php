
<div class="w-100 bg1 p-3 text-white">
  <strong>Source</strong>
</div>
  @if (getimagesize(Storage::path($attachment->workSourcePath)))
    <a target="_blank" href="{{ Storage::url($attachment->workSourcePath) }}">
        <img class="img-fluid" src="{{ Storage::url($attachment->workSourcePath) }}" alt="">
    </a>
  @else
    <div class="p-2">

    <a target="_blank" href="{{ Storage::url($attachment->workSourcePath) }}">
        {{ pathinfo(Storage::path($attachment->workSourcePath))['basename'] }}
    </a>
  </div>

  @endif
