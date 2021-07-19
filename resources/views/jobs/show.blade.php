@extends('layouts.main')

@section('banner', 'Job: '.$job->title)

@section('content')
<div class="col-lg-8 post-list">
    <div class="single-post d-flex flex-row">
        <div class="thumb">
            @if($job->company && $job->company->logo)
            <img class="logo-company" src="{{ $job->company->logo->getUrl() }}" alt="{{ $job->company->name }}">
            @endif
        </div>
        <div class="details">
            <div class="title d-flex flex-row justify-content-between">
                <div class="titles">
                    <a href="#">
                        <h4>{{ $job->title }}</h4>
                    </a>
                    @if($job->company)
                    <h6>{{ $job->company->name }}</h6>
                    @endif
                </div>
            </div>
            <p>
                {!! $job->short_description !!}
            </p>
            <h5>Job Nature: {{ $job->job_nature }}</h5>
            <p class="address"><span class="lnr lnr-map"></span> {{ $job->address }}</p>
            <p class="address"><span class="lnr lnr-database"></span> {{ $job->salary }}</p>
            <!-- Btn Apply -->
            <div class="row-6">
                <a class="btn btn-success col-4" href="#">
                    Apply now
                </a>
            </div>
        </div>
    </div>
    <div class="single-post job-details">
        <h4 class="single-title">Mô tả công việc</h4>
        <p>
            {!! $job->full_description !!}
        </p>
        <h4 class="single-title">Yêu cầu kinh nghiệm</h4>
        <p>
            {!! $job->requirements !!}
        </p>
    </div>
    <!-- <div class="single-post ">

    </div> -->

</div>
@endsection