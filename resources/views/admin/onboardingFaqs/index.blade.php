@extends('layouts.supportPortal.master')

@section('body')

<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <!-- [ breadcrumb ] start -->
                <div class="page-header">
                    <div class="page-block">
                        <div class="row align-items-center">
                            <div class="col-md-12">

                                {{-- <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('adminHome') }}"><i class="feather icon-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('supportFAQ.index') }}">Support FAQs</a></li>
                                </ul> --}}
                                <div class="float-right mb-1">
                                  <a href="{{ route('onBoardingFaqs.create') }}" class="btn btn-primary btn-sm ">Add A New Question</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- [ breadcrumb ] end -->
                <div class="main-body">
                    <div class="page-wrapper">
                        <!-- [ Main Content ] start -->
                        <div class="row">



                            <div class="col-md-12">
                                <div class="card user-list">
                                    <div class="card-header">
                                        <h5>On Boarding FAQs</h5>

                                    </div>
                                    <div class="card-block pb-0">
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Page</th>
                                                        <th>Question</th>
                                                        <th>Answer</th>
                                                        <th>Status</th>

                                                        <th>Action</th>
                                                </thead>
                                                <tbody>
                                                    @foreach ($onBoardingFaqs as $onBoardingFaq)

                                                    <tr>
                                                        <td>
                                                          {{ $onBoardingFaq->category }}
                                                        </td>
                                                        <td>
                                                            {{ $onBoardingFaq->question }}
                                                        </td>

                                                        <td>

                                                          {{ $onBoardingFaq->answer }}

                                                        </td>

                                                        <td>
                                                          @if ($onBoardingFaq->status == 1)
                                                            <a href="javascript:void(0)" class="label theme-bg f-12 text-white">Active</a>
                                                          @else
                                                            <a href="javascript:void(0)" class="label theme-bg2 f-12 text-white">Not Active</a>
                                                          @endif
                                                        </td>
                                                        <td>
                                                           {{ $onBoardingFaq->created_at->diffForHumans() }}
                                                        </td>
                                                        <td>
                                                          <a href="{{ route('onBoardingFaqs.edit', $onBoardingFaq->id) }}" class="label theme-bg text-white f-12"><i class="fa-pencil-alt fas text-white"></i> Edit</a>
                                                          <a href="javascript:void(0)" data-obj='{
                                                            "url": "{{ route('onBoardingFaqs.destroy', $onBoardingFaq->id) }}",
                                                            "method": "delete"
                                                          }' data-html="are you sure you want to delete this question?" class="label theme-bg2 text-white f-12 deleteConfirm"><i class="fas fa-trash text-white"></i> Delete</a>

                                                        </td>
                                                    </tr>
                                                  @endforeach
                                                  @if ($onBoardingFaqs->count() < 1)
                                                  <tr>
                                                  <td colspan="7" class="text-center">
                                                      <h3>No Records</h3>
                                                  </td>
                                                  </tr>
                                                  @endif

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    @if ($onBoardingFaqs->total() > $onBoardingFaqs->perPage())
                                    <div class="card-footer tx-12 pd-y-15 bg-transparent">
                                        <div class="d-flex form-layout-footer justify-content-center submitSection">
                                            {!! $onBoardingFaqs->links() !!}
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
