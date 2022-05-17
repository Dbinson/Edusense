<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="../../css/bootstrap.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
<link rel="stylesheet" href="rate.css">

<?php
    session_start();
?>

<!--Modal Launch Button-->
<button type="button" class="btn btn-info btn-lg openmodal" data-bs-toggle="modal" data-bs-target="#myModal">Open Modal</button>
<!--Division for Modal-->

<div class="post">
    <div class="text">Thanks for rating us!</div>
</div>

<div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <!--Modal-->
    <div class="modal-dialog">
        <!--Modal Content-->
        <div class="modal-content">
            <!-- Modal Header-->
            <div class="modal-header">
                <h3>Feedback Request</h3>
                <!--Close/Cross Button-->
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <!-- Modal Body-->
            <div class="modal-body text-center">
                <?php
                $feedback_type = "subject";

                ?>
                <i class="far fa-file-alt fa-4x mb-3 animated rotateIn icon1 "></i>
                <h3 class="text-success">Feel free to drop a feedback</h3>




                <!-- Radio Buttons for Rating-->
                <div class="star-widget mt-5">

                    <input type="radio" name="rate" value="5" id="rate-5">
                    <label for="rate-5" class="fas fa-star"></label>
                    <input type="radio" name="rate" value="4" id="rate-4">
                    <label for="rate-4" class="fas fa-star"></label>
                    <input type="radio" name="rate" value="3" id="rate-3">
                    <label for="rate-3" class="fas fa-star"></label>
                    <input type="radio" name="rate" value="2" id="rate-2">
                    <label for="rate-2" class="fas fa-star"></label>
                    <input type="radio" name="rate" value="1" id="rate-1">
                    <label for="rate-1" class="fas fa-star"></label>
                </div>
                <form>
                    <header></header>
                    <div class="textarea text-center mt-4 ">

                        <h4>What could we improve?</h4>

                        <textarea cols="30" id="desc" class="form-control" placeholder="Describe your experience.."></textarea>
                    </div>
                </form>

            </div>

            <div class="modal-footer">
                <script type="text/javascript">
                    <?php echo 'var feedback_type= ' . json_encode($feedback_type) . ';';

                    ?>
                </script>
                <button onclick="addfeedback(feedback_type)" class="btn btn-primary">Send </button>

            </div>
        </div>
    </div>
</div>
<script>
    function addfeedback(feedback_type) {
        var desc = document.getElementById("desc").value;
        var ratings = $("input[type='radio'][name='rate']:checked").val();
        $.ajax({
            url: "insert.php",
            type: "POST",
            data: {
                rating: ratings,
                desc: desc,
                feedback_type: feedback_type
            },
            dataType: "text",
            success: function(result) {

                $('#myModal').modal('hide');
                $(".post").css("display", "block");

            },
            error: function() {
                alert("Error");
            }
        });
    }
</script>
<script src="../../js/jquery.js"></script>
<script src="../../js/bootstrap.bundle.min.js"></script>