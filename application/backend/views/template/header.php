 <!--begin::Header-->
 <div id="kt_header" class="header header-fixed ">
 	<!--begin::Container-->
 	<div class=" container-fluid  d-flex align-items-stretch justify-content-between">
 		<!--begin::Header Menu Wrapper-->
 		<div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
			 <!--begin::Header Menu-->
			 <div id="kt_header_menu" class="header-menu header-menu-mobile  header-menu-layout-default ">
				<!--begin::Header Nav-->
				<ul class="menu-nav ">
					<li class="menu-item  menu-item-submenu menu-item-rel menu-item-active">
						<a href="https://www.google.com" class="menu-link" target="_blank"><span class="menu-text">Websites page</span><i class="menu-arrow"></i></a>
					</li>
				</ul>
				<!--end::Header Nav-->
			</div>
			<!--end::Header Menu-->
 		</div>
 		<!--end::Header Menu Wrapper-->

 		<!--begin::Topbar-->
 		<div class="topbar">
 			<!--begin::Notifications-->
 			<div class="dropdown">
 				<!--begin::Toggle-->
 				<div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
 					<div class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1 pulse pulse-primary">
 						<span class="svg-icon svg-icon-xl svg-icon-primary">
							 <!--begin::Svg Icon | path:assets/media/svg/icons/Code/Compiling.svg-->
							 <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
								<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
									<path d="M17,12 L18.5,12 C19.3284271,12 20,12.6715729 20,13.5 C20,14.3284271 19.3284271,15 18.5,15 L5.5,15 C4.67157288,15 4,14.3284271 4,13.5 C4,12.6715729 4.67157288,12 5.5,12 L7,12 L7.5582739,6.97553494 C7.80974924,4.71225688 9.72279394,3 12,3 C14.2772061,3 16.1902508,4.71225688 16.4417261,6.97553494 L17,12 Z" fill="#000000"/>
									<rect fill="#000000" opacity="0.3" x="10" y="16" width="4" height="4" rx="2"/>
								</g>
 							</svg>
							 <!--end::Svg Icon-->
						</span> 
						<span class="pulse-ring"></span>
 					</div>
 				</div>
 				<!--end::Toggle-->

 				<!--begin::Dropdown-->
 				<div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg">
 					<form>
 						<!--begin::Header-->
 						<div class="d-flex flex-column pt-5 bgi-size-cover bgi-no-repeat rounded-top" style="background-image: url(<?= asset('admin/media/misc/bg-1.jpg') ?>)">
 							<!--begin::Title-->
 							<h4 class="d-flex flex-center rounded-top">
 								<span class="text-white">User Notifications</span>
 								<span class="btn btn-text btn-success btn-sm font-weight-bold btn-font-md ml-2">23 new</span>
 							</h4>
 							<!--end::Title-->
 						</div>
 						<!--end::Header-->

 						<!--begin::Content-->
 						<div class="tab-content p-0 m-0">

 							<!--begin::Tabpane-->
 							<div class="tab-pane active show" id="topbar_notifications_notifications" role="tabpanel">
 								<!--begin::Nav-->
 								<div class="navi navi-hover scroll my-4" data-scroll="true" data-height="250" data-mobile-height="200">
 									<!--begin::Item-->
 									<a href="#" class="navi-item">
 										<div class="navi-link">
 											<div class="navi-icon mr-2">
 												<i class="flaticon2-pie-chart-3 text-warning"></i>
 											</div>
 											<div class="navinavinavi-text">
 												<div class="font-weight-bold">
 													New file has been uploaded
 												</div>
 												<div class="text-muted">
 													5 hrs ago
 												</div>
 											</div>
 										</div>
 									</a>
 									<!--end::Item-->

 									<!--begin::Item-->
 									<a href="#" class="navi-item">
 										<div class="navi-link">
 											<div class="navi-icon mr-2">
 												<i class="flaticon-pie-chart-1 text-info"></i>
 											</div>
 											<div class="navi-text">
 												<div class="font-weight-bold">
 													New user feedback received
 												</div>
 												<div class="text-muted">
 													8 hrs ago
 												</div>
 											</div>
 										</div>
 									</a>
 									<!--end::Item-->

 									<!--begin::Item-->
 									<a href="#" class="navi-item">
 										<div class="navi-link">
 											<div class="navi-icon mr-2">
 												<i class="flaticon2-settings text-success"></i>
 											</div>
 											<div class="navi-text">
 												<div class="font-weight-bold">
 													System reboot has been successfully completed
 												</div>
 												<div class="text-muted">
 													12 hrs ago
 												</div>
 											</div>
 										</div>
 									</a>
									 <!--end::Item-->
									 <!--begin::Action-->
									<div class="d-flex flex-center pt-3">
										 <a href="#" class="btn btn-light-primary font-weight-bold text-center">See All</a>
									</div>
									<!--end::Action-->
 								</div>
 								<!--end::Nav-->
 							</div>
 							<!--end::Tabpane-->
 						</div>
 						<!--end::Content-->
 					</form>
 				</div>
 				<!--end::Dropdown-->
 			</div>
 			<!--end::Notifications-->

 			<!--begin::User-->
 			<div class="topbar-item">
 				<div class="btn btn-icon btn-icon-mobile w-auto btn-clean d-flex align-items-center btn-lg px-2"
 					id="kt_quick_user_toggle">
 					<span class="text-muted font-weight-bold font-size-base d-none d-md-inline mr-1">Hi,</span>
 					<span class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3"><?= $this->userData->nama ?></span>
 					<span class="symbol symbol-lg-35 symbol-25 symbol-light-success">
 						<span class="symbol-label font-size-h5 font-weight-bold"><?= strtoupper(substr($this->userData->nama, 0, 1)) ?></span>
 					</span>
 				</div>
 			</div>
 			<!--end::User-->
 		</div>
 		<!--end::Topbar-->
 	</div>
 	<!--end::Container-->
 </div>
 <!--end::Header-->
