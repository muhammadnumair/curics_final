<!-- begin:: Aside -->
<button class="kt-aside-close " id="kt_aside_close_btn"><i class="la la-close"></i></button>
<div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop" id="kt_aside">
   <!-- begin:: Aside -->
   <div class="kt-aside__brand kt-grid__item " id="kt_aside_brand">
      <div class="kt-aside__brand-logo">
         <a href="/account/dashboard">
         <img alt="Logo" src="/assets/backend/media/logo.png" style="width: 135px;"/>
         </a>
      </div>
      <div class="kt-aside__brand-tools">
         <button class="kt-aside__brand-aside-toggler" id="kt_aside_toggler">
            <span>
               <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                     <polygon id="Shape" points="0 0 24 0 24 24 0 24" />
                     <path d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z" id="Path-94" fill="#000000" fill-rule="nonzero" transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999) " />
                     <path d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z" id="Path-94" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999) " />
                  </g>
               </svg>
            </span>
            <span>
               <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                     <polygon id="Shape" points="0 0 24 0 24 24 0 24" />
                     <path d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z" id="Path-94" fill="#000000" fill-rule="nonzero" />
                     <path d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z" id="Path-94" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999) " />
                  </g>
               </svg>
            </span>
         </button>
         <!--
            <button class="kt-aside__brand-aside-toggler kt-aside__brand-aside-toggler--left" id="kt_aside_toggler"><span></span></button>
            -->
      </div>
   </div>
   <!-- end:: Aside -->
   <!-- begin:: Aside Menu -->
   <div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
      <div id="kt_aside_menu" class="kt-aside-menu " data-ktmenu-vertical="1" data-ktmenu-scroll="1" data-ktmenu-dropdown-timeout="500">
         <ul class="kt-menu__nav ">
            @if(Auth::user()->userrole == "doctor")
            <li class="kt-menu__item  {{request()->segment(count(request()->segments())) == 'clinics' || request()->segment(count(request()->segments())-1) == 'clinic' || request()->segment(count(request()->segments())-2) == 'clinic'? 'kt-menu__item--active' : ''}}" aria-haspopup="true">
               <a href="/account/clinics" class="kt-menu__link ">
                  <span class="kt-menu__link-icon">
                     <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                           <polygon points="0 0 24 0 24 24 0 24"/>
                           <path d="M6,18 L9,18 C9.66666667,18.1143819 10,18.4477153 10,19 C10,19.5522847 9.66666667,19.8856181 9,20 L4,20 L4,15 C4,14.3333333 4.33333333,14 5,14 C5.66666667,14 6,14.3333333 6,15 L6,18 Z M18,18 L18,15 C18.1143819,14.3333333 18.4477153,14 19,14 C19.5522847,14 19.8856181,14.3333333 20,15 L20,20 L15,20 C14.3333333,20 14,19.6666667 14,19 C14,18.3333333 14.3333333,18 15,18 L18,18 Z M18,6 L15,6 C14.3333333,5.88561808 14,5.55228475 14,5 C14,4.44771525 14.3333333,4.11438192 15,4 L20,4 L20,9 C20,9.66666667 19.6666667,10 19,10 C18.3333333,10 18,9.66666667 18,9 L18,6 Z M6,6 L6,9 C5.88561808,9.66666667 5.55228475,10 5,10 C4.44771525,10 4.11438192,9.66666667 4,9 L4,4 L9,4 C9.66666667,4 10,4.33333333 10,5 C10,5.66666667 9.66666667,6 9,6 L6,6 Z" fill="#000000" fill-rule="nonzero"/>
                        </g>
                     </svg>
                  </span>
                  <span class="kt-menu__link-text">My Clinics</span>
               </a>
            </li>
            <li class="kt-menu__item {{request()->segment(count(request()->segments())) == 'dashboard' || request()->segment(count(request()->segments())-1) == 'dashboard' || request()->segment(count(request()->segments())-2) == 'dashboard'? 'kt-menu__item--active' : ''}}" aria-haspopup="true">
               <a href="/account/dashboard" class="kt-menu__link ">
                  <span class="kt-menu__link-icon">
                     <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                           <rect x="0" y="0" width="24" height="24"/>
                           <rect fill="#000000" opacity="0.3" x="2" y="2" width="20" height="20" rx="10"/>
                           <path d="M6.16794971,14.5547002 C5.86159725,14.0951715 5.98577112,13.4743022 6.4452998,13.1679497 C6.90482849,12.8615972 7.52569784,12.9857711 7.83205029,13.4452998 C8.9890854,15.1808525 10.3543313,16 12,16 C13.6456687,16 15.0109146,15.1808525 16.1679497,13.4452998 C16.4743022,12.9857711 17.0951715,12.8615972 17.5547002,13.1679497 C18.0142289,13.4743022 18.1384028,14.0951715 17.8320503,14.5547002 C16.3224187,16.8191475 14.3543313,18 12,18 C9.64566871,18 7.67758127,16.8191475 6.16794971,14.5547002 Z" fill="#000000"/>
                        </g>
                     </svg>
                  </span>
                  <span class="kt-menu__link-text">Dashboard</span>
               </a>
            </li>
            <li class="kt-menu__section ">
               <h4 class="kt-menu__section-text">Account Management</h4>
               <i class="kt-menu__section-icon flaticon-more-v2"></i>
            </li>
            <li class="kt-menu__item  {{request()->segment(count(request()->segments())) == 'patients' || request()->segment(count(request()->segments())-1) == 'patient' || request()->segment(count(request()->segments())-2) == 'patient'? 'kt-menu__item--open kt-menu__item--here' : ''}} kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
               <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                  <span class="kt-menu__link-icon">
                  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                     <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <rect x="0" y="0" width="24" height="24"/>
                        <path d="M3.5,21 L20.5,21 C21.3284271,21 22,20.3284271 22,19.5 L22,8.5 C22,7.67157288 21.3284271,7 20.5,7 L10,7 L7.43933983,4.43933983 C7.15803526,4.15803526 6.77650439,4 6.37867966,4 L3.5,4 C2.67157288,4 2,4.67157288 2,5.5 L2,19.5 C2,20.3284271 2.67157288,21 3.5,21 Z" fill="#000000" opacity="0.3"/>
                        <path d="M12,13 C10.8954305,13 10,12.1045695 10,11 C10,9.8954305 10.8954305,9 12,9 C13.1045695,9 14,9.8954305 14,11 C14,12.1045695 13.1045695,13 12,13 Z" fill="#000000" opacity="0.3"/>
                        <path d="M7.00036205,18.4995035 C7.21569918,15.5165724 9.36772908,14 11.9907452,14 C14.6506758,14 16.8360465,15.4332455 16.9988413,18.5 C17.0053266,18.6221713 16.9988413,19 16.5815,19 C14.5228466,19 11.463736,19 7.4041679,19 C7.26484009,19 6.98863236,18.6619875 7.00036205,18.4995035 Z" fill="#000000" opacity="0.3"/>
                     </g>
                  </svg>
                  </span>
                  <span class="kt-menu__link-text">Patients</span><i class="kt-menu__ver-arrow la la-angle-right"></i>
               </a>
               <div class="kt-menu__submenu ">
                  <span class="kt-menu__arrow"></span>
                  <ul class="kt-menu__subnav">
                     <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">Schedule</span></span></li>
                     <li class="kt-menu__item {{request()->segment(count(request()->segments())-1) == 'patient' ? 'kt-menu__item--active' : ''}}" aria-haspopup="true"><a href="/account/patient/create" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Add Patient</span></a></li>
                     <li class="kt-menu__item {{request()->segment(count(request()->segments())) == 'patients' ? 'kt-menu__item--active' : ''}}" aria-haspopup="true"><a href="/account/patients" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Patients List</span></a></li>
                     <li class="kt-menu__item {{request()->segment(count(request()->segments())) == 'payments' ? 'kt-menu__item--active' : ''}}" aria-haspopup="true"><a href="/account/patient/payments" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Patient Payments</span></a></li>
                  </ul>
               </div>
            </li>
            <li class="kt-menu__item  {{request()->segment(count(request()->segments())) == 'appointments' || request()->segment(count(request()->segments())-1) == 'appointment' || request()->segment(count(request()->segments())-2) == 'appointment'? 'kt-menu__item--open kt-menu__item--here' : ''}} kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
               <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                  <span class="kt-menu__link-icon">
                  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                     <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <polygon points="0 0 24 0 24 24 0 24"/>
                        <path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                        <path d="M11,14 L9,14 C8.44771525,14 8,13.5522847 8,13 C8,12.4477153 8.44771525,12 9,12 L11,12 L11,10 C11,9.44771525 11.4477153,9 12,9 C12.5522847,9 13,9.44771525 13,10 L13,12 L15,12 C15.5522847,12 16,12.4477153 16,13 C16,13.5522847 15.5522847,14 15,14 L13,14 L13,16 C13,16.5522847 12.5522847,17 12,17 C11.4477153,17 11,16.5522847 11,16 L11,14 Z" fill="#000000"/>
                     </g>
                  </svg>
                  </span>
                  <span class="kt-menu__link-text">Appointment</span><i class="kt-menu__ver-arrow la la-angle-right"></i>
               </a>
               <div class="kt-menu__submenu ">
                  <span class="kt-menu__arrow"></span>
                  <ul class="kt-menu__subnav">
                     <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">Appointment</span></span></li>
                     <li class="kt-menu__item {{request()->segment(count(request()->segments())-1) == 'appointment' ? 'kt-menu__item--active' : ''}}" aria-haspopup="true"><a href="/account/appointment/create" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Add Appointment</span></a></li>
                     <li class="kt-menu__item {{request()->segment(count(request()->segments())) == 'appointments' ? 'kt-menu__item--active' : ''}}" aria-haspopup="true"><a href="/account/appointments" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Appointment List</span></a></li>
                  </ul>
               </div>
            </li>
            <li class="kt-menu__section ">
               <h4 class="kt-menu__section-text">Account Settings</h4>
               <i class="kt-menu__section-icon flaticon-more-v2"></i>
            </li>
            <li class="kt-menu__item  {{request()->segment(count(request()->segments())) == 'schedule' || request()->segment(count(request()->segments())-1) == 'schedule' || request()->segment(count(request()->segments())-2) == 'schedule'? 'kt-menu__item--open kt-menu__item--here' : ''}} kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
               <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                  <span class="kt-menu__link-icon">
                     <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                           <rect x="0" y="0" width="24" height="24"/>
                           <path d="M10.9630156,7.5 L11.0475062,7.5 C11.3043819,7.5 11.5194647,7.69464724 11.5450248,7.95024814 L12,12.5 L15.2480695,14.3560397 C15.403857,14.4450611 15.5,14.6107328 15.5,14.7901613 L15.5,15 C15.5,15.2109164 15.3290185,15.3818979 15.1181021,15.3818979 C15.0841582,15.3818979 15.0503659,15.3773725 15.0176181,15.3684413 L10.3986612,14.1087258 C10.1672824,14.0456225 10.0132986,13.8271186 10.0316926,13.5879956 L10.4644883,7.96165175 C10.4845267,7.70115317 10.7017474,7.5 10.9630156,7.5 Z" fill="#000000"/>
                           <path d="M7.38979581,2.8349582 C8.65216735,2.29743306 10.0413491,2 11.5,2 C17.2989899,2 22,6.70101013 22,12.5 C22,18.2989899 17.2989899,23 11.5,23 C5.70101013,23 1,18.2989899 1,12.5 C1,11.5151324 1.13559454,10.5619345 1.38913364,9.65805651 L3.31481075,10.1982117 C3.10672013,10.940064 3,11.7119264 3,12.5 C3,17.1944204 6.80557963,21 11.5,21 C16.1944204,21 20,17.1944204 20,12.5 C20,7.80557963 16.1944204,4 11.5,4 C10.54876,4 9.62236069,4.15592757 8.74872191,4.45446326 L9.93948308,5.87355717 C10.0088058,5.95617272 10.0495583,6.05898805 10.05566,6.16666224 C10.0712834,6.4423623 9.86044965,6.67852665 9.5847496,6.69415008 L4.71777931,6.96995273 C4.66931162,6.97269931 4.62070229,6.96837279 4.57348157,6.95710938 C4.30487471,6.89303938 4.13906482,6.62335149 4.20313482,6.35474463 L5.33163823,1.62361064 C5.35654118,1.51920756 5.41437908,1.4255891 5.49660017,1.35659741 C5.7081375,1.17909652 6.0235153,1.2066885 6.2010162,1.41822583 L7.38979581,2.8349582 Z" fill="#000000" opacity="0.3"/>
                        </g>
                     </svg>
                  </span>
                  <span class="kt-menu__link-text">Schedule</span><i class="kt-menu__ver-arrow la la-angle-right"></i>
               </a>
               <div class="kt-menu__submenu ">
                  <span class="kt-menu__arrow"></span>
                  <ul class="kt-menu__subnav">
                     <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">Schedule</span></span></li>
                     <li class="kt-menu__item {{request()->segment(count(request()->segments())-1) == 'schedule' ? 'kt-menu__item--active' : ''}}" aria-haspopup="true"><a href="/account/schedule/create" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Add Schedule</span></a></li>
                     <li class="kt-menu__item {{request()->segment(count(request()->segments())) == 'schedule' ? 'kt-menu__item--active' : ''}}" aria-haspopup="true"><a href="/account/schedule" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Schedule List</span></a></li>
                  </ul>
               </div>
            </li>
            <li class="kt-menu__item  {{request()->segment(count(request()->segments())) == 'qualification' || request()->segment(count(request()->segments())-1) == 'qualification' || request()->segment(count(request()->segments())-2) == 'qualification'? 'kt-menu__item--open kt-menu__item--here' : ''}} kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
               <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                  <span class="kt-menu__link-icon">
                     <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                           <rect x="0" y="0" width="24" height="24"/>
                           <circle fill="#000000" opacity="0.3" cx="12" cy="9" r="8"/>
                           <path d="M14.5297296,11 L9.46184488,11 L11.9758349,17.4645458 L14.5297296,11 Z M10.5679953,19.3624463 L6.53815512,9 L17.4702704,9 L13.3744964,19.3674279 L11.9759405,18.814912 L10.5679953,19.3624463 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                           <path d="M10,22 L14,22 L14,22 C14,23.1045695 13.1045695,24 12,24 L12,24 C10.8954305,24 10,23.1045695 10,22 Z" fill="#000000" opacity="0.3"/>
                           <path d="M9,20 C8.44771525,20 8,19.5522847 8,19 C8,18.4477153 8.44771525,18 9,18 C8.44771525,18 8,17.5522847 8,17 C8,16.4477153 8.44771525,16 9,16 L15,16 C15.5522847,16 16,16.4477153 16,17 C16,17.5522847 15.5522847,18 15,18 C15.5522847,18 16,18.4477153 16,19 C16,19.5522847 15.5522847,20 15,20 C15.5522847,20 16,20.4477153 16,21 C16,21.5522847 15.5522847,22 15,22 L9,22 C8.44771525,22 8,21.5522847 8,21 C8,20.4477153 8.44771525,20 9,20 Z" fill="#000000"/>
                        </g>
                     </svg>
                  </span>
                  <span class="kt-menu__link-text">Qualification</span><i class="kt-menu__ver-arrow la la-angle-right"></i>
               </a>
               <div class="kt-menu__submenu ">
                  <span class="kt-menu__arrow"></span>
                  <ul class="kt-menu__subnav">
                     <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">Schedule</span></span></li>
                     <li class="kt-menu__item {{request()->segment(count(request()->segments())-1) == 'qualification' ? 'kt-menu__item--active' : ''}}" aria-haspopup="true"><a href="/account/qualification/create" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Add Qualification</span></a></li>
                     <li class="kt-menu__item {{request()->segment(count(request()->segments())) == 'qualification' ? 'kt-menu__item--active' : ''}}" aria-haspopup="true"><a href="/account/qualification" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Qualification List</span></a></li>
                  </ul>
               </div>
            </li>
            <li class="kt-menu__item  {{request()->segment(count(request()->segments())) == 'experience' || request()->segment(count(request()->segments())-1) == 'experience' || request()->segment(count(request()->segments())-2) == 'experience'? 'kt-menu__item--open kt-menu__item--here' : ''}} kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
               <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                  <span class="kt-menu__link-icon">
                     <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                           <rect x="0" y="0" width="24" height="24"/>
                           <path d="M3.5,21 L20.5,21 C21.3284271,21 22,20.3284271 22,19.5 L22,8.5 C22,7.67157288 21.3284271,7 20.5,7 L10,7 L7.43933983,4.43933983 C7.15803526,4.15803526 6.77650439,4 6.37867966,4 L3.5,4 C2.67157288,4 2,4.67157288 2,5.5 L2,19.5 C2,20.3284271 2.67157288,21 3.5,21 Z" fill="#000000" opacity="0.3"/>
                           <path d="M11.9999651,17.2276651 L9.80187391,18.4352848 C9.53879239,18.5798204 9.21340017,18.4741205 9.07509004,18.1991974 C9.02001422,18.0897216 9.00100892,17.9643258 9.02101638,17.8424227 L9.44081443,15.2846431 L7.66252134,13.4732136 C7.44968392,13.2564102 7.44532889,12.9003514 7.65279409,12.677934 C7.73540782,12.5893662 7.84365664,12.5317281 7.96078237,12.5139426 L10.418323,12.1407676 L11.5173686,9.81362288 C11.6489093,9.53509542 11.97161,9.42073887 12.2381407,9.5582004 C12.3442746,9.6129383 12.4301813,9.70271178 12.4825615,9.81362288 L13.5816071,12.1407676 L16.0391477,12.5139426 C16.3332818,12.5586066 16.5370768,12.8439892 16.4943366,13.1513625 C16.4773173,13.2737601 16.4221618,13.3868813 16.3374088,13.4732136 L14.5591157,15.2846431 L14.9789137,17.8424227 C15.0291578,18.148554 14.8324094,18.4392867 14.5394638,18.4917923 C14.4228114,18.5127004 14.3028166,18.4928396 14.1980562,18.4352848 L11.9999651,17.2276651 Z" fill="#000000" opacity="0.3"/>
                        </g>
                     </svg>
                  </span>
                  <span class="kt-menu__link-text">Experience</span><i class="kt-menu__ver-arrow la la-angle-right"></i>
               </a>
               <div class="kt-menu__submenu ">
                  <span class="kt-menu__arrow"></span>
                  <ul class="kt-menu__subnav">
                     <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">Schedule</span></span></li>
                     <li class="kt-menu__item {{request()->segment(count(request()->segments())-1) == 'experience' ? 'kt-menu__item--active' : ''}}" aria-haspopup="true"><a href="/account/experience/create" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Add Experience</span></a></li>
                     <li class="kt-menu__item {{request()->segment(count(request()->segments())) == 'experience' ? 'kt-menu__item--active' : ''}}" aria-haspopup="true"><a href="/account/experience" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Experience List</span></a></li>
                  </ul>
               </div>
            </li>
            <li class="kt-menu__item  {{request()->segment(count(request()->segments())) == 'achievements' || request()->segment(count(request()->segments())-1) == 'achievement' || request()->segment(count(request()->segments())-2) == 'achievement'? 'kt-menu__item--open kt-menu__item--here' : ''}} kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
               <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                  <span class="kt-menu__link-icon">
                     <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                           <rect x="0" y="0" width="24" height="24"/>
                           <path d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z" fill="#000000" opacity="0.3"/>
                           <path d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z" fill="#000000"/>
                           <rect fill="#000000" opacity="0.3" x="7" y="10" width="5" height="2" rx="1"/>
                           <rect fill="#000000" opacity="0.3" x="7" y="14" width="9" height="2" rx="1"/>
                        </g>
                     </svg>
                  </span>
                  <span class="kt-menu__link-text">Achievements</span><i class="kt-menu__ver-arrow la la-angle-right"></i>
               </a>
               <div class="kt-menu__submenu ">
                  <span class="kt-menu__arrow"></span>
                  <ul class="kt-menu__subnav">
                     <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">Schedule</span></span></li>
                     <li class="kt-menu__item {{request()->segment(count(request()->segments())-1) == 'achievement' ? 'kt-menu__item--active' : ''}}" aria-haspopup="true"><a href="/account/achievement/create" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Add Achievement</span></a></li>
                     <li class="kt-menu__item {{request()->segment(count(request()->segments())) == 'achievements' ? 'kt-menu__item--active' : ''}}" aria-haspopup="true"><a href="/account/achievements" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Achievements List</span></a></li>
                  </ul>
               </div>
            </li>
            <li class="kt-menu__item  {{request()->segment(count(request()->segments())) == 'expenses' || request()->segment(count(request()->segments())) == 'ledger' || request()->segment(count(request()->segments())-2) == 'achievement'? 'kt-menu__item--open kt-menu__item--here' : ''}} kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
               <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                  <span class="kt-menu__link-icon">
                  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                     <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <rect x="0" y="0" width="24" height="24"/>
                        <rect fill="#000000" opacity="0.3" x="12" y="4" width="3" height="13" rx="1.5"/>
                        <rect fill="#000000" opacity="0.3" x="7" y="9" width="3" height="8" rx="1.5"/>
                        <path d="M5,19 L20,19 C20.5522847,19 21,19.4477153 21,20 C21,20.5522847 20.5522847,21 20,21 L4,21 C3.44771525,21 3,20.5522847 3,20 L3,4 C3,3.44771525 3.44771525,3 4,3 C4.55228475,3 5,3.44771525 5,4 L5,19 Z" fill="#000000" fill-rule="nonzero"/>
                        <rect fill="#000000" opacity="0.3" x="17" y="11" width="3" height="6" rx="1.5"/>
                     </g>
                  </svg>
                  </span>
                  <span class="kt-menu__link-text">Accounts</span><i class="kt-menu__ver-arrow la la-angle-right"></i>
               </a>
               <div class="kt-menu__submenu ">
                  <span class="kt-menu__arrow"></span>
                  <ul class="kt-menu__subnav">
                     <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">Schedule</span></span></li>
                     <li class="kt-menu__item {{request()->segment(count(request()->segments())) == 'expenses' ? 'kt-menu__item--active' : ''}}" aria-haspopup="true"><a href="/account/expenses" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Expenses</span></a></li>
                     <li class="kt-menu__item {{request()->segment(count(request()->segments())) == 'ledger' ? 'kt-menu__item--active' : ''}}" aria-haspopup="true"><a href="/account/ledger" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">General Ledger</span></a></li>
                  </ul>
               </div>
            </li>
            <li class="kt-menu__item {{request()->segment(count(request()->segments())) == 'settings' || request()->segment(count(request()->segments())-1) == 'settings' || request()->segment(count(request()->segments())-2) == 'settings'? 'kt-menu__item--active' : ''}}" aria-haspopup="true">
               <a href="/account/settings" class="kt-menu__link ">
                  <span class="kt-menu__link-icon">
                  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                     <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <rect x="0" y="0" width="24" height="24"/>
                        <path d="M18.6225,9.75 L18.75,9.75 C19.9926407,9.75 21,10.7573593 21,12 C21,13.2426407 19.9926407,14.25 18.75,14.25 L18.6854912,14.249994 C18.4911876,14.250769 18.3158978,14.366855 18.2393549,14.5454486 C18.1556809,14.7351461 18.1942911,14.948087 18.3278301,15.0846699 L18.372535,15.129375 C18.7950334,15.5514036 19.03243,16.1240792 19.03243,16.72125 C19.03243,17.3184208 18.7950334,17.8910964 18.373125,18.312535 C17.9510964,18.7350334 17.3784208,18.97243 16.78125,18.97243 C16.1840792,18.97243 15.6114036,18.7350334 15.1896699,18.3128301 L15.1505513,18.2736469 C15.008087,18.1342911 14.7951461,18.0956809 14.6054486,18.1793549 C14.426855,18.2558978 14.310769,18.4311876 14.31,18.6225 L14.31,18.75 C14.31,19.9926407 13.3026407,21 12.06,21 C10.8173593,21 9.81,19.9926407 9.81,18.75 C9.80552409,18.4999185 9.67898539,18.3229986 9.44717599,18.2361469 C9.26485393,18.1556809 9.05191298,18.1942911 8.91533009,18.3278301 L8.870625,18.372535 C8.44859642,18.7950334 7.87592081,19.03243 7.27875,19.03243 C6.68157919,19.03243 6.10890358,18.7950334 5.68746499,18.373125 C5.26496665,17.9510964 5.02757002,17.3784208 5.02757002,16.78125 C5.02757002,16.1840792 5.26496665,15.6114036 5.68716991,15.1896699 L5.72635306,15.1505513 C5.86570889,15.008087 5.90431906,14.7951461 5.82064513,14.6054486 C5.74410223,14.426855 5.56881236,14.310769 5.3775,14.31 L5.25,14.31 C4.00735931,14.31 3,13.3026407 3,12.06 C3,10.8173593 4.00735931,9.81 5.25,9.81 C5.50008154,9.80552409 5.67700139,9.67898539 5.76385306,9.44717599 C5.84431906,9.26485393 5.80570889,9.05191298 5.67216991,8.91533009 L5.62746499,8.870625 C5.20496665,8.44859642 4.96757002,7.87592081 4.96757002,7.27875 C4.96757002,6.68157919 5.20496665,6.10890358 5.626875,5.68746499 C6.04890358,5.26496665 6.62157919,5.02757002 7.21875,5.02757002 C7.81592081,5.02757002 8.38859642,5.26496665 8.81033009,5.68716991 L8.84944872,5.72635306 C8.99191298,5.86570889 9.20485393,5.90431906 9.38717599,5.82385306 L9.49484664,5.80114977 C9.65041313,5.71688974 9.7492905,5.55401473 9.75,5.3775 L9.75,5.25 C9.75,4.00735931 10.7573593,3 12,3 C13.2426407,3 14.25,4.00735931 14.25,5.25 L14.249994,5.31450877 C14.250769,5.50881236 14.366855,5.68410223 14.552824,5.76385306 C14.7351461,5.84431906 14.948087,5.80570889 15.0846699,5.67216991 L15.129375,5.62746499 C15.5514036,5.20496665 16.1240792,4.96757002 16.72125,4.96757002 C17.3184208,4.96757002 17.8910964,5.20496665 18.312535,5.626875 C18.7350334,6.04890358 18.97243,6.62157919 18.97243,7.21875 C18.97243,7.81592081 18.7350334,8.38859642 18.3128301,8.81033009 L18.2736469,8.84944872 C18.1342911,8.99191298 18.0956809,9.20485393 18.1761469,9.38717599 L18.1988502,9.49484664 C18.2831103,9.65041313 18.4459853,9.7492905 18.6225,9.75 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                        <path d="M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z" fill="#000000"/>
                     </g>
                  </svg>
                  </span>
                  <span class="kt-menu__link-text">Settings</span>
               </a>
            </li>
            @elseif(Auth::user()->userrole == "hospital")
            <li class="kt-menu__item {{request()->segment(count(request()->segments())) == 'dashboard' || request()->segment(count(request()->segments())-1) == 'dashboard' || request()->segment(count(request()->segments())-2) == 'dashboard'? 'kt-menu__item--active' : ''}}" aria-haspopup="true">
               <a href="/account/hospital/dashboard" class="kt-menu__link ">
                  <span class="kt-menu__link-icon">
                  <i class="fas fa-tachometer-alt"></i>
                  </span>
                  <span class="kt-menu__link-text">
                  @if(Auth::user()->language == null)
                     Dashboard
                  @else
                     @if(Auth::user()->language->language->transcripts()->where('english_syntax', "Dashboard")->first() !=  null)
                        {{Auth::user()->language->language->transcripts()->where('english_syntax', "Dashboard")->first()->translation}}
                     @else
                        Dashboard
                     @endif
                  @endif
                  </span>
               </a>
            </li>
            <li class="kt-menu__item  {{request()->segment(count(request()->segments())) == 'departments' || request()->segment(count(request()->segments())-1) == 'department' || request()->segment(count(request()->segments())-2) == 'department'? 'kt-menu__item--open kt-menu__item--here' : ''}} kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
               <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                  <span class="kt-menu__link-icon">
                  <i class="fas fa-sitemap"></i>
                  </span>
                  <span class="kt-menu__link-text">
                  @if(Auth::user()->language == null)
                     Departments
                  @else
                     @if(Auth::user()->language->language->transcripts()->where('english_syntax', "Departments")->first() !=  null)
                        {{Auth::user()->language->language->transcripts()->where('english_syntax', "Departments")->first()->translation}}
                     @else
                        Departments
                     @endif
                  @endif
                  </span><i class="kt-menu__ver-arrow la la-angle-right"></i>
               </a>
               <div class="kt-menu__submenu ">
                  <span class="kt-menu__arrow"></span>
                  <ul class="kt-menu__subnav">
                     <li class="kt-menu__item {{request()->segment(count(request()->segments())-1) == 'department' ? 'kt-menu__item--active' : ''}}" aria-haspopup="true"><a href="/account/hospital/department/create" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Add New Department</span></a></li>
                     <li class="kt-menu__item {{request()->segment(count(request()->segments())) == 'departments' ? 'kt-menu__item--active' : ''}}" aria-haspopup="true"><a href="/account/hospital/departments" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Departments List</span></a></li>
                  </ul>
               </div>
            </li>
            <li class="kt-menu__item  {{request()->segment(count(request()->segments())) == 'history' ||request()->segment(count(request()->segments())) == 'doctors' || request()->segment(count(request()->segments())-1) == 'doctor' || request()->segment(count(request()->segments())-2) == 'doctor'? 'kt-menu__item--open kt-menu__item--here' : ''}} kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
               <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                  <span class="kt-menu__link-icon">
                  <i class="fas fa-user-md"></i>
                  </span>
                  <span class="kt-menu__link-text">
                  @if(Auth::user()->language == null)
                     Doctors
                  @else
                     @if(Auth::user()->language->language->transcripts()->where('english_syntax', "Doctors")->first() !=  null)
                        {{Auth::user()->language->language->transcripts()->where('english_syntax', "Doctors")->first()->translation}}
                     @else
                        Doctors
                     @endif
                  @endif
                  </span><i class="kt-menu__ver-arrow la la-angle-right"></i>
               </a>
               <div class="kt-menu__submenu ">
                  <span class="kt-menu__arrow"></span>
                  <ul class="kt-menu__subnav">
                     <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">Schedule</span></span></li>
                     <li class="kt-menu__item {{request()->segment(count(request()->segments())-1) == 'doctor' ? 'kt-menu__item--active' : ''}}" aria-haspopup="true"><a href="/account/hospital/doctor/create" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Add New Doctor</span></a></li>
                     <li class="kt-menu__item {{request()->segment(count(request()->segments())) == 'doctors' ? 'kt-menu__item--active' : ''}}" aria-haspopup="true"><a href="/account/hospital/doctors" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Doctors List</span></a></li>
                     <li class="kt-menu__item {{request()->segment(count(request()->segments())) == 'history' ? 'kt-menu__item--active' : ''}}" aria-haspopup="true"><a href="/account/hospital/doctors/history" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Treatment History</span></a></li>
                  </ul>
               </div>
            </li>
            <li class="kt-menu__item  {{request()->segment(count(request()->segments())) == 'caseManager' || request()->segment(count(request()->segments())) == 'patients' || request()->segment(count(request()->segments())-1) == 'patient' || request()->segment(count(request()->segments())-2) == 'patient'? 'kt-menu__item--open kt-menu__item--here' : ''}} kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
               <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                  <span class="kt-menu__link-icon">
                  <i class="fas fa-users"></i>
                  </span>
                  <span class="kt-menu__link-text">
                  @if(Auth::user()->language == null)
                     Patients
                  @else
                     @if(Auth::user()->language->language->transcripts()->where('english_syntax', "Patients")->first() !=  null)
                        {{Auth::user()->language->language->transcripts()->where('english_syntax', "Patients")->first()->translation}}
                     @else
                        Patients
                     @endif
                  @endif
                  </span><i class="kt-menu__ver-arrow la la-angle-right"></i>
               </a>
               <div class="kt-menu__submenu ">
                  <span class="kt-menu__arrow"></span>
                  <ul class="kt-menu__subnav">
                     <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">Schedule</span></span></li>
                     <li class="kt-menu__item {{request()->segment(count(request()->segments())-1) == 'patient' ? 'kt-menu__item--active' : ''}}" aria-haspopup="true"><a href="/account/patient/create" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Add Patient</span></a></li>
                     <li class="kt-menu__item {{request()->segment(count(request()->segments())) == 'patients' ? 'kt-menu__item--active' : ''}}" aria-haspopup="true"><a href="/account/patients" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Patients List</span></a></li>
                     <li class="kt-menu__item {{request()->segment(count(request()->segments())) == 'payments' ? 'kt-menu__item--active' : ''}}" aria-haspopup="true"><a href="/account/patient/payments" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Patient Payments</span></a></li>   
                     <li class="kt-menu__item {{request()->segment(count(request()->segments())) == 'caseManager' ? 'kt-menu__item--active' : ''}}" aria-haspopup="true"><a href="/account/caseManager" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Case Manager</span></a></li>            
                  </ul>
               </div>
            </li>
            <li class="kt-menu__item  {{request()->segment(count(request()->segments())) == 'appointments' || request()->segment(count(request()->segments())-1) == 'appointment' || request()->segment(count(request()->segments())-2) == 'appointment'? 'kt-menu__item--open kt-menu__item--here' : ''}} kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
               <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                  <span class="kt-menu__link-icon">
                  <i class="fas fa-stethoscope"></i>
                  </span>
                  <span class="kt-menu__link-text">
                  @if(Auth::user()->language == null)
                     Appointments
                  @else
                     @if(Auth::user()->language->language->transcripts()->where('english_syntax', "Appointments")->first() !=  null)
                        {{Auth::user()->language->language->transcripts()->where('english_syntax', "Appointments")->first()->translation}}
                     @else
                        Appointments
                     @endif
                  @endif
                  </span><i class="kt-menu__ver-arrow la la-angle-right"></i>
               </a>
               <div class="kt-menu__submenu ">
                  <span class="kt-menu__arrow"></span>
                  <ul class="kt-menu__subnav">
                     <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">Schedule</span></span></li>
                     <li class="kt-menu__item {{request()->segment(count(request()->segments())-1) == 'appointment' ? 'kt-menu__item--active' : ''}}" aria-haspopup="true"><a href="/account/hospital/appointment/create" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Add New Appointment</span></a></li>
                     <li class="kt-menu__item {{request()->segment(count(request()->segments())) == 'appointments' ? 'kt-menu__item--active' : ''}}" aria-haspopup="true"><a href="/account/hospital/appointments" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Appointments List</span></a></li>
                  </ul>
               </div>
            </li>
            <li class="kt-menu__item  {{request()->segment(count(request()->segments())) == 'payments' || request()->segment(count(request()->segments())-1) == 'payment' || request()->segment(count(request()->segments())) == 'paymentProcedure' || request()->segment(count(request()->segments())-1) == 'paymentProcedure'? 'kt-menu__item--open kt-menu__item--here' : ''}} kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
               <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                  <span class="kt-menu__link-icon">
                  <i class="fas fa-money-bill-alt"></i>
                  </span>
                  <span class="kt-menu__link-text">
                  @if(Auth::user()->language == null)
                     Financial Activities
                  @else
                     @if(Auth::user()->language->language->transcripts()->where('english_syntax', "Financial Activities")->first() !=  null)
                        {{Auth::user()->language->language->transcripts()->where('english_syntax', "Financial Activities")->first()->translation}}
                     @else
                     Financial Activities
                     @endif
                  @endif
                  </span><i class="kt-menu__ver-arrow la la-angle-right"></i>
               </a>
               <div class="kt-menu__submenu ">
                  <span class="kt-menu__arrow"></span>
                  <ul class="kt-menu__subnav">
                     <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">Payments</span></span></li>
                     <li class="kt-menu__item {{request()->segment(count(request()->segments())) == 'payments' ? 'kt-menu__item--active' : ''}}" aria-haspopup="true"><a href="/account/finance/payments" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Payments</span></a></li>
                     <li class="kt-menu__item {{request()->segment(count(request()->segments())-1) == 'payment' ? 'kt-menu__item--active' : ''}}" aria-haspopup="true"><a href="/account/finance/payment/create" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Add New Payment</span></a></li>
                     <li class="kt-menu__item {{request()->segment(count(request()->segments())) == 'paymentProcedure' ? 'kt-menu__item--active' : ''}}" aria-haspopup="true"><a href="/account/paymentProcedure" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Payment Procedures</span></a></li>
                  </ul>
               </div>
            </li>
            <li class="kt-menu__item  {{request()->segment(count(request()->segments())) == 'expense' || request()->segment(count(request()->segments())-1) == 'expense' || request()->segment(count(request()->segments())) == 'expenseCategory' || request()->segment(count(request()->segments())-1) == 'expenseCategory'? 'kt-menu__item--open kt-menu__item--here' : ''}} kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
               <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                  <span class="kt-menu__link-icon">
                  <i class="fas fa-money-check-alt"></i>
                  </span>
                  <span class="kt-menu__link-text">
                  @if(Auth::user()->language == null)
                     Expenses
                  @else
                     @if(Auth::user()->language->language->transcripts()->where('english_syntax', "Expenses")->first() !=  null)
                        {{Auth::user()->language->language->transcripts()->where('english_syntax', "Expenses")->first()->translation}}
                     @else
                     Expenses
                     @endif
                  @endif
                  </span><i class="kt-menu__ver-arrow la la-angle-right"></i>
               </a>
               <div class="kt-menu__submenu ">
                  <span class="kt-menu__arrow"></span>
                  <ul class="kt-menu__subnav">
                     <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">Payments</span></span></li>
                     <li class="kt-menu__item {{request()->segment(count(request()->segments())) == 'expense' ? 'kt-menu__item--active' : ''}}" aria-haspopup="true"><a href="/account/expense" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Expenses</span></a></li>
                     <li class="kt-menu__item {{request()->segment(count(request()->segments())-1) == 'expense' ? 'kt-menu__item--active' : ''}}" aria-haspopup="true"><a href="/account/expense/create" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Add New Expense</span></a></li>
                     <li class="kt-menu__item {{request()->segment(count(request()->segments())) == 'expenseCategory' ? 'kt-menu__item--active' : ''}}" aria-haspopup="true"><a href="/account/expenseCategory" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Expense Catgegories</span></a></li>
                  </ul>
               </div>
            </li>
            <li class="kt-menu__item  {{request()->segment(count(request()->segments())) == 'reports' || request()->segment(count(request()->segments())-1) == 'report' || request()->segment(count(request()->segments())) == 'template'? 'kt-menu__item--open kt-menu__item--here' : ''}} kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
               <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                  <span class="kt-menu__link-icon">
                  <i class="fas fa-flask"></i>
                  </span>
                  <span class="kt-menu__link-text">
                  @if(Auth::user()->language == null)
                     Lab Tests
                  @else
                     @if(Auth::user()->language->language->transcripts()->where('english_syntax', "Lab Tests")->first() !=  null)
                        {{Auth::user()->language->language->transcripts()->where('english_syntax', "Lab Tests")->first()->translation}}
                     @else
                     Lab Tests
                     @endif
                  @endif
                  </span><i class="kt-menu__ver-arrow la la-angle-right"></i>
               </a>
               <div class="kt-menu__submenu ">
                  <span class="kt-menu__arrow"></span>
                  <ul class="kt-menu__subnav">
                     <li class="kt-menu__item {{request()->segment(count(request()->segments())-1) == 'report' ? 'kt-menu__item--active' : ''}}" aria-haspopup="true"><a href="/account/lab/report/create" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Add Lab Report</span></a></li>
                     <li class="kt-menu__item {{request()->segment(count(request()->segments())) == 'reports' ? 'kt-menu__item--active' : ''}}" aria-haspopup="true"><a href="/account/lab/reports" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Lab Reports</span></a></li>
                     <li class="kt-menu__item {{request()->segment(count(request()->segments())) == 'template' ? 'kt-menu__item--active' : ''}}" aria-haspopup="true"><a href="/account/lab/template" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Report Templates</span></a></li>
                  </ul>
               </div>
            </li>
            <li class="kt-menu__item  {{request()->segment(count(request()->segments())) == 'donors' || request()->segment(count(request()->segments())-1) == 'donor' || request()->segment(count(request()->segments())) == 'bloodBank' || request()->segment(count(request()->segments())-1) == 'bloodBank'? 'kt-menu__item--open kt-menu__item--here' : ''}} kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
               <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                  <span class="kt-menu__link-icon">
                  <i class="fas fa-tint"></i>
                  </span>
                  <span class="kt-menu__link-text">
                  @if(Auth::user()->language == null)
                     Donor
                  @else
                     @if(Auth::user()->language->language->transcripts()->where('english_syntax', "Donor")->first() !=  null)
                        {{Auth::user()->language->language->transcripts()->where('english_syntax', "Donor")->first()->translation}}
                     @else
                     Donor
                     @endif
                  @endif
                  </span><i class="kt-menu__ver-arrow la la-angle-right"></i>
               </a>
               <div class="kt-menu__submenu ">
                  <span class="kt-menu__arrow"></span>
                  <ul class="kt-menu__subnav">
                     <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">Donor</span></span></li>
                     <li class="kt-menu__item {{request()->segment(count(request()->segments())) == 'donors' ? 'kt-menu__item--active' : ''}}" aria-haspopup="true"><a href="/account/donors" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Donor List</span></a></li>
                     <li class="kt-menu__item {{request()->segment(count(request()->segments())-1) == 'donor' ? 'kt-menu__item--active' : ''}}" aria-haspopup="true"><a href="/account/donor/create" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Add New Donor</span></a></li>
                     <li class="kt-menu__item {{request()->segment(count(request()->segments())) == 'bloodBank' ? 'kt-menu__item--active' : ''}}" aria-haspopup="true"><a href="/account/bloodBank" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Blood Bank</span></a></li>
                  </ul>
               </div>
            </li>
            <li class="kt-menu__item  {{request()->segment(count(request()->segments())) == 'bed' || request()->segment(count(request()->segments())-1) == 'bed' || request()->segment(count(request()->segments())) == 'bedCategory' || request()->segment(count(request()->segments())-1) == 'bedCategory' || request()->segment(count(request()->segments())) == 'bedAllotment' || request()->segment(count(request()->segments())-1) == 'bedAllotment'? 'kt-menu__item--open kt-menu__item--here' : ''}} kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
               <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                  <span class="kt-menu__link-icon">
                  <i class="fas fa-bed"></i>
                  </span>
                  <span class="kt-menu__link-text">
                  @if(Auth::user()->language == null)
                     Bed
                  @else
                     @if(Auth::user()->language->language->transcripts()->where('english_syntax', "Bed")->first() !=  null)
                        {{Auth::user()->language->language->transcripts()->where('english_syntax', "Bed")->first()->translation}}
                     @else
                     Bed
                     @endif
                  @endif
                  </span><i class="kt-menu__ver-arrow la la-angle-right"></i>
               </a>
               <div class="kt-menu__submenu ">
                  <span class="kt-menu__arrow"></span>
                  <ul class="kt-menu__subnav">
                     <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">Donor</span></span></li>
                     <li class="kt-menu__item {{request()->segment(count(request()->segments())) == 'bed' ? 'kt-menu__item--active' : ''}}" aria-haspopup="true"><a href="/account/bed" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Bed List</span></a></li>
                     <li class="kt-menu__item {{request()->segment(count(request()->segments())-1) == 'bed' ? 'kt-menu__item--active' : ''}}" aria-haspopup="true"><a href="/account/bed/create" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Add New Bed</span></a></li>
                     <li class="kt-menu__item {{request()->segment(count(request()->segments())) == 'bedCategory' ? 'kt-menu__item--active' : ''}}" aria-haspopup="true"><a href="/account/bedCategory" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Bed Category</span></a></li>
                     <li class="kt-menu__item {{request()->segment(count(request()->segments())) == 'bedAllotment' ? 'kt-menu__item--active' : ''}}" aria-haspopup="true"><a href="/account/bedAllotment" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Bed Allotments</span></a></li>
                     <li class="kt-menu__item {{request()->segment(count(request()->segments()) - 1) == 'bedAllotment' ? 'kt-menu__item--active' : ''}}" aria-haspopup="true"><a href="/account/bedAllotment/create" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Add New Allotment</span></a></li>
                  </ul>
               </div>
            </li>
            <li class="kt-menu__item  {{request()->segment(count(request()->segments())) == 'medicineCategory' || request()->segment(count(request()->segments())-1) == 'medicineCategory' || request()->segment(count(request()->segments())) == 'medicine' || request()->segment(count(request()->segments())-1) == 'medicine'? 'kt-menu__item--open kt-menu__item--here' : ''}} kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
               <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                  <span class="kt-menu__link-icon">
                  <i class="fas fa-capsules"></i>
                  </span>
                  <span class="kt-menu__link-text">
                  @if(Auth::user()->language == null)
                     Medicine
                  @else
                     @if(Auth::user()->language->language->transcripts()->where('english_syntax', "Medicine")->first() !=  null)
                        {{Auth::user()->language->language->transcripts()->where('english_syntax', "Medicine")->first()->translation}}
                     @else
                     Medicine
                     @endif
                  @endif
                  </span><i class="kt-menu__ver-arrow la la-angle-right"></i>
               </a>
               <div class="kt-menu__submenu ">
                  <span class="kt-menu__arrow"></span>
                  <ul class="kt-menu__subnav">
                     <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">Medicine Category</span></span></li>
                     <li class="kt-menu__item {{request()->segment(count(request()->segments())) == 'medicine' ? 'kt-menu__item--active' : ''}}" aria-haspopup="true"><a href="/account/hospital/medicine" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Medicine List</span></a></li>
                     <li class="kt-menu__item {{request()->segment(count(request()->segments())-1) == 'medicine' ? 'kt-menu__item--active' : ''}}" aria-haspopup="true"><a href="/account/hospital/medicine/create" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Add New Medicine</span></a></li>
                     <li class="kt-menu__item {{request()->segment(count(request()->segments())) == 'medicineCategory' ? 'kt-menu__item--active' : ''}}" aria-haspopup="true"><a href="/account/medicineCategory" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Medicine Categories</span></a></li>
                     <li class="kt-menu__item {{request()->segment(count(request()->segments())-1) == 'medicineCategory' ? 'kt-menu__item--active' : ''}}" aria-haspopup="true"><a href="/account/medicineCategory/create" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Add New Category</span></a></li>
                  </ul>
               </div>
            </li>
            <li class="kt-menu__item  {{request()->segment(count(request()->segments()) - 1) == 'pharmacy' ? 'kt-menu__item--open kt-menu__item--here' : ''}} kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
               <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                  <span class="kt-menu__link-icon">
                  <i class="fas fa-band-aid"></i>
                  </span>
                  <span class="kt-menu__link-text">
                  @if(Auth::user()->language == null)
                     Pharmacy
                  @else
                     @if(Auth::user()->language->language->transcripts()->where('english_syntax', "Pharmacy")->first() !=  null)
                        {{Auth::user()->language->language->transcripts()->where('english_syntax', "Pharmacy")->first()->translation}}
                     @else
                     Pharmacy
                     @endif
                  @endif
                  </span><i class="kt-menu__ver-arrow la la-angle-right"></i>
               </a>
               <div class="kt-menu__submenu ">
                  <span class="kt-menu__arrow"></span>
                  <ul class="kt-menu__subnav">
                     <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">Medicine Category</span></span></li>
                     <li class="kt-menu__item {{request()->segment(count(request()->segments())) == 'pharmacy' ? 'kt-menu__item--active' : ''}}" aria-haspopup="true"><a href="/account/pharmacy/sales" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Pharmacy Sales</span></a></li>
                     <li class="kt-menu__item {{request()->segment(count(request()->segments())) == 'pharmacy' ? 'kt-menu__item--active' : ''}}" aria-haspopup="true"><a href="/account/pharmacy/create" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Add New Sale</span></a></li>
                  </ul>
               </div>
            </li>
            <li class="kt-menu__item  {{request()->segment(count(request()->segments())) == 'commission' || request()->segment(count(request()->segments())) == 'financialReport' || request()->segment(count(request()->segments())) == 'birth' || request()->segment(count(request()->segments())) == 'operation' || request()->segment(count(request()->segments())) == 'expire' || request()->segment(count(request()->segments())-1) == 'report'? 'kt-menu__item--open kt-menu__item--here' : ''}} kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
               <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                  <span class="kt-menu__link-icon">
                  <i class="fas fa-book"></i>
                  </span>
                  <span class="kt-menu__link-text">
                  @if(Auth::user()->language == null)
                     Reports
                  @else
                     @if(Auth::user()->language->language->transcripts()->where('english_syntax', "Reports")->first() !=  null)
                        {{Auth::user()->language->language->transcripts()->where('english_syntax', "Reports")->first()->translation}}
                     @else
                     Reports
                     @endif
                  @endif
                  </span><i class="kt-menu__ver-arrow la la-angle-right"></i>
               </a>
               <div class="kt-menu__submenu ">
                  <span class="kt-menu__arrow"></span>
                  <ul class="kt-menu__subnav">
                     <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">Medicine Category</span></span></li>
                     <li class="kt-menu__item {{request()->segment(count(request()->segments())) == 'financialReport' ? 'kt-menu__item--active' : ''}}" aria-haspopup="true"><a href="/account/hospital/financialReport" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Financial Report</span></a></li>
                     <li class="kt-menu__item {{request()->segment(count(request()->segments())) == 'birth' ? 'kt-menu__item--active' : ''}}" aria-haspopup="true"><a href="/account/report/birth" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Birth Report</span></a></li>
                     <li class="kt-menu__item {{request()->segment(count(request()->segments())) == 'operation' ? 'kt-menu__item--active' : ''}}" aria-haspopup="true"><a href="/account/report/operation" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Operation Report</span></a></li>
                     <li class="kt-menu__item {{request()->segment(count(request()->segments())) == 'expire' ? 'kt-menu__item--active' : ''}}" aria-haspopup="true"><a href="/account/report/expire" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Expire Report</span></a></li>
                     <li class="kt-menu__item {{request()->segment(count(request()->segments())) == 'commission' ? 'kt-menu__item--active' : ''}}" aria-haspopup="true"><a href="/account/hospital/finance/commission" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Doctors Commission Report</span></a></li>
                  </ul>
               </div>
            </li>
            <li class="kt-menu__item  {{request()->segment(count(request()->segments())) == 'companies' || request()->segment(count(request()->segments())-1) == 'company' || request()->segment(count(request()->segments())-2) == 'company'? 'kt-menu__item--open kt-menu__item--here' : ''}} kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
               <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                  <span class="kt-menu__link-icon">
                  <i class="fas fa-building"></i>
                  </span>
                  <span class="kt-menu__link-text">
                  @if(Auth::user()->language == null)
                     Companies
                  @else
                     @if(Auth::user()->language->language->transcripts()->where('english_syntax', "Companies")->first() !=  null)
                        {{Auth::user()->language->language->transcripts()->where('english_syntax', "Companies")->first()->translation}}
                     @else
                        Companies
                     @endif
                  @endif
                  </span><i class="kt-menu__ver-arrow la la-angle-right"></i>
               </a>
               <div class="kt-menu__submenu ">
                  <span class="kt-menu__arrow"></span>
                  <ul class="kt-menu__subnav">
                     <li class="kt-menu__item {{request()->segment(count(request()->segments())-1) == 'company' ? 'kt-menu__item--active' : ''}}" aria-haspopup="true"><a href="/account/company/create" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Add New Company</span></a></li>
                     <li class="kt-menu__item {{request()->segment(count(request()->segments())) == 'companies' ? 'kt-menu__item--active' : ''}}" aria-haspopup="true"><a href="/account/companies" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Companies List</span></a></li>
                  </ul>
               </div>
            </li>
            @endif

            @if(Auth::user()->userrole == "admin")
            <li class="kt-menu__item {{request()->segment(count(request()->segments())) == 'dashboard' || request()->segment(count(request()->segments())-1) == 'dashboard' || request()->segment(count(request()->segments())-2) == 'dashboard'? 'kt-menu__item--active' : ''}}" aria-haspopup="true">
               <a href="/account/hospital/dashboard" class="kt-menu__link ">
                  <span class="kt-menu__link-icon">
                     <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                           <rect x="0" y="0" width="24" height="24"/>
                           <rect fill="#000000" opacity="0.3" x="2" y="2" width="20" height="20" rx="10"/>
                           <path d="M6.16794971,14.5547002 C5.86159725,14.0951715 5.98577112,13.4743022 6.4452998,13.1679497 C6.90482849,12.8615972 7.52569784,12.9857711 7.83205029,13.4452998 C8.9890854,15.1808525 10.3543313,16 12,16 C13.6456687,16 15.0109146,15.1808525 16.1679497,13.4452998 C16.4743022,12.9857711 17.0951715,12.8615972 17.5547002,13.1679497 C18.0142289,13.4743022 18.1384028,14.0951715 17.8320503,14.5547002 C16.3224187,16.8191475 14.3543313,18 12,18 C9.64566871,18 7.67758127,16.8191475 6.16794971,14.5547002 Z" fill="#000000"/>
                        </g>
                     </svg>
                  </span>
                  <span class="kt-menu__link-text">Dashboard</span>
               </a>
            </li>
            <li class="kt-menu__item  {{request()->segment(count(request()->segments())) == 'hospitals' || request()->segment(count(request()->segments())-1) == 'hospital' || request()->segment(count(request()->segments())-2) == 'hospital'? 'kt-menu__item--open kt-menu__item--here' : ''}} kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
               <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                  <span class="kt-menu__link-icon">
                  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                     <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <rect x="0" y="0" width="24" height="24"/>
                        <path d="M3.5,21 L20.5,21 C21.3284271,21 22,20.3284271 22,19.5 L22,8.5 C22,7.67157288 21.3284271,7 20.5,7 L10,7 L7.43933983,4.43933983 C7.15803526,4.15803526 6.77650439,4 6.37867966,4 L3.5,4 C2.67157288,4 2,4.67157288 2,5.5 L2,19.5 C2,20.3284271 2.67157288,21 3.5,21 Z" fill="#000000" opacity="0.3"/>
                        <path d="M12,13 C10.8954305,13 10,12.1045695 10,11 C10,9.8954305 10.8954305,9 12,9 C13.1045695,9 14,9.8954305 14,11 C14,12.1045695 13.1045695,13 12,13 Z" fill="#000000" opacity="0.3"/>
                        <path d="M7.00036205,18.4995035 C7.21569918,15.5165724 9.36772908,14 11.9907452,14 C14.6506758,14 16.8360465,15.4332455 16.9988413,18.5 C17.0053266,18.6221713 16.9988413,19 16.5815,19 C14.5228466,19 11.463736,19 7.4041679,19 C7.26484009,19 6.98863236,18.6619875 7.00036205,18.4995035 Z" fill="#000000" opacity="0.3"/>
                     </g>
                  </svg>
                  </span>
                  <span class="kt-menu__link-text">Hospitals</span><i class="kt-menu__ver-arrow la la-angle-right"></i>
               </a>
               <div class="kt-menu__submenu ">
                  <span class="kt-menu__arrow"></span>
                  <ul class="kt-menu__subnav">
                     <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">Schedule</span></span></li>
                     <li class="kt-menu__item {{request()->segment(count(request()->segments())-1) == 'hospital' ? 'kt-menu__item--active' : ''}}" aria-haspopup="true"><a href="/admin/hospital/create" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Add New Hospital</span></a></li>
                     <li class="kt-menu__item {{request()->segment(count(request()->segments())) == 'hospitals' ? 'kt-menu__item--active' : ''}}" aria-haspopup="true"><a href="/admin/hospitals" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Hospitals List</span></a></li>
                  </ul>
               </div>
            </li>
            <li class="kt-menu__item  {{request()->segment(count(request()->segments())) == 'modules' || request()->segment(count(request()->segments())-1) == 'module' || request()->segment(count(request()->segments())-2) == 'module'? 'kt-menu__item--open kt-menu__item--here' : ''}} kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
               <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                  <span class="kt-menu__link-icon">
                  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                     <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <rect x="0" y="0" width="24" height="24"/>
                        <path d="M3.5,21 L20.5,21 C21.3284271,21 22,20.3284271 22,19.5 L22,8.5 C22,7.67157288 21.3284271,7 20.5,7 L10,7 L7.43933983,4.43933983 C7.15803526,4.15803526 6.77650439,4 6.37867966,4 L3.5,4 C2.67157288,4 2,4.67157288 2,5.5 L2,19.5 C2,20.3284271 2.67157288,21 3.5,21 Z" fill="#000000" opacity="0.3"/>
                        <path d="M12,13 C10.8954305,13 10,12.1045695 10,11 C10,9.8954305 10.8954305,9 12,9 C13.1045695,9 14,9.8954305 14,11 C14,12.1045695 13.1045695,13 12,13 Z" fill="#000000" opacity="0.3"/>
                        <path d="M7.00036205,18.4995035 C7.21569918,15.5165724 9.36772908,14 11.9907452,14 C14.6506758,14 16.8360465,15.4332455 16.9988413,18.5 C17.0053266,18.6221713 16.9988413,19 16.5815,19 C14.5228466,19 11.463736,19 7.4041679,19 C7.26484009,19 6.98863236,18.6619875 7.00036205,18.4995035 Z" fill="#000000" opacity="0.3"/>
                     </g>
                  </svg>
                  </span>
                  <span class="kt-menu__link-text">Modules</span><i class="kt-menu__ver-arrow la la-angle-right"></i>
               </a>
               <div class="kt-menu__submenu ">
                  <span class="kt-menu__arrow"></span>
                  <ul class="kt-menu__subnav">
                     <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">Schedule</span></span></li>
                     <li class="kt-menu__item {{request()->segment(count(request()->segments())-1) == 'module' ? 'kt-menu__item--active' : ''}}" aria-haspopup="true"><a href="/admin/module/create" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Add New Module</span></a></li>
                     <li class="kt-menu__item {{request()->segment(count(request()->segments())) == 'modules' ? 'kt-menu__item--active' : ''}}" aria-haspopup="true"><a href="/admin/modules" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Modules List</span></a></li>
                  </ul>
               </div>
            </li>
            <li class="kt-menu__item  {{request()->segment(count(request()->segments())) == 'packages' || request()->segment(count(request()->segments())-1) == 'package' || request()->segment(count(request()->segments())-2) == 'package'? 'kt-menu__item--open kt-menu__item--here' : ''}} kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
               <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                  <span class="kt-menu__link-icon">
                  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                     <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <rect x="0" y="0" width="24" height="24"/>
                        <path d="M3.5,21 L20.5,21 C21.3284271,21 22,20.3284271 22,19.5 L22,8.5 C22,7.67157288 21.3284271,7 20.5,7 L10,7 L7.43933983,4.43933983 C7.15803526,4.15803526 6.77650439,4 6.37867966,4 L3.5,4 C2.67157288,4 2,4.67157288 2,5.5 L2,19.5 C2,20.3284271 2.67157288,21 3.5,21 Z" fill="#000000" opacity="0.3"/>
                        <path d="M12,13 C10.8954305,13 10,12.1045695 10,11 C10,9.8954305 10.8954305,9 12,9 C13.1045695,9 14,9.8954305 14,11 C14,12.1045695 13.1045695,13 12,13 Z" fill="#000000" opacity="0.3"/>
                        <path d="M7.00036205,18.4995035 C7.21569918,15.5165724 9.36772908,14 11.9907452,14 C14.6506758,14 16.8360465,15.4332455 16.9988413,18.5 C17.0053266,18.6221713 16.9988413,19 16.5815,19 C14.5228466,19 11.463736,19 7.4041679,19 C7.26484009,19 6.98863236,18.6619875 7.00036205,18.4995035 Z" fill="#000000" opacity="0.3"/>
                     </g>
                  </svg>
                  </span>
                  <span class="kt-menu__link-text">Packages</span><i class="kt-menu__ver-arrow la la-angle-right"></i>
               </a>
               <div class="kt-menu__submenu ">
                  <span class="kt-menu__arrow"></span>
                  <ul class="kt-menu__subnav">
                     <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">Schedule</span></span></li>
                     <li class="kt-menu__item {{request()->segment(count(request()->segments())-1) == 'package' ? 'kt-menu__item--active' : ''}}" aria-haspopup="true"><a href="/admin/package/create" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Add New Package</span></a></li>
                     <li class="kt-menu__item {{request()->segment(count(request()->segments())) == 'packages' ? 'kt-menu__item--active' : ''}}" aria-haspopup="true"><a href="/admin/packages" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Packages List</span></a></li>
                  </ul>
               </div>
            </li>
            
            @endif
            <li class="kt-menu__item kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
               <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                  <span class="kt-menu__link-icon">
                  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                     <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <rect x="0" y="0" width="24" height="24"/>
                        <path d="M3.5,21 L20.5,21 C21.3284271,21 22,20.3284271 22,19.5 L22,8.5 C22,7.67157288 21.3284271,7 20.5,7 L10,7 L7.43933983,4.43933983 C7.15803526,4.15803526 6.77650439,4 6.37867966,4 L3.5,4 C2.67157288,4 2,4.67157288 2,5.5 L2,19.5 C2,20.3284271 2.67157288,21 3.5,21 Z" fill="#000000" opacity="0.3"/>
                        <path d="M12,13 C10.8954305,13 10,12.1045695 10,11 C10,9.8954305 10.8954305,9 12,9 C13.1045695,9 14,9.8954305 14,11 C14,12.1045695 13.1045695,13 12,13 Z" fill="#000000" opacity="0.3"/>
                        <path d="M7.00036205,18.4995035 C7.21569918,15.5165724 9.36772908,14 11.9907452,14 C14.6506758,14 16.8360465,15.4332455 16.9988413,18.5 C17.0053266,18.6221713 16.9988413,19 16.5815,19 C14.5228466,19 11.463736,19 7.4041679,19 C7.26484009,19 6.98863236,18.6619875 7.00036205,18.4995035 Z" fill="#000000" opacity="0.3"/>
                     </g>
                  </svg>
                  </span>
                  <span class="kt-menu__link-text">
                  @if(Auth::user()->language == null)
                     Language
                  @else
                     @if(Auth::user()->language->language->transcripts()->where('english_syntax', "Language")->first() !=  null)
                        {{Auth::user()->language->language->transcripts()->where('english_syntax', "Language")->first()->translation}}
                     @else
                        Language
                     @endif
                  @endif
                  </span><i class="kt-menu__ver-arrow la la-angle-right"></i>
               </a>
               <div class="kt-menu__submenu ">
                  <span class="kt-menu__arrow"></span>
                  <ul class="kt-menu__subnav">
                     <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">Schedule</span></span></li>
                     <li class="kt-menu__item {{request()->segment(count(request()->segments())) == 'languages' ? 'kt-menu__item--active' : ''}}" aria-haspopup="true"><a href="/account/languages" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Languages List</span></a></li>
                     <li class="kt-menu__item {{request()->segment(count(request()->segments()) - 1) == 'language' ? 'kt-menu__item--active' : ''}}" aria-haspopup="true"><a href="/account/language/create" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Add New Language</span></a></li>
                     <li class="kt-menu__item {{request()->segment(count(request()->segments())) == 'language' ? 'kt-menu__item--active' : ''}}" aria-haspopup="true"><a href="/account/language" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Language Settings</span></a></li>
                  </ul>
               </div>
            </li>
         </ul>
      </div>
   </div>
   <!-- end:: Aside Menu -->
</div>
<!-- end:: Aside -->