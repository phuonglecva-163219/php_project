<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous"> -->

</head>
<body>
    <div class="header">
        <?php require_once '/var/www/html/mvc/views/layouts/header_admin.php' ?>
    </div>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Thumb</th>
            <th scope="col">Title</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
                <?php 
                    $currentPage = $data['currentPage'];
                    $numPage = $data['numPage'];
                    $from = $numPage * ($currentPage - 1);
                    $end = $from + $numPage - 1;
                    $i = 0;
                    $arr = [];
                    while($row = mysqli_fetch_array($data['posts'])) {
                        array_push($arr, $row);
                    }
                    require_once '/var/www/html/mvc/controllers/action/admin_action.php';
                    $app = new Admin_Action($arr[0]);
                    // echo $app->getHtml();
                    $data['lenarr'] = count($arr);
                    if ($end > $data['lenarr']) {
                        $end = $data['lenarr'] - 1;
                    }
                    for($i = $from; $i <= $end; $i++) {
                        $row = $arr[$i];
                        $app = new Admin_Action($row);
                        // print_r($app->getHtml());
                        $status = 'Disable';
                        if ($row['status'] == 1) {
                            $status = 'Enable';
                        }
                        echo '<tr">';
                        echo '<th scope="row" style="width:5%;">'.$row['id'].'</th>';
                        echo '<td style="width:15%;">'.'<img src ="/public/images/'.$row['image'].'" class="img-thumbnail"/>'.'</td>';
                        echo '<td style="width:40%;">'.$row['title'].'</td>';
                        echo '<td style="width:15%;">'.$status.'</td>';
                        
                        echo '<td style="width:15%;">'.$app->getHtml().'</td>';
                        echo '</tr>';
                    }
                ?>
        </tbody>
    </table>
    <div>
        
    </div>
    <div class="footer">
        <div class="row">
        
            <div class="dropdown col-md-5">
                <span>Page: </span>
                <button type="button" class="btn dropdown-toggle border" data-toggle="dropdown">
                <?php 
                    echo $data['numPage'];
                ?>
                </button>
                    <div class="dropdown-menu" id="SelectMe">
                    <a class="dropdown-item" href="http://localhost/public/admin/show/5/1">5</a>
                    <a class="dropdown-item" href="http://localhost/public/admin/show/10/1">10</a>
                    <a class="dropdown-item" href="http://localhost/public/admin/show/50/1">50</a>
                    <a class="dropdown-item" href="<?php echo 'http://localhost/public/admin/show/'.$data['lenarr'].'/1' ?>">All</a>
                </div>
            </div>
            <div class="col-md-3">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item">
                        <a class="page-link" href="http://localhost/public/admin/show/<?php echo $data['numPage'] ?>/<?php 
                        if ($data['currentPage'] == 1) {
                            echo $data['currentPage'];
                        }else {
                            echo $data['currentPage'] - 1;
                            
                        }
                        
                        ?>" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                        </li>
                        <?php 
                            $active = '';
                            $noPage = $data['lenarr'];
                            $noPage = ceil($noPage / $data['numPage']);
                            $i =0;
                            $numPage = 5 * floor($data['currentPage'] / 5) + 1;
                            if ($data['currentPage'] % 5 == 0) {
                                $numPage -= 1;
                            }
                            while($numPage <= $noPage) {
                                $i++;
                                if ($i == 6) {
                                    break;
                                }
                                if ($numPage == $data['currentPage']) {
                                    $active = 'active';
                                }
                                $href ='http://localhost/public/admin/show/'.$data['numPage'].'/'.$numPage.'';
                                echo '<li class="page-item '.$active.'"><a class="page-link" href="'.$href.'">' .$numPage. '</a></li>';
                                $active = '';
                                $numPage++;
                            }
                        ?>
                        <li class="page-item">
                        <a class="page-link" href="http://localhost/public/admin/show/<?php echo $data['numPage'] ?>/<?php 
                        $noPage = $data['lenarr'];
                        $noPage = ceil($noPage / $data['numPage']);
                        if ($data['currentPage'] == $noPage) {
                            echo $data['currentPage'];
                        }else {
                            echo $data['currentPage'] + 1;
                        }
                        ?>" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                        </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <a href="" id='redirect'></a>
    <script>
        $('.dropdown-menu a').click(function () {           
            $('button').text($(this).text());
        });

        $('button.del').click(function() {
            const res = confirm('Do  you want to delele?');
            if (res) {
                // console.log($(this).attr("id"));
                window.location.replace("http://localhost/public/admin/delete/" + $(this).attr("id"));
            }
        })
    </script>
    <?php 
        function random_string($length) {
            $key = '';
            $keys = array_merge(range(0, 9), range('a', 'z'));
        
            for ($i = 0; $i < $length; $i++) {
                $key .= $keys[array_rand($keys)];
            }
        
            return $key;
        }
        
    ?>
</body>
</html>