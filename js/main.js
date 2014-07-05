;(function($){
  $(function(){

   var num;
   var temp=0;
   var speed=5000; /* this is set for 5 seconds, edit value to suit requirements */
   var preloads=[];

/* add any number of images here */

preload(
        'images/img_1.jpg',
        'images/img_2.jpg',
        'images/img_3.jpg',
        'images/img_4.jpg',
        'images/img_5.jpg'
       );

function preload(){

for(var c=0;c<arguments.length;c++) {
   preloads[preloads.length]=new Image();
   preloads[preloads.length-1].src=arguments[c];
  }
 }

function rotateImages() {
  num=Math.floor(Math.random()*preloads.length);
  if(num==temp){
    rotateImages();
  } else {
   $('.landing').css('background-image', 'url('+preloads[num].src+')');
   temp=num;

  setTimeout(function(){rotateImages()},speed);
  }
 }


if(window.addEventListener){
   window.addEventListener('load',rotateImages,false);
} else { 
  if(window.attachEvent){
   window.attachEvent('onload',rotateImages);
  }
};


// --------hide nav and search bar on signin page-------
  $('.landing .left-menu').hide();
  $('.landing .right-menu').hide();


//----------hide/show header menu-----------
  $('.menu-content').hide();
  $('.menu').on('click', function() {
    $('.menu-content').show();
  });
  $(document).mouseup(function (e) {
    var container = $('.menu-content');

    if (!container.is(e.target) // if the target of the click isn't the container...
        && container.has(e.target).length === 0) // ... nor a descendant of the container
    {
        container.hide();
    }
  });

//----------make comment form extend------------
  $('.post-options').hide();
  $('.new-post').on('click', function() {
    $('.post-options').show();
    $('.new-post').addClass('extend');
  });
  $(document).mouseup(function (e) {
  var container = $('.post-options');

  if (!container.is(e.target) // if the target of the click isn't the container...
      && container.has(e.target).length === 0) // ... nor a descendant of the container
  {
      container.hide();
      $('.new-post').removeClass('extend');
  }
  });

//----------post new rant to rant list--------------
  var comment = $('.new-post').val();
  $('#post-rant').on('click', function(){
    if(comment!=null){
      $('.rant-list').append('<div>' + hello + '</div>');
    } else {
      $('textarea').after('<div class="error-message">Must write new rant</div>');
    }
  })

//----------hide/show pw reset button/form----------
  $('.pw-reset').hide();

  $('#reset-pw').on('click', function() {
    $('.pw-reset').show();
    $('#reset-pw').hide();
  });
  $(document).mouseup(function (e) {
    var container = $('.pw-reset');

    if (!container.is(e.target) // if the target of the click isn't the container...
      && container.has(e.target).length === 0) // ... nor a descendant of the container
    {
      container.hide();
      $('#reset-pw').show();
      $('.error-message').remove();
    }
  });

//-----------Delete Account Alert-------------------
  $('#delete-account').click( function() {
    alert('Once deleted, you cannot get your account back! Are you sure you want to delete your account?');
  });

//-----------Hide/show new tweets notifications---------
  $('.new-rants').hide();

// ----------Use Reptile Forms-------------------
  var form = new ReptileForm('.reptile-form', {
    validationError: function(err) {

      // Handle validatin errors any way you want
      $('.error-message').remove();
      for (i in err) {
        this.el.find('.' + err[i].name + ' .title').append('<div class="error-message">' + err[i].name + ' is required</div>');
      };
    },

    submitError: function(xhr, settings, thrownError) {
      
      // Handle server errors any way you want
      this.el.before('<p>Error From Server</p>');

    },
    submitSuccess: function(data) {

      // Handle successful submissions any way you want
      if (data.redirect) {
        location.href = data.redirect;
      }

    }
  });

});
})(jQuery);