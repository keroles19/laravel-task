@extends('layouts.layouts')
@section('content')

    <div class="content-body">
        <!-- Input Mask start -->
        <section id="input-mask-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">@lang('Create Company')</h4>
                        </div>
                        <div class="card-body">
                            @include('partials.errors')
                            <form action="{{route('company.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-xl-6 col-md-6 col-sm-12 mb-2">
                                        <label class="form-label" >@lang('Company_name')</label>
                                        <input type="text" name="name" class="form-control"
                                               placeholder="Enter Name"/>
                                    </div>

                                    <div class="col-xl-6 col-md-6 col-sm-12 mb-2">
                                        <label class="form-label" >@lang('address')</label>
                                        <input type="text" name="address" class="form-control"
                                               placeholder="Enter Address"/>
                                    </div>

                                    <div class="col-xl-12 col-md-6 col-sm-12 mb-2">
                                        <label class="form-label" >@lang('Logo')</label>
                                        <img id="blah" alt="your image" width="100" height="100" />
                                        <input type="file" class="form-control" name="file_upload" type="file" id="customFile1"
                                    onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                                    </div>

                                    <div class="col-12 d-grid gap-6" style="margin-top: 10px;">
                                        <button class="btn btn-icon btn-primary btn-block" type="submit">
                                            @lang('Submit')
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Input Mask End -->

    </div>
@endsection

