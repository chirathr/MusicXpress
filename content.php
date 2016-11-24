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



        <div class="row row-sm" id="discover">
        <!--  Discover  -->



            <?php include('src/playlist.php');?>
            
        </div>


        <div class="row">

            <!-- New songs sections -->

            <div class="col-md-7" id="new-songs"><h3 class="font-thin">New Songs</h3>
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
                                                        class ="clickabe" onclick="' . "addSong('" . $row[1] . "', '" . $row[2] . "' ,'" . $img . "', '" . $row[5] . "')" . '"><i
                                                                    class="fa fa-play-circle i-2x"></i></a></div>
                                                    </div>
                                                    <a class ="clickabe" onclick="' . "addSong('" . $row[1] . "', '" . $row[2] . "' ,'" . $img . "', '" . $row[5] . "')" . '"><img src="' . $img . '" alt=""
                                                                               class="r r-2x img-full"></a></div>
                                                <div class="padder-v"><a class ="clickabe" onclick="' . "addSong('" . $row[1] . "', '" . $row[2] . "' ,'" . $img . "', '" . $row[5] . "')" . '"class="text-ellipsis">' . substr($row[1], 0, 10) .'
                                                </a> <a class ="clickabe" onclick="' . "addSong('" . $row[1] . "', '" . $row[2] . "' ,'" . $img . "', '" . $row[5] . "')" . '"
                                                                    class="text-ellipsis text-xs text-muted">' . substr($row[2], 0 ,5) . '</a>
                                                </div>
                                            </div>
                                        </div>';
                                        $i++;
                                        if($i>20) {
                                            break;
                                        }
                          }
                         ?>
                </div>
            </div>

            <!-- Top songs section -->
            <div class="col-md-5" id="top_songs"><h3 class="font-thin">Top Songs</h3>
                <div  class="list-group bg-white list-group-lg no-bg auto">

                    <?php
                    include("src/db-connect.php");
                    $query = "SELECT * from songs order by id;";
                    $result = pg_query($conn, $query);
                    if (!$result) {
                        echo "db query error.\n";
                        exit;
                    }
                    $i=0;
                    while($row = pg_fetch_row($result)) {
                        if($row[3]) $img = $row[3]; else $img = 'img/default/default.jpg';

                        echo '<a onclick="' . "addSong('" . $row[1] . "', '" . $row[2] . "' ,'" . $img . "', '" . $row[5] . "')" . '" class="list-group-item clearfix">
                        <span class="pull-right h2 text-muted m-l">1</span> 
                        <span class="pull-left thumb-sm avatar m-r"> 
                            <img src="' . $img . '" alt="..."> 
                        </span> 
                        <span class="clear"> <span>' . $row[1] .'</span> 
                        <small class="text-muted clear text-ellipsis">' . $row[2] .'</small> 
                        </span>
                    </a>';

                        $i++;
                        if ($i > 3) {
                            break;
                        }
                    }
                    ?>


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
                <div class="bg-black wrapper-md r"><a href="upload.php#"> <span
                            class="h4 m-b-xs block"><i class="icon-cloud-download i-lg"></i> Upload</span>
                        <span class="text-muted">Uploadmusic and share your creativity with the world</span>
                    </a></div>
            </div>
        </div>
    </section>


    <?php include("src/player.php") ?>


</section>