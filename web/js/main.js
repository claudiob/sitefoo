// @claudiob - 2010.11.21 
// Rather than duplication the validation rules here, the plugin 
// sfJqueryFormValidationPlugin could be used. However, that plugin does not
// manage ALL the rules (e.g., date, country, time zone), only basic ones.

// validate

$(document).ready(function(){  
  var validator = $('form').validate({  
      rules: {  
          sitefoo_user_first_name: 'required',  
          sitefoo_user_last_name: 'required',  
          sitefoo_user_email: {required: true, email: true},  
          sitefoo_user_birth_date: 'required',  
          sitefoo_user_country: 'required',  
          sitefoo_user_time_zone: 'required',  
      },  
      errorPlacement: function(label, element) {  
              label.insertAfter(element);  
      }  
  });  
});

// jQuery(function($){
//   
//   $('#sitefoo_user_id').parents('form').validate({
//     rules: {"sitefoo_user[first_name]":{"required":true,"maxlength":255},"sitefoo_user[last_name]":{"required":true,"maxlength":255},"sitefoo_user[email]":{"required":true},"sitefoo_user[birth_date]":{"required":true},"sitefoo_user[country]":{"required":true},"sitefoo_user[time_zone]":{"required":true}},
//     messages: {"sitefoo_user[first_name]":{"required":"Please enter a value for this field.","maxlength":function(a, elem){ return '\"' + $(elem).val() + '\" is too long (255 characters max).';}},"sitefoo_user[last_name]":{"required":"Please enter a value for this field.","maxlength":function(a, elem){ return '\"' + $(elem).val() + '\" is too long (255 characters max).';}},"sitefoo_user[email]":{"required":"Please enter a value for this field."},"sitefoo_user[birth_date]":{"required":"Please enter a value for this field."},"sitefoo_user[country]":{"required":"Please enter a value for this field."},"sitefoo_user[time_zone]":{"required":"Please enter a value for this field."}},
//     wrapper: 'ul class=error_list',
//     errorElement: 'li',
//     errorPlacement: function(error, element) 
//     {
//      if(element.parents('.radio_list').is('*') || element.parents('.checkbox_list').is('*'))
//      {
//        error.prependTo( element.parent().parent().parent() );
//      }
//      else
//      {
//        error.prependTo( element.parent() );
//      }
//    }
//   
//   });
//   
//   
// });
// 
// /* for some reason the jQuery Validate plugin does not incluce a generic regex method */
// jQuery.validator.addMethod(
//   "regex",
//   function(value, element, regexp) {
//       if (regexp.constructor != RegExp)
//           regexp = new RegExp(regexp);
//       else if (regexp.global)
//           regexp.lastIndex = 0;
//       return this.optional(element) || regexp.test(value);
//   },
//   "Invalid."
// );