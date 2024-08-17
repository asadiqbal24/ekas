<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Main</li>

                <li>
                    <a href="/admin" class="waves-effect">
                        <i class="mdi mdi-view-dashboard"></i>

                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-album"></i>
                        <span>General</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('settings')}}">General Setting</a></li>
                        <li><a href="{{route('profile.settings')}}">Profile Setting</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-calendar-check"></i>
                        <span>Courses</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="add/course">Add Courses</a></li>
                        <li><a href="{{route('courses.get')}}">All Courses</a></li>
                        <li><a href="{{route('import.course.data')}}">Excel Upload</a></li>
                        <li><a href="{{route('get.trashed.courses')}}">Trash Bin</a></li>
                    </ul>
                </li>



                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-text-box-multiple-outline"></i>
                        <span>Subscriber</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('subscriber.get')}}">Subscribers</a></li>
                    </ul>
                </li>



                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-responsive"></i>
                        <span>Blogs</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">

                        <li><a href="admin/addblog">Add Blog</a></li>
                        <li><a href="admin/blog/category">Blog Category</a></li>
                        <li><a href="admin/viewblogs">View Blogs</a></li>

                    </ul>
                </li>



                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-chat-processing-outline"></i>
                        <span>Feedbacks</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">

                        <li><a href="{{route('feedback.create')}}">Add Feedbacks</a></li>

                        <li><a href="{{route('feedback.view')}}">View Feedbacks</a></li>

                    </ul>
                </li>




                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-clipboard-outline"></i>
                        <span>Guidance Packages</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">

                        <li><a href="{{route('session.create' , ['package' => 'singlesession'])}}">Add Single Pack</a></li>
                        <li><a href="{{route('session.create' , ['package' => 'bundle1'])}}">Add Bunble 1</a></li>
                        <li><a href="{{route('session.create' , ['package' => 'bundle2'])}}">Add Bunble 2</a></li>
                        <li><a href="{{route('session.index')}}">View Packages</a></li>

                    </ul>
                </li>





                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-account-box"></i>
                        <span>Users</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="admin/add/user">Add Users</a></li>
                        <li><a href="admin/get/all/users">View Users</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-account-box"></i>
                        <span>Payments</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('get.payments')}}">Payments</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-account-box"></i>
                        <span>Contact Us</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('contactus.list')}}">Contact Us</a></li>
                    </ul>
                </li>









                <!--
        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="mdi mdi-buffer"></i>
                <span>History</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                    <li><a href="viewhistory.php">View History</a></li>
                 
                   
    
            </ul>
        </li> -->

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>