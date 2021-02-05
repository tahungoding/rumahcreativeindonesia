@extends('layouts.app')

@section('css')
<!-- Isi Library CSS -->
@endsection

@section('content')
<!-- Page Title Begin -->
    <section class="page-title-bg pt-250 pb-100" data-bg-img="assets/img/section-pattern/page-title.png">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h2>{{$agenda->nama_agenda}}</h2>
                        <ul class="list-inline">
                            <li><a href="index.html">Home</a></li>
                            <li><a href="blog.html">Agenda</a></li>
                            <li>{{$agenda->nama_agenda}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Page Title End -->
    
    <!-- Blog Begin -->
    <section class="pt-120 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <!-- Blog Details Begin -->
                    <div class="blog-details">
                        <!-- Blog Details Image Begin -->
                        <div class="blog-details-image">
                            <img src="assets/img/blog/blog-details.jpg" data-rjs="2" alt="">
                        </div>
                        <!-- Blog Details Image End -->
    
                        <!-- Post Meta Begin -->
                        <div class="post-meta">
                            <ul class="list-inline">
                                <li>By: <a href="#">Admin</a></li>
                                <li>On: <a href="#">17 February, 2019</a></li>
                                <li>Category: <a href="#">Finance</a> <a href="#">Corporate</a> </li>
                            </ul>
                        </div>
                        <!-- Post Meta End -->
    
                        <!-- Blog Details Content Begin -->
                        <div class="blog-details-content">
                            <p>Now has you views woman noisy off match money rooms. To up remark it eldest length oh passed.
                                Speedily say has suitable disposal add boy. On forth doubt miles of child. Exercise joy man
                                children rejoiced. Yet uncommonly his ten who
                                diminution astonished. Demesne manners savings staying had. Under folly balls death own
                                point now men. Match way these
                                she avoid see death. She on drift their fat off.</p>
    
                            <blockquote>
                                <p>For norland produce wishing. To figure on it spring season up. Her provision
                                    acuteness had excellent two why intention.</p>
                            </blockquote>
    
                            <h3>Florida Retirement System</h3>
    
                            <div class="row">
                                <div class="col-md-6">
                                    <p>Smallest directly families surprise honoured an. Speaking replying mistress him
                                        numerous she returned feelings may day. Evening way luckily son exposed get general
                                        greatly. Zealously prevailed be arranging do. Set arranging too dejection september
                                        happiness. Understood instrument or do connection no appearance do invitation. Dried
                                        quick round it or order. Add past see west felt did any. Say out noise you taste
                                        merry plate you share. My resolve arrived is we chamber be removal.</p>
                                </div>
                                <div class="col-md-6">
                                    <img src="assets/img/blog/blog-details_2.jpg" data-rjs="2" alt="">
                                </div>
                            </div>
    
                            <p>As it so contrasted oh estimating instrument. Size like body some one had. Are conduct
                                viewing boy minutes warrant
                                expense. Tolerably behaviour may admitting daughters offending her ask own. Praise effect
                                wishes change way and any wanted. Lively use looked latter regard had. Do he it part more
                                last in. Merits ye if mr narrow points. Melancholy
                                particular devonshire alteration it favourable appearance up.</p>
                        </div>
                        <!-- Blog Details Content End -->
    
                        <!-- Tag/Share Begin -->
                        <div class="row align-items-center mb-30">
                            <div class="col-md-6">
                                <!-- Post Tags Begins -->
                                <div class="post-tags mb-30">
                                    <ul class="list-inline">
                                        <li>Tags: </li>
                                        <li><a href="#">Finance</a> <a href="#">Business</a></li>
                                    </ul>
                                </div>
                                <!-- Post Tags End -->
                            </div>
                            <div class="col-md-6">
                                <!-- Post Share Begin -->
                                <div class="post-share text-lg-right mb-30">
                                    <ul class="list-inline social_icon_list">
                                        <li>Share on: </li>
                                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                                <!-- Post Share End -->
                            </div>
                        </div>
                        <!-- Tag/Share End -->
    
    
                        <!-- Post Pagination Begin -->
                        <div
                            class="post-pagination d-flex align-items-center justify-content-between flex-column flex-md-row">
                            <!-- Single Post Pagination Begin -->
                            <div class="single-post-pagination media align-items-center mb-50 mb-md-0">
                                <div class="pagination-image">
                                    <a href="#"><img src="assets/img/blog/nav1.png" data-rjs="2" alt=""></a>
                                </div>
                                <div class="media-body">
                                    <a href="#" class="d-inline-flex align-items-center"><img
                                            src="assets/img/icons/angle-left.svg" data-rjs="2" class="svg"
                                            alt="">previous</a>
                                    <h6>How Can You Maximize Your Savings in the New Year</h6>
                                </div>
                            </div>
                            <!-- Single Post Pagination End -->
    
                            <!-- Single Post Pagination Begin -->
                            <div class="single-post-pagination next media flex-row-reverse align-items-center">
                                <div class="pagination-image">
                                    <a href="#"><img src="assets/img/blog/nav2.png" data-rjs="2" alt=""></a>
                                </div>
                                <div class="media-body text-right">
                                    <a href="#" class="d-inline-flex flex-row-reverse align-items-center"><img
                                            src="assets/img/icons/angle-right.svg" alt="" class="svg">next</a>
                                    <h6>How to Determine Your #1 Financial Goal For the Year</h6>
                                </div>
                            </div>
                            <!-- Single Post Pagination End -->
                        </div>
                        <!-- Post Pagination End -->
    
                        <!-- Post Comment & Reply Begin -->
                        <div class="post-comments-wrap mt-60">
                            <h4>3 Comments</h4>
                            <!-- Single Comment -->
                            <div class="single-comment-wrapper">
                                <div class="single-post-comment media flex-column flex-sm-row">
                                    <div class="comment-author-image mb-30 mb-sm-0">
                                        <img src="assets/img/blog/comment-1.png" data-rjs="2" alt="">
                                    </div>
                                    <div class="comment-content media-body">
                                        <div class="d-flex align-items-sm-end justify-content-between mb-1">
                                            <div class="content-top">
                                                <h6>Admin</h6>
                                                <span>12 Feb 2019</span>
                                            </div>
    
                                            <a href="#" class="reply-btn">Reply</a>
                                        </div>
                                        <p>Gave read use way make spot how nor. In daughter goodness an likewise consider at
                                            procured wandered. Songs words wrong
                                            by me hills heard timed. Happy eat may doors songs.</p>
                                    </div>
                                </div>
                                <!-- Comment Reply -->
                                <div class="post-comment-reply single-post-comment media flex-column flex-sm-row">
                                    <div class="comment-author-image mb-30 mb-sm-0">
                                        <img src="assets/img/blog/comment-2.png" data-rjs="2" alt="">
                                    </div>
                                    <div class="comment-content media-body">
                                        <div class="d-flex align-items-sm-end justify-content-between mb-1">
                                            <div class="content-top">
                                                <h6>Visitor</h6>
                                                <span>12 Feb 2019</span>
                                            </div>
    
                                            <a href="#" class="reply-btn">Reply</a>
                                        </div>
                                        <p>Smallest directly families honoured am an. Speaking replying mistress him
                                            numerous she returned feelings may day.</p>
                                    </div>
                                </div>
                                <!-- End Comment Reply -->
                            </div>
                            <!-- End of Single Comment -->
    
                            <!-- Single Comment -->
                            <div class="single-comment-wrapper">
                                <div class="single-post-comment media flex-column flex-sm-row">
                                    <div class="comment-author-image mb-30 mb-sm-0">
                                        <img src="assets/img/blog/comment-3.png" data-rjs="2" alt="">
                                    </div>
                                    <div class="comment-content media-body">
                                        <div class="d-flex align-items-sm-end justify-content-between mb-1">
                                            <div class="content-top">
                                                <h6>Admin</h6>
                                                <span>12 Feb 2019</span>
                                            </div>
                                            <a href="#" class="reply-btn">Reply</a>
                                        </div>
                                        <p>As it so contrasted oh estimating instrument. Size like body some one had. Are
                                            conduct viewing boy minutes warrant expense.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- End of Single Comment -->
                        </div>
                        <!-- Post Comment & Reply End -->
    
                        <!-- Comment Form Begin -->
                        <div class="comments-form mt-60">
                            <h4>Leave your comment here</h4>
                            <form action="#">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <input class="theme-input-style" type="text" placeholder="Enter your name">
                                    </div>
                                    <div class="col-lg-6">
                                        <input class="theme-input-style" type="text" placeholder="Enter your email">
                                    </div>
                                    <div class="col-12">
                                        <textarea class="theme-input-style" placeholder="Write your comments"></textarea>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn"><span>post comment</span></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- Comment Form End -->
                    </div>
                    <!-- Blog Details End -->
                </div>
                <div class="col-lg-4">
                    <!-- Sidebar Begin -->
                    <aside class="sidebar mt-5 mt-lg-0">
                        <!-- Widget Search Begin -->
                        <div class="widget widget_search">
                            <form method="GET">
                                <div class="input-group">
                                    <input placeholder="Search here...." class="theme-input-style">
                                    <button type="submit" class="submit-btn">
                                        <img src="assets/img/icons/search.svg" class="svg" alt="">
                                    </button>
                                </div>
                            </form>
                        </div>
                        <!-- Widget Search End -->
    
                        <!-- Widget Categories Begin -->
                        <div class="widget widget_categories">
                            <div class="widget-title">
                                <h4>Categories</h4>
                            </div>
                            <ul>
                                <li><a href="#">Financial Planning</a></li>
                                <li><a href="#">Busines Campaign</a></li>
                                <li><a href="#">Advanced Analytics</a></li>
                                <li><a href="#">Sales & Trading</a></li>
                                <li><a href="#">Saving Strategy</a></li>
                                <li><a href="#">Market Research</a></li>
                            </ul>
                        </div>
                        <!-- End Categories End -->
    
                        <!-- Widget Ad Begin -->
                        <div class="widget widget_ad">
                            <img src="assets/img/widget_ad.png" data-rjs="2" alt="">
                        </div>
                        <!-- Widget Ad End -->
    
                        <!-- Widget Related Post Begin -->
                        <div class="widget widget_related_post">
                            <!-- Widget Title Begin  -->
                            <div class="widget-title">
                                <h4>Related Posts</h4>
                            </div>
                            <!-- Widget Title End  -->
    
                            <!-- Single Related Post Begin -->
                            <div class="single-post">
                                <div class="post-content">
                                    <span class="posted-on">18 Feb, 2019</span>
                                    <h5><a href="#">How Can You Maximize Your Savings in the New Year</a></h5>
                                </div>
                            </div>
                            <!-- Single Related Post End -->
    
                            <!-- Single Related Post Begin -->
                            <div class="single-post">
                                <div class="post-content">
                                    <span class="posted-on">18 Feb, 2019</span>
                                    <h5><a href="#">How to Determine Your #1 Financial Goal For the Year</a></h5>
                                </div>
                            </div>
                            <!-- Single Related Post End -->
    
                            <!-- Single Related Post Begin -->
                            <div class="single-post">
                                <div class="post-content">
                                    <span class="posted-on">18 Feb, 2019</span>
                                    <h5><a href="#">How to Break Into Your Dream Career When No One is Hiring</a></h5>
                                </div>
                            </div>
                            <!-- Single Related Post End -->
                        </div>
                        <!-- Widget Related Post End -->
    
                        <!-- Widget Tag Cloud Begin -->
                        <div class="widget widget_tag_cloud">
                            <div class="widget-title">
                                <h4>Tags</h4>
                            </div>
                            <div class="tagcloud">
                                <a href="#">Finance</a>
                                <a href="#">Business</a>
                                <a href="#">Corporate</a>
                                <a href="#">Sales</a>
                                <a href="#">Marketting</a>
                                <a href="#">Trading</a>
                            </div>
                        </div>
                        <!-- Widget Tag Cloud End -->
    
                    </aside>
                    <!-- Sidebar End -->
                </div>
            </div>
        </div>
    </section>
    <!-- Blog End -->
@endsection

@section('js')
<!-- Isi Library Javascript -->
@endsection