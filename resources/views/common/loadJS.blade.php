@section('headForLoadJs')

  @if (isset($select2))
    <link rel="stylesheet" href="{{ asset('mawaisnow\able\assets\plugins\select2\css\select2.min.css') }}">
  @endif




@endsection











@section('footerForLoadJs')
  @if (isset($select2))
    <script src="{{ asset( 'mawaisnow/able/assets/plugins/select2/js/select2.full.min.js' ) }}"></script>
  @endif

@endsection
