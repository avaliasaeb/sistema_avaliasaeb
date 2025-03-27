(function($) {
  "use strict"; // Start of use strict

  // Toggle the side navigation
  $("#sidebarToggle, #sidebarToggleTop").on('click', function(e){
    $("body").toggleClass("sidebar-toggled");
    $(".sidebar").toggleClass("toggled");
    if( $(".sidebar").hasClass("toggled") ){
      $('.sidebar .collapse').collapse('hide');
    };
  });

  // Close any open menu accordions when window is resized below 768px
  $(window).resize(function() {
    if( $(window).width() < 768 ){
      $('.sidebar .collapse').collapse('hide');
    };
    
    // Toggle the side navigation when window is resized below 480px
    if( $(window).width() < 480 && !$(".sidebar").hasClass("toggled") ){
      $("body").addClass("sidebar-toggled");
      $(".sidebar").addClass("toggled");
      $('.sidebar .collapse').collapse('hide');
    };
  });

  // Prevent the content wrapper from scrolling when the fixed side navigation hovered over
  $('body.fixed-nav .sidebar').on('mousewheel DOMMouseScroll wheel', function(e) {
    if( $(window).width() > 768 ){
      var e0 = e.originalEvent,
        delta = e0.wheelDelta || -e0.detail;
      this.scrollTop += (delta < 0 ? 1 : -1) * 30;
      e.preventDefault();
    }
  });

  // Scroll to top button appear
  $(document).on('scroll', function(){
    if( $('body').find('.scroll-to-top').length == 0 ){
      $('body').append('<a class="scroll-to-top bg-glass" href="#page-top"><i class="fas fa-angle-up"></i></a>');
    }
    if( $(this).scrollTop() > 100 ){
      $('body').find('.scroll-to-top').fadeIn();
    }else{
      $('body').find('.scroll-to-top').fadeOut().remove();
    }
  });

  // Smooth scrolling using jQuery easing
  $(document).on('click', 'a.scroll-to-top', function(e) {
    var $anchor = $(this);
    $('html, body').stop().animate({
      scrollTop: ($($anchor.attr('href')).offset().top)
    }, 1000, 'easeInOutExpo');
    e.preventDefault();
  });

  $('.modal').on('hidden.bs.modal', function(){
    $(this).find('form')[0].reset();
  });

  //select2
  if( $(".select2").length > 0 ){
    $(".select2").select2();
  }

  $('#accordionSidebar').slimScroll({
    height: '100vh',
    width: 'auto',
    position: 'left',
    railVisible: true,
    alwaysVisible: true,
    railColor: 'white',
    railOpacity: 1
  });

  function countQuestion(){
    var table = $('#listaQuestoes');
    setTimeout(function(){
      var count = 0;
      table.find('.item-count').each( function(){
        $(this).text(++count);
      });
    }, 150 );
  }

  $('body').on('click', '.row-down', function () {
    var rowToMove = $(this).parents("tr:first");
    var next = rowToMove.next('tr');
    if( next.length == 1 ){
      rowToMove.fadeOut(100, function(){
        next.after(rowToMove.fadeIn(50));
      });
    }
  });
   
  $('body').on('click', '.row-up', function () {
    var rowToMove = $(this).parents("tr:first");
    var prev = rowToMove.prev('tr');
    if( prev.length == 1 ){
      rowToMove.fadeOut(100, function(){
        prev.before(rowToMove.fadeIn(50));
      });
    }
  });

  $('body').on('click', '.row-del', function () {
    $(this).parents("tr:first").fadeOut(100, function(){
      $(this).remove();
    });
  });

  $('body').on('click', '.row-down, .row-up, .row-del', countQuestion );

  $('#input_add_questao').on('click', function(e){
    var tr = '';
    var select = $('#select_add_questao');
    var id = select.val();
    var text = select.find("option:selected").text();

    if( '' != id ){
      tr += '<tr>';
      tr += '<th scope="row">';
      tr += '<span class="item-count"></span>';
      tr += '<input type="hidden" name="input_questao[]" value="'+id+'">';
      tr += '</th>';
      tr += '<td><div style="max-height: 150px; overflow-x: auto;">'+text+'</div></td>';
      tr += '<td>';
      tr += '<a href="#" class="btn btn-sm btn-outline-secondary px-1 py-0 row-up"><i class="fa-solid fa-arrow-up"></i></a>';
      tr += '<a href="#" class="btn btn-sm btn-outline-secondary px-1 py-0 row-down"><i class="fa-solid fa-arrow-down"></i></a>';
      tr += '<a href="#" class="btn btn-sm btn-outline-danger px-1 py-0 row-del"><i class="fa-solid fa-xmark"></i></a>';
      tr += '</td>';
      tr += '</tr>';
      $('#listaQuestoes tbody').append(tr);
      countQuestion();
    }
  });

  var showLoader = function(){
    $('.loader-container').show();
  }

  var hideLoader = function(){
    $('.loader-container').fadeOut(100);
  }

  $('.select').on('click', function(e){
    e.preventDefault();
    e.stopPropagation();
  });

  //modal atualização de perfil
  if( $('#updateModalProfile').length > 0 ){
    var updateModalProfile = new bootstrap.Modal(document.getElementById('updateModalProfile'));
    updateModalProfile.toggle();
  }

  //envio de formulário ajax
  $("form.ajax").submit(function(e){
    e.preventDefault();
    showLoader();

    $.ajax({
      type:         $(this).attr("method"),
      url:          $(this).attr("action"),
      data:         $(this).serializeArray(),
      contentType:  "application/json; charset=utf-8",
      dataType:     "json",
      success: function(response, status, xhr){
        if( -1 < xhr.getResponseHeader("content-type").indexOf("json") ){
          if( "status" in response ){
            if( false === response.status ){
              if( "msg" in response ){
                toastr["error"]( response.msg );
              }else{
                toastr["error"]( template.ajax_error );
              }
            }else if( true === response.status ){
              if( "msg" in response ){
                toastr["success"]( response.msg );
              }
            }
            if( "href" in response ){
              setTimeout(function (){
                window.location.href = response.href;
              }, 1000 );
            }
            if( "eval" in response ){
              eval(response.eval);
            }
          }else{
            toastr["warning"]( template.ajax_warning );
          }
        }
        hideLoader();
      },
      error: function() {
        toastr["error"]( template.ajax_crash );
        hideLoader();
      }
    });
  });  

  //click em link ajax
  $("body").on("click", "a.ajax", function(e){
    e.preventDefault();
    showLoader();

    $.ajax({
      type:         'POST',
      url:          $(this).attr("href"),
      contentType:  "application/json; charset=utf-8",
      dataType:     "json",
      success: function(response, status, xhr){
        if( -1 < xhr.getResponseHeader("content-type").indexOf("json") ){
          if( "status" in response ){
            if( false === response.status ){
              if( "msg" in response ){
                toastr["error"]( response.msg );
              }else{
                toastr["error"]( template.ajax_error );
              }
            }else if( true === response.status ){
              if( "msg" in response ){
                toastr["success"]( response.msg );
              }
            }
            if( "href" in response ){
              setTimeout(function (){
                window.location.href = response.href;
              }, 1000 );
            }
            if( "eval" in response ){
              eval(response.eval);
            }
          }else{
            toastr["warning"]( template.ajax_warning );
          }
        }
        hideLoader();
      },
      error: function() {
        toastr["error"]( template.ajax_crash );
        hideLoader();
      }
    });
  });

  //https://codeseven.github.io/toastr/demo.html
  toastr.options = {
    "closeButton": true,
    "debug": false,
    "newestOnTop": false,
    "progressBar": false,
    "positionClass": "toast-bottom-center",
    "preventDuplicates": true,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "50000",
    "extendedTimeOut": "50000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
  };

  //https://www.jqueryscript.net/form/jQuery-Plugin-For-Password-Input-Enhancement-Strength-js.html
  $('input.strength').strength({
    strengthMeterClass: 'form-text'
  });

  //cart
  var input, qtd, val, total, subtotal;

  $('.btn-minus').on('click', function(){
    input = $(this).closest('.input-group').find('input');
    qtd = parseInt( input.val() ) - 1;
    qtd = qtd >= 0 ? qtd : 0;
    input.val( qtd );
    updateSubtotal();
  });

  $('.btn-plus').on('click', function(){
    input = $(this).closest('.input-group').find('input');
    qtd = parseInt( input.val() ) + 1;
    input.val( qtd );
    updateSubtotal();
  });

  $('.input-qtd').on( "keyup", function(){
    updateSubtotal();
  });

  var updateSubtotal = function(){
    total = 0;
    $('.list-group-item').each( function(){
      qtd = $(this).find('input').val();
      val = $(this).find('input').attr('data-value');
      subtotal = qtd * val;
      total = total + subtotal;
      $(this).find('.subtotal').text( parseFloat(subtotal).toLocaleString('pt-BR', {minimumFractionDigits: 2}) );
    });
    $('.list-group').find('.total').text( parseFloat(total).toLocaleString('pt-BR', {minimumFractionDigits: 2}) );

    $('.list-group').find('button').attr('disabled', total == 0 );
  };
  // end cart

  $('.copyvoucher').on('click', function(e){
    e.preventDefault();

    var $temp = $("<input>");
    $("body").append($temp);
    $temp.val( $(this).text() ).select();
    document.execCommand("copy");
    $temp.remove();
    toastr["success"]( template.ajax_copy );
  });

  //https://www.jqueryscript.net/text/Rich-Text-Editor-jQuery-RichText.html
  $('.richtext').richText({
    bold: true,
    italic: true,
    underline: true,
    leftAlign: true,
    centerAlign: true,
    rightAlign: true,
    justify: false,
    ol: true,
    ul: true,
    heading: true,
    fonts: true,
    fontColor: true,
    backgroundColor: false,
    fontSize: true,
    imageUpload: false,
    fileUpload: false,
    urls: false,
    videoEmbed: false,
    table: true,
    removeStyles: false,
    code: false,
    colors: [],
    fileHTML: '',
    imageHTML: '',
    youtubeCookies: false,
    preview: false,
    placeholder: '',
    useSingleQuotes: false,
    height: 0,
    heightPercentage: 0,
    adaptiveHeight: false,
    id: "",
    class: "",
    useParagraph: false,
    maxlength: 0,
    maxlengthIncludeHTML: false,
    callback: undefined,
    useTabForNext: false,
    save: false,
    saveCallback: undefined,
    saveOnBlur: 0,
    undoRedo: true,
    fontList: ["Arial",
      "Arial Black",
      "Comic Sans MS",
      "Courier New",
      "Geneva",
      "Georgia",
      "Helvetica",
      "Impact",
      "Lucida Console",
      "Tahoma",
      "Times New Roman",
      "Verdana"
    ],
    translations: richtext
  });  

  $(window).on('load', hideLoader );

})(jQuery);