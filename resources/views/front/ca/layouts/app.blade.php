<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="{{asset('icomoon/style.css')}}" />
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" />
        <link rel="stylesheet" href="{{asset('css/style.css')}}" />
        <title>OLMS - Registration</title>
        <script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
    </head>
<body>
    <div class="main-app">
        <header class="main-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-5 col-7">
                        <div class="logo" onclick="location.href='./dashboard'">OLMS</div>
                    </div>
                    <div class="col-md-2 text-center mob-abs">
                        <div class="r-menu">
                            <i class="priya-th" onclick="openMenu('slide')"></i>
                        </div>
                    </div>
                    <div class="col-md-5 col-5 flex-row-reverse d-flex">
                        <div class="profile">
                            <div class="has-submenu">
                                <i class="profile-icon">S</i>
                                <div class="drop-menu">
                                    <div class="header">
                                        <div class="big">{{Auth::user()->name}}</div>
                                        <div class="small">Commission Agent</div>
                                    </div>
                                    <ul>
                                        <li><a href="#" ><i class="priya-user"></i> My Profile</a></li>
                                        <li><a href="#" ><i class="priya-key"></i> Change Password</a></li>
                                        <li class="logout">
											<a onclick="return prAlert('Do you want to logout?',{confirm:true,'callback':'link',ele:this})" data-href="{{ route('logout') }}">{{ __('Logout') }}</a></li>
                              			</ul>
                                </div>
                            </div>
                        </div>
                        <div class="notificatons">
                            <div class="noti-icon" onclick="toggleNoti(this)">
                                <i class="priya-bell"></i>
                                <c>55</c>
                            </div>
                            <div class="notification-details">
                                <div class="header"><i class="priya-bell"></i> Notification <span class="badge badge-danger">55</span></div>
                                <div class="scrollable">
                                    <div class="noti-single">
                                        <strong>Trader Registration</strong> 5 more Traders added
                                        <div class="noti-time">2 hours ago</div>
                                    </div>
                                    <div class="noti-single">
                                        <strong>Trader Registration</strong> 5 more Traders added
                                        <div class="noti-time">2 hours ago</div>
                                    </div>
                                    <div class="noti-single">
                                        <strong>Trader Registration</strong> 5 more Traders added
                                        <div class="noti-time">2 hours ago</div>
                                    </div>
                                    <div class="noti-single">
                                        <strong>Trader Registration</strong> 5 more Traders added
                                        <div class="noti-time">2 hours ago</div>
                                    </div>
                                </div>
                            </div>
                            <div class="noti-bg collapse" onclick="closeNoti()"></div>
                        </div>
                        <div class="notificatons">
                            <div class="noti-icon" onclick="openCommunity(this)">
                                <i class="priya-comments"></i>
                                <c id="notificationcount">0</c>
                            </div>
                            <div class="notification-details">
                                <div class="header">
                                    <a class="float-right btn btn-sm" onclick="composeMsg()"><i class="plus">+</i> Compose</a>
                                    <i class="priya-comments"></i> Community <span id="Communityid" class="badge badge-danger">55</span>
                                </div>
                                <div class="scrollable msgs">
                                <div id="listdata">
                                   
                                </div>
                                    <div class="loadmore">
                                        <div id="loadmore" class="px-3 py-2"><a href="javascript:loadmoreMsg()" class="btn btn-sm btn-block">Load More</a></div>
                                    </div>
                                </div>
                                <div class="scrollable compose collapse">
                                  
                                        <div class="p-3">
                                        <div class="row">
                                        <form id="communityfrm" enctype="multipart/form-data" name="communityfrm" >
                                            <input type="hidden" name="_token" value="H4nBCoRjhEamrvBtLpPtdQoVyYIB8qaVyPXlQe6y">                       
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>To <span class="text-danger">*</span></label>
                                                    <label class="form-control pri-form pri-multi">
                                                        <span></span>
                                                        <input name="users_list" id="users_list" autocomplete="off" />
                                                        <input id="users_id" name="to_user_id" type="hidden" class="idz" />
                                                    </label>
                                                </div>
                                            </div>

                                            <!-- <div class="col-12">
                                                <div class="form-group">
                                                    <label>To <span class="text-danger">*</span></label>
                                                    <input name="users_list" id="users_list" class="form-control pri-form" autocomplete="off" />
                                                    <input id="users_id" name="to_user_id" type="" />
                                                </div>
                                            </div> -->
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>Subject <span class="text-danger">*</span></label>
                                                    <input name="subject" id="subject" class="form-control pri-form" autocomplete="off" />
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>Message <span class="text-danger">*</span></label>
                                                    <textarea name="message" id="message" class="form-control pri-form" autocomplete="off"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>Any Attachment</label>
                                                    <input type="file" name="upload_file" id="upload_file" class="form-control pri-form" />
                                                </div>
                                            </div>
                                            <div class="col-12 mt-3">
                                                <button type="button" class="btn btn-block btn send_to" id="send_to">Submit</button>
                                            </div>
                                            <div class="col-12 mt-3">
                                                <button type="button" class="btn btn-block btn-cancel" onclick="composeMsg()">Cancel</button>
                                            </div>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="noti-bg collapse" onclick="closeNoti()"></div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="sub-menu" id="menu-slide">
                <div class="row">
                    <div class="col-md-3">
                        <ul class="ico-menu">
                            <li>
                                <label><i class="priya-dashboard"></i> <a href="{{url('/')}}/ca">Dashboard</a><input type="checkbox" /></label>
                            </li>
                            <li>
                                <label><i class="priya-dashboard"></i> <a href="{{url('/')}}/ca/my-application-list">Application List</a><input type="checkbox" /></label>
                            </li>
                        </ul>
                    </div>
                  
                  
                </div>
            </div>
        </header>
       

        @yield('content')
        <footer class="main-footer text-center py-3">&copy;
            <script>document.write(new Date().getFullYear())</script> Department
        </footer>
    </div>
    <script src="{{asset('js/app.js')}}"></script>
</body>
</html>