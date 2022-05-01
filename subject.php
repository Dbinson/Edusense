<?php 
    include('./mainInclude/header.php'); 
    include('./modals/demoPlayerModal.php');
?>


<?php
include('./dbConnection.php');
    $isSearched = false;
    $searchedData = array();
    // if both options are selected
    if(isset($_REQUEST['searchBtn'])){
        
        if(isset($_REQUEST['select_class']) && isset($_REQUEST['select_subject'])){
            // unset($isSearched);
            $sql = "SELECT * FROM subject 
                WHERE class = '".$_REQUEST['select_class']."' AND name='".$_REQUEST['select_subject']."'";
            $query = mysqli_query($conn,$sql);
            while($result = mysqli_fetch_assoc($query)){
                $searchedData[] = $result;
            }
            
            $isSearched = true;
        }elseif(isset($_REQUEST['select_subject'])){
            // if only subject is selected
            $sql = "SELECT * FROM subject 
                WHERE name = '".$_REQUEST['select_subject']." '";
            $query = mysqli_query($conn, $sql);
            while($result = mysqli_fetch_assoc($query)){
                $searchedData[] = $result;
            }
            $isSearched = true;
        }elseif(isset($_REQUEST['select_class'])){
             // if only class is selected
            $sql = "SELECT * FROM subject 
                WHERE class = '".$_REQUEST['select_class']."'";
            $query = mysqli_query($conn,$sql);
            while($result = mysqli_fetch_assoc($query)){
                $searchedData[] = $result;
            }
            $isSearched = true;
        }
    }

?>
<section id="section_subject">

<form action="" class="m-3" method="post">
    <h3>Category</h3>

    <!-- select to choose class -->
    <div class="form-floating ">
        <select class="form-select" id="floatingClassSelect" name="select_class" aria-label="Floating label">
            <option selected>Open this select menu</option>
            <?php
                include_once('./dbConnection.php');    
                $sql2=mysqli_query($conn,"SELECT * from subject");
                while($result=mysqli_fetch_assoc($sql2)){
                    echo "<option value=".$result['class'].">".$result['class']."</option>";
                }
            ?>
           
        </select>
        <label for="floatingClassSelect">Choose Class</label>
    </div>

    <!-- select to choose subject -->
    <div class="form-floating my-3">
        <select class="form-select" id="floatingSubjectSelect" name="select_subject" aria-label="Floating label">
            <option selected>Open this select menu</option>
            <?php
                include_once('./dbConnection.php');    
                $sql3=mysqli_query($conn,"SELECT * from subject");
                while($result=mysqli_fetch_assoc($sql3)){
                    echo "<option value=".$result['name'].">".$result['name']."</option>";
                }
            ?>
        </select>
        <label for="floatingSubjectSelect">Choose Subject</label>
    </div>
    <button type="submit" class="btn btn-warning my-3" name="searchBtn">Search</button>
</form>


<?php 
    if(!$isSearched){
        // when user didnt searched somthing
        if($_GET['s'] == 1){
            $sql = "SELECT * FROM subject 
                WHERE class <= 4 AND class >= 1 
            ";
        }elseif($_GET['s'] == 2){
            $sql = "SELECT * FROM subject 
                WHERE class <= 10 AND class >= 5
            ";
        }elseif($_GET['s'] == 3){
            $sql = "SELECT * FROM subject 
                WHERE class <= 12 AND class >= 11
            ";
        }
        
        $query = mysqli_query($conn,$sql);
        while($result = mysqli_fetch_assoc($query)){
            echo '
                <div class="d-flex justify-content-around flex-wrap ">
                <div class="card text-center f-item">
                    <div class="card-body">
                        <h5 class="card-title py-4 display-5">'.$result['name'].'</h5>
                        <a href="#videoPlayerModal" type="button" data-bs-tonggle="modal" data-id="'.$result['subject_id'].'" class="btn btn-outline-primary my-3 openVideoModal ">View Demo</a>
                    </div>
                </div>
            ';
        }
    }else{
        foreach($searchedData as $data){

            echo '
                <div class="d-flex justify-content-around flex-wrap ">
                <div class="card text-center f-item">
                    <div class="card-body">
                        <h5 class="card-title py-4 display-5">'.$data['name'].'</h5>
                        <a href="#videoPlayerModal" type="button" data-bs-tonggle="modal" data-id="'.$data['subject_id'].'" class="btn btn-outline-primary my-3 openVideoModal ">View Demo</a>
                    </div>
                </div>
            ';
        }
    }
?>
    

    <!-- </div> -->
</section>

<script src="./public/js/subject.js"></script>
<?php include('./mainInclude/footer.php'); ?>