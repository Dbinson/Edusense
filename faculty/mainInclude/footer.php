    
    <!-- <script src="../js/s.js"></script> -->
    <script src="https://kit.fontawesome.com/151114dda0.js" crossorigin="anonymous"></script>
    <!--BootStrap Javascript-->
    <script src="../../js/bootstrap.bundle.min.js"></script>
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

      // popover For student
      $(function() {
      $('[data-bs-toggle="popoverS"]').popover({
            html: true,
            content: function() {
                return $('#popover-contentS').html();
            }
      });
    });

    // popover For faculty
    $(function() {
      $('[data-bs-toggle="popoverF"]').popover({
            html: true,
            content: function() {
                return $('#popover-contentF').html();
            }
      });
    });

    // popover For Notification
    $(function() {
      $('[data-bs-toggle="popover-notify"]').popover({
            html: true,
            content: function() {
                return $('#popover-content-notify').html();
            }
      });
    });
    </script>
    </body>
</html>