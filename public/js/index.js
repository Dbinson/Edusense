$( document ).ready(function() {
    // Wrap every letter in a span
  var textWrapper = document.querySelector('.ml3');
  textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");

  anime.timeline({loop: true})
    .add({
      targets: '.ml3 .letter',
      opacity: [0,1],
      easing: "easeInOutQuad",
      duration: 1225,
      delay: (el, i) => 150 * (i+1)
    }).add({
      targets: '.ml3',
      opacity: 0,
      duration: 1000,
      easing: "easeOutExpo",
      delay: 1000
    });
});
$(document).l


$(window).scroll(function (){
  // $('#main_nav').addClass('shadow backdrop-b')
  //  var height = $(window).scrollTop();

  //   if(height  == 0) {
  //     $('#main_nav').removeClass('shadow p-3 mb-5 bg-body rounded')
  //   }

    $('.fadein').each( function(i){
    
                  var bottom_of_element = $(this).offset().top + $(this).outerHeight();
                  var bottom_of_window = $(window).scrollTop() + $(window).height();

                  if( bottom_of_window > bottom_of_element ){
                      $(this).animate({'opacity':'1'},1000);
                  }
              });
      

});
// $('th').click(function(){
//   var table = $(this).parents('table').eq(0)
//   var rows = table.find('tr:gt(0)').toArray().sort(comparer($(this).index()))
//   this.asc = !this.asc
//   if (!this.asc){rows = rows.reverse()}
//   for (var i = 0; i < rows.length; i++){table.append(rows[i])}
// })
// function comparer(index) {
//   return function(a, b) {
//       var valA = getCellValue(a, index), valB = getCellValue(b, index)
//       return $.isNumeric(valA) && $.isNumeric(valB) ? valA - valB : valA.toString().localeCompare(valB)
//   }
// }
// function getCellValue(row, index){ return $(row).children('td').eq(index).text() }


