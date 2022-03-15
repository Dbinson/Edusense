<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="stud.css">

            <?php
            //  include("../dbConnection.php");
            ?>

</head>

<body>



    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-7">
                <!-- Post content-->
            
           <?php
                // $sql=mysqli_query($conn, "SELECT* from assignment WHERE aid='".$_GET["aid"]."'");
                // while($result= mysqli_fetch_assoc($sql)){
                   
                    ?>

                    <article>       
                    <!-- Post header-->
                    <header class="mb-4">
                        <!-- Post title-->
                        <h1 class="fw-bolder mb-1">
                        <?php 
                        //   echo $result["aname"];
                        ?>

                        </h1>
                        <!-- Post meta content-->
                        <div class="text-muted fst-italic mb-2">
                        <span > Due Date</span>
                        <?php 
                         $d=strtotime( $result["enddate"]);
                         echo date(" F d, Y h:i A", $d);
                        ?>
                        </div>
                            
                        <!-- Post categories-->
                    </header>
                
                    <section class="mb-5">
                        <span > Instructions</span>
                        <p class="fs-5 mb-4 mt-3 fs-4">
                        <?php 
                          echo $result["adesc"];
                        ?>
                        </p>
                        <!-- <p class="fs-5 mb-4">
                            The universe is large and old, and the ingredients for life as
                            we know it are everywhere, so there's no reason to think that
                            Earth would be unique in that regard. Whether of not the life
                            became intelligent is a different question, and we'll see if we
                            find that.
                        </p>
                        <p class="fs-5 mb-4">
                            If you get asteroids about a kilometer in size, those are large
                            enough and carry enough energy into our system to disrupt
                            transportation, communication, the food chains, and that can be
                            a really bad day on Earth.
                        </p>
                        <h2 class="fw-bolder mb-4 mt-5">
                            I have odd cosmic thoughts every day
                        </h2>
                        <p class="fs-5 mb-4">
                            For me, the most fascinating interface is Twitter. I have odd
                            cosmic thoughts every day and I realized I could hold them to
                            myself or share them with people who might be interested.
                        </p>
                        <p class="fs-5 mb-4">
                            Venus has a runaway greenhouse effect. I kind of want to know
                            what happened there because we're twirling knobs here on Earth
                            without knowing the consequences of it. Mars once had running
                            water. It's bone dry today. Something bad happened there as
                            well.
                        </p> -->
                    </section>
                </article>
                    <?php
                // }
?>
              
                
             <form action="" method="post" enctype="multipart/form-data">
                <div>
                    <div class="alert alert-secondary" role="alert">
                        <h4>upload name</h4>

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>

                </div>

                <br>
                <div>
                    <button type="submit" class="btn btn-primary"><input type="file" displ name="" /></button>
                    <button type="submit" class="btn btn-primary">Submit</button>

                </div>
             </form>
            </div>
        </div>
    </div>
</body>

</html>