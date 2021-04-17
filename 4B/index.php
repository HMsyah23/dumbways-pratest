<?php
require_once("config.php");
?>

<?php
// insert data
if(isset($_POST['simpan_type'])){
    $nama           = $_POST['nama'];
    $createType = $pdo->prepare("INSERT INTO type_db(name) VALUES('$nama')");
	$createType->execute();    
    ?>
    <script>
        alert('berhasil input type baru');
    </script>
    <meta http-equiv="refresh" content="0;url=index.php">
    <?php
}

if(isset($_POST['simpan'])){
    $nama           = $_POST['nama'];
    $tipe          = $_POST['tipe'];
    $foto           = $_FILES['foto']['name'];
    $dir_foto       = $_FILES['foto']['tmp_name'];
    $direktori_foto = "avatar/$foto";
    move_uploaded_file($dir_foto,"$direktori_foto");

    $createHeroes = $pdo->prepare("INSERT INTO heroes_tb(name,type_id,photo) VALUES('$nama','$tipe','$direktori_foto')");
	$createHeroes->execute();    
    ?>
    <script>
        alert('berhasil input Heroes data');
    </script>
    <meta http-equiv="refresh" content="0;url=index.php">
    <?php
}

// update data
if(isset($_POST['update-type'])){
    $id             = $_POST['id'];
    $nama           = $_POST['nama'];

    $updateTipe = $pdo->prepare("UPDATE type_db SET name='$nama' WHERE id='$id'");
	$updateTipe->execute();
    ?>
    <script>
        alert('Type Succesfully Changed');
    </script>
    <meta http-equiv="refresh" content="0;url=index.php">
    <?php
}

if(isset($_POST['update-hero'])){
    $id             = $_POST['id'];
    $nama           = $_POST['nama'];
    $tipe          = $_POST['tipe'];
    if (file_exists($_FILES['foto']['tmp_name'])) {
        $foto           = $_FILES['foto']['name'];
        $dir_foto       = $_FILES['foto']['tmp_name'];
        $direktori_foto = "avatar/$foto";
        move_uploaded_file($dir_foto,"$direktori_foto");
    } else {
        $direktori_foto = $_POST['foto-lama'];
    }
    
    $updateHero = $pdo->prepare("UPDATE heroes_tb SET name='$nama', type_id='$tipe', photo='$direktori_foto' WHERE id='$id'");
	$updateHero->execute();
    ?>
    <script>
        alert('berhasil ubah data');
    </script>
    <meta http-equiv="refresh" content="0;url=index.php">
    <?php
}

// delete Hero
if(isset($_POST['delete_hero'])){
    $id = $_POST['id'];

    $deleteHero = $pdo->prepare("DELETE FROM heroes_tb WHERE id='$id'");
    $deleteHero->execute();
    ?>
    <script>
        alert('berhasil hapus data');
    </script>
    <meta http-equiv="refresh" content="0;url=index.php">
    <?php
}

// delete Type
if(isset($_POST['delete_type'])){
    $id = $_POST['id'];
    $check = $pdo->prepare("SELECT * FROM heroes_tb WHERE type_id='$id'");
    $jumlah =$check->rowCount();
    if($jumlah == 0 ){
        $deleteType = $pdo->prepare("DELETE FROM type_db WHERE id='$id'");
        $deleteType->execute();
        ?>
        <script>
        alert('berhasil hapus data');
    </script>
    <meta http-equiv="refresh" content="0;url=index.php">
    <?php
    } else {
        ?>
        <script>
        alert('gagl hapus data');
    </script>
    <meta http-equiv="refresh" content="0;url=index.php">
    <?php
    } 
}
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>7DW</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark row">
    <div class="col">
    <a class="navbar-brand" href="#">7DW</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button></div>

            <div class="col">
            <div class="d-flex justify-content-end">
                <a href="#add-data" class="btn btn-warning my-2 my-sm-0 mr-2" data-toggle="modal">Add Hero</a>
                <a href="#add-data-type" class="btn btn-warning my-2 my-sm-0 mr-2" data-toggle="modal">Add type</a>
                <a href="#list-data-type" class="btn btn-warning my-2 my-sm-0 mr-2" data-toggle="modal">Type List</a>
            </div></div>
    </nav>
    <div class="container">
    <div class="row">
    
                    <?php
                    // view data
                    $no = 1;
                    $query = $pdo->prepare("SELECT heroes_tb.id,heroes_tb.name as hero_name,type_db.name as tipe_name,heroes_tb.photo as photo FROM heroes_tb JOIN type_db ON type_db.id = heroes_tb.type_id "); 
                    $query->execute();
                    while($data = $query->fetch()){
                    ?>
                    <div class="col-lg-3 my-2">
                    <div class="card" style="width: 18rem;">
                        <img src="<?php echo $data['photo'];?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $data['hero_name'];?></h5>
                                <span class="card-text"><?php echo $data['tipe_name'];?></span>
                            </div>
                            <div class="card-footer">
                                <a href="#detail-heroes-<?php echo $data['id'];?>" data-toggle="modal" class="btn btn-warning btn-block">Detail</a> 
                            </div>
                        </div>
                        </div>
                        <div class="modal fade" id="detail-heroes-<?php echo $data['id'];?>">
                            <div class="modal-dialog modal-dialog-centered modal-md">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Detail Heroes</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    </div>
                                    <div class="modal-body">
                                    <table class="table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Photo</th>
                                            <th colspan="2">Detail</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <form method="POST" enctype="multipart/form-data">
                                        <fieldset>
                                            <input type="hidden" name="id" value="<?php echo $data['id'];?>">                                  
                                            <input type="hidden" name="foto-lama" value="<?php echo $data['photo'];?>">                                  
                                            <tr>
                                                <td  rowspan="2"><img src="<?php echo $data['photo'];?>"></td>
                                                <td>Heroes Name</td>
                                                <td><input type="text" name="nama" class="form-control" placeholder="Input New Type Name" required value="<?php echo $data['hero_name'];?>"/></td>
                                            </tr>
                                            <tr>
                                                <td>Heroes Type</td>
                                                <td>
                                                    <select name="tipe" class="form-control" required>
                                                        <?php
                                                            // view data
                                                            $qTipe = $pdo->prepare("SELECT id as id_tipe, name as nama_tipe FROM type_db"); 
                                                            $qTipe->execute();
                                                            while($dataTipe = $qTipe->fetch()){
                                                            ?>
                                                                <option value="<?php echo $dataTipe['id_tipe'];?>" 
                                                                    <?php

                                                                        if($dataTipe['nama_tipe'] == $data['tipe_name']){
                                                                            echo "selected";
                                                                        };

                                                                    ?>
                                                                >                                                                
                                                                
                                                                <?php echo $dataTipe['nama_tipe'];?></option>
                                                            <?php
                                                                }
                                                            ?>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr >
                                                <td>Foto</td>
                                                <td colspan="2"><input type="file" name="foto" class="form-control"></td>
                                            </tr>
                                        </fieldset>
                                    </tbody>
                                    </table>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="submit" name="update-hero" class="btn btn-success">Simpan</button>
                                    </form>
                                    <form method="post">
                                            <input type="hidden" name="id" value="<?php echo $data['id'];?>">
                                            <button type="submit" name="delete_hero" class="btn btn-danger">Delete</button>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        }
                        ?>
                        
    </div>
    </div>

    <!-- modal create data -->
<div class="modal fade" id="add-data">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add New Heroes</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form method="POST" enctype="multipart/form-data">
                <div class="modal-body">                
                    <fieldset>                        
                        <div class="form-group row m-b-15">
                            <label class="col-md-3 col-form-label">Name</label>
                            <div class="col-md-9">
                                <input type="text" name="nama" class="form-control" placeholder="Insert Your Character Name" required/>
                            </div>
                        </div>   
                        <div class="form-group row m-b-15">
                            <label class="col-md-3 col-form-label">Type</label>
                            <div class="col-md-9">                                
                                <select name="tipe" class="form-control" required>
                                    <option value="">-- Choose Type --</option>
                                    <?php
                                        // view data
                                        $no = 1;
                                        $query = $pdo->prepare("SELECT * FROM type_db"); 
                                        $query->execute();
                                        while($data = $query->fetch()){
                                        ?>
                                            <option value="<?php echo $data['id'];?>"><?php echo $data['name'];?></option>
                                        <?php
                                            }
                                        ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row m-b-15">
                            <label class="col-md-3 col-form-label">Photo</label>
                            <div class="col-md-9">                                                                
                                <input type="file" name="foto" class="form-control" required>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <div class="modal-footer">
                    <a href="javascript:;" class="btn btn-white" data-dismiss="modal">Close</a>                
                    <button type="submit" name="simpan" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="add-data-type">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add New type</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form method="POST" enctype="multipart/form-data">
                <div class="modal-body">                
                    <fieldset>                        
                        <div class="form-group row m-b-15">
                            <label class="col-md-3 col-form-label">Nama</label>
                            <div class="col-md-9">
                                <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama" required/>
                            </div>
                        </div>    
                    </fieldset>
                </div>
                <div class="modal-footer">               
                    <a href="javascript:;" class="btn btn-danger" data-dismiss="modal">Close</a>                
                    <button type="submit" name="simpan_type" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="list-data-type">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">List Type</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form method="POST" enctype="multipart/form-data">
                <div class="modal-body">                
                <table class="table table-dark">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    // view data
                    $no = 1;
                    $query = $pdo->prepare("SELECT * FROM type_db "); 
                    $query->execute();
                    while($data = $query->fetch()){
                    ?>
                        <tr>
                            <th scope="row"><?php echo $no++;?></th>
                            <td><?php echo $data['name'];?></td>
                            <td>
                                <form method="post">
                                    <input type="hidden" name="id" value="<?php echo $data['id'];?>">
                                    <a href="#edit-type-<?php echo $data['id'];?>"  data-toggle="modal" data-dismiss="modal" class="btn btn-warning mr-1">Edit</a> 
                                    <button type="submit" name="delete_type" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>

                    <?php 
                        }
                    ?>
                    </tbody>
                    </table>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
                    // view data
                    $no = 1;
                    $query = $pdo->prepare("SELECT * FROM type_db "); 
                    $query->execute();
                    while($data = $query->fetch()){
                    ?>
                        <div class="modal fade" id="edit-type-<?php echo $data['id'];?>">
                            <div class="modal-dialog modal-dialog-centered modal-md">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Edit Type</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    </div>
                                    <form method="POST" enctype="multipart/form-data">
                                    <div class="modal-body">                
                                        <fieldset>
                                            <input type="hidden" name="id" value="<?php echo $data['id'];?>">
                                            <div class="form-group row m-b-15">
                                                <label class="col-md-3 col-form-label">Nama</label>
                                                <div class="col-md-9">
                                                    <input type="text" name="nama" class="form-control" placeholder="Input New Type Name" required value="<?php echo $data['name'];?>"/>
                                                </div>
                                            </div>                                    
                                        </fieldset>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="javascript:;" class="btn btn-white" data-dismiss="modal">Close</a>                
                                        <button type="submit" name="update-type" class="btn btn-success">Simpan</button>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>

                    <?php 
                        }
                    ?>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    -->
  </body>
</html>