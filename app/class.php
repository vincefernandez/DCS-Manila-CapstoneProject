<?php

class myStudent
{

    private $server = "mysql:host=localhost;dbname=records";
    private $user = "root";
    private $pass = "";


    private $option = array(
        PDO::ATTR_ERRMODE =>
        PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE =>
        PDO::FETCH_ASSOC
    );
    protected $con;

    public function OpenConnection()
    {

        try {

            $this->con = new PDO($this->server, $this->user, $this->pass, $this->option);
            return $this->con;
        } catch (PDOException $e) {
            echo "ERROR:" . $e->getMessage();
        }
    }

    public function closeConnection($con)
    {

        $this->$con = null;
    }



    public function loginUser()
    {


        $connection = $this->OpenConnection();


        if (isset($_POST['LoginSubmit'])) {


            $Email = $_POST['Email'];
            $Password = $_POST['Password'];
            // $Position = $_POST['Reciever'];

            $stmt = $connection->prepare("SELECT * FROM users_tbl where Email = ? AND Password = ?");
            $stmt->execute([$Email, $Password]);
            $user = $stmt->fetch(); //Accessing the INFO
            $total = $stmt->rowCount();
            $user1 = $stmt->fetchAll();

            if ($total > 0) {


                session_start();

                // $_SESSION['Position'] = $user['Position'];

                $_SESSION['login'] = $user['Account_ID'];


                if ($user['Section'] === "Admin") {
                    header("location: ../p/AdminAccount.php");
                    // $_SESSION['ID'] = $user['Account_ID'];
                    // $user['Employee_ID'] = $_SESSION['login'];
                } elseif ($_SESSION['login'] == "RRM") {
                    header("location: pageAdmin/Appointment-Clearance.php");
                    $_SESSION['login'] = $user['Employee_ID'];
                    $user['Employee_ID'] = $_SESSION['login'];
                } elseif ($_SESSION['login'] == "Numerical") {
                    $_SESSION['login'] = $user['Employee_ID'];
                    header("location: pageAdmin/Numerical-Communications.php");
                    $user['Employee_ID'] = $_SESSION['login'];
                } elseif ($_SESSION['login'] == 4) {
                    $_SESSION['login'] = $user['Employee_ID'];
                    header("location: pageAdmin/RRM.php");
                    $user['Employee_ID'] = $_SESSION['login'];
                } else {
                    // session_destroy();
                    echo "<div class='alert alert-danger text-center'>Error Please Try Again</div>";
                }
                // if($_SESSION['Position'] == "Releasing"){
                //     echo"releasing";
                // }


            } else {
                // echo "<script> alert ('Error Please Try Again'); </script>";

                echo "<div class='alert alert-danger text-center'>Error Please Try Again</div>";
            }
        }
    }

    public function SessionValidation()
    {

        if (isset($_SESSION['login'])) {
            echo "asd";
        } else {

            header('location: ../login');
        }
    }

    public function logout()
    {

        session_start();

        session_destroy();
        header("location: ../index.php");
    }

    public function get_users()
    {
        $connection = $this->OpenConnection();
        $getUsers = $connection->prepare("SELECT Employee_ID,First_Name,Last_Name,Email,Password,Permission FROM users_tbl ORDER BY id ASC");
        $getUsers->execute();
        $users = $getUsers->fetchAll();


        foreach ($users as $user) {
            echo " <tr>";
            echo " <td>$user[Employee_ID]</td>";
            echo " <td>$user[First_Name] $user[Last_Name]</td>";

            echo " <td>$user[Email]</td>";
            echo " <td>$user[Password]</td>";
            echo " <td>$user[Permission]</td>";


            echo "  <td>
                <button class='btn btn-warning'><i class='fas fa-edit fa-1x'></i></button>
                <button class='btn btn-danger'><i class='fas fa-trash'></i></button>
             </td>";



            // echo " <td><a href='Managemembers.php?Delete=$user[Employee_ID]' class='btn btn-info d-inline-block'>Delete
            //            <a href='#EDITUSER' class='btn btn-primary d-inline-block'>Edit</td>";
            // echo "</tr>";


        }

        // if(isset($_GET['Delete'])){
        //     $id = $_GET['Delete'];
        //     $editusers= $connection ->prepare("Delete From user1 where id =$id");
        //     $editusers->execute();
        // }

    }
    public function get_employee()
    {
        //limit 9999999  offset 1
        $connection = $this->OpenConnection();
        $getUsers = $connection->prepare("SELECT * FROM users_tbl ORDER BY Employee_ID limit 9999999  offset 1");
        $getUsers->execute();
        $users = $getUsers->fetchAll();

        $nRows = $connection->query('select count(*) from users_tbl')->fetchColumn();
        if ($nRows < 1) {
            echo "<td>No Data</td>";
        }




        foreach ($users as $user) {
            echo "<tr>";

            // echo " <td>$user[Employee_ID]</td>";
            echo " <td>$user[First_Name]</td>";
            echo " <td>$user[Middle_Name]</td>";
            echo " <td>$user[Last_Name]</td>";

            echo " <td>$user[Suffix]</td>";

            echo " <td>$user[Position]</td>";
            echo " <td>$user[Section]</td>";
            // echo " <td>$user[Email]</td>";
            echo " <td>$user[RRM]</td>";
            echo " <td>$user[AdministrativeIssuance]</td>";
            echo "<td>$user[Files201]</td>";
            echo "<td>$user[Numerical]</td>";

            // echo " <td>$user[Password]</td>";
            echo " <td>$user[Date]</td>";


            echo " <td><a href='Admin-ManageAccount.php?Del=$user[Employee_ID]' class='btn btn-info d-inline-block'>Delete'</a></td>";
            echo "<td><a href='edit.php?Edit=$user[Employee_ID]' class='btn btn-info'>Edit</a></td>";
            echo "<td><a href='#INFO_DETAILS_OF_EMPLOYEE' class='btn btn-info'>Info</a></td>";

            echo "</tr>";
            // echo " <td><button type='button'  class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#exampleModal' data-bs-whatever='@getbootstrap'>A</button></td>";
            // echo " <td><i class='fas fa-trash-alt fa-2x'>$user[id]</i>";
        }



        // if(isset($_GET['Delete'])){
        //     $id = $_GET['Delete'];
        //     $editusers= $connection ->prepare("Delete From user1 where id =$id");
        //     $editusers->execute();
        // }


    }

    public function UpdateAccounts()
    {
        $connection = $this->OpenConnection();

        if (isset($_POST['UpdateAccounts'])) {



            $Employee_ID = $_POST['ID'];
            $First_Name = $_POST['First_Name'];
            $Last_Name = $_POST['Last_Name'];
            $Suffix = $_POST['Suffix'];
            $Email = $_POST['Email'];
            $Position = $_POST['Position'];
            $ContactNUmber = $_POST['ContactNumber'];
            $Password = $_POST['Password'];
            $Middle_Name = $_POST['Middle_Name'];
            $Section = $_POST['Section'];
            $AdministrativeIssuance = isset($_POST['AdministrativeIssuance']) ? 'Yes' : 'No';
            $Numerical = isset($_POST['Numerical']) ? 'Yes' : 'No';
            $RRM = isset($_POST['RRM']) ? 'Yes' : 'No';
            $Files201 = isset($_POST['201Files']) ? 'Yes' : 'No';
            // $AdministrativeIssuance = $_POST['AdministrativeIssuance'];
            // $Numerical = $_POST['Numerical'];
            // $RRM = $_POST['RRM'];
            // $Files201 = $_POST['201Files'];
            // $sql = "UPDATE users_tbl SET First_Name=?, Last_Name=?, Middle_Name=?, Suffix=?, Position=?, Section=?, ContactNumber=?, Email=?, Password=? WHERE Account_ID='$Account_ID'";
            // $stmt = $connection->prepare($sql);
            // $stmt->execute([$First_Name, $Last_Name, $Middle_Name, $Suffix,$Position,$Section,$ContactNUmber,$Email,$Password]);

            $sql = "UPDATE users_tbl SET First_Name=:First_Name, Last_Name=:Last_Name, Middle_Name=:Middle_Name, Suffix=:Suffix, Position=:Position, Section=:Section, ContactNumber=:ContactNumber,
            Email=:Email, Password=:Password, RRM=:RRM, Files201=:Files201, AdministrativeIssuance=:AdministrativeIssuance, Numerical=:Numerical WHERE Employee_ID=:id";
            $statement = $connection->prepare($sql);

            $statement->bindParam(':id', $Employee_ID);
            $statement->bindParam(':First_Name', $First_Name);
            $statement->bindParam(':Last_Name', $Last_Name);
            $statement->bindParam(':Middle_Name', $Middle_Name);
            $statement->bindParam(':Suffix', $Suffix);
            $statement->bindParam(':Position', $Position);
            $statement->bindParam(':Section', $Section);
            $statement->bindParam(':ContactNumber', $ContactNUmber);
            $statement->bindParam(':Email', $Email);
            $statement->bindParam(':Password', $Password);
            $statement->bindParam(':RRM', $RRM);
            $statement->bindParam(':Files201', $Files201);
            $statement->bindParam(':AdministrativeIssuance', $AdministrativeIssuance);
            $statement->bindParam(':Numerical', $Numerical);
            if ($statement->execute()) {
?>
                <script type="text/javascript">
                    alert("Edit Succesfully");
                    window.location.href = "../p/admin-manageaccount.php";
                </script>
                }else{
                ?>
                <script>
                    alert('Error');
                </script>
            <?php
            }
        }
    }
    // }
    public function getFullName()
    {
        $Account_ID = $_SESSION['login'];
        $connection = $this->OpenConnection();
        $getUsers = $connection->prepare("SELECT First_Name,Last_Name FROM users_tbl Where Account_ID = '$Account_ID' ");
        $getUsers->execute();
        $users = $getUsers->fetchAll();

        foreach ($users as $user) {
            echo $user['First_Name'] . ' ' . $user['Last_Name'];
        }
    }
    public function delAccounts()
    {
        $connection = $this->OpenConnection();
        if (isset($_GET['Del'])) {
            $DeleteAccounts = $_GET['Del'];

            $getUsers = $connection->prepare("Delete FROM users_tbl Where Employee_ID = $DeleteAccounts ");
            if ($getUsers->execute()) {
            ?>
                <script type="text/javascript">
                    alert("Delete Successfully");
                    window.location.href = "../p/admin-manageaccount.php";
                </script>
<?php
            }
        }
    }
    public function IssetGET()
    {
        $connection = $this->OpenConnection();

        if (isset($_GET['Delete'])) {
            $deleteID = $_GET['Delete'];
            $getUsers = $connection->prepare("Delete FROM users_tbl Where Employee_ID = $deleteID");
            $getUsers->execute();
        }
    }

    //     public function InsertAppointmentClearance()
    //     {
    //         $connection = $this->OpenConnection();
    //         if (isset($_POST['Submit'])) {


    //             $Control_Number = $_POST['Control_Number'];
    //             $First_Name = $_POST['First_Name'];
    //             $Last_Name = $_POST['Last_Name'];
    //             $Documents = $_POST['Documents'];
    //             $School_Office = $_POST['School_Office'];
    //             $File_Status = $_POST['File_Status'];
    //             $ForRelease = $_POST['ForRelease'];
    //             $File = $_POST['File'];
    //             // $first_Name = $_POST['First_Name'];
    //             // $first_Name = $_POST['First_Name'];
    //             // $first_Name = $_POST['First_Name'];


    //             $sql = "INSERT INTO appointment_clearancetbl(Control_Number,First_Name,Last_Name,Documents,File,School_Office,File_Status,ForRelease)
    // VALUES('$Control_Number','$First_Name','$Last_Name','$Documents','asda','$School_Office','$File_Status','$ForRelease')";


    //             $connection->exec($sql);

    //             echo "Success";
    //         }


    //     }

    public function Upload()
    {
        $connection = $this->OpenConnection();
        if (isset($_POST['save'])) { // if save button on the form is clicked
            // name of the uploaded file
            $Control_Number = $_POST['Control_Number'];
            $First_Name = $_POST['First_Name'];
            $Last_Name = $_POST['Last_Name'];
            $Documents = $_POST['Documents'];
            $School_Office = $_POST['School_Office'];
            $File_Status = $_POST['File_Status'];
            $ForRelease = $_POST['ForRelease'];
            $filename = $_FILES['myfile']['name'];

            // destination of the file on the server
            $destination = 'uploads/' . $filename;

            // get the file extension
            $extension = pathinfo($filename, PATHINFO_EXTENSION);

            // the physical file on a temporary uploads directory on the server
            $file = $_FILES['myfile']['tmp_name'];
            $size = $_FILES['myfile']['size'];

            if (!in_array($extension, ['zip', 'pdf', 'docx'])) {
                echo "You file extension must be .zip, .pdf or .docx";
            } elseif ($_FILES['myfile']['size'] > 1000000) { // file shouldn't be larger than 1Megabyte
                echo "File too large!";
            } else {
                // move the uploaded (temporary) file to the specified destination
                if (move_uploaded_file($file, $destination)) {
                    $sql = "INSERT INTO appointment_clearancetbl (Control_Number,First_Name,Last_Name,Documents,File,School_Office,File_Status,ForRelease)
                    VALUES ('$Control_Number','$First_Name','$Last_Name','$Documents','$filename','$School_Office','$File_Status','$ForRelease')";
                    $connection->exec($sql);
                    echo "File Upload Success";
                } else {
                    echo "Failed to upload file.";
                }
            }
        }
    }

    public function getAppointmentClearance()
    {
        $connection = $this->OpenConnection();
        $getUsers = $connection->prepare("SELECT * FROM appointment_clearancetbl");
        $getUsers->execute();
        $users = $getUsers->fetchAll();


        foreach ($users as $user) {
            echo " <tr>";
            echo " <td>$user[Control_Number]</td>";
            echo " <td>$user[First_Name] $user[Last_Name]</td>";

            echo " <td>$user[Documents]</td>";
            echo " <td><a href='Appointment-Clearance.php?file_id=1'>Download</a></td>";
            echo " <td>$user[School_Office]</td>";
            echo " <td>$user[File_Status]</td>";
            echo " <td>$user[Release_By]</td>";
            echo " <td>$user[Received_By]</td>";
            echo " <td>$user[Date_Received]</td>";
            echo " <td>$user[ForRelease]</td>";

            echo "<td><a href='appointment-clearance.php?Delete=$user[id]'> <button class=' fas fa-trash'></button></a></td>";
            echo "<td><a href='#'> <button class='fas fa-edit'></button></a></td>";
            // echo " <td><a href='#?Delete=$user[Control_Number]' class='btn btn-info d-inline-block'>Delete
            //            <a href='#EDITUSER' class='btn btn-primary d-inline-block'>Edit</td>";
            echo "</tr>";
        }

        // if(isset($_GET['Delete'])){

        //     $connection = $this->OpenConnection();
        //     $Delete = $_GET['Delete'];
        //     $getUsers = $connection->prepare("Delete * FROM appointment_clearancetbl Where id = $Delete");
        //     $getUsers->execute();

        // }




        // if (isset($_GET['file_id'])) {
        //     $Control_Number = $_GET['file_id'];

        // //     // fetch file to download from database.
        // //     $connection = $this->OpenConnection();
        // //     $sql = $connection->prepare("SELECT * FROM appointment_clearancetbl where id=$Control_Number");
        // //    $sql->execute();

        // //     $file = $getUsers->fetchAll();
        // //     $filepath = 'uploads/' . $file['documents'];

        // //     if (file_exists($filepath)) {
        // //         header('Content-Description: File Transfer');
        // //         header('Content-Type: application/octet-stream');
        // //         header('Content-Disposition: attachment; filename=' . basename($filepath));
        // //         header('Expires: 0');
        // //         header('Cache-Control: must-revalidate');
        // //         header('Pragma: public');
        // //         header('Content-Length: ' . filesize('uploads/' . $file['name']));
        // //         readfile('uploads/' . $file['name']);

        // //         // // Now update downloads count
        // //         // $newCount = $file['downloads'] + 1;
        // //         // $updateQuery = "UPDATE files SET downloads=$newCount WHERE id=$Control_Number";
        // //         // mysqli_query($conn, $updateQuery);
        // //         // $updateQuery->execute();
        // //         // exit;

        //     // }

        // }
        // if(isset($_GET['Delete'])){
        //     $id = $_GET['Delete'];
        //     $editusers= $connection ->prepare("Delete From user1 where id =$id");
        //     $editusers->execute();
        // }

    }

    public function FilesLogic()
    {
        $connection = $this->OpenConnection();
        $getUsers = $connection->prepare("SELECT * FROM appointment_clearancetbl");
        $getUsers->execute();
        $users = $getUsers->fetchAll();
    }

    public function AddDatabaseToQueeing()
    {

        if (isset($_POST['Submit'])) {


            $connection = $this->OpenConnection();
            $Name = $_POST['Name'];

            $Transaction_ID = rand(100000, 999999);
            $Trans_ID = $Transaction_ID;
            $Ticket_Number = rand(100000, 999999);
            $ID = $Ticket_Number;
            $Purpose = $_POST['Purpose'];
            $created_date = date("Y-m-d H:i:s");
            $sql = "INSERT INTO queeing_tbl (Transaction_ID,Ticket_Number,Name,Purpose,Date)
            VALUES ('$Trans_ID','$Ticket_Number','$Name','$Purpose','$created_date')";
            $connection->exec($sql);

            echo "<div class='alert alert-warning alert-dismissible fade show text-center' role='alert'>

            <strong>Congrats $Name!</strong> You got queeing ticket number $ID.
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
          </div>";
        }
    }
    public function DisplayWaitingQue()
    {
        $connection = $this->OpenConnection();

        $getUsers = $connection->prepare("SELECT * FROM queeing_tbl Limit 1 offset 1");
        $getUsers->execute();
        $users = $getUsers->fetchAll();


        foreach ($users as $user) {
            echo "<h3 class='text-center'>$user[Name]</h3>";
            echo "<p class='card-text text-center'>Ticket Number : $user[Ticket_Number] </p>";
        }

        if (empty($users)) {
            echo "No waiting List <br>";
        }
    }

    public function DisplayNowserving()
    {
        $connection = $this->OpenConnection();

        $getUsers = $connection->prepare("SELECT * FROM queeing_tbl Limit 1");
        $getUsers->execute();
        $users = $getUsers->fetchAll();


        foreach ($users as $user) {
            echo "<h3 class='text-center'>$user[Name]</h3>";
            echo "<p class='card-text'>Ticket Number : $user[Ticket_Number] </p>";
        }

        if (empty($users)) {
            echo "No waiting List <br>";
        }
    }
    public function DisplayQueeingUser()
    {
        $connection = $this->OpenConnection();

        $getUsers = $connection->prepare("SELECT Name,Purpose FROM queeing_tbl LIMIT 3");
        $getUsers->execute();
        $users = $getUsers->fetchAll();


        foreach ($users as $user) {
            echo "<div class='card col-4'>
        <img src='assets/img/new-logo1.png' class='card-img-top' alt='...'>
        <div class='card-body'>
            <h5 class='card-title'>$user[Name]</h5>

            <p class='card-text'><small class='text-muted'>$user[Purpose]</small></p>
        </div>
    </div>";
        }
    }
    public function getRowNumbers()
    {
        $connection = $this->OpenConnection();
        $sql = ("Select * From queeing_tbl");
        $stmt = $this->OpenConnection()->query($sql);

        $count = $stmt->rowCount();

        echo "There are $count Client on the waiting List";
    }
    public function DisplayTransactions()
    {
        $connection = $this->OpenConnection();
        $sql = ("Select id,Transaction_ID,Name,Purpose,Date From queeing_tbl");
        $stmt = $this->OpenConnection()->query($sql);

        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($users as $user) {
            echo "<tr>";

            echo "<td>$user[id]";
            echo "<td>$user[Name]";
            echo "<td>$user[Transaction_ID]";
            echo "<td>$user[Purpose]";
            echo "<td>$user[Date]";
            echo "</tr>";
        }
    }

    public function DisplayQueueTransactions()
    {
        $connection = $this->OpenConnection();
        $sql = ("Select id,Transaction_Type,Window_Name from transaction_list");
        $stmt = $this->OpenConnection()->query($sql);

        $transaction = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($transaction as $transactions) {

            echo "<tr>";
            echo "<td>$transactions[id]";
            echo "<td>$transactions[Transaction_Type]";
            echo "<td>$transactions[Window_Name]";
            echo "<td>
            <a href='Transaction_List.php?Delete=$transactions[id]' onclick='checkDeleteItem();'>
            <i class='fas fa-trash fa-2x'></i></a>
            <button type='button' data-bs-toggle='modal' data-bs-target='#exampleModal'>
            <a href='Transaction_List.php?Edit=$transactions[id]'><i class='fas fa-edit fa-2x'></i></a>
            </button>";


            echo "</tr>";
        }
    }

    public function DeleteQueueTransctions()
    {
        $connection = $this->OpenConnection();

        if (isset($_GET['Delete'])) {
            $deleteID = $_GET['Delete'];
            $getUsers = $connection->prepare("Delete FROM Transaction_list Where id=$deleteID");
            $getUsers->execute();
        }
    }

    public function Edit()
    {
        $connection = $this->OpenConnection();

        if (isset($_GET['Edit'])) {
            $Edit = $_GET['Edit'];
            $sql = $connection->prepare("Select * from transaction_list where id=$Edit");
            $stmt = $this->OpenConnection()->query($sql);
            if ($_GET['Edit'] > 1) {


                $Datas = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach ($Datas as $Data) {

                    echo "<input type='password' class='form-control' id='exampleInputPassword1' placeholder='$Data[Transaction_Type]'>";
                }
            }
        }
    }

    public function AddTransactionType()
    {
        $connection = $this->OpenConnection();

        if (isset($_POST['AddTransactionTypeSubmit'])) {

            $Transaction_Type = $_POST['Transaction_Type'];
            $WindowName = $_POST['WindowName'];
            $created_date = date("Y-m-d H:i:s");
            $sql = "INSERT INTO transaction_list (Transaction_Type,Window_Name,Date)
            VALUES ('$Transaction_Type','$WindowName','$created_date')";
            $connection->exec($sql);
        }
    }
    public function DisplayToSelect()
    {
        $connection = $this->OpenConnection();
        $sql = ("Select Transaction_Type From transaction_list");
        $stmt = $this->OpenConnection()->query($sql);
        $DisplaySelect = $stmt->fetchAll(PDO::FETCH_ASSOC);


        foreach ($DisplaySelect as $Select) {
            echo "
            <option value=$Select[Transaction_Type]>$Select[Transaction_Type]</option>";
        }
    }

    public function DisplayQueQueTransfer()
    {
        $connection = $this->OpenConnection();
        $sql = ("Select id,Name,Purpose From queeing_tbl LIMIT 1");
        $stmt = $this->OpenConnection()->query($sql);
        $DisplaySelect = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($DisplaySelect as $Display)
            echo " <h1 class='card-title badge bg-primary text-wrap h1 text-black'>Name : $Display[Name]</h1>
        <p class='card-text'>Purpose : $Display[Purpose]</p>
        <a href='RRM.php?Delete=$Display[id]' class='btn btn-primary'>Next</a> ";
    }

    public function SetNextPage()
    {
        $connection = $this->OpenConnection();
        if (isset($_GET['Delete'])) {
            $deleteID = $_GET['Delete'];
            $getUsers = $connection->prepare("Delete FROM queeing_tbl Where id=$deleteID");
            $getUsers->execute();
        }
    }

    // public function AddAccounts()
    // {
    //     $connection = $this->OpenConnection();

    //     if (isset($_POST['AddAccountsSubmit'])) {

    //         $First_Name = $_POST['First_Name'];
    //         $Last_Name = $_POST['Last_Name'];
    //         $Email = $_POST['Email'];
    //         $Position = $_POST['First_Name'];
    //         $Password = $_POST['Password'];
    //         $Middle_Name = $_POST['Middle_Name'];
    //         $created_date = date("Y-m-d H:i:s");
    //         $sql = "INSERT INTO  users_tbl  (First_Name,Last_Name,Middle_Name,Position,Email,Password,Date)
    //     VALUES ('$First_Name','$Last_Name','$Middle_Name','$Email','$Position','$Password','$created_date')";

    //         $connection->exec($sql);

    //         echo "Success";
    //         header('location: ../p/Admin-ManageAccount.php');
    //     } else {
    //         echo "Erroasdasdr";
    //     }
    // }

    public function AddAccounts()
    {
        $connection = $this->OpenConnection();

        if (isset($_POST['AddAccountsSubmit'])) {


            // if (isset($_POST['AddAccountsSubmit'])) {
            $Account_ID = uniqid();
            $First_Name = $_POST['First_Name'];
            $Last_Name = $_POST['Last_Name'];
            $Suffix = $_POST['Suffix'];
            $Email = $_POST['Email'];
            $Position = $_POST['Position'];
            $ContactNUmber = $_POST['ContactNumber'];
            $Password = $_POST['Password'];
            $Middle_Name = $_POST['Middle_Name'];
            $Section = $_POST['Section'];
            $AdministrativeIssuance = isset($_POST['AdministrativeIssuance']) ? 'Yes' : 'No';
            $Numerical = isset($_POST['Numerical']) ? 'Yes' : 'No';
            $RRM = isset($_POST['RRM']) ? 'Yes' : 'No';
            $Files201 = isset($_POST['201Files']) ? 'Yes' : 'No';
            $created_date = date("Y-m-d H:i:s");

            // THIS WILL GENERATE UNIQUE ID
            $sql = "INSERT INTO  users_tbl  (Account_ID,First_Name,Last_Name,Middle_Name,Suffix,Position,Section,ContactNumber,Email,Password,AdministrativeIssuance,Numerical,RRM,Files201,Date)
        VALUES ('$Account_ID','$First_Name','$Last_Name','$Middle_Name','$Suffix','$Position','$Section','$ContactNUmber','$Email','$Password','$AdministrativeIssuance','$Numerical','$RRM','$Files201','$created_date')";
            $connection->exec($sql);
            echo "<div class='alert alert-success' role='alert'>
           A simple success alert—check it out!
         </div>";




            // header('location: Admin-manageAccount.php');


        }
    }

    public function deleteAccounts()
    {
        $connection = $this->OpenConnection();

        if (isset($_GET['Delete'])) {
            $Delete = $_GET['Delete'];
            $getUsers = $connection->prepare("Delete FROM users_tbl Where Employee_ID=$Delete");
            $getUsers->execute();
            header('location: ../pageAdmin/manage-ShowAccounts.php');
        }
    }

    public function CountData()
    {
        $connection = $this->OpenConnection();
        $sql = "Select Count(*) From users_tbl";
        $res = $connection->query($sql);
        $count = $res->fetchColumn();

        echo $count;
    }

    public function EditAccounts()
    {


        $connection = $this->OpenConnection();
        global $connection;
        // $getUsers = $connection->prepare("SELECT * FROM users_tbl ORDER BY Employee_ID ASC");
        // $getUsers->execute();
        // $users = $getUsers->fetchAll();


        // foreach ($users as $user) {
        //     echo "<tr>";

        //     // echo " <td>$user[Employee_ID]</td>";
        //     echo" $user[First_Name]";
        //     echo " $user[Last_Name]";
        //     echo " $user[Middle_Name]";
        //     echo " $user[Suffix]";

        //     echo " $user[Position]";
        //     echo " $user[Email]";


        //     echo " $user[Password]";
        //     echo " $user[Date]";



        //     echo "</tr>";

        // }



    }

    public function FileUpload()
    {
        $connection = $this->OpenConnection();

        if (isset($_POST['Fileupload'])) {

            // Count total files
            $countfiles = count($_FILES['files']['name']);

            // Prepared statement

            $query = "INSERT INTO images (name,image) VALUES(?,?)";

            $statement = $connection->prepare($query);

            // Loop all files
            for ($i = 0; $i < $countfiles; $i++) {

                // File name
                $filename = $_FILES['files']['name'][$i];

                // Location
                $target_file = '../upload/' . $filename;

                // file extension
                $file_extension = pathinfo(
                    $target_file,
                    PATHINFO_EXTENSION
                );

                $file_extension = strtolower($file_extension);

                // Valid image extension
                $valid_extension = array("png", "jpeg", "jpg");

                if (in_array($file_extension, $valid_extension)) {

                    // Upload file
                    if (move_uploaded_file(
                        $_FILES['files']['tmp_name'][$i],
                        $target_file
                    )) {

                        // Execute query
                        $statement->execute(
                            array($filename, $target_file)
                        );
                    }
                }
            }

            echo "File upload successfully";
            header('location: ../p/profile.php');
        }
    }

    public function Fileupload1()
    {
        $Account_ID = $_SESSION['login'];
        $connection = $this->OpenConnection();

        if (isset($_POST['Fileupload'])) {

            // Count total files
            $countfiles = count($_FILES['files']['name']);


            // Loop all files
            for ($i = 0; $i < $countfiles; $i++) {

                // File name
                $filename = $_FILES['files']['name'][$i];

                // Location
                $target_file = '../upload/' . $filename;

                // file extension
                $file_extension = pathinfo(
                    $target_file,
                    PATHINFO_EXTENSION
                );

                $file_extension = strtolower($file_extension);

                // Valid image extension
                $valid_extension = array("png", "jpeg", "jpg");

                if (in_array($file_extension, $valid_extension)) {

                    // Upload file
                    if (move_uploaded_file(
                        $_FILES['files']['tmp_name'][$i],
                        $target_file
                    )) {

                        $sql = 'UPDATE users_tbl
        SET images = :images
        WHERE Account_ID = :Account_ID';

                        // prepare statement
                        $statement = $connection->prepare($sql);

                        // bind params
                        $statement->bindParam(':Account_ID', $Account_ID, PDO::PARAM_INT);
                        $statement->bindParam(':images', $target_file);

                        // execute the UPDATE statment
                        if ($statement->execute()) {
                            echo 'The publisher has been updated successfully!';
                        } else {
                            echo "Error";
                        }
                    }
                }
            }

            echo "File upload successfully";
            header('location: ../p/profile.php');
        }
    }




    public function view1()
    {
        $Account_ID = $_SESSION['login'];
        $connection = $this->OpenConnection();

        $stmt = $connection->prepare("select images from users_tbl where Account_ID ='$Account_ID' limit 1 ");
        $stmt->execute();
        $imagelist = $stmt->fetchAll();

        foreach ($imagelist as $image) {


            echo "$image[images]";
        }

        if (empty($imagelist)) {
            echo "../dist/img/avatar.jpg";
        }
    }

    // public function NumericalAddRecords()
    // {
    //     $connection = $this->OpenConnection();
    //     if (isset($_POST['NumericalADD'])) {


    //         // if (isset($_POST['AddAccountsSubmit'])) {
    //         $Transaction_ID = uniqid();
    //         $First_Name = $_POST['First_Name'];
    //         $Last_Name = $_POST['Last_Name'];
    //         $Source = $_POST['Source'];
    //         $ReleaseNumber = $_POST['ReleaseNumber'];
    //         $DocumentType = $_POST['DocumentType'];
    //         $ClassificationNumber = $_POST['ClassificationNumber'];
    //         $DocumentStatus = $_POST['DocumentStatus'];
    //         $ForRelease = $_POST['ForRelease'];

    //         $created_date = date("Y-m-d");

    //         // THIS WILL GENERATE UNIQUE ID
    //         $sql = "INSERT INTO  numerical  (Transaction_ID,First_Name,Last_Name,Source,ReleaseNumber,DocumentType,ClassificationNumber,DocumentStatus,Purpose,File,Date)
    //     VALUES ('$Transaction_ID','$First_Name','$Last_Name','$Source','$ReleaseNumber','$DocumentType','$ClassificationNumber','$DocumentStatus','$ForRelease','N/A','$created_date')";
    //         $connection->exec($sql);
    //         echo "<div class='alert alert-success' role='alert'>
    //        A simple success alert—check it out!
    //      </div>";
    //     }
    // }

    public function NumericalAddRecords()
    {
        $connection = $this->OpenConnection();
        if (isset($_POST['NumericalADD'])) {

            $Transaction_ID = uniqid();
            $First_Name = $_POST['First_Name'];
            $Last_Name = $_POST['Last_Name'];
            $Source = $_POST['Source'];
            $ReleaseNumber = $_POST['ReleaseNumber'];
            $DocumentType = $_POST['DocumentType'];
            $ClassificationNumber = $_POST['ClassificationNumber'];
            $DocumentStatus = $_POST['DocumentStatus'];
            $ForRelease = $_POST['ForRelease'];

            $created_date = date("Y-m-d");
            $name = $_FILES['file']['name'];
            $size = $_FILES['file']['size'];
            $type = $_FILES['file']['type'];
            $temp = $_FILES['file']['tmp_name'];
            $fname = date("YmdHis") . '_' . $name;
            $chk = $connection->query("SELECT * FROM  numerical where File = '$name' ")->rowCount();
            if ($chk) {
                $i = 1;
                $c = 0;
                while ($c == 0) {
                    $i++;
                    $reversedParts = explode('.', strrev($name), 2);
                    $tname = (strrev($reversedParts[1])) . "_" . ($i) . '.' . (strrev($reversedParts[0]));
                    $chk2 = $connection->query("SELECT * FROM  numerical where File = '$tname' ")->rowCount();
                    if ($chk2 == 0) {
                        $c = 1;
                        $name = $tname;
                    }
                }
            }
            $move =  move_uploaded_file($temp, "../records/" . $fname);
            if ($move) {
                $sql = "INSERT INTO  numerical  (Transaction_ID,First_Name,Last_Name,Source,ReleaseNumber,DocumentType,ClassificationNumber,DocumentStatus,Purpose,File,Date)
                VALUES ('$Transaction_ID','$First_Name','$Last_Name','$Source','$ReleaseNumber','$DocumentType','$ClassificationNumber','$DocumentStatus','$ForRelease','$name','$created_date')";
                    $connection->exec($sql);
                    echo "<div class='alert alert-success' role='alert'>
                   A simple success alert—check it out!
                 </div>";
            }
        }
    }


    public function DisplayNumericalRecords()
    {
        $connection = $this->OpenConnection();

        $getUsers = $connection->prepare("SELECT * FROM numerical");
        $getUsers->execute();
        $users = $getUsers->fetchAll();


        foreach ($users as $user) {
            echo "<tr>";
            echo "<td>$user[First_Name] + $user[Last_Name]</td>";
            echo "<td>$user[Source]</td>";
            echo "<td>$user[ReleaseNumber]</td>";
            echo "<td>$user[DocumentType]</td>";
            echo "<td>$user[ClassificationNumber]</td>";
            echo "<td>$user[DocumentStatus]</td>";
            echo "<td>$user[Purpose]</td>";
           echo "<td><a href='download1.php?filename=$user[File];'>$user[File]</a></td>";
            // echo "<td><a href='download1.php?file_id=$user[id]' class='btn btn-info'>Downloads</td>";
            echo "<td>$user[date]</td>";
            echo "<td><a href='Numerical.php?NumericalEdit=$user[id]' class='btn btn-info'>Edit</td>";
            echo "<td><a href='Numerical.php?NumericalDelete=$user[id]' class='btn btn-info'>Delete</td>";

            echo "</tr>";
        }

        if (empty($users)) {
            echo "<td text-center>No Data <br></td>";
        }
    }

    public function NumericalDelete(){
        $connection = $this->OpenConnection();

        if (isset($_GET['NumericalDelete'])) {
            $Delete = $_GET['NumericalDelete'];
            $getUsers = $connection->prepare("Delete FROM numerical Where id=$Delete");
            $getUsers->execute();
           ?>
           <script>
               alert('Successfully');
               $url = strtok($url, '?');

           </script>
<?php
        }
    }















    // public function set_user_data($array){
    //     if(!isset($_SESSION)){
    //         session_start();

    //     }



    //     $_SESSION['userdata'] = array(
    //         "Fullname" => $array['Student_Number']." ".$array['First_Name']." ".$array['Last_Name'],

    //     );

    //     return $_SESSION['userdata'];
    // }

}

$student = new myStudent();
$pdo = new PDO('mysql:host=localhost;dbname=records', 'root', '');
