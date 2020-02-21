

<div class="container">
  <div class="row m-0 py-5">
    @foreach ($designCategory as $designCat)
      <div class="designCategory @if($designCat->id == request()->c) favBG @endif">
        <a class="@if($designCat->id == request()->c) text-white @endif" href="{{ route('select-design',['c'=> $designCat->id]) }}">{{ $designCat->title }}</a>
      </div>
    @endforeach

    @if (request()->c != null)
      <div class="justify-content-center m-0 pt-2 py-1 col-12 text-center">
        <a href="{{ route('select-design') }}" class="favColor">Clear Filter</a>
      </div>
    @endif
  </div>
</div>

<div class="container">


  <div class="row m-0">
    @foreach ($designs as $design)
      <div class="col-4 mb-2">
        <div class="">
            <img src="{{ $design->image }}" class="w-100 img-fluid rounded-0 bg-white img-thumbnail" alt="">
        </div>

        <a href="{{ route('selectedDesign',$design->id) }}" class="btn btn-cstm rounded-0 btn-block shadow-none">SELECT</a>

      </div>
    @endforeach

  </div>
  @if ($designs->count() == 0)
    <div class="col-12 text-center my-5">
    <h3 class="favColor">No Results Found. @if(request()->c != null)Try another category or clear Filter @endif </h3>
    </div>
  @endif

  <div class="row m-0">
    <div class="col-12 justify-content-center d-flex">
      {{ $designs->appends(['c' => request()->c ])->links() }}
    </div>
  </div>


</div>

<div class="container mt-4">
    <div class="row m-0 py-3">
        <div class="col-12 text-center">
            <a class="btn btn-cstm rounded-0 shadow-none" href="#">FREQUENTLY ASKED QUESTIONS</a>
        </div>
    </div>
</div>

<div class="container ">
    <div class="row m-0 py-3">
        <div class="col-12 text-center">
            <button onclick="window.location = '{{ route('root') }}'" class=" float-left btn btn-cstm rounded-0 shadow-none backBtn" type="button">Back</button>
        </div>
    </div>
</div>


<style media="screen">
.page-item.active .page-link {
  z-index: 3;
  color: #fff;
  background-color: #65c5b4;
  border-color: #65c5b4;
}
.page-link:hover {
    z-index: 2;
    color: #65c5b4;
    text-decoration: none;
    background-color: #e9ecef;
    border-color: #dee2e6;
}
.page-link {
    color: #65c5b4;
}
</style>
