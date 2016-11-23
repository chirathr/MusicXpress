
<?php
    include("src/db-connect.php");
    $query = "SELECT * from songs";
    $result = pg_query($conn, $query);
    if (!$result) {
        echo "db query error.\n";
        exit;
    }
    while($row = pg_fetch_row($result)) {



        echo '<div class="col-xs-6 col-sm-3">
                        <div class="item">
                            <div class="pos-rlt">
                                <div class="item-overlay opacity r r-2x bg-black">
                                    <div class="center text-center m-t-n"><a href="index.html#"><i
                                                class="fa fa-play-circle i-2x"></i></a></div>
                                </div>
                                <a href="index.html#"><img src="' . $row[3] . '" alt=""
                                                           class="r r-2x img-full"></a></div>
                            <div class="padder-v"><a href="index.html#" class="text-ellipsis">' . $row[1] .'
                            </a> <a href="index.html#"
                                                class="text-ellipsis text-xs text-muted">Miaow</a>
                            </div>
                        </div>
                    </div>';
      }
     ?>
