$(document).ready(function(){
  $('#btn_customer_ara').click(function(){
      
      var base_url = 'http://' + window.location.host;  
      var control = '/customer_controller/customerSearch';
      var post_url = base_url + control;
      var data = $('#key').val();
      
      //post verisi oluştruluyor.
      $.post(post_url,{key:data},function(result){
          
          //panel içine  çekilen sonuç yazılır. 
          $('#customer_panelim').html(result);
          
          //sayfalandırma kaldırılıyor. 
          $('.pagination').remove();
      });
    
  });
}); 
$('#btn_yeni_mus').click(function() {
    window.location.href = '/customer_controller/customeradd';
    return false;
}); 
$('#btn_yeni_animal').click(function() {
    window.location.href = '/animal_controller/animaladd';
    return false;
});
$(document).ready(function(){ // animal list sayfasındaki animal search buttonu için
  $('#btn_animal_ara').click(function(){
      
      var base_url = 'http://' + window.location.host;  
      var control = '/animal_controller/animalSearch';
      var post_url = base_url + control;
      var data = $('#key').val();
      
      //post verisi oluştruluyor.
      $.post(post_url,{key:data},function(result){
          
          //panel içine  çekilen sonuç yazılır. 
          $('#animal_panelim').html(result);
          
          //sayfalandırma kaldırılıyor. 
          $('.pagination').remove();
      });
    
  });
}); 

$('#process').click(function (e) {
  e.preventDefault();
  $(this).tab('show');
});
$('#payment').click(function (e) {
  e.preventDefault();
  $(this).tab('show');
});

//$('#process:first').tab('show'); // bunları koyunca kafayı yedi js ilginç bir şekilde o.O
//$('#payment:last').tab('show'); // Select last tab


//process divini açmak için kullanıyoruz.
$(document).ready(function(){
        
    $('#open_process').click(function () { 
        $('#new_process').show("slow");
    });
    // ödeme formunu açmak için kullanıyoruz.
    $('#open_dept').click(function () { 
        $('#pay_off_debt').show("slow");
    });
    //hayvan ekleme formu eklemek için kullanıyoruz.
    $('#open_animal').click(function () {
        $('#new_animal').show("slow");
    });
 
  
        
});

//bu fonksiyon ile menüdeki aktive menü işlemleri yapılmaktadır.
 $(document).ready(function () {
    var page = document.location.href;

    // Set BaseURL
    var baseURL = 'http://' + window.location.host; 

    // Get current URL and replace baseURL
     var href = window.location.href.replace(baseURL, '');

     // Remove trailing slash
     href = href.substr(-1) == '/' ? href.substr(0, href.length - 1) : href;

     // Get last part of current URL
     var page = href.substr(href.lastIndexOf('/') + 1);

     if(page == 'user_page_controller' || page ==''){
         $('#home').addClass('active');
     }else{
         $('#home').removeClass('active');
     }
     if(page == 'customerlist' | page=='customeradd'){
         $('#customerList').addClass('active');
     }else{
         $('#customerList').removeClass('active');
     }
     if(page == 'animal_controller'){
         $('#animal').addClass('active');
     }else{
         $('#animal').removeClass('active');
     }
     if(page == 'financial_controller'){
         $('#financal').addClass('active');
     }else{
         $('#financal').removeClass('active');
     }
     if(page == 'about'){
         $('#about').addClass('active');
     }else{
         $('#about').removeClass('active');
     }
     if(page == 'contact_us'){
         $('#contact').addClass('active');
     }else{
         $('#contact').removeClass('active');
     }
      if(page == 'login'){
         $('#login').addClass('active');
     }else{
         $('#login').removeClass('active');
     }
      if(page == 'new_user'){
         $('#newUser').addClass('active');
     }else{
         $('#newUser').removeClass('active');
     }
});