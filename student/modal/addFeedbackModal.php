<div id="feedbackModal" class="modal fade" tabindex="-1" aria-labelledby="feedbackModalLabel" aria-hidden="true">
    <!--Modal-->
    <div class="modal-dialog modal-dialog-centered">
        <!--Modal Content-->
        <div class="modal-content">
            <!-- Modal Header-->
            <div class="modal-header">
                <h3>Feedback</h3>
                <!--Close/Cross Button-->
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="feedbackSubmitionForm">
                <!-- Modal Body-->
                <div class="modal-body text-center">
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
                    
                        <header></header>
                        <div class="textarea text-center mt-4 ">

                            <h4>What could we improve?</h4>

                            <textarea cols="30" id="desc" name="desc" class="form-control" placeholder="Describe your experience.."></textarea>
                        </div>
                </div>

                <div class="modal-footer">
                    <span id="feedmesage"></span>
                    <button type="submit" class="btn btn-primary">Submit </button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>

$("#feedbackSubmitionForm").on('submit',(function (e) {
            $.ajax({
                url:"addFeedback.php",
                type:"post",
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function (data){
                    console.log(data)
                    if (data == 1) {
                        clearField("#feedbackSubmitionForm");
                        $("#feedmesage").html(
                          '<small class="alert alert-success px-5">Submitted  !!! Thank you </small>'
                        );
    
                        setTimeout(() => {
                          location.href = './index.php'
                        }, 1000);
                      }else if(data == 0){
                        clearField("#feedbackSubmitionForm");
                        $("#feedmesage").html(
                          '<small class="alert alert-danger px-5">Failed!!! </small>'
                        );
                      }
                }
            });
            e.preventDefault();
        }));
</script>