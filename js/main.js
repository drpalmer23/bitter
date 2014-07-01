;(function($){

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


//----------hide/show menu-----------
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


// ----------Use Reptile Forms-------------------
  var form = new ReptileForm('.rf-register', {
    validationError: function(err) {

      // Handle validatin errors any way you want
      this.el.before(JSON.stringify(err));

    },

    submitError: function(xhr, settings, thrownError) {
      
      // Handle server errors any way you want
      this.el.before('<p>Error From Server</p>');

    },
    submitSuccess: function(data) {

      // Handle successful submissions any way you want
      if (data.response) {
        this.el.before('<p>' + data.response + '</p>');
      }

    }
  });

// Use Reptile Forms
  var form = new ReptileForm('.rf-login', {
    validationError: function(err) {

      // Handle validatin errors any way you want
      this.el.before(JSON.stringify(err));

    },
  
    submitError: function(xhr, settings, thrownError) {
      
      // Handle server errors any way you want
      this.el.before('<p>Error From Server</p>');

    },
    submitSuccess: function(data) {

      // Handle successful submissions any way you want
      if (data.response) {
        this.el.before('<p>' + data.response + '</p>');
      }

    }




  });
})(jQuery);