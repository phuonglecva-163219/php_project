<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-md ">
    <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <h2>
                    <a class="nav-link" href=""><?php echo 'Edit Post' ?></a>
                </h2>
            </li>
        </ul>
    </div>

    <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link bg-primary text-light border rounded" href="http://localhost/public/admin/show_details/<?php echo $data['post']['id']?>">Show</a>
            </li>
            <li style="margin-left:10px"class="nav-item">
                <a class="nav-link border rounded" href="http://localhost/public/admin/show/10/1">Back</a>
            </li>
        </ul>
    </div>
</nav>
<hr>


<div>

    <form action="/mvc/views/edit.php" method="POST" enctype="multipart/form-data">
        <div class="form-group form-inline">
            <label style="margin-left:10px; font-size:xx-large" for="title">Title:</label>
            <input name="title" style="width:25%;  position:absolute; left:40%;" type="text" class="form-control " value="<?php echo $data['post']['title']?>" id="title">
        </div>
        <hr>
        <br>
        <div class="form-group form-inline">
            <label  style="margin-left:10px; font-size:xx-large" for="desc-text">Description:</label>
            <textarea name="description" style="width:40%; min-height:150px; position:absolute; left:40%; top:200px;" class="form-control" id="desc-text"><?php echo $data['post']['description']?></textarea>
        </div>
        <br><br>
        <br><br>
        <hr>

        <div class="form-group form-inline">
            <label style="margin-left:10px; font-size:xx-large" for="exampleFormControlFile1">Image:</label>
            <div style="display: inline;">
                <input name='fileToUpload' id='fileToUpload' style="width:40%; position:absolute; left:40%" type="file" class="form-control-file" id="exampleFormControlFile1">
            </div>
        </div>
    <br>
    <hr>
        <div class="form-group form-inline">
            <label style="margin-left:10px; font-size:xx-large" for="title">Status:</label>
            <select name="status" style="width:10%;  position:absolute; left:40%;" type="text" class="form-control " id="title">
                <?php 
                    if ($data['post']['status'] == 0) {
                        echo '<option>Disable</option>';
                        echo '<option>Enable</option>';
                    }else {
                        echo "<option>Enable</option>";
                        echo "<option>Disable</option>";

                    }
                ?>
            </select>
        </div>
        <input type="hidden" name="pk" value="<?php echo $data['post']['id']; ?>">
        <button style="width:10%;  position:absolute; left:40%;" type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>