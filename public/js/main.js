

//MENUE BUTTON TEST
$(document).ready(function () {

//   if(window.innerHeight > window.innerWidth){
//     alert("Please use Landscape!");
// }


  var bars = $('.menu-bar');
  var menu = $('.mobile-menu');
  var menuButton = $('.menu-button');
  var timeline = new TimelineMax({paused: true});
  var open = false;
  var body= $('body');

  timeline
  .to(bars[0], 0.3, {
    top: '5px',
    rotation: 45,
  }, 0)
  .to(bars[1], 0.3, {
    opacity: 0
  }, 0)
  .to(bars[2], 0.3, {
    top: '-7px',
    rotation: -45,
  }, 0)
  .to(menu, 0.3, {
    css:{display:'flex'}
  })


  menuButton.on('click', function () {
    $(this).toggleClass('active');
    if (open) {
      timeline.reverse();
      open = false;
    } else {
      timeline.play();
      open = true;
    }
  });



  //Kernfeature

  //Next Button
  var ButtonNext = $('.button-next');

  ButtonNext.on('click', function(e){
    e.preventDefault();
    var page_id = $(this).attr('id');
    getNewQuestion(page_id);
  });

  //Back Button
  var ButtonBack = $('.button-back');

  ButtonBack.on('click', function(e){
    e.preventDefault();
    var page_id = $(this).attr('id');
    getNewQuestion(page_id);
  })

  function getNewQuestion(page_id){
    e.preventDefault();
    console.log('getNewQuestion');

    $.ajax({
      type: 'GET',
      url: 'http://localhost:8888/Anastasia/anastasia/getPageContent/' + page_id,
      dataType: "html",
      success: function (data) {

        var question = $('<div>').append(data).find('#question-wrapper').html();
        $('#question-wrapper').html(question);

        var answer = $('<div>').append(data).find('#answerpage-wrapper').html();
        $('#answerpage-wrapper').html(answer);

        var next = $('<a>').append(data).find('.button-next').attr('id');
        $('.button-next').attr('id', next);

        var back = $('<a>').append(data).find('.button-back').attr('id');
        $('.button-back').attr('id', back);
      }
    });
  }

//Antwort speichern

  var answerImg = $('.answer_img');

  $('body').on('click', answerImg, function(event){

      var page_id = $('.button-next').attr('id');

      var target = $(event.target);
      var parent = target.parent();
      var img = parent.find('.answer_img');

      var img_attr = img.attr('alt');
      // console.log(page_id);

      $.ajax({
        type: 'POST',
        url:"http://localhost:8888/Anastasia/anastasia/setAnswer",
        data:{ answer : img_attr, page : page_id},
         success: function(data,status){
           console.log(status);
           console.log(data);
           $('.button-next__dissabeld').removeClass('button-next__dissabeld').addClass('button-next');
        }
      })




// AJAX um Antwort in session zu speichern
    // $.ajax({
    //   type: 'POST',
    //   url:"http://localhost:8888/Anastasia/anastasia/setAnswerSession",
    //   data:{ name : img_attr , page : page_id},
    //   success: function(data,status){
    //       console.log(status);
    //       console.log(data);
    //
    //       if(data < 9){
    //         console.log(data);
    //         console.log('kleiner acht')
    //         // window.location.href = 'http://localhost:8888/Anastasia/anastasia/getPageContent/' + data + '/#book';
    //       }else{
    //         console.log('größer acht')
    //         // window.location.href = 'http://localhost:8888/Anastasia/anastasia/getPageContent/9/#book';
    //       }
    //     }
    //
    // })
  });


//  Productsorting add Class

  $('.categorie').on('click', function(event){

    $(this).addClass("sorting-selected");

  });

//Dokument Readey Funktion END
});



// TweenLite.fromTo(
//  element,
//  duration,
//  {fromVars},
//  {toVars}
// );
