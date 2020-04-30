@extends('layouts.supportPortal.master')

@section('body')

<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">

                <div class="page-header">
                    <div class="page-block">
                        <div class="row align-items-center">
                            <div class="col-md-12">

                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('adminHome') }}"><i class="feather icon-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('supportFAQ.index') }}">Support Faqs</a></li>
                                    <li class="breadcrumb-item">
                                      @isset($supportFaq)
                                        Add Question
                                      @else
                                        Edit Question
                                      @endisset
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="main-body">
                    <div class="page-wrapper">

                        @include('common.messages')

                        <div class="row">

                            <div class="col-12">



                                <div class="card user-list">
                                    <div class="card-header">
                                        <h5>@isset($supportFaq)
                                          Add Question
                                        @else
                                          Edit Question
                                        @endisset</h5>
                                         
                                    </div>
                                    <form class=""
                                    @isset($supportFaq)
                                      action="{{ route('supportFAQ.update', $supportFaq->id) }}"
                                    @else
                                      action="{{ route('supportFAQ.store') }}"
                                    @endisset
                                      method="post">
                                        <div class="card-block row m-0 pl-0 pr-0">

                                            @csrf

                                            @isset($supportFaq)
                                              {{ method_field('put') }}
                                            @endisset

                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label class="form-control-label w-100" for="Question">Question: <span class="text-danger">*</span> </label>
                                                    <input class="form-control" type="text" id="Question" name="question"   value="{{ $supportFaq->question ?? old('question') }}"  required="required">
                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label class="form-control-label w-100" for="status">Status: </label>
                                                    <select class="form-control" name="status" id="status" required>
                                                        <option value="1" @if(isset($supportFaq) && $supportFaq->status == 1) selected
                                                            @endif >Active</option>
                                                        <option value="0" @if( isset($supportFaq) && $supportFaq->status == 0) selected
                                                            @endif >InActive</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label class="form-control-label w-100" for="category">Category: </label>
                                                    <select class="form-control" name="category" id="category" required>

                                                        @foreach ($categories as $category)
                                                          <option value="{{ $category }}" @if(isset($supportFaq) && $supportFaq->category == $category) selected @endisset>{{ $category }}</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                              <div class="form-group">
                                                  <label class="form-control-label w-100" for="answer">Answer: </label>
                                                  <textarea name="answer" id="answer" class="form-control" rows="5" cols="80">{{ $supportFaq->answer ?? old('answer') }}</textarea>
                                              </div>
                                            </div>


                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary" name="button">
                                                @isset($supportFaq)
                                                  Update
                                                @else
                                                  Submit
                                                @endisset
                                                </button>
                                            </div>

                                        </div>
                                    </form>
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
