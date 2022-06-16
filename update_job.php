<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>update</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style1.css">

</head>
<body>
<!-- header -->
<div class="nav">
        <h1 class="logo">JOB<span>SITE</span></h1>
        <ul>
        <li><a href="logout.php">logout</a></li>
        <li><a href="update_job.php">update job</a></li>
        <li><a href="job_insert.php">post job</a></li>
        <li><a href="home.php">Home</a></li>
      </ul>
    </div>
    <div class="heading" style="background:url(images/home-hero-background.svg) no-repeat">
   <h1>update job</h1>
</div>

    <form action="" method="GET">
            <div class="input-group mb-3">
               <input type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="type your job-id" style="height:50px; width:30%; margin-left:10%;  border-radius: 25px;
  border: 5px solid #9FE4E0; margin-bottom:10px ">
               <button type="submit" class="btn btn-primary"style="width:30%; background-color:white;  "><img src="images\magnifier-icon.svg"style=" width:50px"></button>
            </div>
         </form>
   


<div class="cta">
    <div class="wrapper">
        
    <?php 
            $conn = mysqli_connect('localhost','root','','user_db');
            if(isset($_GET['search']))
                {
                    $filtervalues = $_GET['search'];
                    $query = "SELECT * FROM job_form WHERE CONCAT(jobid) LIKE '%$filtervalues%' ";
                                        
                    $query_run = mysqli_query($conn, $query);
                    $row = mysqli_fetch_array($query_run);
                    $jobid = $row["jobid"];
                    if(mysqli_num_rows($query_run) > 0)
                        {
                                          
                            foreach($query_run as $row)
                                {
                                    echo  "<hr>". "   Catagory: " . $row["catagory"]."<br>"."  Number required : " . $row["noemp"]."<br>"." Salary: " . $row["salary"]."<br>"."  Deadline: " . $row["deadline"]."<br>"."  Exprience: " . $row["exp"]."<br>"."  Job Description: " . $row["jobdes"]."<br>"."  Perefered Sex: " . $row["sex"]."<br>"." Company email: " . $row["cemail"]."<br>"."  Company Location: " . $row["clocation"]."<br>"."  Company Name: " . $row["cname"]."<br>"." Row no: " .$row["jobid"] ."<br>". "<a href='update.php?update={$jobid}'>update</a>". "<hr>";
                                }  
                            }else{
                                echo '<div class="col">';
                                echo "0 results";
                                 echo '</div>';
                            }

                 }
                                        

                                        
            else
                {
                    echo "0 results";
                }
                                    
        ?>
       
    </div>
</div>

<style>
   .col{
   background-color:whitesmoke;
 } 
hr {
  display: block;
  margin-top: 0.5em;
  margin-bottom: 0.5em;
  margin-left: auto;
  margin-right: auto;
  border-style: inset;
  border-width: 1px;
  
}
.cta a{
  color:#9FE4E0;
  border:1px solid #9FE4E0;
  background-color:black;
  border-radius: 10px;
  
}
.cta{
   padding: 60px 0;
   
 
   background-color: white;
   color: rgb(0, 0, 0);
}
</style>





</body>
</html>
