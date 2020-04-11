@extends('layouts.dashboard.master')

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

                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('adminHome') }}"><i class="feather icon-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('supportFAQ.index') }}">Support FAQs</a></li>
                                </ul>
                                <div class="float-right mb-1">
                                  <a href="{{ route('supportFAQ.create') }}" class="btn btn-primary btn-sm ">Add A New Question</a>
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
                                        <h5>Support FAQs</h5>
                                        <div class="card-header-right">
                                            <div class="btn-group card-option">
                                                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="feather icon-more-horizontal"></i>
                                                </button>
                                                <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                                                    <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i> maximize</span><span style="display:none"><i class="feather icon-minimize"></i> Restore</span></a></li>
                                                    <li class="dropdown-item minimize-card"><a href="#!"><span><i class="feather icon-minus"></i> collapse</span><span style="display:none"><i class="feather icon-plus"></i> expand</span></a></li>
                                                    {{-- <li class="dropdown-item reload-card"><a href="#!"><i class="feather icon-refresh-cw"></i> reload</a></li> --}}
                                                    <li class="dropdown-item close-card"><a href="#!"><i class="feather icon-trash"></i> remove</a></li>
                                                </ul>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-block pb-0">
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Category</th>
                                                        <th>Question</th>
                                                        <th>Answer</th>
                                                        <th>Status</th>

                                                        <th>Action</th>
                                                </thead>
                                                <tbody>
                                                    @foreach ($supportFaqs as $supportFaq)

                                                    <tr>
                                                        <td>
                                                          {{ $supportFaq->category }}
                                                        </td>
                                                        <td>
                                                            {{ $supportFaq->question }}
                                                        </td>

                                                        <td>

                                                          <textarea name="answer" id="answer" class="form-control" rows="3" cols="80">{{ $supportFaq->answer }}</textarea>
                                                        </td>

                                                        <td>
                                                          @if ($supportFaq->status == 1)
                                                            <a href="javascript:void(0)" class="label theme-bg f-12 text-white">Active</a>
                                                          @else
                                                            <a href="javascript:void(0)" class="label theme-bg2 f-12 text-white">Not Active</a>
                                                          @endif
                                                        </td>
                                                        <td>
                                                           {{ $supportFaq->created_at->diffForHumans() }}
                                                        </td>
                                                        <td>
                                                          <a href="{{ route('supportFAQ.edit', $supportFaq->id) }}" class="label theme-bg text-white f-12"><i class="fa-pencil-alt fas text-white"></i> Edit</a>
                                                          <a href="javascript:void(0)" data-obj='{
                                                            "url": "{{ route('supportFAQ.destroy', $supportFaq->id) }}",
                                                            "method": "delete"
                                                          }' data-html="are you sure you want to delete this question?" class="label theme-bg2 text-white f-12 deleteConfirm"><i class="fas fa-trash text-white"></i> Delete</a>

                                                        </td>
                                                    </tr>
                                                  @endforeach
                                                  @if ($supportFaqs->count() < 1)
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
                                    @if ($supportFaqs->total() > $supportFaqs->perPage())

                                    <div class="card-footer tx-12 pd-y-15 bg-transparent">
                                        <div class="d-flex form-layout-footer justify-content-center submitSection">

                                            {!! $supportFaqs->links() !!}

                                        </div>
                                    </div>
                                    @endif


                                </div>
                            </div>


                        </div>
                        <!-- [ Main Content ] end -->
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
