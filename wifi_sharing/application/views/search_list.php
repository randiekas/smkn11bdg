<!--Breadcrumb Banner Area Start-->
                <div class="breadcrumb-banner-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="breadcrumb-text">
                                    <h1 class="text-center">Pencarian</h1>
                                    <div class="breadcrumb-bar">
                                        <ul class="breadcrumb text-center">
                                            <li><a href="#/home">Pencarian</a></li>
                                            <li class=""><?=$this->uri->segment(3) ?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End of Breadcrumb Banner Area-->

<!--About Page Area Start-->
                <div class="about-page-area section-padding">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="section-title-wrapper">
                                    <div class="section-title">
                                        <h3>Ditemukan data sebanyak : <b><?=$total_data?></b></h3>
                                        <p><?=$this->uri->segment("3")?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <!-- multiple page !-->
                            <?php
                            foreach($list as $row)
                            {

                            ?>
                            <div class="col-md-4 col-sm-6">
                                <div class="single-event-item">
                                    <div class="single-event-image">
                                        <a href="#/<?=$row["link"]?>/detail/<?=$row["id"]?>">
                                            <img class="activator" check-image src="<?=base_url($row["image"])?>" alt="blog-img" style="height:219px;">
                                            <span><span>15</span>Jun</span>
                                        </a>
                                    </div>
                                    <div class="single-event-text">
                                        <h3 style="overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-line-clamp: 2;-webkit-box-orient: vertical;"><a href="#/<?=$row["link"]?>/detail/<?=$row["id"]?>"><?=$row["title"]?></a></h3>
                                        <div class="single-item-comment-view">
                                           <span class="left"><a href="#/<?=$row["link"]?>"><small><b><?=$row["name"]?></b></small></a></span>
                                            <span class="right"><small><?=$row["created_format"]?></small></span>
                                       </div>
                                       
                                        <a href="#<?=$row["link"]?>/detail/<?=$row["id"]?>" class="btn waves-effect waves-light blue">Selengkapnya</a>  
                                        
                                    </div>
                                </div>
                                <br/>
                            </div>
                            <?php
                            }
                            ?>
                            <!-- multiple page !-->
                        </div>
                        <div class="col-md-12 ">
                            <ul class="col s12 offset-s5 pagination"><?=$link?></ul>
                        </div>
                        
                    </div>
                </div>
                <!--End of About Page Area-->
