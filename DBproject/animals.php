<?php
 session_start();
 if(isset($_SESSION['user']))
 {
 }
 else{
  echo"<script>location.href='login.html'</script>";
 }
?>
<html>
    <head>
        <title>Animals </title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet">
<style>
  :root{
        --light-color: #f3f3f3;
        --dark-color: #333;
        --max-width: 1100px;
        }


table {
  /* font-family: 'Montserrat', sans-serif; */
    /* border-collapse: collapse; outline: green solid 5px; */
    /* background: #FAFAFA; */
    /* background-color: #522c2e; */
    margin:5px ;
    width:100%;
    color: black;
}

td, th {
    /* border: 2px solid #dddddd; */
    text-align: left;
    padding: 8px;
}
th{
  font-size: large;
}



input[type=text] {
    width: 15%;
    padding: 12px 20px;
    margin: 8px ;
    background:#fff;
    border: 1px solid #eee;
    border-radius: 5px;
    color:#ddd;
}
img{
  border-radius: 50px ;
}

        *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        }
        body{
        font-family: 'Lato', sans-serif;
        line-height: 1.5;
        background: var(--light-color);
        overflow: hidden;
        }

        a{
            color: #333;
            text-decoration: none;
        }

        ul{
            list-style: none;
        }
        .container{
        max-width: var(--max-width);
        padding: 0 2rem;
        margin: auto;
        overflow: hidden;
        }
        #main-nav{
            background: #1A374D;
            color: #eee;
            position: sticky;
            z-index: 2;
            top: 0;
        }

        #main-nav .container{
            display: grid;
            grid-template-columns: 6fr 3fr ;
            padding: 1rem;
            align-items: center;
        }
        #main-nav ul{
    justify-self: end;
    display: flex;
    }

#main-nav ul li a{
    padding: 0.75rem;
    color: #eee;
}


#main-nav ul li a:hover{
    background: var(--light-color);
    color: var(--dark-color);
}


        </style>
</head>
<body>
<nav id="main-nav">
        <div class="container">
            <h2>Animals</h2>
            <ul>
                <li>
                    <a href="home.html">Home</a>
                </li>
                <li>
                    <a href="animalsadd.php">Add</a>
                </li>
                <li>
                    <a href="animalsupdate.php">Update</a>
                </li>
                <li>
                    <a href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="lastblock" style="margin-top:25px;">
    <form action="deleteanimal.php" method="post">
    <input  id="dbutton" type="text" name="t1" placeholder="Enter ID" required>
    <input  style=" padding: 8px; background: #1A374D; border: none; border-radius: 5px; color: #eee "type="submit" value="Delete">
    </form> 
    </div>
    <?php
   
$con = mysqli_connect("localhost","root","","Petshop_management");
if(!$con)
{ 
die("could not connect".mysql_error());
}
$var=mysqli_query($con,"select P.pet_id,P.pet_category,A.breed,A.weight,A.height,A.age,fur,P.cost from pets P,animals 

A where P.pet_id=A.pet_id ");
echo "<table border size=10>";
echo "<tr>
<th>pet_ID</th>
<th>petcategory</th>
<th>breed</th>
<th>weight(kg)</th>
<th>height(cm)</th>
<th>age(m)</th>
<th>fur</th>
<th>cost(Rs)</th>
</tr>";
if(mysqli_num_rows($var)>0){
    while($arr=mysqli_fetch_row($var))
    { echo "<tr>
    <td>$arr[0]</td>
    <td>$arr[1]</td>
    <td>$arr[2]</td>
    <td>$arr[3]</td>
    <td>$arr[4]</td>
    <td>$arr[5]</td>
    <td>$arr[6]</td>
    <td>$arr[7]</td>
    </tr>";}
    echo "</table>";
    mysqli_free_result($var);
}

mysqli_close($con);
    
    
?>


</body>
</html>