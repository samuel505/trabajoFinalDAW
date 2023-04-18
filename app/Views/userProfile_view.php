

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>CloudBOX | Responsive Bootstrap 4 Admin Dashboard Template</title>
      
      <!-- Favicon -->
      <link rel="shortcut icon" href="../assets/images/favicon.ico" />
      
      <link rel="stylesheet" href="../assets/css/backend-plugin.min.css">
      <link rel="stylesheet" href="../assets/css/backend.css?v=1.0.0">
      
      <link rel="stylesheet" href="../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">
      <link rel="stylesheet" href="../assets/vendor/line-awesome/dist/line-awesome/css/line-awesome.min.css">
      <link rel="stylesheet" href="../assets/vendor/remixicon/fonts/remixicon.css">
      
      <!-- Viewer Plugin -->
        <!--PDF-->
        <link rel="stylesheet" href="../assets/vendor/doc-viewer/include/pdf/pdf.viewer.css">
        <!--Docs-->
        <!--PPTX-->
        <link rel="stylesheet" href="../assets/vendor/doc-viewer/include/PPTXjs/css/pptxjs.css">
        <link rel="stylesheet" href="../assets/vendor/doc-viewer/include/PPTXjs/css/nv.d3.min.css">
        <!--All Spreadsheet -->
        <link rel="stylesheet" href="../assets/vendor/doc-viewer/include/SheetJS/handsontable.full.min.css">
        <!--Image viewer-->
        <link rel="stylesheet" href="../assets/vendor/doc-viewer/include/verySimpleImageViewer/css/jquery.verySimpleImageViewer.css">
        <!--officeToHtml-->
        <link rel="stylesheet" href="../assets/vendor/doc-viewer/include/officeToHtml/officeToHtml.css">  </head>
  <body class="  ">
    <!-- loader Start -->
    <div id="loading">
          <div id="loading-center">
          </div>
    </div>
    <!-- loader END -->
    <!-- Wrapper Start -->
    <div class="wrapper">
      
      <div class="iq-sidebar  sidebar-default ">
          <div class="iq-sidebar-logo d-flex align-items-center justify-content-between">
              <a href="index.html" class="header-logo">
                  <img src="../assets/images/logo.png" class="img-fluid rounded-normal light-logo" alt="logo">
               </a>
              <div class="iq-menu-bt-sidebar">
                  <i class="las la-bars wrapper-menu"></i>
              </div>
          </div>
          <div class="data-scrollbar" data-scroll="1">
              <div class="new-create select-dropdown input-prepend input-append">
                  <div class="btn-group">
                      <div data-toggle="dropdown">
                      <div class="search-query selet-caption"><i class="las la-plus pr-2"></i>Create New</div><span class="search-replace"></span>
                      <span class="caret"><!--icon--></span>
                      </div>
                      <ul class="dropdown-menu">
                          <li><div class="item"><i class="ri-folder-add-line pr-3"></i>New Folder</div></li>
                          <li><div class="item"><i class="ri-file-upload-line pr-3"></i>Upload Files</div></li>
                          <li><div class="item"><i class="ri-folder-upload-line pr-3"></i>Upload Folders</div></li>
                      </ul>
                  </div>
              </div>
              <nav class="iq-sidebar-menu">
                  <ul id="iq-sidebar-toggle" class="iq-menu">
                       <li class=" ">
                              <a href="../backend/index.html" class="">
                                  <i class="las la-home iq-arrow-left"></i><span>Dashboard</span>
                              </a>
                          <ul id="dashboard" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                          </ul>
                       </li>
                       <li class=" ">
                          <a href="#mydrive" class="collapsed" data-toggle="collapse" aria-expanded="false">
                              <i class="las la-hdd"></i><span>My Drive</span>
                              <i class="las la-angle-right iq-arrow-right arrow-active"></i>
                              <i class="las la-angle-down iq-arrow-right arrow-hover"></i>
                          </a>
                          <ul id="mydrive" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                                  <li class=" ">
                                          <a href="../backend/page-alexa.html">
                                              <i class="lab la-blogger-b"></i><span>Alexa Workshop</span>
                                          </a>
                                  </li>
                                  <li class=" ">
                                          <a href="../backend/page-android.html">
                                              <i class="las la-share-alt"></i><span>Android</span>
                                          </a>
                                  </li>
                                  <li class=" ">
                                          <a href="../backend/page-brightspot.html">
                                              <i class="las la-icons"></i><span>Brightspot</span>
                                          </a>
                                  </li>
                                  <li class=" ">
                                          <a href="../backend/page-ionic.html">
                                              <i class="las la-icons"></i><span>Ionic Chat App</span>
                                          </a>
                                  </li>
                          </ul>
                       </li>
                       <li class=" ">
                              <a href="../backend/page-files.html" class="">
                                  <i class="lar la-file-alt iq-arrow-left"></i><span>Files</span>
                              </a>
                          <ul id="page-files" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                          </ul>
                       </li>
                       <li class=" ">
                              <a href="../backend/page-folders.html" class="">
                                  <i class="las la-stopwatch iq-arrow-left"></i><span>Recent</span>
                              </a>
                          <ul id="page-folders" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                          </ul>
                       </li>
                       <li class=" ">
                              <a href="../backend/page-favourite.html" class="">
                                  <i class="lar la-star"></i><span>Favourite</span>
                              </a>
                          <ul id="page-fevourite" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                          </ul>
                       </li>
                       <li class=" ">
                              <a href="../backend/page-delete.html" class="">
                                  <i class="las la-trash-alt iq-arrow-left"></i><span>Trash</span>
                              </a>
                          <ul id="page-delete" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                          </ul>
                       </li>
                       <li class=" ">
                          <a href="#otherpage" class="collapsed" data-toggle="collapse" aria-expanded="false">
                              <i class="lab la-wpforms iq-arrow-left"></i><span>other page</span>
                              <i class="las la-angle-right iq-arrow-right arrow-active"></i>
                              <i class="las la-angle-down iq-arrow-right arrow-hover"></i>
                          </a>
                          <ul id="otherpage" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                                  <li class=" ">
                                      <a href="#user" class="collapsed" data-toggle="collapse" aria-expanded="false">
                                          <i class="las la-user-cog"></i><span>User Details</span>
                                          <i class="las la-angle-right iq-arrow-right arrow-active"></i>
                                          <i class="las la-angle-down iq-arrow-right arrow-hover"></i>
                                      </a>
                                      <ul id="user" class="iq-submenu collapse" data-parent="#otherpage">
                                              <li class=" ">
                                                  <a href="../app/user-profile.html">
                                                      <i class="las la-id-card"></i><span>User Profile</span>
                                                  </a>
                                              </li>
                                              <li class=" ">
                                                  <a href="../app/user-add.html">
                                                      <i class="las la-user-plus"></i><span>User Add</span>
                                                  </a>
                                              </li>
                                              <li class=" ">
                                                  <a href="../app/user-list.html">
                                                      <i class="las la-list-alt"></i><span>User List</span>
                                                  </a>
                                              </li>
                                      </ul>
                                  </li>
                                  <li class=" ">
                                      <a href="#ui" class="collapsed" data-toggle="collapse" aria-expanded="false">
                                          <i class="lab la-uikit iq-arrow-left"></i><span>UI Elements</span>
                                          <i class="las la-angle-right iq-arrow-right arrow-active"></i>
                                          <i class="las la-angle-down iq-arrow-right arrow-hover"></i>
                                      </a>
                                      <ul id="ui" class="iq-submenu collapse" data-parent="#otherpage">
                                              <li class=" ">
                                                  <a href="../backend/ui-avatars.html">
                                                      <i class="las la-user-tie"></i><span>Avatars</span>
                                                  </a>
                                              </li>
                                              <li class=" ">
                                                  <a href="../backend/ui-alerts.html">
                                                      <i class="las la-exclamation-triangle"></i><span>Alerts</span>
                                                  </a>
                                              </li>
                                              <li class=" ">
                                                  <a href="../backend/ui-badges.html">
                                                      <i class="las la-id-badge"></i><span>Badges</span>
                                                  </a>
                                              </li>
                                              <li class=" ">
                                                  <a href="../backend/ui-breadcrumb.html">
                                                      <i class="las la-ellipsis-h"></i><span>Breadcrumb</span>
                                                  </a>
                                              </li>
                                              <li class=" ">
                                                  <a href="../backend/ui-buttons.html">
                                                      <i class="las la-ticket-alt"></i><span>Buttons</span>
                                                  </a>
                                              </li>
                                              <li class=" ">
                                                  <a href="../backend/ui-buttons-group.html">
                                                      <i class="las la-object-group"></i><span>Buttons Group</span>
                                                  </a>
                                              </li>
                                              <li class=" ">
                                                  <a href="../backend/ui-boxshadow.html">
                                                      <i class="las la-boxes"></i><span>Box Shadow</span>
                                                  </a>
                                              </li>
                                              <li class=" ">
                                                  <a href="../backend/ui-colors.html">
                                                      <i class="las la-brush"></i><span>Colors</span>
                                                  </a>
                                              </li>
                                              <li class=" ">
                                                  <a href="../backend/ui-cards.html">
                                                      <i class="las la-credit-card"></i><span>Cards</span>
                                                  </a>
                                              </li>
                                              <li class=" ">
                                                  <a href="../backend/ui-carousel.html">
                                                      <i class="las la-sliders-h"></i><span>Carousel</span>
                                                  </a>
                                              </li>
                                              <li class=" ">
                                                  <a href="../backend/ui-grid.html">
                                                      <i class="las la-th-large"></i><span>Grid</span>
                                                  </a>
                                              </li>
                                              <li class=" ">
                                                  <a href="../backend/ui-helper-classes.html">
                                                      <i class="las la-hands-helping"></i><span>Helper classes</span>
                                                  </a>
                                              </li>
                                              <li class=" ">
                                                  <a href="../backend/ui-images.html">
                                                      <i class="las la-image"></i><span>Images</span>
                                                  </a>
                                              </li>
                                              <li class=" ">
                                                  <a href="../backend/ui-list-group.html">
                                                      <i class="las la-list-alt"></i><span>list Group</span>
                                                  </a>
                                              </li>
                                              <li class=" ">
                                                  <a href="../backend/ui-media-object.html">
                                                      <i class="las la-photo-video"></i><span>Media</span>
                                                  </a>
                                              </li>
                                              <li class=" ">
                                                  <a href="../backend/ui-modal.html">
                                                      <i class="las la-columns"></i><span>Modal</span>
                                                  </a>
                                              </li>
                                              <li class=" ">
                                                  <a href="../backend/ui-notifications.html">
                                                      <i class="las la-bell"></i><span>Notifications</span>
                                                  </a>
                                              </li>
                                              <li class=" ">
                                                  <a href="../backend/ui-pagination.html">
                                                      <i class="las la-ellipsis-h"></i><span>Pagination</span>
                                                  </a>
                                              </li>
                                              <li class=" ">
                                                  <a href="../backend/ui-popovers.html">
                                                      <i class="las la-spinner"></i><span>Popovers</span>
                                                  </a>
                                              </li>
                                              <li class=" ">
                                                  <a href="../backend/ui-progressbars.html">
                                                      <i class="las la-heading"></i><span>Progressbars</span>
                                                  </a>
                                              </li>
                                              <li class=" ">
                                                  <a href="../backend/ui-typography.html">
                                                      <i class="las la-tablet"></i><span>Typography</span>
                                                  </a>
                                              </li>
                                              <li class=" ">
                                                  <a href="../backend/ui-tabs.html">
                                                      <i class="las la-tablet"></i><span>Tabs</span>
                                                  </a>
                                              </li>
                                              <li class=" ">
                                                  <a href="../backend/ui-tooltips.html">
                                                      <i class="las la-magnet"></i><span>Tooltips</span>
                                                  </a>
                                              </li>
                                              <li class=" ">
                                                  <a href="../backend/ui-embed-video.html">
                                                      <i class="las la-play-circle"></i><span>Video</span>
                                                  </a>
                                              </li>
                                      </ul>
                                  </li>
                                  <li class=" ">
                                      <a href="#auth" class="collapsed" data-toggle="collapse" aria-expanded="false">
                                          <i class="las la-torah iq-arrow-left"></i><span>Authentication</span>
                                          <i class="las la-angle-right iq-arrow-right arrow-active"></i>
                                          <i class="las la-angle-down iq-arrow-right arrow-hover"></i>
                                      </a>
                                      <ul id="auth" class="iq-submenu collapse" data-parent="#otherpage">
                                              <li class=" ">
                                                  <a href="../backend/auth-sign-in.html">
                                                      <i class="las la-sign-in-alt"></i><span>Login</span>
                                                  </a>
                                              </li>
                                              <li class=" ">
                                                  <a href="../backend/auth-sign-up.html">
                                                      <i class="las la-registered"></i><span>Register</span>
                                                  </a>
                                              </li>
                                              <li class=" ">
                                                  <a href="../backend/auth-recoverpw.html">
                                                      <i class="las la-unlock-alt"></i><span>Recover Password</span>
                                                  </a>
                                              </li>
                                              <li class=" ">
                                                  <a href="../backend/auth-confirm-mail.html">
                                                      <i class="las la-envelope-square"></i><span>Confirm Mail</span>
                                                  </a>
                                              </li>
                                              <li class=" ">
                                                  <a href="../backend/auth-lock-screen.html">
                                                      <i class="las la-lock"></i><span>Lock Screen</span>
                                                  </a>
                                              </li>
                                      </ul>
                                  </li>
                                  <li class=" ">
                                      <a href="#pricing" class="collapsed" data-toggle="collapse" aria-expanded="false">
                                          <i class="las la-coins"></i><span>Pricing</span>
                                          <i class="las la-angle-right iq-arrow-right arrow-active"></i>
                                          <i class="las la-angle-down iq-arrow-right arrow-hover"></i>
                                      </a>
                                      <ul id="pricing" class="iq-submenu collapse" data-parent="#otherpage">
                                              <li class=" ">
                                                  <a href="../backend/pricing.html">
                                                      <i class="las la-weight"></i><span>Pricing 1</span>
                                                  </a>
                                              </li>
                                              <li class=" ">
                                                  <a href="../backend/pricing-2.html">
                                                      <i class="las la-dna"></i><span>Pricing 2</span>
                                                  </a>
                                              </li>
                                      </ul>
                                  </li>
                                  <li class=" ">
                                      <a href="#pages-error" class="collapsed" data-toggle="collapse" aria-expanded="false">
                                          <i class="las la-exclamation-triangle"></i><span>Error</span>
                                          <i class="las la-angle-right iq-arrow-right arrow-active"></i>
                                          <i class="las la-angle-down iq-arrow-right arrow-hover"></i>
                                      </a>
                                      <ul id="pages-error" class="iq-submenu collapse" data-parent="#otherpage">
                                              <li class=" ">
                                                  <a href="../backend/pages-error.html">
                                                      <i class="las la-bomb"></i><span>Error 404</span>
                                                  </a>
                                              </li>
                                              <li class=" ">
                                                  <a href="../backend/pages-error-500.html">
                                                      <i class="las la-exclamation-circle"></i><span>Error 500</span>
                                                  </a>
                                              </li>
                                      </ul>
                                  </li>
                                  <li class=" ">
                                          <a href="../backend/pages-blank-page.html">
                                              <i class="las la-pager"></i><span>Blank Page</span>
                                          </a>
                                  </li>
                                  <li class=" ">
                                          <a href="../backend/pages-maintenance.html">
                                              <i class="las la-cubes"></i><span>Maintenance</span>
                                          </a>
                                  </li>
                          </ul>
                       </li>
                  </ul>
              </nav>
              <div class="sidebar-bottom">
                  <h4 class="mb-3"><i class="las la-cloud mr-2"></i>Storage</h4>
                  <p>17.1 / 20 GB Used</p>
                  <div class="iq-progress-bar mb-3">
                      <span class="bg-primary iq-progress progress-1" data-percent="67">
                      </span>
                  </div>
                  <p>75% Full - 3.9 GB Free</p>
                  <a href="#" class="btn btn-outline-primary view-more mt-4">Buy Storage</a>
              </div>
              <div class="p-3"></div>
          </div>
          </div>       <div class="iq-top-navbar">
          <div class="iq-navbar-custom">
              <nav class="navbar navbar-expand-lg navbar-light p-0">
              <div class="iq-navbar-logo d-flex align-items-center justify-content-between">
                  <i class="ri-menu-line wrapper-menu"></i>
                  <a href="index.html" class="header-logo">
                      <img src="../assets/images/logo.png" class="img-fluid rounded-normal light-logo" alt="logo">
                      <img src="../assets/images/logo-white.png" class="img-fluid rounded-normal darkmode-logo" alt="logo">
                  </a>
              </div>
                  <div class="iq-search-bar device-search">
                      
                      <form>
                          <div class="input-prepend input-append">
                              <div class="btn-group">
                                  <label class="dropdown-toggle searchbox" data-toggle="dropdown">
                                  <input class="dropdown-toggle search-query text search-input" type="text"  placeholder="Type here to search..."><span class="search-replace"></span>
                                  <a class="search-link" href="#"><i class="ri-search-line"></i></a>
                                  <span class="caret"><!--icon--></span>
                                  </label>
                                  <ul class="dropdown-menu">
                                      <li><a href="#"><div class="item"><i class="far fa-file-pdf bg-info"></i>PDFs</div></a></li>
                                      <li><a href="#"><div class="item"><i class="far fa-file-alt bg-primary"></i>Documents</div></a></li>
                                      <li><a href="#"><div class="item"><i class="far fa-file-excel bg-success"></i>Spreadsheet</div></a></li>
                                      <li><a href="#"><div class="item"><i class="far fa-file-powerpoint bg-danger"></i>Presentation</div></a></li>
                                      <li><a href="#"><div class="item"><i class="far fa-file-image bg-warning"></i>Photos & Images</div></a></li>
                                      <li><a href="#"><div class="item"><i class="far fa-file-video bg-info"></i>Videos</div></a></li>
                                  </ul>
                              </div>
                          </div>
                      </form>
                  </div>
      
                  <div class="d-flex align-items-center">
                      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"  aria-label="Toggle navigation">
                      <i class="ri-menu-3-line"></i>
                      </button>
                      <div class="collapse navbar-collapse" id="navbarSupportedContent">
                          <ul class="navbar-nav ml-auto navbar-list align-items-center">
                          <li class="nav-item nav-icon search-content">
                              <a href="#" class="search-toggle rounded" id="dropdownSearch" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <i class="ri-search-line"></i>
                              </a>
                              <div class="iq-search-bar iq-sub-dropdown dropdown-menu" aria-labelledby="dropdownSearch">
                                  <form action="#" class="searchbox p-2">
                                      <div class="form-group mb-0 position-relative">
                                      <input type="text" class="text search-input font-size-12" placeholder="type here to search...">
                                      <a href="#" class="search-link"><i class="las la-search"></i></a> 
                                      </div>
                                  </form>
                              </div>
                          </li> 
                          <li class="nav-item nav-icon dropdown">
                              <a href="#" class="search-toggle dropdown-toggle" id="dropdownMenuButton01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="ri-question-line"></i>
                              </a>
                              <div class="iq-sub-dropdown dropdown-menu" aria-labelledby="dropdownMenuButton01">
                                  <div class="card shadow-none m-0">
                                      <div class="card-body p-0 ">
                                          <div class="p-3">
                                              <a href="#" class="iq-sub-card pt-0"><i class="ri-questionnaire-line"></i>Help</a>
                                              <a href="#" class="iq-sub-card"><i class="ri-recycle-line"></i>Training</a>
                                              <a href="#" class="iq-sub-card"><i class="ri-refresh-line"></i>Updates</a>
                                              <a href="#" class="iq-sub-card"><i class="ri-service-line"></i>Terms and Policy</a>
                                              <a href="#" class="iq-sub-card"><i class="ri-feedback-line"></i>Send Feedback</a>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </li>
                          <li class="nav-item nav-icon dropdown"> 
                              <a href="#" class="search-toggle dropdown-toggle" id="dropdownMenuButton02" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                              <i class="ri-settings-3-line"></i>
                              </a>
                              <div class="iq-sub-dropdown dropdown-menu" aria-labelledby="dropdownMenuButton02">
                                  <div class="card shadow-none m-0">
                                      <div class="card-body p-0 ">
                                          <div class="p-3">
                                              <a href="#" class="iq-sub-card pt-0"><i class="ri-settings-3-line"></i> Settings</a>
                                              <a href="#" class="iq-sub-card"><i class="ri-hard-drive-line"></i> Get Drive for desktop</a>
                                              <a href="#" class="iq-sub-card"><i class="ri-keyboard-line"></i> Keyboard Shortcuts</a>
                                          </div>                                
                                      </div>
                                  </div>
                              </div>
                          </li>
                          <li class="nav-item nav-icon dropdown caption-content">
                              <a href="#" class="search-toggle dropdown-toggle" id="dropdownMenuButton03" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                  <div class="caption bg-primary line-height">P</div>
                              </a>
                              <div class="iq-sub-dropdown dropdown-menu" aria-labelledby="dropdownMenuButton03">
                                  <div class="card mb-0">
                                      <div class="card-header d-flex justify-content-between align-items-center mb-0">
                                      <div class="header-title">
                                          <h4 class="card-title mb-0">Profile</h4>
                                      </div>
                                      <div class="close-data text-right badge badge-primary cursor-pointer "><i class="ri-close-fill"></i></div>
                                      </div>
                                      <div class="card-body">
                                          <div class="profile-header">
                                              <div class="cover-container text-center">
                                                  <div class="rounded-circle profile-icon bg-primary mx-auto d-block">
                                                      P                                                    
                                                      <a href="">
                                                          
                                                      </a>
                                                  </div>
                                                  <div class="profile-detail mt-3">
                                                  <h5><a href="../app/user-profile-edit.html">Panny Marco</a></h5>
                                                  <p>pannymarco@gmail.com</p>
                                                  </div>
                                                  <a href="auth-sign-in.html" class="btn btn-primary">Sign Out</a>
                                              </div>
                                              <div class="profile-details mt-4 pt-4 border-top">
                                                  <div class="media align-items-center mb-3">
                                                      <div class="rounded-circle iq-card-icon-small bg-primary">
                                                          A
                                                      </div>
                                                      <div class="media-body ml-3">
                                                          <div class="media justify-content-between">
                                                              <h6 class="mb-0">Anna Mull</h6>
                                                              <p class="mb-0 font-size-12"><i>Signed Out</i></p>
                                                          </div>
                                                          <p class="mb-0 font-size-12">annamull@gmail.com</p>
                                                      </div>                                                 
                                                  </div>
                                                  <div class="media align-items-center mb-3">
                                                      <div class="rounded-circle iq-card-icon-small bg-success">
                                                          K
                                                      </div>
                                                      <div class="media-body ml-3">
                                                          <div class="media justify-content-between">
                                                              <h6 class="mb-0">King Poilin</h6>
                                                              <p class="mb-0 font-size-12"><i>Signed Out</i></p>
                                                          </div>
                                                          <p class="mb-0 font-size-12">kingpoilin@gmail.com</p>
                                                      </div>
                                                  </div>
                                                  <div class="media align-items-center">
                                                      <div class="rounded-circle iq-card-icon-small bg-danger">
                                                          D
                                                      </div>
                                                      <div class="media-body ml-3">
                                                          <div class="media justify-content-between">
                                                              <h6 class="mb-0">Devid Worner</h6>
                                                              <p class="mb-0 font-size-12"><i>Signed Out</i></p>
                                                          </div>
                                                          <p class="mb-0 font-size-12">devidworner@gmail.com</p>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </li>
                          </ul>                     
                      </div> 
                  </div>
              </nav>
          </div>
      </div>
      <div class="content-page">
      <div class="container-fluid">
         <div class="row">
            <div class="col-lg-12">
               <div class="card">
                  <div class="card-body p-0">
                     <div class="iq-edit-list usr-edit">
                        <ul class="iq-edit-profile d-flex nav nav-pills">
                           <li class="col-md-3 p-0">
                              <a class="nav-link active" data-toggle="pill" href="#personal-information">
                              Personal Information
                              </a>
                           </li>
                           <li class="col-md-3 p-0">
                              <a class="nav-link" data-toggle="pill" href="#chang-pwd">
                              Change Password
                              </a>
                           </li>
                           <li class="col-md-3 p-0">
                              <a class="nav-link" data-toggle="pill" href="#emailandsms">
                              Email and SMS
                              </a>
                           </li>
                           <li class="col-md-3 p-0">
                              <a class="nav-link" data-toggle="pill" href="#manage-contact">
                              Manage Contact
                              </a>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-lg-12">
               <div class="iq-edit-list-data">
                  <div class="tab-content">
                     <div class="tab-pane fade active show" id="personal-information" role="tabpanel">
                        <div class="card">
                           <div class="card-header d-flex justify-content-between">
                              <div class="iq-header-title">
                                 <h4 class="card-title">Personal Information</h4>
                              </div>
                           </div>
                           <div class="card-body">
                              <form>
                                 <div class="form-group row align-items-center">
                                    <div class="col-md-12">
                                       <div class="profile-img-edit">
                                          <div class="crm-profile-img-edit">
                                             <img class="crm-profile-pic rounded-circle avatar-100" src="../assets/images/user/11.png" alt="profile-pic">
                                             <div class="crm-p-image bg-primary">
                                                <i class="las la-pen upload-button"></i>
                                                <input class="file-upload" type="file" accept="image/*">
                                             </div>
                                          </div>                                          
                                       </div>
                                    </div>
                                 </div>
                                 <div class=" row align-items-center">
                                    <div class="form-group col-sm-6">
                                       <label for="fname">First Name:</label>
                                       <input type="text" class="form-control" id="fname" value="Barry">
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="lname">Last Name:</label>
                                       <input type="text" class="form-control" id="lname" value="Tech">
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="uname">User Name:</label>
                                       <input type="text" class="form-control" id="uname" value="Barry@01">
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="cname">City:</label>
                                       <input type="text" class="form-control" id="cname" value="Atlanta">
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label class="d-block">Gender:</label>
                                       <div class="custom-control custom-radio custom-control-inline">
                                          <input type="radio" id="customRadio6" name="customRadio1" class="custom-control-input" checked="">
                                          <label class="custom-control-label" for="customRadio6"> Male </label>
                                       </div>
                                       <div class="custom-control custom-radio custom-control-inline">
                                          <input type="radio" id="customRadio7" name="customRadio1" class="custom-control-input">
                                          <label class="custom-control-label" for="customRadio7"> Female </label>
                                       </div>
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="dob">Date Of Birth:</label>
                                       <input  class="form-control" id="dob" value="1984-01-24">
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label>Marital Status:</label>
                                       <select class="form-control" id="exampleFormControlSelect1">
                                          <option selected="">Single</option>
                                          <option>Married</option>
                                          <option>Widowed</option>
                                          <option>Divorced</option>
                                          <option>Separated </option>
                                       </select>
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label>Age:</label>
                                       <select class="form-control" id="exampleFormControlSelect2">
                                          <option>12-18</option>
                                          <option>19-32</option>
                                          <option selected="">33-45</option>
                                          <option>46-62</option>
                                          <option>63 > </option>
                                       </select>
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label>Country:</label>
                                       <select class="form-control" id="exampleFormControlSelect3">
                                          <option>Caneda</option>
                                          <option>Noida</option>
                                          <option selected="">USA</option>
                                          <option>India</option>
                                          <option>Africa</option>
                                       </select>
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label>State:</label>
                                       <select class="form-control" id="exampleFormControlSelect4">
                                          <option>California</option>
                                          <option>Florida</option>
                                          <option selected="">Georgia</option>
                                          <option>Connecticut</option>
                                          <option>Louisiana</option>
                                       </select>
                                    </div>
                                    <div class="form-group col-sm-12">
                                       <label>Address:</label>
                                       <textarea class="form-control" name="address" rows="5" style="line-height: 22px;">
                                       37 Cardinal Lane
                                       Petersburg, VA 23803
                                       United States of America
                                       Zip Code: 85001
                                       </textarea>
                                    </div>
                                 </div>
                                 <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                 <button type="reset" class="btn iq-bg-danger">Cancel</button>
                              </form>
                           </div>
                        </div>
                     </div>
                     <div class="tab-pane fade" id="chang-pwd" role="tabpanel">
                        <div class="card">
                           <div class="card-header d-flex justify-content-between">
                              <div class="iq-header-title">
                                 <h4 class="card-title">Change Password</h4>
                              </div>
                           </div>
                           <div class="card-body">
                              <form>
                                 <div class="form-group">
                                    <label for="cpass">Current Password:</label>
                                    <a href="javascripe:void();" class="float-right">Forgot Password</a>
                                    <input type="Password" class="form-control" id="cpass" value="">
                                 </div>
                                 <div class="form-group">
                                    <label for="npass">New Password:</label>
                                    <input type="Password" class="form-control" id="npass" value="">
                                 </div>
                                 <div class="form-group">
                                    <label for="vpass">Verify Password:</label>
                                    <input type="Password" class="form-control" id="vpass" value="">
                                 </div>
                                 <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                 <button type="reset" class="btn iq-bg-danger">Cancel</button>
                              </form>
                           </div>
                        </div>
                     </div>
                     <div class="tab-pane fade" id="emailandsms" role="tabpanel">
                        <div class="card">
                           <div class="card-header d-flex justify-content-between">
                              <div class="iq-header-title">
                                 <h4 class="card-title">Email and SMS</h4>
                              </div>
                           </div>
                           <div class="card-body">
                              <form>
                                 <div class="form-group row align-items-center">
                                    <label class="col-md-3" for="emailnotification">Email Notification:</label>
                                    <div class="col-md-9 custom-control custom-switch">
                                       <input type="checkbox" class="custom-control-input" id="emailnotification" checked="">
                                       <label class="custom-control-label" for="emailnotification"></label>
                                    </div>
                                 </div>
                                 <div class="form-group row align-items-center">
                                    <label class="col-md-3" for="smsnotification">SMS Notification:</label>
                                    <div class="col-md-9 custom-control custom-switch">
                                       <input type="checkbox" class="custom-control-input" id="smsnotification" checked="">
                                       <label class="custom-control-label" for="smsnotification"></label>
                                    </div>
                                 </div>
                                 <div class="form-group row align-items-center">
                                    <label class="col-md-3" for="npass">When To Email</label>
                                    <div class="col-md-9">
                                       <div class="custom-control custom-checkbox">
                                          <input type="checkbox" class="custom-control-input" id="email01">
                                          <label class="custom-control-label" for="email01">You have new notifications.</label>
                                       </div>
                                       <div class="custom-control custom-checkbox">
                                          <input type="checkbox" class="custom-control-input" id="email02">
                                          <label class="custom-control-label" for="email02">You're sent a direct message</label>
                                       </div>
                                       <div class="custom-control custom-checkbox">
                                          <input type="checkbox" class="custom-control-input" id="email03" checked="">
                                          <label class="custom-control-label" for="email03">Someone adds you as a connection</label>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="form-group row align-items-center">
                                    <label class="col-md-3" for="npass">When To Escalate Emails</label>
                                    <div class="col-md-9">
                                       <div class="custom-control custom-checkbox">
                                          <input type="checkbox" class="custom-control-input" id="email04">
                                          <label class="custom-control-label" for="email04"> Upon new order.</label>
                                       </div>
                                       <div class="custom-control custom-checkbox">
                                          <input type="checkbox" class="custom-control-input" id="email05">
                                          <label class="custom-control-label" for="email05"> New membership approval</label>
                                       </div>
                                       <div class="custom-control custom-checkbox">
                                          <input type="checkbox" class="custom-control-input" id="email06" checked="">
                                          <label class="custom-control-label" for="email06"> Member registration</label>
                                       </div>
                                    </div>
                                 </div>
                                 <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                 <button type="reset" class="btn iq-bg-danger">Cancel</button>
                              </form>
                           </div>
                        </div>
                     </div>
                     <div class="tab-pane fade" id="manage-contact" role="tabpanel">
                        <div class="card">
                           <div class="card-header d-flex justify-content-between">
                              <div class="iq-header-title">
                                 <h4 class="card-title">Manage Contact</h4>
                              </div>
                           </div>
                           <div class="card-body">
                              <form>
                                 <div class="form-group">
                                    <label for="cno">Contact Number:</label>
                                    <input type="text" class="form-control" id="cno" value="001 2536 123 458">
                                 </div>
                                 <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="text" class="form-control" id="email" value="Barryjone@demo.com">
                                 </div>
                                 <div class="form-group">
                                    <label for="url">Url:</label>
                                    <input type="text" class="form-control" id="url" value="https://getbootstrap.com">
                                 </div>
                                 <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                 <button type="reset" class="btn iq-bg-danger">Cancel</button>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      </div>
    </div>
    <!-- Wrapper End-->
    <footer class="iq-footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item"><a href="../backend/privacy-policy.html">Privacy Policy</a></li>
                        <li class="list-inline-item"><a href="../backend/terms-of-service.html">Terms of Use</a></li>
                    </ul>
                </div>
                <div class="col-lg-6 text-right">
                    <span class="mr-1"><script>document.write(new Date().getFullYear())</script>©</span> <a href="#" class="">CloudBOX</a>.
                </div>
            </div>
        </div>
    </footer>
    <!-- Backend Bundle JavaScript -->
    <script src="../assets/js/backend-bundle.min.js"></script>
    
    <!-- Chart Custom JavaScript -->
    <script src="../assets/js/customizer.js"></script>
    
    <!-- Chart Custom JavaScript -->
    <script src="../assets/js/chart-custom.js"></script>
    
    <!--PDF-->
    <script src="../assets/vendor/doc-viewer/include/pdf/pdf.js"></script>
    <!--Docs-->
    <script src="../assets/vendor/doc-viewer/include/docx/jszip-utils.js"></script>
    <script src="../assets/vendor/doc-viewer/include/docx/mammoth.browser.min.js"></script>
    <!--PPTX-->
    <script src="../assets/vendor/doc-viewer/include/PPTXjs/js/filereader.js"></script>
    <script src="../assets/vendor/doc-viewer/include/PPTXjs/js/d3.min.js"></script>
    <script src="../assets/vendor/doc-viewer/include/PPTXjs/js/nv.d3.min.js"></script>
    <script src="../assets/vendor/doc-viewer/include/PPTXjs/js/pptxjs.js"></script>
    <script src="../assets/vendor/doc-viewer/include/PPTXjs/js/divs2slides.js"></script>
    <!--All Spreadsheet -->
    <script src="../assets/vendor/doc-viewer/include/SheetJS/handsontable.full.min.js"></script>
    <script src="../assets/vendor/doc-viewer/include/SheetJS/xlsx.full.min.js"></script>
    <!--Image viewer-->
    <script src="../assets/vendor/doc-viewer/include/verySimpleImageViewer/js/jquery.verySimpleImageViewer.js"></script>
    <!--officeToHtml-->
    <script src="../assets/vendor/doc-viewer/include/officeToHtml/officeToHtml.js"></script>
    <script src="../assets/js/doc-viewer.js"></script>
    <!-- app JavaScript -->
    <script src="../assets/js/app.js"></script>
     <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Title</h4>
                    <div>
                        <a class="btn" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </a>
                    </div>
                </div>
                <div class="modal-body">
                    <div id="resolte-contaniner" style="height: 500px;" class="overflow-auto">
                        File not found
                    </div>
                </div>
            </div>
        </div>
    </div>
  </body>
</html>