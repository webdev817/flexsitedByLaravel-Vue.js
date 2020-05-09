@extends('layouts.supportPortal.master')

@section('body')

<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">

                <div class="main-body">
                    <div class="page-wrapper">

                        @include('common.messagesSupport')

                        <div class="col-sm-12">
                            <div class="card ">


                                <div class="card user-list">
                                    <div class="card-header">
                                        <h5>Requests</h5>

                                    </div>
                                    <div class="card-block pb-0">
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Subject</th>
                                                        <th>Message</th>
                                                        <th>User Name</th>
                                                        <th>Business Name</th>
                                                        <th>User Email</th>
                                                        <th>contacted on</th>

                                                </thead>
                                                <tbody>
                                                    @foreach ($contactMessages as $contactMessage)

                                                    <tr>

                                                        <td>
                                                            {{ $contactMessage->subject }}
                                                        </td>

                                                        <td>
                                                          {{ $contactMessage->message }}

                                                        </td>
                                                        <td>
                                                          {{ $contactMessage->user->name }}
                                                        </td>
                                                        <td>
                                                          {{ $contactMessage->user->businessName }}

                                                        </td>

                                                        <td>
                                                          {{ $contactMessage->user->email }}

                                                        </td>
                                                        <td>
                                                          {{ $contactMessage->created_at->format('M d,Y') }}
                                                        </td>
                                                        {{-- <td>

                                                            <a href="javascript:void(0)" data-obj='{
                                                                                          "userId": "{{$marketingService->id}}",
                                                                                          "url": "{{ route('users.destroy', $marketingService->id) }}",
                                                                                          "method": "delete"
                                                                                        }' data-html="Are you sure you want to delete?"
                                                              class="label theme-bg2 text-white f-12 deleteConfirm"><i class="fas fa-trash text-white"></i> Delete</a>

                                                        </td> --}}
                                                    </tr>
                                                    @endforeach
                                                    @if ($contactMessages->count() < 1) <tr>
                                                        <td colspan="7" class="text-center">
                                                            <h3>No Records</h3>
                                                        </td>
                                                        </tr>
                                                        @endif

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    @if ($contactMessages->total() > $contactMessages->perPage())

                                    <div class="card-footer tx-12 pd-y-15 bg-transparent">
                                        <div class="d-flex form-layout-footer justify-content-center submitSection">

                                            {!! $contactMessages->links() !!}

                                        </div>
                                    </div>
                                    @endif


                                </div>


                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection



@section('jsCommon')
  @include('common.js')
@endsection
