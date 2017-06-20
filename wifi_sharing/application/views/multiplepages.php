<!--Breadcrumb Banner Area Start-->
                <div class="breadcrumb-banner-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="breadcrumb-text">
                                    <h1 class="text-center">ABOUT US</h1>
                                    <div class="breadcrumb-bar">
                                        <ul class="breadcrumb text-center">
                                            <li><a href="index-2.html">Home</a></li>
                                            <li>ABOUT US</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End of Breadcrumb Banner Area-->


<!--breadcrumbs start-->
<div id="breadcrumbs-wrapper">
    <!-- Search for small screen -->
    <div class="header-search-wrapper grey hide-on-large-only">
        <i class="mdi-action-search active"></i>
        <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Explore Materialize">
    </div>
    <div class="container">
        <div class="row">
            <div class="col s12 m12 l12">
                <h5 class="breadcrumbs-title">{{current_page.name}}</h5>
                <ol class="breadcrumbs">
                    <li><a href="#/home">Beranda</a></li>
                    <li class="active">{{current_page.name}}</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <?php
    foreach($list as $row)
    {
    ?>
    <div class="col s12 m4 l4" ng-repeat="news in berita">
        <div id="profile-card" class="card">
            <div class="card-image waves-effect waves-block waves-light">
                <a><img class="activator" check-image ng-src="{{news.image}}" alt="blog-img"></a>
            </div>
            <div class="card-content">
                <a class="btn-floating waves-effect waves-light green accent-4 btn-move-up right"><i class="mdi-social-share"></i></a>
                <a class="btn-floating waves-effect waves-light light-blue btn-move-up right"><i class="mdi-action-info activator"></i></a>
                <p class="row">
                    <span class="left"><a href="#/{{news.link}}"><small><b>{{news.name}}</b></small></a></span>
                    <span class="right"><small>{{news.created_format}}</small></span>
                </p>
                <h4 class="card-title grey-text text-darken-4 truncate"><a  class="grey-text activator text-darken-4">{{news.title}}</a></h4>
                <div class="row">
                    <div class="col s12">
                        <a href="#{{current_page.link}}/detail/{{news.id}}" class="btn waves-effect waves-light blue">Selengkapnya</a>
                    </div>
                </div>
            </div>
            <div class="card-reveal">
                <span class="card-title grey-text text-darken-4">{{news.title}} <i class="mdi-navigation-close right"></i></span>
                <div ng-bind-html="news.content"></div>

            </div>
        </div>
    </div>
    <?php
        }
    ?>
</div>
<div class="section">
    <div class="row">
        <ul class="col s4 offset-s5 pagination" ng-bind-html="link"></ul>
    </div>
</div>
<!--/ end blog list -->