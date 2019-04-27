    $('#fullpage').fullpage({
        autoScrolling: false,
        css3: true,
        fitToSection: false,
    });

    var h = $('.vend_page').height();
    console.log(h);
    $('.op_client_info').height(h-180);

    $("#search_client").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#table_clients tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    
      $('.kal').kalendae({
        mode:'single',
        closeOnSelection:'false',
        selected:'range',
        format:'DD/MM/YYYY',
        months:1,
        useYearNav:false,
        dayOutOfMonthClickable:true,
        side:'bottom',
        direction:'today-future',
        blackout:'past',
        subscribe: {
    
            'change': function () {
                
                var v  = this.getSelected();
                if(v != null)
                {
                    $('.get_date').val(v);
                    $('.kal .kalendae').fadeOut();
                }
    
            },
    
        },
        
    });

    $('.get_date').click(function(){
      $('.kal .kalendae').fadeIn();
    });

    $(".data_done").blur(function(){
      var pm = $('.pm').val();
      var pv = $('.pv').val();
      if(pm != null && pv != null && pm != undefined && pv != undefined ){
        var t = parseFloat(pm) + parseFloat(pv);
        $('.total').val(t);
      }
    });


    $(window).load(function(){

      $(".block_loading_website").fadeOut(1000);
      var datesinput = new Date();
      var today = moment(datesinput, 'YYYY-MM-DD HH:mm Z').format('DD/MM/YYYY');
      var todaywithhoure = moment(datesinput, 'YYYY-MM-DD HH:mm Z').format('DD/MM/YYYY HH:mm');
      $('.get_date').val(today);

    });

    $('.btn_comp').click(function(){

      var today = $(this).attr('data-today');
      console.log(today);
      $.ajax({
          type: "POST",
          url: Routing.generate('my_route_to_expose'),
          data: {
            today: today
          }
      }).done(function(html){
          $('.handl_result').html(html);
      });

    });


