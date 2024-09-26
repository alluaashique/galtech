@extends('user.layout.app')
@section('content')
<!-- Body main wrapper start -->
<main>
    <!-- Breadcrumb area start  -->
    <div class="breadcrumb__area header__background-color breadcrumb__header-up breadcrumb-space overly overflow-hidden">
        <div class="breadcrumb__background" data-background="./assets/imgs/breadcrumb/page-header-1.png"></div>
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-12">
                    <div class="breadcrumb__content text-center">
                        <h2 class="breadcrumb__title mb-15 mb-sm-10 mb-xs-5 color-white title-animation">Department Details</h2>

                        <div class="breadcrumb__menu">
                            <nav>
                                <ul>
                                    <li><span><a href="index.html">Home</a></span></li>
                                    <li class="active"><span>Department Details</span></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb area start  -->

    <!-- blog area start  -->
    <section class="blog section-space">
        <div class="container">
            <div class="row">
                <div class="col-xl-8">
                    <div class="blog__details">
                        <div class="blog__details-thumb mb-20">
                            <img src="./assets/imgs/blog-details/blog-details-1.jpg" class="img-fluid" alt="image not found">
                        </div>
                        <div class="blog__details-content">
                            <h2>{{$department->name}}</h2>
                            {!! $department->description !!}

                        </div>
                    </div>
                </div>

                <div class="col-xl-4">
                    <div class="sidebar sidebar-rr-sticky">
                        <div class="sidebar__widget">
                            <h4 class="sidebar__widget-title mb-30 title-animation">Search Here </h4>
                            <div class="sidebar__widget-search">
                                <div class="search__bar">
                                <form action="{{route('departments.index')}}" method="get">
                                    <input type="text" id="search" name="search" placeholder="Search.." value="{{ request()->query('search') }}" required>
                                    <button type="submit">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8.41927 16.7487C10.3422 16.7487 12.1099 16.0872 13.5203 14.9904L18.0995 19.5695L19.5724 18.0966L14.9932 13.5174C16.0911 12.106 16.7526 10.3383 16.7526 8.41536C16.7526 3.82057 13.0141 0.0820312 8.41927 0.0820312C3.82448 0.0820312 0.0859375 3.82057 0.0859375 8.41536C0.0859375 13.0102 3.82448 16.7487 8.41927 16.7487ZM8.41927 2.16536C11.8661 2.16536 14.6693 4.96849 14.6693 8.41536C14.6693 11.8622 11.8661 14.6654 8.41927 14.6654C4.9724 14.6654 2.16927 11.8622 2.16927 8.41536C2.16927 4.96849 4.9724 2.16536 8.41927 2.16536Z" fill="#071C3C"/>
                                        </svg>
                                    </button>
                                </form>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar__widget">
                            <h4 class="sidebar__widget-title pb-18 title-animation">Category </h4>
                            <div class="sidebar__widget-category">
                                @foreach ($alldepartments as $row )
                                    <a href="{{route('departments.show', $row->slug)}}">{{$row->name}} </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- blog area end  -->
</main>
<!-- Body main wrapper end -->
@endsection
