<?php 
   $error = "";
   if(Session::get('error')){
      $error = Session::get('error');
   }

   $success_msg = "";
   if(Session::get('success_msg')){
      $success_msg = Session::get('success_msg');
   }

   $rtl = 0;
   if(Auth::user()->language != null && Auth::user()->language->language->rtl == 1){
      $rtl = 1;
   }
   
?>
<!DOCTYPE html>
<html lang="en" direction="{{$rtl === 1 ? 'rtl' : ''}}" style="direction: {{$rtl === 1 ? 'rtl' : ''}};">
   <!-- begin::Head -->
   <head>
      <title>
         <?php 
            if(isset($title)){
               echo $title;
            }else{
               echo "Healthcare Solution";
            }
         ?>
         | Curics
      </title>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!--begin::Fonts -->
      <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
      <script src="//cdn.ckeditor.com/4.14.0/full/ckeditor.js"></script>
      <script>
         WebFont.load({
             google: {
                 "families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]
             },
             active: function() {
                 sessionStorage.fonts = true;
             }
         });
      </script>
      <!--end::Fonts -->
      <!--begin::Page Vendors Styles(used by this page) -->
      <link href="/assets/backend/vendors/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
      <!--end::Page Vendors Styles -->
      <!--begin:: Global Mandatory Vendors -->
      <link href="/assets/backend/vendors/general/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" type="text/css" />
      <!--end:: Global Mandatory Vendors -->
      <!--begin:: Global Optional Vendors -->
      <link href="/assets/backend/vendors/general/tether/dist/css/tether.css" rel="stylesheet" type="text/css" />
      <link href="/assets/backend/vendors/general/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css" rel="stylesheet" type="text/css" />
      <link href="/assets/backend/vendors/general/bootstrap-datetime-picker/css/bootstrap-datetimepicker.css" rel="stylesheet" type="text/css" />
      <link href="/assets/backend/vendors/general/bootstrap-timepicker/css/bootstrap-timepicker.css" rel="stylesheet" type="text/css" />
      <link href="/assets/backend/vendors/general/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css" />
      <link href="/assets/backend/vendors/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css" rel="stylesheet" type="text/css" />
      <link href="/assets/backend/vendors/general/bootstrap-select/dist/css/bootstrap-select.css" rel="stylesheet" type="text/css" />
      <link href="/assets/backend/vendors/general/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css" rel="stylesheet" type="text/css" />
      <link href="/assets/backend/vendors/general/select2/dist/css/select2.css" rel="stylesheet" type="text/css" />
      <link href="/assets/backend/vendors/general/ion-rangeslider/css/ion.rangeSlider.css" rel="stylesheet" type="text/css" />
      <link href="/assets/backend/vendors/general/nouislider/distribute/nouislider.css" rel="stylesheet" type="text/css" />
      <link href="/assets/backend/vendors/general/owl.carousel/dist/assets/owl.carousel.css" rel="stylesheet" type="text/css" />
      <link href="/assets/backend/vendors/general/owl.carousel/dist/assets/owl.theme.default.css" rel="stylesheet" type="text/css" />
      <link href="/assets/backend/vendors/general/dropzone/dist/dropzone.css" rel="stylesheet" type="text/css" />
      <link href="/assets/backend/vendors/general/summernote/dist/summernote.css" rel="stylesheet" type="text/css" />
      <link href="/assets/backend/vendors/general/bootstrap-markdown/css/bootstrap-markdown.min.css" rel="stylesheet" type="text/css" />
      <link href="/assets/backend/vendors/general/animate.css/animate.css" rel="stylesheet" type="text/css" />
      <link href="/assets/backend/vendors/general/toastr/build/toastr.css" rel="stylesheet" type="text/css" />
      <link href="/assets/backend/vendors/general/morris.js/morris.css" rel="stylesheet" type="text/css" />
      <link href="/assets/backend/vendors/general/sweetalert2/dist/sweetalert2.css" rel="stylesheet" type="text/css" />
      <link href="/assets/backend/vendors/general/socicon/css/socicon.css" rel="stylesheet" type="text/css" />
      <link href="/assets/backend/vendors/custom/vendors/line-awesome/css/line-awesome.css" rel="stylesheet" type="text/css" />
      <link href="/assets/backend/vendors/custom/vendors/flaticon/flaticon.css" rel="stylesheet" type="text/css" />
      <link href="/assets/backend/vendors/custom/vendors/flaticon2/flaticon.css" rel="stylesheet" type="text/css" />
      <link href="/assets/backend/vendors/custom/vendors/fontawesome5/css/all.min.css" rel="stylesheet" type="text/css" />
      <link href="/assets/backend/vendors/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
      <link href="/assets/backend/Add-appointment.css" rel="stylesheet" type="text/css" />
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
      <link href="http://loudev.com/css/multi-select.css" media="screen" rel="stylesheet" type="text/css" />
      <script src="/assets/backend/vendors/general/jquery/dist/jquery.js" type="text/javascript"></script>
      <!--end:: Global Optional Vendors -->
      <!--begin::Global Theme Styles(used by all pages) -->
      
      @if(Auth::user()->language != null)
         @if(Auth::user()->language->language->rtl == 1)
         <link href="https://keenthemes.com/metronic/themes/metronic/theme/default/demo12/dist/assets/plugins/global/plugins.bundle.rtl.css" rel="stylesheet" type="text/css" />
         <link href="https://keenthemes.com/metronic/themes/metronic/theme/default/demo12/dist/assets/css/style.bundle.rtl.css" rel="stylesheet" type="text/css" />
         @endif
      @endif
      @if(Auth::user()->language == null OR Auth::user()->language->language->rtl == 0)
      <link href="/assets/backend/demo/demo12/base/style.bundle.css" rel="stylesheet" type="text/css" />
      @endif
      <!--end::Global Theme Styles -->
      <!--begin::Layout Skins(used by all pages) -->
      <!-- <link href="/assets/backend/demo/default/skins/header/base/light.css" rel="stylesheet" type="text/css" />
         <link href="/assets/backend/demo/default/skins/header/menu/light.css" rel="stylesheet" type="text/css" />
         <link href="/assets/backend/demo/default/skins/brand/dark.css" rel="stylesheet" type="text/css" />
         <link href="/assets/backend/demo/default/skins/aside/dark.css" rel="stylesheet" type="text/css" /> -->
      <!--end::Layout Skins -->
      <link rel="shortcut icon" href="/assets/backend/media/logos/favicon.ico" />
      <style>
         .dt-buttons{
         width: 50%;
         margin-bottom: 12px;
         float: left;
         }
      </style>
         <script src="http://loudev.com/js/jquery.multi-select.js" type="text/javascript"></script>

   </head>
   <!-- end::Head -->
   @yield('content')
   <!-- begin:: Footer -->
   <div class="kt-footer  kt-grid__item kt-grid kt-grid--desktop kt-grid--ver-desktop">
      <div class="kt-container  kt-container--fluid ">
         <div class="kt-footer__copyright">
            2019&nbsp;&copy;&nbsp;<a href="https://curics.pk" target="_blank" class="kt-link">Curics</a>
         </div>
         <div class="kt-footer__menu">
            <a href="http://keenthemes.com/metronic" target="_blank" class="kt-footer__menu-link kt-link">About</a>
            <a href="http://keenthemes.com/metronic" target="_blank" class="kt-footer__menu-link kt-link">Team</a>
            <a href="http://keenthemes.com/metronic" target="_blank" class="kt-footer__menu-link kt-link">Contact</a>
         </div>
      </div>
   </div>
   <!-- end:: Footer -->
   </div>
   </div>
   </div>
   <!-- end:: Page -->
   <!-- begin::Scrolltop -->
   <div id="kt_scrolltop" class="kt-scrolltop">
      <i class="fa fa-arrow-up"></i>
   </div>
   <!-- end::Scrolltop -->
   <!-- begin::Global Config(global config for global JS sciprts) -->
   <script>
      var KTAppOptions = {
      	"colors": {
      		"state": {
      			"brand": "#5d78ff",
      			"dark": "#282a3c",
      			"light": "#ffffff",
      			"primary": "#5867dd",
      			"success": "#34bfa3",
      			"info": "#36a3f7",
      			"warning": "#ffb822",
      			"danger": "#fd3995"
      		},
      		"base": {
      			"label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
      			"shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
      		}
      	}
      };
   </script>
   <!-- end::Global Config -->
   <!--begin:: Global Mandatory Vendors -->
   <script src="/assets/backend/vendors/general/popper.js/dist/umd/popper.js" type="text/javascript"></script>
   <script src="/assets/backend/vendors/general/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
   <script src="/assets/backend/vendors/general/js-cookie/src/js.cookie.js" type="text/javascript"></script>
   <script src="/assets/backend/vendors/general/moment/min/moment.min.js" type="text/javascript"></script>
   <script src="/assets/backend/vendors/general/tooltip.js/dist/umd/tooltip.min.js" type="text/javascript"></script>
   <script src="/assets/backend/vendors/general/perfect-scrollbar/dist/perfect-scrollbar.js" type="text/javascript"></script>
   <script src="/assets/backend/vendors/general/sticky-js/dist/sticky.min.js" type="text/javascript"></script>
   <script src="/assets/backend/vendors/general/wnumb/wNumb.js" type="text/javascript"></script>
   <!--end:: Global Mandatory Vendors -->
   <!--begin:: Global Optional Vendors -->
   <script src="/assets/backend/vendors/general/jquery-form/dist/jquery.form.min.js" type="text/javascript"></script>
   <script src="/assets/backend/vendors/general/block-ui/jquery.blockUI.js" type="text/javascript"></script>
   <script src="/assets/backend/vendors/general/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
   <script src="/assets/backend/vendors/custom/components/vendors/bootstrap-datepicker/init.js" type="text/javascript"></script>
   <script src="/assets/backend/vendors/general/bootstrap-datetime-picker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
   <script src="/assets/backend/vendors/general/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
   <script src="/assets/backend/vendors/custom/components/vendors/bootstrap-timepicker/init.js" type="text/javascript"></script>
   <script src="/assets/backend/vendors/general/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
   <script src="/assets/backend/vendors/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js" type="text/javascript"></script>
   <script src="/assets/backend/vendors/general/bootstrap-maxlength/src/bootstrap-maxlength.js" type="text/javascript"></script>
   <script src="/assets/backend/vendors/custom/vendors/bootstrap-multiselectsplitter/bootstrap-multiselectsplitter.min.js" type="text/javascript"></script>
   <script src="/assets/backend/vendors/general/bootstrap-select/dist/js/bootstrap-select.js" type="text/javascript"></script>
   <script src="/assets/backend/vendors/general/bootstrap-switch/dist/js/bootstrap-switch.js" type="text/javascript"></script>
   <script src="/assets/backend/vendors/custom/components/vendors/bootstrap-switch/init.js" type="text/javascript"></script>
   <script src="/assets/backend/vendors/general/select2/dist/js/select2.full.js" type="text/javascript"></script>
   <script src="/assets/backend/vendors/general/ion-rangeslider/js/ion.rangeSlider.js" type="text/javascript"></script>
   <script src="/assets/backend/vendors/general/typeahead.js/dist/typeahead.bundle.js" type="text/javascript"></script>
   <script src="/assets/backend/vendors/general/handlebars/dist/handlebars.js" type="text/javascript"></script>
   <script src="/assets/backend/vendors/general/inputmask/dist/jquery.inputmask.bundle.js" type="text/javascript"></script>
   <script src="/assets/backend/vendors/general/inputmask/dist/inputmask/inputmask.date.extensions.js" type="text/javascript"></script>
   <script src="/assets/backend/vendors/general/inputmask/dist/inputmask/inputmask.numeric.extensions.js" type="text/javascript"></script>
   <script src="/assets/backend/vendors/general/nouislider/distribute/nouislider.js" type="text/javascript"></script>
   <script src="/assets/backend/vendors/general/owl.carousel/dist/owl.carousel.js" type="text/javascript"></script>
   <script src="/assets/backend/vendors/general/autosize/dist/autosize.js" type="text/javascript"></script>
   <script src="/assets/backend/vendors/general/clipboard/dist/clipboard.min.js" type="text/javascript"></script>
   <script src="/assets/backend/vendors/general/dropzone/dist/dropzone.js" type="text/javascript"></script>
   <script src="/assets/backend/vendors/general/summernote/dist/summernote.js" type="text/javascript"></script>
   <script src="/assets/backend/vendors/general/markdown/lib/markdown.js" type="text/javascript"></script>
   <script src="/assets/backend/vendors/general/bootstrap-markdown/js/bootstrap-markdown.js" type="text/javascript"></script>
   <script src="/assets/backend/vendors/custom/components/vendors/bootstrap-markdown/init.js" type="text/javascript"></script>
   <script src="/assets/backend/vendors/general/bootstrap-notify/bootstrap-notify.min.js" type="text/javascript"></script>
   <script src="/assets/backend/vendors/custom/components/vendors/bootstrap-notify/init.js" type="text/javascript"></script>
   <script src="/assets/backend/vendors/general/jquery-validation/dist/jquery.validate.js" type="text/javascript"></script>
   <script src="/assets/backend/vendors/general/jquery-validation/dist/additional-methods.js" type="text/javascript"></script>
   <script src="/assets/backend/vendors/custom/components/vendors/jquery-validation/init.js" type="text/javascript"></script>
   <script src="/assets/backend/vendors/general/toastr/build/toastr.min.js" type="text/javascript"></script>
   <script src="/assets/backend/vendors/general/raphael/raphael.js" type="text/javascript"></script>
   <script src="/assets/backend/vendors/general/morris.js/morris.js" type="text/javascript"></script>
   <script src="/assets/backend/vendors/general/chart.js/dist/Chart.bundle.js" type="text/javascript"></script>
   <script src="/assets/backend/vendors/custom/vendors/bootstrap-session-timeout/dist/bootstrap-session-timeout.min.js" type="text/javascript"></script>
   <script src="/assets/backend/vendors/custom/vendors/jquery-idletimer/idle-timer.min.js" type="text/javascript"></script>
   <script src="/assets/backend/vendors/general/waypoints/lib/jquery.waypoints.js" type="text/javascript"></script>
   <script src="/assets/backend/vendors/general/counterup/jquery.counterup.js" type="text/javascript"></script>
   <script src="/assets/backend/vendors/general/es6-promise-polyfill/promise.min.js" type="text/javascript"></script>
   <script src="/assets/backend/vendors/general/sweetalert2/dist/sweetalert2.min.js" type="text/javascript"></script>
   <script src="/assets/backend/vendors/custom/components/vendors/sweetalert2/init.js" type="text/javascript"></script>
   <script src="/assets/backend/vendors/general/jquery.repeater/src/lib.js" type="text/javascript"></script>
   <script src="/assets/backend/vendors/general/jquery.repeater/src/jquery.input.js" type="text/javascript"></script>
   <script src="/assets/backend/vendors/general/jquery.repeater/src/repeater.js" type="text/javascript"></script>
   <script src="/assets/backend/vendors/general/dompurify/dist/purify.js" type="text/javascript"></script>

   <!--end:: Global Optional Vendors -->
   <!--begin::Global Theme Bundle(used by all pages) -->
   <script src="/assets/backend/demo/demo12/base/scripts.bundle.js" type="text/javascript"></script>
   <!--end::Global Theme Bundle -->
   <!--begin::Page Vendors(used by this page) -->
   <script src="/assets/backend/vendors/custom/fullcalendar/fullcalendar.bundle.js" type="text/javascript"></script>
   <script src="//maps.google.com/maps/api/js?key=AIzaSyBTGnKT7dt597vo9QgeQ7BFhvSRP4eiMSM" type="text/javascript"></script>
   <script src="/assets/backend/vendors/custom/gmaps/gmaps.js" type="text/javascript"></script>
   <!--end::Page Vendors -->
   <!--begin::Page Scripts(used by this page) -->
   <script src="/assets/backend/app/custom/general/crud/forms/widgets/select2.js" type="text/javascript"></script>
   <script type="text/javascript">
      var data_set = [
         <?php if(isset($data_set)){echo $data_set['Jan'];} ?>,
         <?php if(isset($data_set)){echo $data_set['Feb'];} ?>,
         <?php if(isset($data_set)){echo $data_set['March'];} ?>,
         <?php if(isset($data_set)){echo $data_set['April'];} ?>,
         <?php if(isset($data_set)){echo $data_set['May'];} ?>,
         <?php if(isset($data_set)){echo $data_set['June'];} ?>,
         <?php if(isset($data_set)){echo $data_set['July'];} ?>,
         <?php if(isset($data_set)){echo $data_set['August'];} ?>,
         <?php if(isset($data_set)){echo $data_set['Sep'];} ?>,
         <?php if(isset($data_set)){echo $data_set['Oct'];} ?>,
         <?php if(isset($data_set)){echo $data_set['Nov'];} ?>,
         <?php if(isset($data_set)){echo $data_set['Dec'];} ?>,
      ];
      
   </script>
   <script src="/assets/backend/app/custom/general/dashboard.js" type="text/javascript"></script>
   <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
   <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.6.0/js/dataTables.buttons.min.js"></script>
   <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.flash.min.js"></script>
   <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
   <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
   <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
   <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.html5.min.js"></script>
   <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.print.min.js"></script>
   <script src="/assets/backend/app/custom/general/crud/forms/widgets/bootstrap-timepicker.js" type="text/javascript"></script>
   <script src="/assets/backend/app/custom/general/crud/forms/widgets/bootstrap-datepicker.js" type="text/javascript"></script>
   <!--end::Page Scripts -->
   <!--begin::Global App Bundle(used by all pages) -->
   <script src="/assets/backend/app/bundle/app.bundle.js" type="text/javascript"></script>
   <script>
      $(document).ready( function () {
         $('#table_id').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
      });
         $('div.dataTables_length select').addClass('custom-select custom-select-sm form-control form-control-sm');
         $('div.dataTables_filter input').addClass('form-control form-control-sm');
         $('div.dt-buttons button.buttons-copy').addClass('btn btn-success btn-elevate btn-pill btn-elevate-air');
         $('div.dt-buttons button.buttons-excel').addClass('btn btn-warning btn-elevate btn-pill btn-elevate-air');
         $('div.dt-buttons button.buttons-csv').addClass('btn btn-info btn-elevate btn-pill btn-elevate-air');
         $('div.dt-buttons button.buttons-pdf').addClass('btn btn-danger btn-elevate btn-pill btn-elevate-air');
         $('div.dt-buttons button').addClass('btn btn-brand btn-elevate btn-pill btn-elevate-air');
      });
   </script>
   <script>
      var error = "<?php if(isset($error)){echo $error;} ?>";
      if(error != "")
      {
         toastr.options = {
         "closeButton": true,
         "debug": false,
         "newestOnTop": false,
         "progressBar": true,
         "positionClass": "toast-top-right",
         "preventDuplicates": false,
         "onclick": null,
         "showDuration": "300",
         "hideDuration": "1000",
         "timeOut": "5000",
         "extendedTimeOut": "1000",
         "showEasing": "swing",
         "hideEasing": "linear",
         "showMethod": "fadeIn",
         "hideMethod": "fadeOut"
         };
         toastr.error(error);
      }

      var success_msg = "<?php if(isset($success_msg)){echo $success_msg;} ?>";
      if(success_msg != "")
      {
         toastr.options = {
         "closeButton": true,
         "debug": false,
         "newestOnTop": false,
         "progressBar": true,
         "positionClass": "toast-top-right",
         "preventDuplicates": false,
         "onclick": null,
         "showDuration": "300",
         "hideDuration": "1000",
         "timeOut": "5000",
         "extendedTimeOut": "1000",
         "showEasing": "swing",
         "hideEasing": "linear",
         "showMethod": "fadeIn",
         "hideMethod": "fadeOut"
         };
         toastr.success(success_msg);
      }
   </script>
   <?php 
      $doctor_id = "";
      if(Session::get('doctor') != null){
         $doctor_id = Session::get('doctor')->id;
      }
      
      $clinic_id = "dsd";
      if(Auth::user()->userrole == "hospital"){
         $clinic_id = Auth::user()->clinic->id;
      }else{
         if(Session::get('clinic') != null){
            $clinic_id = Session::get('clinic')->clinic->id;
         }
      }
      //dd($clinic_id);
   ?>
    <script>
        //  $("#book_btn").attr("href", link);
         $(".time_slots").html("<br><p class='col-12'><b>Available Time Slots Will Show Here</b></p>")
         $('input[name=appointment_date]').change(function(){
            //alert("dsadas");

            var value = $( 'input[name=appointment_date]' ).val();
            var c_id = "<?php echo $clinic_id; ?>"
            
            //alert(c_id);
            var d_id = "";
            if("<?php echo $doctor_id; ?>" != ""){
               d_id = "<?php echo $doctor_id; ?>";
            }else{
               d_id = $('[name=doctor_id]').val();
            }
            
            $.ajax({
               type:'POST',
               url:'/backend/gettimeslots',
               data: {_token: '<?php echo csrf_token() ?>', date: value, doctor_id: d_id, clinic_id: c_id},
               success:function(data) {
                $(".time_slots").html(data.slots);
               }
            });
         });

         // $('#select_clinic').change(function() {
         //    //var link = "/doctor/booking/"+ <?php if(isset($doctor)){echo $doctor->alias;} ?> this.value + "/" + sel.value;
         //    alert("link");
         // });
   </script>

   <script>
      (function load_notifications() {
      $.ajax({
         type:'POST',
         url: '/account/load_notifications', 
         data: {_token: '<?php echo csrf_token() ?>'},
         success: function(data) {
            $('#notifications_area').html(data.notifications);
            $('#notifications_count').html(data.count);
            $('#notifications_count1').html(data.count);
         },
         complete: function() {
            setTimeout(load_notifications, 5000);
         }
      });
      })();

      function changeNotificationStatus(appointment_id){
         $.ajax({
         type:'POST',
         url: '/account/change_notification_status', 
         data: {_token: '<?php echo csrf_token() ?>', app_id: appointment_id},
         success: function(data) {
            
         }
      });
      }
   </script>
   <!--end::Global App Bundle -->
   </body>
   <!-- end::Body -->
</html>