<div class="modal fade" id="addBookModalCenter" tabindex="-1" role="dialog" aria-labelledby="addBookModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title add-book-title" id="addBookModalCenterTitle">Add Book</h5>
            <button type="button" class="add-book-close-btn" data-bs-dismiss="modal" aria-label="Close" >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form id="addBookForm" class="add-book-form" name="addBook" role="form">
            <div class="modal-body">
                <!--Start Form -->
          
                    <div class="mb-3">  
                        <label for="select-subject" class="form-label">Subject</label>
                                <select class="form-select" id="select_subject"
                                    aria-label="Default select example">
                                <option selected>Choose book subject</option>
                        <?php
                        $sql=mysqli_query($conn,"SELECT * from subject");
                        while($result=mysqli_fetch_assoc($sql)){
                            echo "<option value=".$result['subject_id'].">".$result['subject_name']."</option>";
                        }
                        ?>
                        
                    </select>
                    
                </div>
                
                <div class="mb-3">
                    <label for="book_cover_img" class="form-label">Book Cover Image</label>
                         <input class="form-control" type="file" id="book_cover_img">

                </div>
                
                
                <div class="mb-3">
                    <label for="select_class" class="form-label">Class</label>
                            <select class="form-select" id="select_class"
                                aria-label="Default select example">
                            <option selected>Choose your class</option>

                        <?php
                        $sql=mysqli_query($conn,"SELECT * from class");
                        while($result=mysqli_fetch_assoc($sql)){
                            echo "<option value=".$result['class_id'].">".$result['class_name']."</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="chapter_name" class="form-label">Chapter Name</label>
                            <input type="email" class="form-control" id="cn"
                                aria-describedby="emailHelp">
                </div>

                <div class="mb-3">
                    <label for="chapter_no" class="form-label">Chapter No</label>
                        <input type="text" class="form-control" id="cno">
                </div>

                <div class="mb-3">
                    <label for="chapter_file" class="form-label">Chapter File</label>
                            <input class="form-control" type="file" id="cf">
                </div>
                <!-- End Form  -->
            </div>
            </form>

            <div class="modal-footer">
                <small id="successMsg"></small>
                <button  class="btn btn-primary" id="submit" onclick="addBooks()">Add</button >
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >Close</button>
            </div>
            
        </div>
      </div>
    </div>