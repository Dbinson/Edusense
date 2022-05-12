    
    <script src="https://kit.fontawesome.com/151114dda0.js" crossorigin="anonymous"></script>
    <!--BootStrap Javascript-->
    <script src="../../js/bootstrap.bundle.min.js"></script>

    <!-- books js -->
    <script src="../js/book.js"></script>


    <script>
        //for navbar
      var sidebar = $('#mySidebar')
      var main = $('#main')
      $('.openbtn').click(function (e) { 
        console.log(sidebar.width())
       if(sidebar.width() ==  88){
         openNav()
       }else{
         closeNav()
       }
        
      });
    

      function openNav() {
        sidebar.width("250px");
        main.css('marginLeft',"250px");
        $('.sidebar-header img').attr('src','../../public/assets/MainLogo.png')
        // $('.sidebar-header img').width('9rem')
      }
      
      function closeNav() {
        sidebar.width("88px");
        main.css('marginLeft',"88px");
        $('.sidebar-header img').attr('src','../../public/assets/logo3.png')
        // $('.sidebar-header img').width('4rem')
      }

    //   // popover For student
    //   $(function() {
    //   $('[data-bs-toggle="popoverS"]').popover({
    //         html: true,
    //         content: function() {
    //             return $('#popover-contentS').html();
    //         }
    //   });
    // });

    // // popover For faculty
    // $(function() {
    //   $('[data-bs-toggle="popoverF"]').popover({
    //         html: true,
    //         content: function() {
    //             return $('#popover-contentF').html();
    //         }
    //   });
    // });

    // popover For Notification
    $(function() {
      $('[data-bs-toggle="popover-notify"]').popover({
            html: true,
            content: function() {
                return $('#popover-content-notify').html();
            }
      });
    });

    
    $(document).ready(function () {
      $('#changePassForm').on('submit', function (e) {
      $.ajax({
        type: "post",
        url: "../../changePass.php",
        data: new FormData(this),
        processData: false,
			contentType: false,
        success: function (data) {
          if(data == 1){
            $("#successMsg").html(
              '<small class="alert alert-success w-100"> Password changed</small>'
            );
            // Empty Fields
            clearField("#addAssForm");
            setTimeout(() => {
                $('#changePassModal').modal('hide')
                location.reload();
              }, 1000);
          }else if(data == 0){
            $("#successMsg").html(
              '<small class="alert alert-danger w-100"> failed!!! Try Again</small>'
            );
            // Empty Fields
            clearField("#addAssForm");
          }
        }
      });
      e.preventDefault()
      });
    });
    function clearField(id){
    $(id).trigger('reset');
  }
    </script>
    </body>
</html>