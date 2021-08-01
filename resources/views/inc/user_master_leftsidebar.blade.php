<aside class="left-sidebar" data-sidebarbg="skin5">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav" class="pt-4">

                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{ route('home') }}" aria-expanded="false"><i
                            class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>




                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                        aria-expanded="false">
                        <i class="mdi mdi-receipt"></i>
                        <span class="hide-menu">Post </span>
                    </a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item">
                            <a href="{{route('post.add_form')}}" class="sidebar-link">
                                <i class="mdi mdi-note-outline"></i>
                                <span class="hide-menu"> Add New Post</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{route('post.view')}}" class="sidebar-link">
                                <i class="mdi mdi-note-plus"></i>
                                <span class="hide-menu"> View Post
                                </span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                        aria-expanded="false">
                        <i class="mdi mdi-receipt"></i>
                        <span class="hide-menu">Comment On Post </span>
                    </a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item">
                            <a href="{{route('comment.add_form')}}" class="sidebar-link">
                                <i class="mdi mdi-note-outline"></i>
                                <span class="hide-menu"> Add New Comment</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{route('comment.view')}}" class="sidebar-link">
                                <i class="mdi mdi-note-plus"></i>
                                <span class="hide-menu"> View Comment
                                </span>
                            </a>
                        </li>
                    </ul>
                </li>


                


                



                

            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>