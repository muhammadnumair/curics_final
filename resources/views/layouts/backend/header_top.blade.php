<!-- begin:: Header -->
<div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed ">
   <!-- begin:: Header Menu -->
   <button class="kt-header-menu-wrapper-close" id="kt_header_menu_mobile_close_btn"><i class="la la-close"></i></button>
   <div class="kt-header-menu-wrapper" id="kt_header_menu_wrapper">
      <div id="kt_header_menu" class="kt-header-menu kt-header-menu-mobile  kt-header-menu--layout-default ">
         <a href="/account/clinics">
         <ul class="kt-menu__nav ">
            @if(session('clinic') != null)
            <li class="kt-menu__item  kt-menu__item--open kt-menu__item--here kt-menu__item--submenu kt-menu__item--rel kt-menu__item--open kt-menu__item--here kt-menu__item--active" data-ktmenu-submenu-toggle="click" aria-haspopup="true">
               <a href="/account/clinics" class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-text">{{session('clinic')->clinic->name}}</span></a>
            </li>
            @endif
         </ul>
         </a>
      </div>
   </div>
   <!-- end:: Header Menu -->
   <!-- begin:: Header Topbar -->
   <div class="kt-header__topbar">
      <!--begin: Notifications -->
      @if(Auth::user()->userrole == "doctor")
      <div class="kt-header__topbar-item dropdown">
         <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="30px,0px" aria-expanded="false">
            <span class="kt-header__topbar-icon kt-pulse kt-pulse--brand">
            <i class="flaticon2-bell-alarm-symbol"></i>
            <span class="kt-pulse__ring"></span>
            <span class="kt-badge kt-badge--danger" style=" position: absolute; right: 3px; top: 14px; "><span id="notifications_count">0</span></span>
            </span>            
            <!--
               Use dot badge instead of animated pulse effect: 
               <span class="kt-badge kt-badge--dot kt-badge--notify kt-badge--sm kt-badge--brand"></span>
               -->
         </div>
         <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-lg" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(55px, 65px, 0px);">
            <form>
               <!--begin: Head -->
               <div class="kt-head kt-head--skin-dark kt-head--fit-x kt-head--fit-b" style="background-image: url(/assets/backend/media/misc/bg-1.jpg)">
                  <h3 class="kt-head__title">
                     Notifications
                     &nbsp;
                     <span class="btn btn-success btn-sm btn-bold btn-font-md"><span id="notifications_count1">0</span> new</span>
                  </h3>
                  <div style=" height: 25px; "></div>
               </div>
               <!--end: Head -->
               <div class="tab-content">
                  <div class="tab-pane active show" id="topbar_notifications_notifications" role="tabpanel">
                     <div class="kt-notification kt-margin-t-10 kt-margin-b-10 kt-scroll ps" data-scroll="true" data-height="300" data-mobile-height="200" style="height: 300px; overflow: hidden;">
                        <div id="notifications_area"></div>
                        <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                           <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                        </div>
                        <div class="ps__rail-y" style="top: 0px; right: 0px;">
                           <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
                        </div>
                     </div>
                  </div>
                  <div class="tab-pane" id="topbar_notifications_events" role="tabpanel">
                     <div class="kt-notification kt-margin-t-10 kt-margin-b-10 kt-scroll ps" data-scroll="true" data-height="300" data-mobile-height="200" style="height: 300px; overflow: hidden;">
                        <a href="#" class="kt-notification__item">
                           <div class="kt-notification__item-icon">
                              <i class="flaticon2-psd kt-font-success"></i>
                           </div>
                           <div class="kt-notification__item-details">
                              <div class="kt-notification__item-title">
                                 New report has been received
                              </div>
                              <div class="kt-notification__item-time">
                                 23 hrs ago
                              </div>
                           </div>
                        </a>
                        <a href="#" class="kt-notification__item">
                           <div class="kt-notification__item-icon">
                              <i class="flaticon-download-1 kt-font-danger"></i>
                           </div>
                           <div class="kt-notification__item-details">
                              <div class="kt-notification__item-title">
                                 Finance report has been generated
                              </div>
                              <div class="kt-notification__item-time">
                                 25 hrs ago
                              </div>
                           </div>
                        </a>
                        <a href="#" class="kt-notification__item">
                           <div class="kt-notification__item-icon">
                              <i class="flaticon2-line-chart kt-font-success"></i>
                           </div>
                           <div class="kt-notification__item-details">
                              <div class="kt-notification__item-title">
                                 New order has been received
                              </div>
                              <div class="kt-notification__item-time">
                                 2 hrs ago
                              </div>
                           </div>
                        </a>
                        <a href="#" class="kt-notification__item">
                           <div class="kt-notification__item-icon">
                              <i class="flaticon2-box-1 kt-font-brand"></i>
                           </div>
                           <div class="kt-notification__item-details">
                              <div class="kt-notification__item-title">
                                 New customer is registered
                              </div>
                              <div class="kt-notification__item-time">
                                 3 hrs ago
                              </div>
                           </div>
                        </a>
                        <a href="#" class="kt-notification__item">
                           <div class="kt-notification__item-icon">
                              <i class="flaticon2-chart2 kt-font-danger"></i>
                           </div>
                           <div class="kt-notification__item-details">
                              <div class="kt-notification__item-title">
                                 Application has been approved
                              </div>
                              <div class="kt-notification__item-time">
                                 3 hrs ago
                              </div>
                           </div>
                        </a>
                        <a href="#" class="kt-notification__item">
                           <div class="kt-notification__item-icon">
                              <i class="flaticon2-image-file kt-font-warning"></i>
                           </div>
                           <div class="kt-notification__item-details">
                              <div class="kt-notification__item-title">
                                 New file has been uploaded
                              </div>
                              <div class="kt-notification__item-time">
                                 5 hrs ago
                              </div>
                           </div>
                        </a>
                        <a href="#" class="kt-notification__item">
                           <div class="kt-notification__item-icon">
                              <i class="flaticon2-drop kt-font-info"></i>
                           </div>
                           <div class="kt-notification__item-details">
                              <div class="kt-notification__item-title">
                                 New user feedback received
                              </div>
                              <div class="kt-notification__item-time">
                                 8 hrs ago
                              </div>
                           </div>
                        </a>
                        <a href="#" class="kt-notification__item">
                           <div class="kt-notification__item-icon">
                              <i class="flaticon2-pie-chart-2 kt-font-success"></i>
                           </div>
                           <div class="kt-notification__item-details">
                              <div class="kt-notification__item-title">
                                 System reboot has been successfully completed
                              </div>
                              <div class="kt-notification__item-time">
                                 12 hrs ago
                              </div>
                           </div>
                        </a>
                        <a href="#" class="kt-notification__item">
                           <div class="kt-notification__item-icon">
                              <i class="flaticon2-favourite kt-font-brand"></i>
                           </div>
                           <div class="kt-notification__item-details">
                              <div class="kt-notification__item-title">
                                 New order has been placed
                              </div>
                              <div class="kt-notification__item-time">
                                 15 hrs ago
                              </div>
                           </div>
                        </a>
                        <a href="#" class="kt-notification__item kt-notification__item--read">
                           <div class="kt-notification__item-icon">
                              <i class="flaticon2-safe kt-font-primary"></i>
                           </div>
                           <div class="kt-notification__item-details">
                              <div class="kt-notification__item-title">
                                 Company meeting canceled
                              </div>
                              <div class="kt-notification__item-time">
                                 19 hrs ago
                              </div>
                           </div>
                        </a>
                        <a href="#" class="kt-notification__item">
                           <div class="kt-notification__item-icon">
                              <i class="flaticon2-psd kt-font-success"></i>
                           </div>
                           <div class="kt-notification__item-details">
                              <div class="kt-notification__item-title">
                                 New report has been received
                              </div>
                              <div class="kt-notification__item-time">
                                 23 hrs ago
                              </div>
                           </div>
                        </a>
                        <a href="#" class="kt-notification__item">
                           <div class="kt-notification__item-icon">
                              <i class="flaticon-download-1 kt-font-danger"></i>
                           </div>
                           <div class="kt-notification__item-details">
                              <div class="kt-notification__item-title">
                                 Finance report has been generated
                              </div>
                              <div class="kt-notification__item-time">
                                 25 hrs ago
                              </div>
                           </div>
                        </a>
                        <a href="#" class="kt-notification__item">
                           <div class="kt-notification__item-icon">
                              <i class="flaticon-security kt-font-warning"></i>
                           </div>
                           <div class="kt-notification__item-details">
                              <div class="kt-notification__item-title">
                                 New customer comment recieved
                              </div>
                              <div class="kt-notification__item-time">
                                 2 days ago
                              </div>
                           </div>
                        </a>
                        <a href="#" class="kt-notification__item">
                           <div class="kt-notification__item-icon">
                              <i class="flaticon2-pie-chart kt-font-success"></i>
                           </div>
                           <div class="kt-notification__item-details">
                              <div class="kt-notification__item-title">
                                 New customer is registered
                              </div>
                              <div class="kt-notification__item-time">
                                 3 days ago
                              </div>
                           </div>
                        </a>
                        <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                           <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                        </div>
                        <div class="ps__rail-y" style="top: 0px; right: 0px;">
                           <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
                        </div>
                     </div>
                  </div>
                  <div class="tab-pane" id="topbar_notifications_logs" role="tabpanel">
                     <div class="kt-grid kt-grid--ver" style="min-height: 200px;">
                        <div class="kt-grid kt-grid--hor kt-grid__item kt-grid__item--fluid kt-grid__item--middle">
                           <div class="kt-grid__item kt-grid__item--middle kt-align-center">
                              All caught up!
                              <br>No new notifications.
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
         </div>
      </div>
      @endif
      <!--end: Notifications --><!--begin: Quick Actions -->
      <div class="kt-header__topbar-item dropdown">
         <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="30px,0px" aria-expanded="false">
            <span class="kt-header__topbar-icon">
            <i class="flaticon2-gear"></i>
            </span>
         </div>
         <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-xl" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(55px, 65px, 0px);">
            <form>
               <!--begin: Head -->
               <div class="kt-head kt-head--skin-dark" style="background-image: url(/assets/backend/media/misc/bg-1.jpg)">
                  <h3 class="kt-head__title">
                     Quick Actions
                  </h3>
               </div>
               <!--end: Head -->
               <!--begin: Grid Nav -->
               <div class="kt-grid-nav kt-grid-nav--skin-light">
                  <div class="kt-grid-nav__row">
                     <a href="/account/hospital/appointment/create" class="kt-grid-nav__item">
                        <span class="kt-grid-nav__icon">
                           <i class="fas fa-stethoscope"></i>
                        </span>
                        <span class="kt-grid-nav__title">Appointment</span>
                        <span class="kt-grid-nav__desc">Make New Appointment</span>
                     </a>
                     <a href="/account/finance/payment/create" class="kt-grid-nav__item">
                        <span class="kt-grid-nav__icon">
                           <i class="fas fa-money-bill-alt"></i>
                        </span>
                        <span class="kt-grid-nav__title">Payment</span>
                        <span class="kt-grid-nav__desc">Add New Payment</span>
                     </a>
                  </div>
                  <div class="kt-grid-nav__row">
                     <a href="/account/expense/create" class="kt-grid-nav__item">
                        <span class="kt-grid-nav__icon">
                           <i class="fas fa-money-check-alt"></i>
                        </span>
                        <span class="kt-grid-nav__title">Expense</span>
                        <span class="kt-grid-nav__desc">Record Expenses</span>
                     </a>
                     <a href="/account/bed/create" class="kt-grid-nav__item">
                        <span class="kt-grid-nav__icon">
                           <i class="fas fa-bed"></i>
                        </span>
                        <span class="kt-grid-nav__title">Bed Allotment</span>
                        <span class="kt-grid-nav__desc">New Allotments</span>
                     </a>
                  </div>
               </div>
               <!--end: Grid Nav -->            
            </form>
         </div>
      </div>
      <!--end: Quick Actions -->
      <!--begin: Quick panel toggler -->
      <div class="kt-header__topbar-item kt-header__topbar-item--user">
         <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="0px,0px" aria-expanded="false">
            <div class="kt-header__topbar-user">
               <span class="kt-header__topbar-welcome kt-hidden-mobile">Hi,</span>
               <span class="kt-header__topbar-username kt-hidden-mobile">{{Auth::user()->name}}</span>
               <img alt="Pic" class="kt-radius-100" src="{{Auth::user() != null && Auth::user()->profile_picture != null ? '/storage/'.Auth::user()->profile_picture : '/storage/nouser.png'}}">
               <!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
               <!--<span class="kt-badge kt-badge--username kt-badge--unified-success kt-badge--lg kt-badge--rounded kt-badge--bold">S</span>-->
            </div>
         </div>
         <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-xl" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(1082px, 65px, 0px);">
            <!--begin: Head -->
            <div class="kt-user-card kt-user-card--skin-dark kt-notification-item-padding-x" style="background-image: url(/assets/backend/media/misc/bg-1.jpg)">
               <div class="kt-user-card__avatar">
                  <img class="kt-hidden" alt="Pic" src="{{Auth::user() != null && Auth::user()->profile_picture != null ? '/storage/'.Auth::user()->profile_picture : '/storage/nouser.png'}}">
                  <!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
               </div>
               <div class="kt-user-card__name">
               <img style="max-width: 50px; margin-right: 10px;" alt="Pic" class="kt-radius-100" src="{{Auth::user() != null && Auth::user()->profile_picture != null ? '/storage/'.Auth::user()->profile_picture : '/storage/nouser.png'}}">
               {{Auth::user()->name}}
               </div>
            </div>
            <!--end: Head -->
            <!--begin: Navigation -->
            <div class="kt-notification">
               @if(Session::get('doctor') != null)
               <a href="/doctor/{{Session::get('doctor')->alias}}" class="kt-notification__item">
                  <div class="kt-notification__item-icon">
                     <i class="flaticon2-calendar-3 kt-font-success"></i>
                  </div>
                  <div class="kt-notification__item-details">
                     <div class="kt-notification__item-title kt-font-bold">
                        View Profile
                     </div>
                     <div class="kt-notification__item-time">
                        Live Profile, How It Looks On Web
                     </div>
                  </div>
               </a>
               
               <a href="/account/settings" class="kt-notification__item">
                  <div class="kt-notification__item-icon">
                     <i class="flaticon2-rocket-1 kt-font-danger"></i>
                  </div>
                  <div class="kt-notification__item-details">
                     <div class="kt-notification__item-title kt-font-bold">
                        Profile Settings
                     </div>
                     <div class="kt-notification__item-time">
                        Account Settings & More
                     </div>
                  </div>
               </a>
               @endif
               <div class="kt-notification__custom kt-space-between">
               <a href="{{URL::to('/')}}/logout" class="btn btn-label-brand btn-sm btn-bold">Sign Out</a>
               </div>
            </div>
            <!--end: Navigation -->
         </div>
      </div>
      <!--end: User Bar -->
   </div>
   <!-- end:: Header Topbar -->
</div>
<!-- end:: Header -->