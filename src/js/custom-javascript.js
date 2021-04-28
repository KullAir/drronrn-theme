


jQuery(document).ready(function($){
       
  


  /******************
   * 
   * plans switcher
   * 
   *****************/


  var swtichbar = $('#plans_model_section .switch-wrap');
  var initPlans="three";
  var plansButtonsEnable = true;
  
 
  if ( swtichbar.length){
    
    swtichbar.find('button').on('click',function(){

      var plan =  $(this).attr("data-plan");

      if(!plansButtonsEnable){return;}

      if ($(this).hasClass('current')) {
        return;
      }


      setVisiblePlan(plan);
      setCurrentPlanButton(plan)

    })
    

    setVisiblePlan(initPlans);
    setCurrentPlanButton(initPlans);

  }

  function setVisiblePlan(plan="three"){
   
    
    $('#plans_model_section .plans-display-row .plan-col').addClass('shrinkOut');
    plansButtonsEnable = false;

    setTimeout(function(){  
      $('#plans_model_section .plans-display-row .plan-col').each(function(){
        
        
        if(  $(this).hasClass(plan) ){
         
          $(this).removeClass('d-none');
         

        }else{
          $(this).addClass('d-none');
        }

    })
    },125,plan);
    setTimeout(function(){  
      plansButtonsEnable = true;  
      $('#plans_model_section .plans-display-row .plan-col').removeClass('shrinkOut');
     }, 250);

  }

  function setCurrentPlanButton(plan="three"){
    $('#plans_model_section .switch-wrap button').each(function(){
      if(   $(this).attr("data-plan") == plan ){
        $(this).addClass('current');
      }else{
        $(this).removeClass('current');
      }
  })

  }

  /****************************************** */
    //Navigation dropdown script:
  /****************************************** */
    
  $('ul.navbar-nav li.dropdown').hover(function() {
      $(this).find('.dropdown-menu').addClass("show");
    }, function() {
      $(this).find('.dropdown-menu').removeClass("show");
  });
  
  $('ul.navbar-nav li.dropdown button').click(function(e) {
      e.preventDefault();
      var par;
      par =  $(this).closest('li');
      //console.log ($(this).attr("aria-expanded"));
      
      if ($(this).attr("aria-expanded") == "true"){
      
          $(this).attr("aria-expanded","false");
          $(this).parents("li.dropdown").removeClass("show");
          $(this).parents("li.dropdown").find("ul.dropdown-menu").removeClass("show");
          


      }else{
        
          $(this).attr("aria-expanded","true");
          $(this).parents("li.dropdown").addClass("show");
          $(this).parents("li.dropdown").find("ul.dropdown-menu").addClass("show");
        
          $(document).on('keyup',keyHandler);
      }
    });

    /***************************** */
  
});
      



 

  