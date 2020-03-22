@extends('layouts.admin')

@section('body')

<div class="slim-pageheader">
    <ol class="breadcrumb slim-breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('root') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Users</li>
    </ol>
    <h6 class="slim-pagetitle">Users</h6>
</div>
@include('common.messages')


<div class="bg-white mg-t-20 mg-sm-t-30">

    <div class="table-responsive">
        <table class="table mg-b-0 tx-13">
            <thead>
                <tr >
                    <th >Name</th>
                    <th >Email</th>

                    <th >Status</th>
                    <th >Created At</th>
                    <th >Updated At</th>
                    <th >Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>

                    <td>
                        <a href="{{ route('clientOnBoarding', $user->id) }}">
                          {{ $user->name }}
                        </a>
                    </td>
                    <td>
                        {{ $user->email }}
                    </td>

                    <td  width="135px;">
                        <select data-id="{{ $user->id }}" name="status"
                            class="statusSelectBox form-control form-control-sm">
                            @if ($user->status == 0)
                            <option @if ($user->status == 0) selected @endif value="0">Pending</option>
                            <option @if ($user->status == 1) selected @endif value="1">Active</option>
                            <option @if ($user->status == 2) selected @endif value="2">Block</option>

                            @else

                            <option @if ($user->status == 1) selected @endif value="1">Active</option>
                            <option @if ($user->status == 2) selected @endif value="2">Block</option>
                            @endif

                        </select>
                    </td>
                    <td >
                        {{ $user->created_at->diffForHumans() }}
                    </td>
                    <td >
                        {{ $user->updated_at->diffForHumans() }}
                    </td>
                    <td>



                        <a href="javascript:void(0)" data-id="{{ $user->id }}" class="deleteBtn fa-2x text-danger">
                            <i class="ion ion-ios-trash"></i>
                        </a>





                    </td>



                </tr>
                @endforeach

                @if ($users->count() < 1)
                <tr>
                <td colspan="6" class="text-center">
                    <h1>No Records</h1>
                </td>
                </tr>
                @endif



            </tbody>
        </table>
    </div>

    @if ($users->total() > $users->perPage())

    <div class="card-footer tx-12 pd-y-15 bg-transparent">
        <div class="d-flex form-layout-footer justify-content-center submitSection">

            {!! $users->links() !!}

        </div>
    </div>
    @endif


</div>



@endsection

@section('head')
  <script src="{{ asset('mawaisnow/slim/lib/select2/js/select2.full.min.js') }}"></script>
<link rel="stylesheet" href="{{ asset('mawaisnow/slim/lib/select2/css/select2.min.css') }}">

@endsection
@section('cJS')
<script>
    $('.select2hai').select2({
        containerCssClass: 'select2-outline-info',
        dropdownCssClass: 'bd-info hover-info'
    });

    $(".statusSelectBox").change(function() {
        var status = $(this).val();
        var id = $(this).attr('data-id');

        showConfirm({
            'route': '{{ route('changeUserStatus') }}',
            'method': 'post',
            'params': {
                'status': status,
                'userId': id
            }
        });
    });


    $(".deleteBtn").click(function() {

        var id = $(this).attr('data-id');

        showConfirm({
            'route': '{{ route('deleteUser') }}',
            'method': 'post',
            'params': {
                'userId': id
            },
            'message': "Are sure, you want to delete that user?"
        });
    });
</script>
@endsection
