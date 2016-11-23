<?php
/**
 * Created by PhpStorm.
 * User: chirath
 * Date: 16/11/16
 * Time: 9:47 PM
 */
?>


<section class="vbox">
    <section class="scrollable padder-lg w-f-md" id="bjax-target"><a href="index.html#"
                                                                     class="pull-right text-muted m-t-lg"
                                                                     data-toggle="class:fa-spin"><i
                class="icon-refresh i-lg inline" id="refresh"></i></a>
        <h2 class="font-thin m-b">Discover <span class="musicbar animate inline m-l-sm"
                                                 style="width:20px;height:20px"> <span
                    class="bar1 a1 bg-primary lter"></span> <span class="bar2 a2 bg-info lt"></span> <span
                    class="bar3 a3 bg-success"></span> <span
                    class="bar4 a4 bg-warning dk"></span> <span
                    class="bar5 a5 bg-danger dker"></span> </span></h2>



        <div class="row row-sm">
        <!--  Discover  -->



            <?php include('src/playlist.php');?>



            <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
                <div class="item">
                    <div class="pos-rlt">
                        <div class="item-overlay opacity r r-2x bg-black active">
                            <div class="text-info padder m-t-sm text-sm"><i
                                    class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                    class="fa fa-star"></i> <i
                                    class="fa fa-star-o text-muted"></i> <i
                                    class="fa fa-star-o text-muted"></i></div>
                            <div class="center text-center m-t-n"><a href="index.html#"
                                                                     data-toggle="class"> <i
                                        class="icon-control-play i-2x text"></i> <i
                                        class="icon-control-pause i-2x text-active"></i> </a></div>
                            <div class="bottom padder m-b-sm"><a href="index.html#"
                                                                 class="pull-right active"
                                                                 data-toggle="class"> <i
                                        class="fa fa-heart-o text"></i> <i
                                        class="fa fa-heart text-active text-danger"></i> </a> <a
                                    href="index.html#" data-toggle="class"> <i
                                        class="fa fa-plus-circle text"></i> <i
                                        class="fa fa-check-circle text-active text-info"></i> </a>
                            </div>
                        </div>
                        <a href="index.html#"><img src="images/p2.jpg" alt=""
                                                   class="r r-2x img-full"></a></div>
                    <div class="padder-v"><a href="index.html#" class="text-ellipsis">Vivamus
                            vel tincidunt libero</a> <a href="index.html#"
                                                        class="text-ellipsis text-xs text-muted">Lauren
                            Taylor</a></div>
                </div>
            </div>


        </div>



        <div class="row">

            <!-- New songs sections -->

            <div class="col-md-7"><h3 class="font-thin">New Songs</h3>
                <div class="row row-sm">

                    <?php
                        include("src/db-connect.php");
                        $query = "SELECT * from songs order by id desc;";
                        $result = pg_query($conn, $query);
                        if (!$result) {
                            echo "db query error.\n";
                            exit;
                        }
                        $i=0;
                        while($row = pg_fetch_row($result)) {
                            if($row[3]) $img = $row[3]; else $img = 'img/default/default.jpg';

                            echo '<div class="col-xs-6 col-sm-3">
                                            <div class="item">
                                                <div class="pos-rlt">
                                                    <div class="item-overlay opacity r r-2x bg-black">
                                                        <div class="center text-center m-t-n"><a 
                                                        onclick="' . "addSong('" . $row[1] . "', '" . $row[2] . "' ,'" . $row[3] . "', '" . $row[5] . "')" . '"><i
                                                                    class="fa fa-play-circle i-2x"></i></a></div>
                                                    </div>
                                                    <a onclick="' . "addSong('" . $row[1] . "', '" . $row[2] . "' ,'" . $row[3] . "', '" . $row[5] . "')" . '"><img src="' . $img . '" alt=""
                                                                               class="r r-2x img-full"></a></div>
                                                <div class="padder-v"><a onclick="' . "addSong('" . $row[1] . "', '" . $row[2] . "' ,'" . $row[3] . "', '" . $row[5] . "')" . '"class="text-ellipsis">' . $row[1] .'
                                                </a> <a onclick="' . "addSong('" . $row[1] . "', '" . $row[2] . "' ,'" . $row[3] . "', '" . $row[5] . "')" . '"
                                                                    class="text-ellipsis text-xs text-muted">' . $row[2] . '</a>
                                                </div>
                                            </div>
                                        </div>';
                                        $i++;
                                        if($i>9) {
                                            break;
                                        }
                          }
                         ?>



                   



                </div>
            </div>

            <!-- Top songs section -->
            <div class="col-md-5"><h3 class="font-thin">Top Songs</h3>
                <div class="list-group bg-white list-group-lg no-bg auto">

                    <a href="index.html#" class="list-group-item clearfix">
                        <span class="pull-right h2 text-muted m-l">1</span> <span
                            class="pull-left thumb-sm avatar m-r"> <img src="images/a4.png"
                                                                        alt="..."> </span> <span
                            class="clear"> <span>Little Town</span> <small
                                class="text-muted clear text-ellipsis">by Chris Fox</small> </span>
                    </a>

                    <a href="index.html#" class="list-group-item clearfix"> <span
                            class="pull-right h2 text-muted m-l">2</span> <span
                            class="pull-left thumb-sm avatar m-r"> <img src="images/a5.png"
                                                                        alt="..."> </span> <span
                            class="clear"> <span>Lementum ligula vitae</span> <small
                                class="text-muted clear text-ellipsis">by Amanda Conlan</small> </span>
                    </a>

                </div>
            </div>
        </div>



        <div class="row m-t-lg m-b-lg">
            <div class="col-sm-6">
                <div class="bg-primary wrapper-md r"><a href="login.php#"> <span
                            class="h4 m-b-xs block"><i class=" icon-user-follow i-lg"></i> Login or Create account</span>
                        <span class="text-muted">Login to save the songs in one go!</span>
                    </a></div>
            </div>
            <div class="col-sm-6">
                <div class="bg-black wrapper-md r"><a href="index.html#"> <span
                            class="h4 m-b-xs block"><i class="icon-cloud-download i-lg"></i> Download our app</span>
                        <span class="text-muted">Get the apps for desktop and mobile to start listening music at anywhere and anytime.</span>
                    </a></div>
            </div>
        </div>
    </section>


    <?php include("src/player.php") ?>


</section>