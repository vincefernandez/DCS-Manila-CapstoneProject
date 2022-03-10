<?php
include_once('../app/class.php');

if (isset($_POST['submit']) != "") {
    $name = $_FILES['file']['name'];
    $size = $_FILES['file']['size'];
    $type = $_FILES['file']['type'];
    $temp = $_FILES['file']['tmp_name'];
    $fname = date("YmdHis") . '_' . $name;
    $chk = $pdo->query("SELECT * FROM  upload where name = '$name' ")->rowCount();
    if ($chk) {
        $i = 1;
        $c = 0;
        while ($c == 0) {
            $i++;
            $reversedParts = explode('.', strrev($name), 2);
            $tname = (strrev($reversedParts[1])) . "_" . ($i) . '.' . (strrev($reversedParts[0]));
            $chk2 = $pdo->query("SELECT * FROM  upload where name = '$tname' ")->rowCount();
            if ($chk2 == 0) {
                $c = 1;
                $name = $tname;
            }
        }
    }
    $move =  move_uploaded_file($temp, "upload/" . $fname);
    if ($move) {
        $query = $pdo->query("insert into upload(name,fname)values('$name','$fname')");
        if ($query) {
            echo"success";
        } else {
            echo "error";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form enctype="multipart/form-data" action="sample1.php" name="form" method="post">
        Select File
        <input type="file" name="file" id="file" /></td>
        <input type="submit" name="submit" id="submit" value="Submit" />
    </form>



    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
			<thead>
				<tr>
					<th width="90%" align="center">Files</th>
					<th align="center">Action</th>
				</tr>
			</thead>
			<?php
			$query=$pdo->query("select * from upload order by id desc");
			while($row=$query->fetch()){
				$name=$row['name'];
			?>
			<tr>
				<td>
					&nbsp;<?php echo $name ;?>
				</td>
				<td>
					<button class="alert-success"><a href="download1.php?filename=<?php echo $name;?>&f=<?php echo $row['fname'] ?>">Download</a></button>
				</td>
			</tr>
			<?php }?>
		</table>

</body>

</html>