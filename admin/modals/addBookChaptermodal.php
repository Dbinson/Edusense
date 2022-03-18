<div class="modal fade" id="addChapterModalCenter" tabindex="-1" role="dialog" aria-labelledby="addChapterModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title add-Chapter-title" id="addChapterModalCenterTitle">add</h5>
                    <button type="button" class="add-Chapter-close-btn" data-bs-dismiss="modal" aria-label="Close" >
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="addChapterForm" class="Edit-Chapter-form" name="addChapter" role="form">
                    <div class="modal-body">

                                <div class="mb-3">
                                <label for="chapter_name" class="form-label">Chapter Name</label>
                                        <input type="text" class="form-control" id="chapterName"
                                            
                            </div>
                            <div class="mb-3">
                                <label for="chapter_no" class="form-label">Chapter No</label>
                                    <input type="text" class="form-control" id="chapterNum">
                            </div>
                            <div class="mb-3">
                                <label for="chapter_file" class="form-label">Chapter File</label>
                                        <input class="form-control" type="file" id="chapterFile">
                            </div>
                                  

                        </div>
                    <div class="modal-footer">
                        <span class="successMsg"></span>
                        <button  class="btn btn-primary" type="button" id="submit" onclick="aChapters()">add</button>              
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >Close</button>

                    </div>
                </form>  
                </div>  
            </div>
        </div> 
        </div>