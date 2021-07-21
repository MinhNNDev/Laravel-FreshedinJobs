@extends('layouts.main')

@section('home')
<section class="banner-area relative" id="home">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row fullscreen d-flex align-items-center justify-content-center">
            <div class="banner-content col-lg-12">
                <h1 class="text-white">
                    <span>1500+</span> Công việc chất lượng dành cho bạn
                </h1>
                <form action="{{ route('search') }}" class="serach-form-area">
                    <div class="row justify-content-center form-wrap">
                        <div class="col-lg-4 form-cols">
                            <input type="text" class="form-control" name="search" placeholder="Bạn đang tìm việc gì ?">
                        </div>
                        <div class="col-lg-3 form-cols">
                            <div class="default-select" id="default-selects">
                                <select name="location">
                                    <option value="0">Khu vực</option>
                                    @foreach($searchLocations as $id=>$searchLocations)
                                    <option value="{{ $id }}">{{ $searchLocations }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 form-cols">
                            <div class="default-select" id="default-selects2">
                                <select name="category">
                                    <option value="0">Các lĩnh vực</option>
                                    @foreach($searchCategories as $id=>$searchCategories)
                                    <option value="{{ $id }}">{{ $searchCategories }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2 form-cols">
                            <button type="submit" class="btn btn-info">
                                <span class="lnr lnr-magnifier"></span> Tìm kiếm
                            </button>
                        </div>
                    </div>
                </form>
                <p class="text-white"> <span>Tìm theo lĩnh vực riêng của bạn:</span>
                    @foreach($searchByCategory as $id=>$searchByCategory)
                    <a href="{{ route('categories.show', $id) }}" class="text-white">{{ $searchByCategory }}</a>@if (!$loop->last),@endif
                    @endforeach
                </p>
            </div>
        </div>
    </div>
</section>
@endsection

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
            <span class="tech-stack">{{ $categories->name }}</span>
            @endforeach
            <h6 class="job-nature">TCCV: {{ $job->job_nature }}</h6>
            <p class="address"><span class="lnr lnr-map"></span> {{ $job->address }}</p>
            <p class="address"><span class="lnr lnr-database"></span> {{ $job->salary }}</p>
        </div>
    </div>
    @endforeach

    <a class="text-uppercase loadmore-btn mx-auto d-block" href="{{ route('jobs.index') }}">Tải thêm công việc</a>
</div>
@endsection