<?php
	if(session_id() == '') {
	    session_start();
	}
	include('db-connect.php');
	$user = $_SESSION["username"];
	$query = "SELECT id FROM users WHERE username = '$user';";
	$result = pg_query($conn, $query);
	if (!$result) {
        echo "db query error.\n";
        exit;
    }
    $row = pg_fetch_row($result);
    $user_id = $row[0];
    $query = "SELECT distinct playlistid from playlistSongs where userid = '$user_id'";
    $result = pg_query($conn, $query);
    if (!$result) {
        echo "db query error.\n";
        exit;
    }
    while($row = pg_fetch_row($result)){
        echo $row[0];
        
        $query = "SELECT name from playlists where id = '$row[0]'";
    	$res = pg_query($conn, $query);
    	if (!$result) {
        	echo "db query error.\n";
        	exit;
    	}
    	$r = pg_fetch_row($res);
    	$playlist_name = $r[0];
    	$query = "SELECT name, filepath, songart FROM songs where id in (select songid from playlistsongs where playlistid = '$row[0]')";
    	$re = pg_query($conn, $query);
    	while($ro = pg_fetch_row($re)){
    		$name =  $ro[0];
    		$filepath = $ro[1];
    		$imagepath = $ro[2];
    		echo '<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
                <div class="item">
                    <div class="pos-rlt">
                        <div class="bottom"><span
                                class="badge bg-info m-l-sm m-b-sm"></span></div>
                        <div class="item-overlay opacity r r-2x bg-black">
                            <div class="text-info padder m-t-sm text-sm"><i
                                    class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                    class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                    class="fa fa-star-o text-muted"></i></div>
                            <div class="center text-center m-t-n"><a href="index.html#"><i
                                        class="icon-control-play i-2x"></i></a></div>
                            <div class="bottom padder m-b-sm"><a href="index.html#"
                                                                 class="pull-right"> <i
                                        class="fa fa-heart-o"></i> </a> <a href="index.html#"> <i
                                        class="fa fa-plus-circle"></i> </a></div>
                        </div>
                        <a href="index.html#"><img src="'.$imagepath .'" alt=""
                                                   class="r r-2x img-full"></a></div>
                    <div class="padder-v"><a href="index.html#" class="text-ellipsis">' .$playlist_name .'</a> <a href="index.html#" class="text-ellipsis text-xs text-muted">Miaow</a>
                    </div>
                </div>
            </div>';	
    	}
    }

?>
