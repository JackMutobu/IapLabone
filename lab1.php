<?php 
    include_once 'DbConnector.php';
    include_once 'User.php';
    $user = new User("","","");
    $con = new DBConnector();
    if(isset($_POST['btnSave'])){
        $fn = $_POST['first_name'];
        $ln = $_POST['last_name'];
        $city = $_POST['city_name'];

        $user = new User($fn,$ln,$city);
        $result = $user->save($con);
        if($result)
        {
        echo "Save operation successful";
        }
        else{
            echo "An error occured";
        }
        $con->closeDatabase();
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>IAPLabOne</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
    <div class="row">
        <div class="col">
            <h4 class="text-center" style="margin-top: 32px;">Internet Application Programming Lab1</h4>
        </div>
    </div>
    <div class="row">
        <div class="col d-flex justify-content-center" style="margin-top: 66px;">
            <form method="post">
                <div class="form-group">
                    <input class="form-control" name="firstName" type="text" placeholder="Firstname">
                </div>
                <div class="form-group">
                    <input class="form-control" name="lastName" type="text" placeholder="Lastname">
                </div>
                <div class="form-group">
                    <input class="form-control" name="cityName" type="text" placeholder="City">
                </div>
                <div  class="form-group d-flex flex-column align-self-stretch">
                    <button class="btn btn-primary align-self-stretch" name="btnSave" type="submit">SAVE</button>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th>City</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row = $user->readAll($conn)) {?>
                        <tr>
                            <td><?php echo $row[0]; ?></td>
                            <td><?php echo $row[1]; ?></td>
                            <td><?php echo $row[2]; ?></td>
                            <td><?php echo $row[3]; ?></td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
</body>

</html>