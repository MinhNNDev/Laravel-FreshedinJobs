@extends('layouts.main')

@section('banner', $banner)

@section('content')
<div class="col-lg-8 post-list">
    @foreach($jobs as $job)
    <div class="single-post d-flex flex-row">
        <div class="thumb">
            @if($job->company->logo)
            <img class="logo-company" src="{{ $job->company->logo->getUrl() }}" alt="">
            @endif
        </div>
        <div class="details">
            <div class="title d-flex flex-row justify-content-between">
                <div class="titles">
                    <a href="{{ route('jobs.show', $job->id) }}">
                        <h4>{{ $job->title }}</h4>
                    </a>
                    <h6>{{ $job->company->name }}</h6>
                </div>
            </div>

            @foreach($job->categories as $id => $categories)
            <span class="label label-info label-many tech-stack">{{ $categories->name }}</span>
            @endforeach
            <h6 class="job-nature">TCCV: {{ $job->job_nature }}</h6>
            <p class="address"><span class="lnr lnr-map"></span> {{ $job->address }}</p>
            <p class="address"><span class="lnr lnr-database"></span> {{ $job->salary }}</p>
        </div>
    </div>
    @endforeach
    {{ $jobs->appends(request()->query())->links() }}
</div>
@endsection