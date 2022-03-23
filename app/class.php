<?php

class myStudent
{

    private $server = "mysql:host=us-cdbr-east-05.cleardb.net;dbname=heroku_05562988b4bb0d7";
    private $user = "b7ef41912e223b";
    private $pass = "3cc18d32";


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
            $space = " ";

            if ($total > 0) {


                session_start();

                // $_SESSION['Position'] = $user['Position'];

                $_SESSION['login'] = $user['Employee_No'];
                $_SESSION['FullName'] = $user['First_Name'] .$space. $user['Last_Name'];
                $_SESSION['Account_Type'] = $user['Account_Type'];

                if ($user['Section'] === "Admin") {
                    header("location: ../p/administrator.php");
                    // $_SESSION['ID'] = $user['Account_ID'];
                    // $user['Employee_ID'] = $_SESSION['login'];
                } elseif ($_SESSION['Account_Type'] == "NumericalCommunication") {
                    header("location: ../acc/Numerical.php");
                } elseif($_SESSION['Account_Type'] == "RRMElementary"){
                    header("location: ../acc/RRM.php");
                } elseif ($_SESSION['Account_Type'] == "NumericalOthers"){
                    header("location: ../acc/NumericalOthers.php");
                } elseif ($_SESSION['Account_Type'] == "AdministrativeIssuance") {
                    header("location: ../acc/AdministrativeIssuance.php");
                } elseif ($_SESSION['Account_Type'] == 'CAV') {
                    header("location: ../acc/Cav.php");                
                } elseif($_SESSION['Account_Type'] =='AC'){
                    header("location: ../acc/AppointmentClearance.php");
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
        $comma = ", ";
        $space = " ";
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


?>
            <td class="text-center"><img src="<?php echo "$user[images]" ?>" class="img-thumbnail" height="150" width="150" style="border-radius: 50%;" /></td>
            <?php
            echo " <td>$user[Last_Name] $space $user[First_Name] $space $user[Middle_Name] $space $user[Suffix]</td>";





            echo "<td><a href='ViewProfile.php?View=$user[Employee_No]'><i class='fas fa-solid fa-eye fa-3x '></i></td>";
            echo " <td><a href='../app/f.php?DeleteAccounts=$user[Employee_No]' class='btn btn-info d-inline-block'>Delete'</a></td>";
            echo "<td><a href='AccountsEdit.php?Edit=$user[Employee_No]' class='btn btn-info'>Edit</a></td>";
            // echo "<td><a href='#INFO_DETAILS_OF_EMPLOYEE' class='btn btn-info'>Info</a></td>";

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
    public function UpdateAdministrativeIssuance()
    {
        $connection = $this->OpenConnection();

        if (isset($_POST['AdministrativeIssuanceUpdate'])) {



            $Files_ID = $_POST['ID'];
            // $First_Name = $_POST['First_Name'];
            // $Last_Name = $_POST['Last_Name'];
            // $Middle_Name = $_POST['Middle_Name'];
            // $Suffix = $_POST['Suffix'];
            $Control_Number = $_POST['Control_Number'];
            $Memorandum_Number = $_POST['Memorandum_Number'];
            // $Document_Type = $_POST['Document_Type'];
            $Document_Status = $_POST['Document_Status'];
            $Purpose = $_POST['Purpose'];
            $Date = $_POST['Date'];




            $sql = "UPDATE filesrecord SET
             Control_Number=:Control_Number, Memorandum_Number=:Memorandum_Number, Document_Status=:Document_Status,
            Purpose=:Purpose,Date=:Date WHERE Files_ID=:Files_ID";
            $statement = $connection->prepare($sql);

            $statement->bindParam(':Files_ID', $Files_ID);
            // $statement->bindParam(':First_Name', $First_Name);
            // $statement->bindParam(':Last_Name', $Last_Name);
            // $statement->bindParam(':Middle_Name', $Middle_Name);
            // $statement->bindParam(':Suffix', $Suffix);
            $statement->bindParam(':Control_Number', $Control_Number);
            $statement->bindParam(':Memorandum_Number', $Memorandum_Number);
            // $statement->bindParam(':Document_Type', $Document_Type);

            $statement->bindParam(':Document_Status', $Document_Status);
            $statement->bindParam(':Purpose', $Purpose);
            $statement->bindParam(':Date', $Date);



            if ($statement->execute()) {
            ?>
                <script type="text/javascript">
                    window.location.href = "../acc/administrativeissuancelist.php";
                    alert("Edit Successfully");
                </script>
            <?php
            } else {
            ?>
                <script>
                    alert('Error');
                </script>
            <?php
            }
        }
    }
    public function UpdateAppointmentClearance()
    {
        $connection = $this->OpenConnection();

        if (isset($_POST['AppointmentClearanceUpdate'])) {



            $Files_ID = $_POST['ID'];
            // $First_Name = $_POST['First_Name'];
            // $Last_Name = $_POST['Last_Name'];
            // $Middle_Name = $_POST['Middle_Name'];
            // $Suffix = $_POST['Suffix'];
            $Release_Number = $_POST['Release_Number'];
            $Source = $_POST['Source'];
            $Document_Type = $_POST['Document_Type'];
            $Document_Status = $_POST['Document_Status'];
            $Purpose = $_POST['Purpose'];
            $Date = $_POST['Date'];




            $sql = "UPDATE filesrecord SET
             Release_Number=:Release_Number, Source=:Source, Document_Type=:Document_Type, Document_Status=:Document_Status,
            Purpose=:Purpose,Date=:Date WHERE Files_ID=:Files_ID";
            $statement = $connection->prepare($sql);

            $statement->bindParam(':Files_ID', $Files_ID);
            // $statement->bindParam(':First_Name', $First_Name);
            // $statement->bindParam(':Last_Name', $Last_Name);
            // $statement->bindParam(':Middle_Name', $Middle_Name);
            // $statement->bindParam(':Suffix', $Suffix);
            $statement->bindParam(':Release_Number', $Release_Number);
            $statement->bindParam(':Source', $Source);
            $statement->bindParam(':Document_Type', $Document_Type);

            $statement->bindParam(':Document_Status', $Document_Status);
            $statement->bindParam(':Purpose', $Purpose);
            $statement->bindParam(':Date', $Date);



            if ($statement->execute()) {
            ?>
                <script type="text/javascript">
                    window.location.href = "../acc/appointmentclearancelist.php";
                    alert("Edit Succesfully");
                </script>
            <?php
            } else {
            ?>
                <script>
                    alert('Error');
                </script>
            <?php
            }
        }
    }
    public function UpdateAccounts()
    {
        $connection = $this->OpenConnection();

        if (isset($_POST['UpdateAccount'])) {



            $Employee_No = $_POST['Employee_No'];
            $First_Name = $_POST['First_Name'];
            $Last_Name = $_POST['Last_Name'];
            $Middle_Name = $_POST['Middle_Name'];
            $Suffix = $_POST['Suffix'];
            $Date_Birth = $_POST['Birth_Date'];
            $Age = $_POST['Age'];
            $Email = $_POST['Email'];
            $Position = $_POST['Position'];
            $Contact_NUmber = $_POST['Contact_Number'];
            $Password = $_POST['Password'];
            $Account_Type = $_POST['Account_Type'];
            // $Section = $_POST['Section'];
            // $AdministrativeIssuance = isset($_POST['AdministrativeIssuance']) ? 'Yes' : 'No';
            // $Numerical = isset($_POST['Numerical']) ? 'Yes' : 'No';
            // $RRM = isset($_POST['RRM']) ? 'Yes' : 'No';
            // $Files201 = isset($_POST['201Files']) ? 'Yes' : 'No';
            // $AdministrativeIssuance = $_POST['AdministrativeIssuance'];
            // $Numerical = $_POST['Numerical'];
            // $RRM = $_POST['RRM'];
            // $Files201 = $_POST['201Files'];
            // $sql = "UPDATE users_tbl SET First_Name=?, Last_Name=?, Middle_Name=?, Suffix=?, Position=?, Section=?, ContactNumber=?, Email=?, Password=? WHERE Account_ID='$Account_ID'";
            // $stmt = $connection->prepare($sql);
            // $stmt->execute([$First_Name, $Last_Name, $Middle_Name, $Suffix,$Position,$Section,$ContactNUmber,$Email,$Password]);

            $sql = "UPDATE users_tbl SET First_Name=:First_Name, Last_Name=:Last_Name, Middle_Name=:Middle_Name, Suffix=:Suffix, Date_Birth=:Date_Birth, Age=:Age, Position=:Position, Contact_Number=:Contact_Number,
            Email=:Email,Password=:Password, Account_Type=:Account_Type  WHERE Employee_No=:Employee_No";
            $statement = $connection->prepare($sql);

            $statement->bindParam(':Employee_No',$Employee_No);
            $statement->bindParam(':First_Name',$First_Name);
            $statement->bindParam(':Last_Name',$Last_Name);
            $statement->bindParam(':Middle_Name',$Middle_Name);
            $statement->bindParam(':Suffix',$Suffix);
            $statement->bindParam(':Date_Birth',$Date_Birth);
            $statement->bindParam(':Age',$Age);
            $statement->bindParam(':Position',$Position);

            $statement->bindParam(':Contact_Number',$Contact_NUmber);
            $statement->bindParam(':Account_Type',$Account_Type);
            $statement->bindParam(':Email',$Email);
            $statement->bindParam(':Password',$Password);


            if ($statement->execute()) {
            ?>
                <script type="text/javascript">
                    window.location.href = "../p/accountlist.php";
                    alert("Edit Succesfully");
                </script>
            <?php
            } else {
            ?>
                <script>
                    alert('Error');
                </script>
            <?php
            }
        }
    }
    public function UpdateRRM()
    {
        $connection = $this->OpenConnection();

        if (isset($_POST['RRMUpdate'])) {



            $Files_ID = $_POST['ID'];

            $Control_Number = $_POST['Control_Number'];

            $Date = $_POST['Date'];




            $sql = "UPDATE filesrecord SET
             Control_Number=:Control_Number, Date=:Date WHERE Files_ID=:Files_ID";
            $statement = $connection->prepare($sql);

            $statement->bindParam(':Files_ID', $Files_ID);

            $statement->bindParam(':Control_Number', $Control_Number);

            $statement->bindParam(':Date', $Date);



            if ($statement->execute()) {
            ?>
                <script type="text/javascript">
                    window.location.href = "../acc/rrmlist.php";
                    alert("Edit Successfully");
                </script>
            <?php
            } else {
            ?>
                <script>
                    alert('Error');
                </script>
            <?php
            }
        }
    }

    public function UpdateNumericalOthers()
    {
        $connection = $this->OpenConnection();

        if (isset($_POST['NumericalUpdate'])) {



            $Files_ID = $_POST['ID'];
            // $First_Name = $_POST['First_Name'];
            // $Last_Name = $_POST['Last_Name'];
            // $Middle_Name = $_POST['Middle_Name'];
            // $Suffix = $_POST['Suffix'];
            $Release_Number = $_POST['Release_Number'];
            $Source = $_POST['Source'];
            // $Document_Type = $_POST['Document_Type'];
            $Classification_Number = $_POST['Classification_Number'];
            $Purpose = $_POST['Purpose'];
            $Date = $_POST['Date'];




            $sql = "UPDATE filesrecord SET
             Release_Number=:Release_Number, Source=:Source, Classification_Number=:Classification_Number,
            Purpose=:Purpose,Date=:Date WHERE Files_ID=:Files_ID";
            $statement = $connection->prepare($sql);

            $statement->bindParam(':Files_ID', $Files_ID);
            // $statement->bindParam(':First_Name', $First_Name);
            // $statement->bindParam(':Last_Name', $Last_Name);
            // $statement->bindParam(':Middle_Name', $Middle_Name);
            // $statement->bindParam(':Suffix', $Suffix);
            $statement->bindParam(':Release_Number', $Release_Number);
            $statement->bindParam(':Source', $Source);
            // $statement->bindParam(':Document_Type', $Document_Type);

            $statement->bindParam(':Classification_Number', $Classification_Number);
            $statement->bindParam(':Purpose', $Purpose);
            $statement->bindParam(':Date', $Date);



            if ($statement->execute()) {
            ?>
                <script type="text/javascript">
                    window.location.href = "../acc/numericalotherslist.php";
                    alert("Edit Successfully");
                </script>
            <?php
            } else {
            ?>
                <script>
                    alert('Error');
                </script>
            <?php
            }
        }
    }
    public function UpdateNumericalRecords()
    {
        $connection = $this->OpenConnection();

        if (isset($_POST['NumericalUpdate'])) {



            $Files_ID = $_POST['ID'];
            // $First_Name = $_POST['First_Name'];
            // $Last_Name = $_POST['Last_Name'];
            // $Middle_Name = $_POST['Middle_Name'];
            // $Suffix = $_POST['Suffix'];
            $Release_Number = $_POST['Release_Number'];
            $Source = $_POST['Source'];
            // $Document_Type = $_POST['Document_Type'];
            $Classification_Number = $_POST['Classification_Number'];
            $Purpose = $_POST['Purpose'];
            $Date = $_POST['Date'];




            $sql = "UPDATE filesrecord SET
             Release_Number=:Release_Number, Source=:Source, Classification_Number=:Classification_Number,
            Purpose=:Purpose,Date=:Date WHERE Files_ID=:Files_ID";
            $statement = $connection->prepare($sql);

            $statement->bindParam(':Files_ID', $Files_ID);
            // $statement->bindParam(':First_Name', $First_Name);
            // $statement->bindParam(':Last_Name', $Last_Name);
            // $statement->bindParam(':Middle_Name', $Middle_Name);
            // $statement->bindParam(':Suffix', $Suffix);
            $statement->bindParam(':Release_Number', $Release_Number);
            $statement->bindParam(':Source', $Source);
            // $statement->bindParam(':Document_Type', $Document_Type);

            $statement->bindParam(':Classification_Number', $Classification_Number);
            $statement->bindParam(':Purpose', $Purpose);
            $statement->bindParam(':Date', $Date);



            if ($statement->execute()) {
            ?>
                <script type="text/javascript">
                    window.location.href = "../acc/numericallist.php";
                    alert("Edit Successfully");
                </script>
            <?php
            } else {
            ?>
                <script>
                    alert('Error');
                </script>
            <?php
            }
        }
    }


    public function UpdateCAV()
    {
        $connection = $this->OpenConnection();

        if (isset($_POST['cavUpdate'])) {



            $Files_ID = $_POST['ID'];
            // $First_Name = $_POST['First_Name'];
            // $Last_Name = $_POST['Last_Name'];
            // $Middle_Name = $_POST['Middle_Name'];
            // $Suffix = $_POST['Suffix'];
            $CAV_ID = $_POST['CAV_ID'];
            $Source = $_POST['Source'];
            // $Document_Type = $_POST['Document_Type'];
            $District = $_POST['District'];
            $Year = $_POST['Year'];
            $Date = $_POST['Date'];




            $sql = "UPDATE filesrecord SET
            Source=:Source, District=:District, Year=:Year,
            CAV_ID=:CAV_ID, Date=:Date WHERE Files_ID=:Files_ID";
            $statement = $connection->prepare($sql);

            $statement->bindParam(':Files_ID', $Files_ID);
            // $statement->bindParam(':First_Name', $First_Name);
            // $statement->bindParam(':Last_Name', $Last_Name);
            // $statement->bindParam(':Middle_Name', $Middle_Name);
            // $statement->bindParam(':Suffix', $Suffix);
            $statement->bindParam(':Source', $Source);
            $statement->bindParam(':District', $District);
            // $statement->bindParam(':Document_Type', $Document_Type);

            $statement->bindParam(':Year', $Year);
            $statement->bindParam(':CAV_ID', $CAV_ID);
            $statement->bindParam(':Date', $Date);



            if ($statement->execute()) {
            ?>
                <script type="text/javascript">
                    window.location.href = "../acc/cavList.php";
                    alert("Edit Successfully");
                </script>
            <?php
            } else {
            ?>
                <script>
                    alert('Error');
                </script>
            <?php
            }
        }
    }
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
        if (isset($_GET['DeleteAccounts'])) {
            $DeleteAccounts = $_GET['DeleteAccounts'];

            $getUsers = $connection->prepare("Delete FROM users_tbl Where Employee_No = '$DeleteAccounts' ");
            if ($getUsers->execute()) {
            ?>
                <script type="text/javascript">
                    alert("Delete Successfully");
                    window.location.href = "../p/Accountlist.php";
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
            $created_date = date("Y-m-d");
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

    public function DisplayAllRecords()
    {
        $connection = $this->OpenConnection();
        $sql = ("Select * From filesrecord");
        $stmt = $this->OpenConnection()->query($sql);

        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $rows = array("data" => $users);
        foreach ($users as $user) {
            // $rows[] = $user;
            echo "<tr>";
            echo "<td><a href='AppointmentClearanceAdd.php?Add=$user[Files_ID]' class='btn btn-info'>Add Records</a></button></td>";
            echo "<td>$user[Control_Number]</td>";
            echo "<td>$user[First_Name]</td>";
            echo "<td>$user[Last_Name]</td>";
            echo "<td>$user[Middle_Name]</td>";
            echo "<td>$user[Suffix]</td>";
            echo "<td>$user[Document_Type]</td>";
            echo "<td>$user[Release_Number]</td>";
            echo "<td>$user[Source]</td>";
            echo "<td>$user[Document_Status]</td>";
            echo "<td>$user[Purpose]</td>";
            echo "<td>$user[Classification_Number]</td>";
            echo "<td>$user[District]</td>";
            echo "<td>$user[Academic]</td>";
            echo "<td>$user[Year]</td>";
            echo "<td>$user[Grade_Level]</td>";
            echo "<td>$user[CAV_ID]</td>";
            echo "<td>$user[Date_Administrative]</td>";
            echo "<td>$user[Memorandum_Number]</td>";
            echo "<td><a href='../p/download1.php?filename=$user[File]'>$user[File]</a></td>";
            echo "<td>$user[Date]</td>";

            // echo "<td><a href='#?Add=$user[Files_ID]' class='btn btn-info'>Add Records</a></button></td>";

            echo "</tr>";
        }
        // echo json_encode($rows);
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

        if (isset($_POST['AddAccountSubmit'])) {


            // if (isset($_POST['AddAccountsSubmit'])) {
            $Employee_No = $_POST['Employee_No'];
            $First_Name = $_POST['First_Name'];
            $Last_Name = $_POST['Last_Name'];
            $Suffix = $_POST['Suffix'];
            $Age = $_POST['Age'];
            $Email = $_POST['Email'];
            $Account_Type = $_POST['Account_Type'];
            $Position = $_POST['Position'];
            $ContactNUmber = $_POST['Contact_Number'];
            $Password = $_POST['Password'];
            $Middle_Name = $_POST['Middle_Name'];
            // $Section = $_POST['Section'];
            $Employment_Date = $_POST['Employment_Date'];
            $Date_Birth = $_POST['Birth_Date'];
            $AdministrativeIssuance = isset($_POST['AdministrativeIssuance']) ? 'Yes' : 'No';
            $Numerical = isset($_POST['Numerical']) ? 'Yes' : 'No';
            $RRM = isset($_POST['RRM']) ? 'Yes' : 'No';
            $Files201 = isset($_POST['201Files']) ? 'Yes' : 'No';
            $created_date = date("Y-m-d H:i:s");

            // THIS WILL GENERATE UNIQUE ID
            $sql = "INSERT INTO  users_tbl  (Employee_No,First_Name,Last_Name,Middle_Name,Suffix,Date_Birth,Age,Position,Employment_Date,Contact_Number,Account_Type,Email,Password,Date)
        VALUES ('$Employee_No','$First_Name','$Last_Name','$Middle_Name','$Suffix','$Date_Birth','$Age','$Position','$Employment_Date','$ContactNUmber','$Account_Type','$Email','$Password','$created_date')";
            $connection->exec($sql);
            echo "<div class='alert alert-success' role='alert'>
          You have successfully created an Account!
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
                $target_file = '../images/' . $filename;

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
            header('location: ../p/profilepage.php');
        }
    }

    public function Fileupload1()
    {
        $Employee_No = $_SESSION['login'];
        $connection = $this->OpenConnection();

        if (isset($_POST['Fileupload'])) {

            // Count total files
            $countfiles = count($_FILES['files']['name']);


            // Loop all files
            for ($i = 0; $i < $countfiles; $i++) {

                // File name
                $filename = $_FILES['files']['name'][$i];

                // Location
                $target_file = '../p/images/' . $filename;

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
        WHERE Employee_No = :Employee_No';

                        // prepare statement
                        $statement = $connection->prepare($sql);

                        // bind params
                        $statement->bindParam(':Employee_No', $Employee_No, PDO::PARAM_INT);
                        $statement->bindParam(':images', $target_file);

                        // execute the UPDATE statment
                        if ($statement->execute()) {
                            echo 'Upload successfully!';
                        } else {
                            echo "Error";
                        }
                    }
                }
            }

            echo "File upload successfully";
            header('location: ../p/profilepage.php');
        }
    }


    public function UploadPicture()
    {
        $connection = $this->OpenConnection();
        if (isset($_POST['submit'])) {

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
                $target_file = 'upload/' . $filename;

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
        }
    }

    public function view1()
    {
        $Account_ID = $_SESSION['login'];
        $connection = $this->OpenConnection();

        $stmt = $connection->prepare("select images from users_tbl where Employee_No ='$Account_ID' limit 1 ");
        $stmt->execute();
        $imagelist = $stmt->fetchAll();

        foreach ($imagelist as $image) {


            echo "$image[images]";
        }

        if (empty($imagelist)) {
            echo "../dist/img/avatar.jpg";
        }
    }

    public function AdministrativeIssuanceAddRecords()
    {
        $connection = $this->OpenConnection();
        if (isset($_POST['AdministrativeIssuanceSubmit'])) {

            $Transaction_ID = uniqid();
            $First_Name = $_POST['First_Name'];
            $Middle_Name = $_POST['Middle_Name'];
            $Suffix = $_POST['Suffix'];
            $Last_Name = $_POST['Last_Name'];
            $Control_Number = $_POST['Control_Number'];
            $Memorandum_Number = $_POST['Memorandum_Number'];
            $Document_Type = $_POST['Document_Type'];
            $Date = $_POST['Date'];

            $created_date = date("Y-m-d");
            $name = $_FILES['file']['name'];
            $size = $_FILES['file']['size'];
            $type = $_FILES['file']['type'];
            $temp = $_FILES['file']['tmp_name'];
            $fname = date("YmdHis") . '_' . $name;
            $chk = $connection->query("SELECT * FROM  filesrecord where File = '$name' ")->rowCount();
            if ($chk) {
                $i = 1;
                $c = 0;
                while ($c == 0) {
                    $i++;
                    $reversedParts = explode('.', strrev($name), 2);
                    $tname = (strrev($reversedParts[1])) . "_" . ($i) . '.' . (strrev($reversedParts[0]));
                    $chk2 = $connection->query("SELECT * FROM  filesrecord where File = '$tname' ")->rowCount();
                    if ($chk2 == 0) {
                        $c = 1;
                        $name = $tname;
                    }
                }
            }
            $move =  move_uploaded_file($temp, "../records/" . $fname);
            if ($move) {
                $sql = "INSERT INTO  filesrecord  (Transaction_ID,Control_Number,First_Name,Last_Name,Middle_Name,Suffix,Document_Type,Memorandum_Number,File,Date)
                VALUES ('$Transaction_ID','$Control_Number','$First_Name','$Last_Name','$Middle_Name','$Suffix','$Document_Type','$Memorandum_Number','$name','$Date')";
                $connection->exec($sql);
                echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>You have successfully added the records</strong> You should check it on the A
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
              </div>";
            }
        }
    }

    public function AppointmentCLearanceAddRecords()
    {
        $connection = $this->OpenConnection();
        if (isset($_POST['AppointmentClearanceSubmit'])) {

            $Transaction_ID = uniqid();
            $First_Name = $_POST['First_Name'];
            $Middle_Name = $_POST['Middle_Name'];
            $Suffix = $_POST['Suffix'];
            $Last_Name = $_POST['Last_Name'];
            $Source = $_POST['Source'];
            $Release_Number = $_POST['Release_Number'];
            $Document_Type = $_POST['Document_Type'];
            // $ClassificationNumber = $_POST['ClassificationNumber'];
            $Document_Status = $_POST['Document_Status'];
            $Purpose = $_POST['Purpose'];
            $Date = $_POST['Date'];
            $created_date = date("Y-m-d");
            $name = $_FILES['file']['name'];
            $size = $_FILES['file']['size'];
            $type = $_FILES['file']['type'];
            $temp = $_FILES['file']['tmp_name'];
            $fname = date("YmdHis") . '_' . $name;
            $chk = $connection->query("SELECT * FROM  filesrecord where File = '$name' ")->rowCount();
            if ($chk) {
                $i = 1;
                $c = 0;
                while ($c == 0) {
                    $i++;
                    $reversedParts = explode('.', strrev($name), 2);
                    $tname = (strrev($reversedParts[1])) . "_" . ($i) . '.' . (strrev($reversedParts[0]));
                    $chk2 = $connection->query("SELECT * FROM  filesrecord where File = '$tname' ")->rowCount();
                    if ($chk2 == 0) {
                        $c = 1;
                        $name = $tname;
                    }
                }
            }
            $move =  move_uploaded_file($temp, "../records/" . $fname);
            if ($move) {
                $sql = "INSERT INTO  filesrecord  (Transaction_ID,First_Name,Last_Name,Middle_Name,Suffix,Document_Type,Release_Number,Source,Document_Status,Purpose,File,Date)
                VALUES ('$Transaction_ID','$First_Name','$Last_Name','$Middle_Name','$Suffix','$Document_Type','$Release_Number','$Source','$Document_Status','$Purpose','$name','$created_date')";
                $connection->exec($sql);
            ?>
                <script>
                    history.pushState({}, "", "")
                </script>
            <?php
                echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>You have Successfully added Records</strong> You should check in on the All Records.
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
              </div>";
            } else {
                echo "Error";
            }
        }
    }

    public function CAVAddRecords()
    {
        $connection = $this->OpenConnection();
        if (isset($_POST['CAVSubmit'])) {

            $Transaction_ID = uniqid();
            $First_Name = $_POST['First_Name'];
            $Last_Name = $_POST['Last_Name'];
            $Middle_Name = $_POST['Middle_Name'];
            $Suffix = $_POST['Suffix'];
            $Source = $_POST['Source'];
            $CAV_ID = $_POST['Cav_ID'];
            $District = $_POST['District'];
            $Year = $_POST['Year'];
            // $DocumentStatus = $_POST['DocumentStatus'];

            $Date = $_POST['Date'];
            $created_date = date("Y-m-d");
            $name = $_FILES['file']['name'];
            $size = $_FILES['file']['size'];
            $type = $_FILES['file']['type'];
            $temp = $_FILES['file']['tmp_name'];
            $fname = date("YmdHis") . '_' . $name;
            $chk = $connection->query("SELECT * FROM  filesrecord where File = '$name' ")->rowCount();
            if ($chk) {
                $i = 1;
                $c = 0;
                while ($c == 0) {
                    $i++;
                    $reversedParts = explode('.', strrev($name), 2);
                    $tname = (strrev($reversedParts[1])) . "_" . ($i) . '.' . (strrev($reversedParts[0]));
                    $chk2 = $connection->query("SELECT * FROM  filesrecord where File = '$tname' ")->rowCount();
                    if ($chk2 == 0) {
                        $c = 1;
                        $name = $tname;
                    }
                }
            }
            $move =  move_uploaded_file($temp, "../records/" . $fname);
            if ($move) {
                $sql = "INSERT INTO  filesrecord  (Transaction_ID,First_Name,Last_Name,Middle_Name,Suffix,Source,District,Year,CAV_ID,File,Date)
                VALUES ('$Transaction_ID','$First_Name','$Last_Name','$Middle_Name','$Suffix','$Source','$District','$Year','$CAV_ID','$name','$Date')";
                $connection->exec($sql);
                echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>You have successfully added the records</strong> You should check it on the A
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
              </div>";
            }
        }
    }

    public function RRMaddRecords()
    {
        $connection = $this->OpenConnection();
        if (isset($_POST['RRMSubmit'])) {

            $Transaction_ID = uniqid();
            $First_Name = $_POST['First_Name'];
            $Last_Name = $_POST['Last_Name'];
            $Middle_Name = $_POST['Middle_Name'];
            $Suffix = $_POST['Suffix'];
            $Control_Number = $_POST['Control_Number'];

            $Document_Type = $_POST['Document_Type'];


            $Date = $_POST['Date'];
            $created_date = date("Y-m-d");
            $name = $_FILES['file']['name'];
            $size = $_FILES['file']['size'];
            $type = $_FILES['file']['type'];
            $temp = $_FILES['file']['tmp_name'];
            $fname = date("YmdHis") . '_' . $name;
            $chk = $connection->query("SELECT * FROM  filesrecord where File = '$name' ")->rowCount();
            if ($chk) {
                $i = 1;
                $c = 0;
                while ($c == 0) {
                    $i++;
                    $reversedParts = explode('.', strrev($name), 2);
                    $tname = (strrev($reversedParts[1])) . "_" . ($i) . '.' . (strrev($reversedParts[0]));
                    $chk2 = $connection->query("SELECT * FROM  filesrecord where File = '$tname' ")->rowCount();
                    if ($chk2 == 0) {
                        $c = 1;
                        $name = $tname;
                    }
                }
            }
            $move =  move_uploaded_file($temp, "../records/" . $fname);
            if ($move) {
                $sql = "INSERT INTO  filesrecord  (Transaction_ID,Control_Number,First_Name,Last_Name,Middle_Name,Suffix,Document_Type,File,Date)
                VALUES ('$Transaction_ID','$Control_Number','$First_Name','$Last_Name','$Middle_Name','$Suffix','$Document_Type','$name','$Date')";
                $connection->exec($sql);
                echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>You have successfully added the records</strong> You should check it on the All Records List
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
              </div>";
            }
        }
    }
    public function NumericalAddRecords()
    {
        $connection = $this->OpenConnection();
        if (isset($_POST['NumericalSubmit'])) {

            $Transaction_ID = uniqid();
            $First_Name = $_POST['First_Name'];
            $Last_Name = $_POST['Last_Name'];
            $Middle_Name = $_POST['Middle_Name'];
            $Suffix = $_POST['Suffix'];
            $Source = $_POST['Source'];
            $Release_Number = $_POST['Release_Number'];
            $Document_Type = $_POST['Document_Type'];
            $Classification_Number = $_POST['Classification_Number'];
            // $DocumentStatus = $_POST['DocumentStatus'];
            $Purpose = $_POST['Purpose'];
            $Date = $_POST['Date'];
            $created_date = date("Y-m-d");
            $name = $_FILES['file']['name'];
            $size = $_FILES['file']['size'];
            $type = $_FILES['file']['type'];
            $temp = $_FILES['file']['tmp_name'];
            $fname = date("YmdHis") . '_' . $name;
            $chk = $connection->query("SELECT * FROM  filesrecord where File = '$name' ")->rowCount();
            if ($chk) {
                $i = 1;
                $c = 0;
                while ($c == 0) {
                    $i++;
                    $reversedParts = explode('.', strrev($name), 2);
                    $tname = (strrev($reversedParts[1])) . "_" . ($i) . '.' . (strrev($reversedParts[0]));
                    $chk2 = $connection->query("SELECT * FROM  filesrecord where File = '$tname' ")->rowCount();
                    if ($chk2 == 0) {
                        $c = 1;
                        $name = $tname;
                    }
                }
            }
            $move =  move_uploaded_file($temp, "../records/" . $fname);
            if ($move) {
                $sql = "INSERT INTO  filesrecord  (Transaction_ID,First_Name,Last_Name,Middle_Name,Suffix,Document_Type,Release_Number,Source,Purpose,Classification_Number,File,Date)
                VALUES ('$Transaction_ID','$First_Name','$Last_Name','$Middle_Name','$Suffix','$Document_Type','$Release_Number','$Source','$Purpose','$Classification_Number','$name','$Date')";
                $connection->exec($sql);
                echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>You have successfully added the records</strong> You should check it on the A
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
              </div>";
            }
        }
    }
    public function Numerical_Comm_AddRecords()
    {
        $connection = $this->OpenConnection();
        if (isset($_POST['Numerical_Commu_Add'])) {

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
            $chk = $connection->query("SELECT * FROM numerical_communication where File = '$name' ")->rowCount();
            if ($chk) {
                $i = 1;
                $c = 0;
                while ($c == 0) {
                    $i++;
                    $reversedParts = explode('.', strrev($name), 2);
                    $tname = (strrev($reversedParts[1])) . "_" . ($i) . '.' . (strrev($reversedParts[0]));
                    $chk2 = $connection->query("SELECT * FROM  numerical_communication where File = '$tname' ")->rowCount();
                    if ($chk2 == 0) {
                        $c = 1;
                        $name = $tname;
                    }
                }
            }
            $move =  move_uploaded_file($temp, "../records/" . $fname);
            if ($move) {
                $sql = "INSERT INTO  numerical_communication  (Transaction_ID,First_Name,Last_Name,Source,ReleaseNumber,DocumentType,ClassificationNumber,DocumentStatus,Purpose,File,Date)
                VALUES ('$Transaction_ID','$First_Name','$Last_Name','$Source','$ReleaseNumber','$DocumentType','$ClassificationNumber','$DocumentStatus','$ForRelease','$name','$created_date')";
                $connection->exec($sql);
                echo "<div class='alert alert-success' role='alert'>
                   A simple success alert—check it out!
                 </div>";
            }
        }
    }
    public function CavSectionAddRecords()
    {
        $connection = $this->OpenConnection();
        if (isset($_POST['CAVaddrecords'])) {

            $Transaction_ID = uniqid();
            $First_Name = $_POST['First_Name'];
            $Last_Name = $_POST['Last_Name'];
            $District = $_POST['District'];
            $Academic = $_POST['Academic'];
            $Source = $_POST['Source'];
            $Year = $_POST['Year'];
            $GradeLevel = $_POST['GradeLevel'];


            $created_date = date("Y-m-d");
            $name = $_FILES['file']['name'];
            $size = $_FILES['file']['size'];
            $type = $_FILES['file']['type'];
            $temp = $_FILES['file']['tmp_name'];
            $fname = date("YmdHis") . '_' . $name;
            $chk = $connection->query("SELECT * FROM  cavsection where File = '$name' ")->rowCount();
            if ($chk) {
                $i = 1;
                $c = 0;
                while ($c == 0) {
                    $i++;
                    $reversedParts = explode('.', strrev($name), 2);
                    $tname = (strrev($reversedParts[1])) . "_" . ($i) . '.' . (strrev($reversedParts[0]));
                    $chk2 = $connection->query("SELECT * FROM  cavsection where File = '$tname' ")->rowCount();
                    if ($chk2 == 0) {
                        $c = 1;
                        $name = $tname;
                    }
                }
            }
            $move =  move_uploaded_file($temp, "../records/" . $fname);
            if ($move) {
                $sql = "INSERT INTO  cavsection  (Transaction_ID,First_Name,Last_Name,District,Academic,Source,Year,GradeLevel,File,Date)
                VALUES ('$Transaction_ID','$First_Name','$Last_Name','$District','$Academic','$Source','$Year','$GradeLevel','$name','$created_date')";
                $connection->exec($sql);
                echo "<div class='alert alert-success' role='alert'>
                   A simple success alert—check it out!
                 </div>";
            }
        }
    }
    public function DisplayRRM()
    {
        $connection = $this->OpenConnection();
        $sql = ("Select * From filesrecord");
        $stmt = $this->OpenConnection()->query($sql);

        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $rows = array("data" => $users);
        foreach ($users as $user) {
            // $rows[] = $user;
            echo "<tr>";
            // echo "<td><a href='AppointmentClearanceAdd.php?Add=$user[Files_ID]' class='btn btn-info'>Add Records</a></button></td>";
            echo "<td>$user[Control_Number]</td>";
            echo "<td>$user[Last_Name]</td>";
            echo "<td>$user[First_Name]</td>";

            echo "<td>$user[Middle_Name]</td>";
            echo "<td>$user[Suffix]</td>";
            echo "<td>$user[Document_Type]</td>";



            echo "<td>$user[Date]</td>";
            echo "<td><a href='../p/download1.php?filename=$user[File]'>$user[File]</a></td>";
            echo "<td><a href='RRMEdit?Edit=$user[Files_ID]'>Edit</a></td>";
            echo "<td><a href='RRMEdit?Delete=$user[Files_ID]'>Edit</a></td>";



            // echo "<td><a href='#?Add=$user[Files_ID]' class='btn btn-info'>Add Records</a></button></td>";

            echo "</tr>";
        }
    }
    public function DisplayRRMRecords()
    {
        $connection = $this->OpenConnection();
        $sql = ("Select * From filesrecord");
        $stmt = $this->OpenConnection()->query($sql);

        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $rows = array("data" => $users);
        foreach ($users as $user) {
            // $rows[] = $user;
            echo "<tr>";
            echo "<td><a href='RRMadd.php?Add=$user[Files_ID]' class='btn btn-info'>Add Records</a></button></td>";
            echo "<td>$user[Control_Number]</td>";
            echo "<td>$user[First_Name]</td>";
            echo "<td>$user[Last_Name]</td>";
            echo "<td>$user[Middle_Name]</td>";
            echo "<td>$user[Suffix]</td>";
            echo "<td>$user[Document_Type]</td>";
            echo "<td>$user[Release_Number]</td>";
            echo "<td>$user[Source]</td>";
            echo "<td>$user[Document_Status]</td>";
            echo "<td>$user[Purpose]</td>";
            echo "<td>$user[Classification_Number]</td>";
            echo "<td>$user[District]</td>";
            echo "<td>$user[Academic]</td>";
            echo "<td>$user[Year]</td>";
            echo "<td>$user[Grade_Level]</td>";
            echo "<td>$user[CAV_ID]</td>";
            echo "<td>$user[Date_Administrative]</td>";
            echo "<td>$user[Memorandum_Number]</td>";
            echo "<td><a href='../p/download1.php?filename=$user[File]'>$user[File]</a></td>";
            echo "<td>$user[Date]</td>";

            // echo "<td><a href='#?Add=$user[Files_ID]' class='btn btn-info'>Add Records</a></button></td>";

            echo "</tr>";
        }
        // echo json_encode($rows);
    }

    public function DisplayAdministrativeIssuanceRecords(){
        $connection = $this->OpenConnection();
        $sql = ("Select * From filesrecord");
        $stmt = $this->OpenConnection()->query($sql);

        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $rows = array("data" => $users);
        foreach ($users as $user) {
            // $rows[] = $user;
            echo "<tr>";
            echo "<td><a href='administrativeissuanceAdd.php?Add=$user[Files_ID]' class='btn btn-info'>Add Additional Records</a></button></td>";
            echo "<td>$user[Control_Number]</td>";
            echo "<td>$user[Memorandum_Number]</td>";
            echo "<td>$user[First_Name]</td>";
            echo "<td>$user[Last_Name]</td>";
            echo "<td>$user[Middle_Name]</td>";
            echo "<td>$user[Suffix]</td>";
            echo "<td>$user[Document_Type]</td>";
            echo "<td>$user[Date]</td>";
            echo "<td><a href='../p/download1.php?filename=$user[File]'>$user[File]</a></td>";
           

            // echo "<td><a href='#?Add=$user[Files_ID]' class='btn btn-info'>Add Records</a></button></td>";

            echo "</tr>";
        }
    }
    
    public function DisplayAdministrativeIssuance()
    {
        $connection = $this->OpenConnection();
        $sql = ("Select * From filesrecord");
        $stmt = $this->OpenConnection()->query($sql);

        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $rows = array("data" => $users);
        foreach ($users as $user) {
            // $rows[] = $user;
            echo "<tr>";
            // echo "<td><a href='#' class='btn btn-info'>View</a></button></td>";
            echo "<td>$user[Control_Number]</td>";
            echo "<td>$user[First_Name]</td>";
            echo "<td>$user[Last_Name]</td>";
            echo "<td>$user[Middle_Name]</td>";
            echo "<td>$user[Suffix]</td>";
            echo "<td>$user[Document_Type]</td>";
            echo "<td>$user[Release_Number]</td>";
            echo "<td>$user[Source]</td>";
            echo "<td>$user[Document_Status]</td>";
            echo "<td>$user[Purpose]</td>";
            echo "<td>$user[Classification_Number]</td>";
            echo "<td>$user[District]</td>";
            echo "<td>$user[Academic]</td>";
            echo "<td>$user[Year]</td>";
            echo "<td>$user[Grade_Level]</td>";
            echo "<td>$user[CAV_ID]</td>";
            echo "<td>$user[Date_Administrative]</td>";
            echo "<td>$user[Memorandum_Number]</td>";
            echo "<td><a href='../p/download1.php?filename=$user[File]'>$user[File]</a></td>";
            echo "<td>$user[Date]</td>";

            // echo "<td><a href='#?Add=$user[Files_ID]' class='btn btn-info'>Add Records</a></button></td>";

            echo "</tr>";
        }
        // echo json_encode($rows);
    }

    public function displayCav()
    {
        $connection = $this->OpenConnection();
        $sql = ("Select * From filesrecord");
        $stmt = $this->OpenConnection()->query($sql);

        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $rows = array("data" => $users);
        foreach ($users as $user) {
            // $rows[] = $user;
            echo "<tr>";
            echo "<td><a href='cavAdd.php?Add=$user[Files_ID]' class='btn btn-info'>View</a></button></td>";
            echo "<td>$user[Control_Number]</td>";
            echo "<td>$user[First_Name]</td>";
            echo "<td>$user[Last_Name]</td>";
            echo "<td>$user[Middle_Name]</td>";
            echo "<td>$user[Suffix]</td>";
            echo "<td>$user[Document_Type]</td>";
            echo "<td>$user[Release_Number]</td>";
            echo "<td>$user[Source]</td>";
            echo "<td>$user[Document_Status]</td>";
            echo "<td>$user[Purpose]</td>";
            echo "<td>$user[Classification_Number]</td>";
            echo "<td>$user[District]</td>";
            echo "<td>$user[Academic]</td>";
            echo "<td>$user[Year]</td>";
            echo "<td>$user[Grade_Level]</td>";
            echo "<td>$user[CAV_ID]</td>";
            echo "<td>$user[Date_Administrative]</td>";
            echo "<td>$user[Memorandum_Number]</td>";
            echo "<td><a href='../p/download1.php?filename=$user[File]'>$user[File]</a></td>";
            echo "<td>$user[Date]</td>";

            // echo "<td><a href='#?Add=$user[Files_ID]' class='btn btn-info'>Add Records</a></button></td>";

            echo "</tr>";
        }
        // echo json_encode($rows);
    }
    public function DisplayAppointmentClearance()
    {
        $connection = $this->OpenConnection();
        $sql = ("Select * From filesrecord");
        $stmt = $this->OpenConnection()->query($sql);

        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $rows = array("data" => $users);
        foreach ($users as $user) {
            // $rows[] = $user;
            echo "<tr>";
            echo "<td><a href='AppointmentClearanceAdd.php?Add=$user[Files_ID]' class='btn btn-info'>Add Records</a></button></td>";
            echo "<td>$user[Control_Number]</td>";
            echo "<td>$user[First_Name]</td>";
            echo "<td>$user[Last_Name]</td>";
            echo "<td>$user[Middle_Name]</td>";
            echo "<td>$user[Suffix]</td>";
            echo "<td>$user[Document_Type]</td>";
            echo "<td>$user[Release_Number]</td>";
            echo "<td>$user[Source]</td>";
            echo "<td>$user[Document_Status]</td>";
            echo "<td>$user[Purpose]</td>";
            echo "<td>$user[Classification_Number]</td>";
            echo "<td>$user[District]</td>";
            echo "<td>$user[Academic]</td>";
            echo "<td>$user[Year]</td>";
            echo "<td>$user[Grade_Level]</td>";
            echo "<td>$user[CAV_ID]</td>";
            echo "<td>$user[Date_Administrative]</td>";
            echo "<td>$user[Memorandum_Number]</td>";
            echo "<td><a href='../p/download1.php?filename=$user[File]'>$user[File]</a></td>";
            echo "<td>$user[Date]</td>";

            // echo "<td><a href='#?Add=$user[Files_ID]' class='btn btn-info'>Add Records</a></button></td>";

            echo "</tr>";
        }
        // echo json_encode($rows);
    }
    public function DisplayCavRecords()
    {
        $connection = $this->OpenConnection();
        $ewanKOnlng = " ";
        $getUsers = $connection->prepare("SELECT * FROM cavsection");
        $getUsers->execute();
        $users = $getUsers->fetchAll();


        foreach ($users as $user) {
            echo "<tr>";
            echo "<td>$user[First_Name] $ewanKOnlng $user[Last_Name]</td>";
            echo "<td>$user[District]</td>";
            echo "<td>$user[Academic]</td>";
            echo "<td>$user[Source]</td>";

            echo "<td>$user[Year]</td>";
            echo "<td>$user[GradeLevel]</td>";
            echo "<td><a href='download1.php?filename=$user[File]'>$user[File]</a></td>";


            echo "<td>$user[Date]</td>";
            echo "<td><a href='CavEdit.php?CavEdit=$user[id]' class='btn btn-info'>Edit</td>";
            echo "<td><a href='cavsection.php?CavDelete=$user[id]' class='btn btn-info'>Delete</td>";


            echo "</tr>";
        }

        if (empty($users)) {
            echo "<td text-center>No Data <br></td>";
        }
    }
    public function DisplayNumericalCommunicationRecords()
    {
        $connection = $this->OpenConnection();
        $space = " ";
        $getUsers = $connection->prepare("SELECT * FROM filesrecord");
        $getUsers->execute();
        $users = $getUsers->fetchAll();


        foreach ($users as $user) {
            echo "<tr>";
            echo "<td>$user[Release_Number]</td>";
            echo "<td>$user[Last_Name] $space $user[First_Name] $space $user[Middle_Name] $space $user[Suffix]</td>";
            echo "<td>$user[Document_Type]</td>";
            echo "<td>$user[Source]</td>";
            echo "<td>$user[Classification_Number]</td>";
            echo "<td>$user[Purpose]</td>";
            echo "<td><a href='download1.php?filename=$user[File]'>$user[File]</a></td>";
            // echo "<td><a href='download1.php?file_id=$user[id]' class='btn btn-info'>Downloads</td>";
            // echo "<td>$user[Date]</td>";
            echo "<td><a href='NumericalEdit.php?NumericalEdit=$user[Files_ID]' class='btn btn-info'>Edit</td>";
            echo "<td><a href='Numerical.php?NumericalDelete=$user[Files_ID]' class='btn btn-info'>Delete</td>";

            echo "</tr>";
        }

        if (empty($users)) {
            echo "<td text-center>No Data <br></td>";
        }
    }
    public function DisplayNumericalOthers()
    {
        $connection = $this->OpenConnection();
        $sql = ("Select * From filesrecord");
        $stmt = $this->OpenConnection()->query($sql);

        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $rows = array("data" => $users);
        foreach ($users as $user) {
            // $rows[] = $user;
            echo "<tr>";
            echo "<td><a href='Numerical-OthersAdd.php?Add=$user[Files_ID]' class='btn btn-info'>Add Records</a></button></td>";
            echo "<td>$user[Control_Number]</td>";
            echo "<td>$user[First_Name]</td>";
            echo "<td>$user[Last_Name]</td>";
            echo "<td>$user[Middle_Name]</td>";
            echo "<td>$user[Suffix]</td>";
            echo "<td>$user[Document_Type]</td>";
            echo "<td>$user[Release_Number]</td>";
            echo "<td>$user[Source]</td>";
            echo "<td>$user[Document_Status]</td>";
            echo "<td>$user[Purpose]</td>";
            echo "<td>$user[Classification_Number]</td>";
            echo "<td>$user[District]</td>";
            echo "<td>$user[Academic]</td>";
            echo "<td>$user[Year]</td>";
            echo "<td>$user[Grade_Level]</td>";
            echo "<td>$user[CAV_ID]</td>";
            echo "<td>$user[Date_Administrative]</td>";
            echo "<td>$user[Memorandum_Number]</td>";
            echo "<td><a href='../p/download1.php?filename=$user[File]'>$user[File]</a></td>";
            echo "<td>$user[Date]</td>";

            // echo "<td><a href='#?Add=$user[Files_ID]' class='btn btn-info'>Add Records</a></button></td>";

            echo "</tr>";
        }
    }
    public function DisplayNumericalRecords()
    {
        $connection = $this->OpenConnection();
        $sql = ("Select * From filesrecord");
        $stmt = $this->OpenConnection()->query($sql);

        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $rows = array("data" => $users);
        foreach ($users as $user) {
            // $rows[] = $user;
            echo "<tr>";
            echo "<td><a href='NumericalAdd.php?Add=$user[Files_ID]' class='btn btn-info'>Add Records</a></button></td>";
            echo "<td>$user[Control_Number]</td>";
            echo "<td>$user[First_Name]</td>";
            echo "<td>$user[Last_Name]</td>";
            echo "<td>$user[Middle_Name]</td>";
            echo "<td>$user[Suffix]</td>";
            echo "<td>$user[Document_Type]</td>";
            echo "<td>$user[Release_Number]</td>";
            echo "<td>$user[Source]</td>";
            echo "<td>$user[Document_Status]</td>";
            echo "<td>$user[Purpose]</td>";
            echo "<td>$user[Classification_Number]</td>";
            echo "<td>$user[District]</td>";
            echo "<td>$user[Academic]</td>";
            echo "<td>$user[Year]</td>";
            echo "<td>$user[Grade_Level]</td>";
            echo "<td>$user[CAV_ID]</td>";
            echo "<td>$user[Date_Administrative]</td>";
            echo "<td>$user[Memorandum_Number]</td>";
            echo "<td><a href='../p/download1.php?filename=$user[File]'>$user[File]</a></td>";
            echo "<td>$user[Date]</td>";

            // echo "<td><a href='#?Add=$user[Files_ID]' class='btn btn-info'>Add Records</a></button></td>";

            echo "</tr>";
        }
    }

    public function DisplayFilesRecordsAdministrativeIssuance()
    {
        $connection = $this->OpenConnection();
        $ewanKOnlng = " ";
        $getUsers = $connection->prepare("SELECT * FROM filesrecord");
        $getUsers->execute();
        $users = $getUsers->fetchAll();


        foreach ($users as $user) {
            echo "<tr>";
            echo "<td>$user[Control_Number]</td>";
            echo "<td>$user[First_Name] $ewanKOnlng $user[Last_Name]</td>";
            echo "<td>$user[Document_Type]</td>";

            echo "<td>$user[Release_Number]</td>";
            echo "<td>$user[Source]</td>";
            echo "<td>$user[Document_Status]</td>";
            echo "<td>$user[Purpose]</td>";
            echo "<td>$user[Classification_Number]</td>";
            echo "<td>$user[District]</td>";
            echo "<td>$user[Year]</td>";
            echo "<td>$user[Grade_Level]</td>";
            echo "<td>$user[CAV_ID]</td>";
            echo "<td>$user[Date_Administrative]</td>";
            echo "<td>$user[Memorandum_Number]</td>";




            echo "<td><a href='download1.php?filename=$user[File]'>$user[File]</a></td>";
            // echo "<td><a href='download1.php?file_id=$user[id]' class='btn btn-info'>Downloads</td>";
            // echo "<td>$user[Date]</td>";
            echo "<td><a href='CavEdit.php?CavEdit=$user[Files_ID]' class='btn btn-info'>Edit</td>";
            // echo "<td><a href='Numerical.php?NumericalDelete=$user[Files_ID]' class='btn btn-info'>Delete</td>";

            echo "</tr>";
        }

        if (empty($users)) {
            echo "<td text-center>No Data <br></td>";
        }
    }
    public function DisplayFilesRecordsNumerical()
    {
        $connection = $this->OpenConnection();
        $ewanKOnlng = ", ";
        $space = "";
        $getUsers = $connection->prepare("SELECT * FROM filesrecord");
        $getUsers->execute();
        $users = $getUsers->fetchAll();


        foreach ($users as $user) {
            echo "<tr>";
            echo "<td>$user[Control_Number]</td>";
            echo "<td>$user[Last_Name] $ewanKOnlng $user[First_Name] $space $user[Middle_Name] $space $user[Suffix]</td>";
            echo "<td>$user[Document_Type]</td>";

            // echo "<td>$user[Release_Number]</td>";
            // echo "<td>$user[Source]</td>";
            // echo "<td>$user[Document_Status]</td>";
            // echo "<td>$user[Purpose]</td>";
            // echo "<td>$user[Classification_Number]</td>";
            // echo "<td>$user[District]</td>";
            // echo "<td>$user[Year]</td>";
            // echo "<td>$user[Grade_Level]</td>";
            // echo "<td>$user[CAV_ID]</td>";
            // echo "<td>$user[Date_Administrative]</td>";
            // echo "<td>$user[Memorandum_Number]</td>";
            echo "<td>$user[Date]</td>";



            echo "<td><a href='download1.php?filename=$user[File]'>$user[File]</a></td>";
            // echo "<td><a href='download1.php?file_id=$user[id]' class='btn btn-info'>Downloads</td>";
            // echo "<td>$user[Date]</td>";
            echo "<td><a href='NumericalEdit.php?NumericalEdit=$user[Files_ID]' class='btn btn-info'>Edit</td>";
            // echo "<td><a href='Numerical.php?NumericalDelete=$user[Files_ID]' class='btn btn-info'>Delete</td>";

            echo "</tr>";
        }

        if (empty($users)) {
            echo "<td text-center>No Data <br></td>";
        }
    }
    public function DisplayFilesRecordsRRM()
    {
        $connection = $this->OpenConnection();
        $ewanKOnlng = ", ";
        $space = "";
        $getUsers = $connection->prepare("SELECT * FROM filesrecord");
        $getUsers->execute();
        $users = $getUsers->fetchAll();


        foreach ($users as $user) {
            echo "<tr>";
            echo "<td>$user[Control_Number]</td>";
            echo "<td>$user[Last_Name] $ewanKOnlng $user[First_Name] $space $user[Middle_Name] $space $user[Suffix]</td>";
            echo "<td>$user[Document_Type]</td>";

            // echo "<td>$user[Release_Number]</td>";
            // echo "<td>$user[Source]</td>";
            // echo "<td>$user[Document_Status]</td>";
            // echo "<td>$user[Purpose]</td>";
            // echo "<td>$user[Classification_Number]</td>";
            // echo "<td>$user[District]</td>";
            // echo "<td>$user[Year]</td>";
            // echo "<td>$user[Grade_Level]</td>";
            // echo "<td>$user[CAV_ID]</td>";
            // echo "<td>$user[Date_Administrative]</td>";
            // echo "<td>$user[Memorandum_Number]</td>";
            echo "<td>$user[Date]</td>";



            echo "<td><a href='download1.php?filename=$user[File]'>$user[File]</a></td>";
            // echo "<td><a href='download1.php?file_id=$user[id]' class='btn btn-info'>Downloads</td>";
            // echo "<td>$user[Date]</td>";
            echo "<td><a href='#GOTOEDITRRMPAGE' class='btn btn-info'>Edit</td>";
            // echo "<td><a href='Numerical.php?NumericalDelete=$user[Files_ID]' class='btn btn-info'>Delete</td>";

            echo "</tr>";
        }

        if (empty($users)) {
            echo "<td text-center>No Data <br></td>";
        }
    }
    public function CavDelete()
    {
        $connection = $this->OpenConnection();

        if (isset($_GET['CavDelete'])) {
            $Delete = $_GET['CavDelete'];
            $getUsers = $connection->prepare("Delete FROM cavsection Where id=$Delete");
            $getUsers->execute();
            ?>
            <script>
                alert('Successfully');
                $url = strtok($url, '?');
            </script>
        <?php
        }
    }

    public function NumericalDelete()
    {
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

    public function AddFilesRecords()
    {
        $connection = $this->OpenConnection();
        if (isset($_POST['NumericalADD'])) {

            $Fullname = $_SESSION['FullName'];
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
            $chk = $connection->query("SELECT * FROM  filesrecord where File = '$name' ")->rowCount();
            if ($chk) {
                $i = 1;
                $c = 0;
                while ($c == 0) {
                    $i++;
                    $reversedParts = explode('.', strrev($name), 2);
                    $tname = (strrev($reversedParts[1])) . "_" . ($i) . '.' . (strrev($reversedParts[0]));
                    $chk2 = $connection->query("SELECT * FROM  filesrecord where File = '$tname' ")->rowCount();
                    if ($chk2 == 0) {
                        $c = 1;
                        $name = $tname;
                    }
                }
            }
            $move =  move_uploaded_file($temp, "../records/" . $fname);
            if ($move) {
                $sql = "INSERT INTO  filesrecord  (Transaction_ID,First_Name,Last_Name,Source,Release_Number,Document_Type,Classification_Number,Document_Status,Purpose,File,Date)
                VALUES ('$Transaction_ID','$First_Name','$Last_Name','$Source','$ReleaseNumber','$DocumentType','$ClassificationNumber','$DocumentStatus','$ForRelease','$name','$created_date')";
                $connection->exec($sql);
                echo "<div class='alert alert-success' role='alert'>
                   A simple success alert—check it out!
                 </div>";
            }
        }
    }

    public function AddRRMRecords()
    {
        $connection = $this->OpenConnection();
        if (isset($_POST['RRMAddRecords'])) {
            $Fullname = $_SESSION['FullName'];
            $Transaction_ID = uniqid();
            $First_Name = $_POST['First_Name'];
            $Last_Name = $_POST['Last_Name'];
            $Middle_Name = $_POST['Middle_Name'];
            $Suffix = $_POST['Suffix'];
            $Last_Name = $_POST['Last_Name'];
            $Control_Number = $_POST['Control_Number'];
            // $Source = $_POST['Source'];
            // $ReleaseNumber = $_POST['ReleaseNumber'];
            $DocumentType = $_POST['Document_Type'];
            // $ClassificationNumber = $_POST['ClassificationNumber'];
            // $DocumentStatus = $_POST['DocumentStatus'];
            // $ForRelease = $_POST['ForRelease'];
            // $Date = $_POST['Date'];
            $created_date = date("Y-m-d h-i-s");
            $name = $_FILES['file']['name'];
            $size = $_FILES['file']['size'];
            $type = $_FILES['file']['type'];
            $temp = $_FILES['file']['tmp_name'];
            $fname = date("YmdHis") . '_' . $name;
            $chk = $connection->query("SELECT * FROM  filesrecord where File = '$name' ")->rowCount();
            if ($chk) {
                $i = 1;
                $c = 0;
                while ($c == 0) {
                    $i++;
                    $reversedParts = explode('.', strrev($name), 2);
                    $tname = (strrev($reversedParts[1])) . "_" . ($i) . '.' . (strrev($reversedParts[0]));
                    $chk2 = $connection->query("SELECT * FROM  filesrecord where File = '$tname' ")->rowCount();
                    if ($chk2 == 0) {
                        $c = 1;
                        $name = $tname;
                    }
                }
            }
            $move =  move_uploaded_file($temp, "../records/" . $fname);
            if ($move) {
                $sql = "INSERT INTO  filesrecord  (Control_Number,Transaction_ID,First_Name,Last_Name,Middle_Name,Suffix,Document_Type,File,Received_By,Date_Received,Date)
                VALUES ('$Control_Number','$Transaction_ID','$First_Name','$Last_Name','$Middle_Name','$Suffix','$DocumentType','$name','$Fullname','$created_date','$created_date')";
                $connection->exec($sql);
                echo "<div class='alert alert-success' role='alert'>
                   A simple success alert—check it out!
                 </div>";
            }
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
$pdo = new PDO('mysql:host=us-cdbr-east-05.cleardb.net;dbname=heroku_05562988b4bb0d7', 'b7ef41912e223b', '3cc18d32');
