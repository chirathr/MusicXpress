<?php
/**
 * Created by PhpStorm.
 * User: chirath
 * Date: 16/11/16
 * Time: 9:14 PM
 */
?>
<aside class="bg-black dk nav-xs aside hidden-print" id="nav">
    <section class="vbox">
        <section class="w-f-md scrollable">
            <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0"
                 data-size="10px" data-railOpacity="0.2"> <!-- nav -->
                <nav class="nav-primary hidden-xs">
                    <ul class="nav bg clearfix">
                        <li class="hidden-nav-xs padder m-t m-b-sm text-xs text-muted"> Discover</li>
                        <li><a class ="clickabe" onclick="showSongs();"> <i class="icon-disc icon text-success"></i> <span
                                    class="font-bold">All Songs</span> </a></li>
                        <li><a href="upload.php"> <i class="icon-music-tone-alt icon text-info"></i> <span
                                    class="font-bold">Upload</span> </a></li>
                        <li><a class ="clickabe"> <i class="icon-drawer icon text-primary-lter"></i> <b
                                    class="badge bg-primary pull-right">6</b> <span
                                    class="font-bold">Discover</span> </a></li>
                        <li><a href="listen.html"> <i class="icon-list icon text-info-dker"></i> <span
                                    class="font-bold">Listen</span> </a></li>
                        <li><a href="video.html" data-target="#content" data-el="#bjax-el"
                               data-replace="true"> <i class="icon-social-youtube icon text-primary"></i>
                                <span class="font-bold">Video</span> </a></li>
                        <li class="m-b hidden-nav-xs"></li>
                    </ul>
                    <ul class="nav" data-ride="collapse">
                        <li class="hidden-nav-xs padder m-t m-b-sm text-xs text-muted"> Interface</li>
                        <li><a href="index.html#" class="auto"> <span class="pull-right text-muted"> <i
                                        class="fa fa-angle-left text"></i> <i
                                        class="fa fa-angle-down text-active"></i> </span> <i
                                    class="icon-screen-desktop icon"> </i> <span>Layouts</span> </a>
                            <ul class="nav dk text-sm">
                                <li><a href="layout-color.html" class="auto"> <i
                                            class="fa fa-angle-right text-xs"></i> <span>Color option</span>
                                    </a></li>
                                <li><a href="layout-boxed.html" class="auto"> <i
                                            class="fa fa-angle-right text-xs"></i> <span>Boxed layout</span>
                                    </a></li>
                                <li><a href="layout-fluid.html" class="auto"> <i
                                            class="fa fa-angle-right text-xs"></i> <span>Fluid layout</span>
                                    </a></li>
                            </ul>
                        </li>
                        <li><a href="index.html#" class="auto"> <span class="pull-right text-muted"> <i
                                        class="fa fa-angle-left text"></i> <i
                                        class="fa fa-angle-down text-active"></i> </span> <i
                                    class="icon-chemistry icon"> </i> <span>UI Kit</span> </a>
                            <ul class="nav dk text-sm">
                                <li><a href="buttons.html" class="auto"> <i
                                            class="fa fa-angle-right text-xs"></i> <span>Buttons</span> </a>
                                </li>
                                <li><a href="icons.html" class="auto"> <b class="badge bg-info pull-right">369</b>
                                        <i class="fa fa-angle-right text-xs"></i> <span>Icons</span> </a></li>
                                <li><a href="grid.html" class="auto"> <i
                                            class="fa fa-angle-right text-xs"></i> <span>Grid</span> </a></li>
                                <li><a href="widgets.html" class="auto"> <b
                                            class="badge bg-dark pull-right">8</b> <i
                                            class="fa fa-angle-right text-xs"></i> <span>Widgets</span> </a>
                                </li>
                                <li><a href="components.html" class="auto"> <i
                                            class="fa fa-angle-right text-xs"></i> <span>Components</span> </a>
                                </li>
                                <li><a href="list.html" class="auto"> <i
                                            class="fa fa-angle-right text-xs"></i> <span>List group</span> </a>
                                </li>
                                <li><a href="index.html#table" class="auto"> <span
                                            class="pull-right text-muted"> <i class="fa fa-angle-left text"></i> <i
                                                class="fa fa-angle-down text-active"></i> </span> <i
                                            class="fa fa-angle-right text-xs"></i> <span>Table</span> </a>
                                    <ul class="nav dker">
                                        <li><a href="table-static.html"> <i class="fa fa-angle-right"></i>
                                                <span>Table static</span> </a></li>
                                        <li><a href="table-datatable.html"> <i
                                                    class="fa fa-angle-right"></i> <span>Datatable</span> </a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="index.html#form" class="auto"> <span
                                            class="pull-right text-muted"> <i class="fa fa-angle-left text"></i> <i
                                                class="fa fa-angle-down text-active"></i> </span> <i
                                            class="fa fa-angle-right text-xs"></i> <span>Form</span> </a>
                                    <ul class="nav dker">
                                        <li><a href="form-elements.html"> <i class="fa fa-angle-right"></i>
                                                <span>Form elements</span> </a></li>
                                        <li><a href="form-validation.html"> <i
                                                    class="fa fa-angle-right"></i> <span>Form validation</span>
                                            </a></li>
                                        <li><a href="form-wizard.html"> <i class="fa fa-angle-right"></i>
                                                <span>Form wizard</span> </a></li>
                                    </ul>
                                </li>
                                <li><a href="chart.html" class="auto"> <i
                                            class="fa fa-angle-right text-xs"></i> <span>Chart</span> </a></li>
                                <li><a href="portlet.html" class="auto"> <i
                                            class="fa fa-angle-right text-xs"></i> <span>Portlet</span> </a>
                                </li>
                                <li><a href="timeline.html" class="auto"> <i
                                            class="fa fa-angle-right text-xs"></i> <span>Timeline</span> </a>
                                </li>
                            </ul>
                        </li>
                        <li><a href="index.html#" class="auto"> <span class="pull-right text-muted"> <i
                                        class="fa fa-angle-left text"></i> <i
                                        class="fa fa-angle-down text-active"></i> </span> <i
                                    class="icon-grid icon"> </i> <span>Pages</span> </a>
                            <ul class="nav dk text-sm">
                                <li><a href="profile.html" class="auto"> <i
                                            class="fa fa-angle-right text-xs"></i> <span>Profile</span> </a>
                                </li>
                                <li><a href="blog.html" class="auto"> <i
                                            class="fa fa-angle-right text-xs"></i> <span>Blog</span> </a></li>
                                <li><a href="invoice.html" class="auto"> <i
                                            class="fa fa-angle-right text-xs"></i> <span>Invoice</span> </a>
                                </li>
                                <li><a href="gmap.html" class="auto"> <i
                                            class="fa fa-angle-right text-xs"></i> <span>Google Map</span> </a>
                                </li>
                                <li><a href="jvectormap.html" class="auto"> <i
                                            class="fa fa-angle-right text-xs"></i> <span>Vector Map</span> </a>
                                </li>
                                <li><a href="signin.html" class="auto"> <i
                                            class="fa fa-angle-right text-xs"></i> <span>Signin</span> </a></li>
                                <li><a href="signup.html" class="auto"> <i
                                            class="fa fa-angle-right text-xs"></i> <span>Signup</span> </a></li>
                                <li><a href="404.html" class="auto"> <i
                                            class="fa fa-angle-right text-xs"></i> <span>404</span> </a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav text-sm">
                        <li class="hidden-nav-xs padder m-t m-b-sm text-xs text-muted"><span
                                class="pull-right"><a href="index.html#"><i class="icon-plus i-lg"></i></a></span>
                            Playlist
                        </li>
                        <li><a href="index.html#"> <i class="icon-music-tone icon"></i> <span>Hip-Pop</span>
                            </a></li>
                        <li><a href="index.html#"> <i class="icon-playlist icon text-success-lter"></i> <b
                                    class="badge bg-success dker pull-right">9</b> <span>Jazz</span> </a></li>
                    </ul>
                </nav> <!-- / nav --> </div>
        </section>
        <footer class="footer hidden-xs no-padder text-center-nav-xs">
            <div class="bg hidden-xs ">
                <div class="dropdown dropup wrapper-sm clearfix"><a href="index.html#"
                                                                    class="dropdown-toggle"
                                                                    data-toggle="dropdown">
                        <span class="thumb-sm avatar pull-left m-l-xs" id="song-img">
                            <img src="img/default/default.jpg" class="dker" alt="...">
                            <i class="on b-black"></i>
                        </span>
                        <span class="hidden-nav-xs clear"> <span class="block m-l"> <strong
                                    class="font-bold text-lt">John.Smith</strong> <b
                                    class="caret"></b> </span> <span class="text-muted text-xs block m-l">Art Director</span> </span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight aside text-left">
                        <li><span class="arrow bottom hidden-nav-xs"></span> <a
                                href="index.html#">Settings</a></li>
                        <li><a href="profile.html">Profile</a></li>
                        <li><a href="index.html#"> <span class="badge bg-danger pull-right">3</span>
                                Notifications </a></li>
                        <li><a href="docs.html">Help</a></li>
                        <li class="divider"></li>
                        <li><a href="modal.lockme.html" data-toggle="ajaxModal">Logout</a></li>
                    </ul>
                </div>
            </div>
        </footer>
    </section>
</aside> <!-- /.aside -->

<script>
    function showSongs() {
        var discover = document.getElementById("discover");
        discover.style.display = 'none';

        var top_songs = document.getElementById("top_songs");
        top_songs.style.display = 'none';

        document.getElementById("new-songs").className = "col-md-12";
    }

    function discover() {
        var discover = document.getElementById("top_songs");
        discover.style.display = 'none';

        var top_songs = document.getElementById("new-songs");
        top_songs.style.display = 'none';
    }
</script>