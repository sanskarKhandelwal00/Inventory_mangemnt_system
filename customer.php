
<?php

require_once 'includes/header.php'; 

try 
{
    $pdo = new PDO("mysql:host=localhost;dbname=store", "root", "");

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $all_items = $pdo->query("SELECT * FROM client_info");

    while ( $row = $all_items->fetch(PDO::FETCH_OBJ) ) 
    {
        $items[] = $row;
    }
}
catch(PDOException $e)
{
    echo "Connection failed: " . $e->getMessage();
    die();
}

if (isset($_POST['cname']) && isset($_POST['cphno']) && isset($_POST['caddress'])) 
{
    if (strlen($_POST['cname']) < 1 || strlen($_POST['cphno']) < 1 || strlen($_POST['caddress']) < 1 )
    {
        $_SESSION['status'] = "All fields are required";
        header("Location: add.php");
        return;
    }
    else{


   

    $cname = htmlentities($_POST['cname']);
    $cgstno = htmlentities($_POST['cgstno']);
    $caddress = htmlentities($_POST['caddress']);
    $ccity = htmlentities($_POST['ccity']);
    $cstate = htmlentities($_POST['cstate']);
    $cpostal = htmlentities($_POST['cpostal']);
    $cphno = htmlentities($_POST['cphno']);
    $cemail = htmlentities($_POST['cemail']);
    $cwebsite = htmlentities($_POST['cwebsite']);
    $cdate = htmlentities($_POST['cdate']);


    $stmt = $pdo->prepare("
        INSERT INTO client_info (cname, cgstno, caddress, ccity, cstate, cpostal, cphno, cemail, cwebsite, cdate) 
        VALUES (:cname, :cgstno, :caddress, :ccity, :cstate, :cpostal, :cphno, :cemail, :cwebsite, :cdate)
    ");
    if($stmt)
    {
      
      
    echo '<script>alert("Client details added Successfully")</script>';
    }

    $stmt->execute([
        ':cname' => $cname, 
        ':cgstno' => $cgstno, 
        ':caddress' => $caddress, 
        ':ccity' => $ccity,
        ':cstate' => $cstate,
        ':cpostal' => $cpostal,
        ':cphno' => $cphno,
        ':cemail' => $cemail,
        ':cwebsite' => $cwebsite,
        ':cdate' => $cdate,

        
      
    ]);

} 
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $all_items = $pdo->query("SELECT * FROM client_info");

    while ( $row = $all_items->fetch(PDO::FETCH_OBJ) ) 
    {
        $items[] = $row;
    } 
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial scale=1">
  <title>Info</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


<style>
   body{
background-image: url('images/bg.jpg'); background-repeat: no-repeat; background-size: cover;
} 
table{
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  border: 1px solid;
  width: 100%;
  background-color: white;
}

td,th {
  border: 1px solid ;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2;}

tr:hover {background-color: #ddd;}

th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #ddd;
  
}
@import url(https://fonts.googleapis.com/css?family=Lato:400,700,900,300);
@import url(http://weloveiconfonts.com/api/?family=fontawesome);

* { box-sizing: border-box; }

body { 
  background-color: whitesmoke; 
  font-family: 'Lato';
} 

h1 { font-size: 2em; color: whitesmoke; font-weight: 400; margin-bottom: 0.5em; margin-top: 0; text-align-last: center;}
p { font-size: 1em; color: whitesmoke; margin-bottom: 1em; margin-top: 0; }
a { color: dodgerblue; text-decoration: none; border-bottom: 1px dotted; }
a:hover { color: tomato; }

.containers { 
  max-width: 960px; 
  height: 100%;
  margin: 0 auto; 
  padding: 1.5em;
}

form > div {
  display: flex;
  flex-wrap: wrap;
}

form > div > p {
  min-width: 33.33%;
  padding: 10px;
}

form p { color: black; }



form > div { margin-bottom: 1em; }


input,
keygen::-webkit-keygen-select,

label {
  display: block;
  margin: 0.75em 0;
  font-weight: bold;
  font-size: 14px;
}

input {
  line-height: normal;
}
</style>
</head>
<body>
<div class="containers">
  <h1 style="color: black;"><b>Add Client</h1>
  
<form method="post">
  <div>
  <p style="padding-right: 50px " >
    <label>Company Name<br>
    <input style="width: 400px; height: 40px" type="text" placeholder="Name" name="cname" id="cname">
    </label>
     </p>
  <p>
    <label>GST Number<br>
    <input style="width: 400px; height: 40px" type="text" placeholder="GST Number" name="cgstno" id="cgstno">
    </label>
     </p>
  <p style="padding-right: 50px; margin-top: -45px" >
    <label>Client Address<br>
    <input style="width: 400px; height: 40px" type="text" placeholder="Address" name="caddress" id="caddress">
    </label>
   </p>
  <p style="margin-top: -45px" >
    <label>City<br>
    <input style="width: 400px; height: 40px" type="text" placeholder="City" name="ccity" id="ccity">
    </label>
   </p>
  <p style="padding-right: 50px; margin-top: -45px" >
    <label>State<br>
    <input style="width: 400px; height: 40px" type="text" placeholder="State" name="cstate" id="cstate">
    </label>
   </p>
  <p style="margin-top: -45px">
    <label>
      Postal Code<br>
    <input style="width: 400px; height: 40px" type="tel" placeholder="Postal Code" name="cpostal" id="cpostal">
    </label>
  </p>
  <p style="padding-right: 50px; margin-top: -45px">
    <label>
      Phone Number<br>
    <input style="width: 400px; height: 40px" type="tel" placeholder="Phone Number" name="cphno" id="cphno">
    </label>
  </p>
   <p style="margin-top: -45px">
    <label>Email<br>
    <input style="width: 400px; height: 40px" type="email" placeholder="Email" name="cemail" id="cemail">
    </label>
    </p>
  <p style="padding-right: 50px; margin-top: -45px">
    <label>Website<br>
    <input style="width: 400px; height: 40px" type="text" placeholder="Website" name="cwebsite" id="cwebsite">
    </label>
    </p>

  <p style="margin-top: -45px">
    <label>
      Date<br>
    <input style="width: 400px; height: 40px" type="date" name="cdate" id="cdate">
    </label>
  </p>

  <p style="padding-right: 100px; margin-top: -45px">
    <input style=" height: 40px;margin-left: 380px; background-color: grey; color: white; font-size: 17px" type="submit" value="ADD CLIENT" >
  </p>
  
</form>
</div>
</div>
<div style="height: 50%; overflow: auto; display: block;margin-left: 50px;margin-right: 50px; margin-top: 10px;" >
<table class="table">
              <thead style="font-size: 18px">
                <tr>
                  
                  <th>Company Name</th> 
                  <th>GST Number</th> 
                  <th>Client Address</th>                       
                  <th>City</th> 
                  <th>State</th>
                  <th>Postal Code</th>
                  <th>phone number</th>
                  <th>Email</th> 
                  <th>Website</th> 
                  <th>Date</th>  
                  
                  
                </tr>
              </thead>
              <tbody>
                <?php foreach($items as $i) : ?>
                  
                  <tr style="font-size: 15px">
                    <td><?php echo $i->cname; ?></td>
                    <td><?php echo $i->cgstno; ?></td>
                    <td><?php echo $i->caddress; ?></td>
                    <td><?php echo $i->ccity; ?></td>
                    <td><?php echo $i->cstate; ?></td>
                    <td><?php echo $i->cpostal; ?></td>
                    <td><?php echo $i->cphno; ?></td>
                    <td><?php echo $i->cemail; ?></td>
                    <td><?php echo $i->cwebsite; ?></td>
                    <td><?php echo $i->cdate; ?></td>
                            
                  </tr>
                          <?php endforeach; ?>
</body>