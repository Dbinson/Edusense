<div
      class="modal fade"
      id="viewVideoModal"
      tabindex="-1"
      aria-labelledby="viewVideoModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-fullscreen-xxl-down">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="viewVideoModalLabel">
              <?php
                echo $GLOBALS['lcname'];
              ?>
            </h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            <video 
              controls 
              width="auto"
              >
              <?php echo ' <source src="'.$content.'">'; ?>
            </video>
          </div>
        </div>
      </div>
    </div>
    