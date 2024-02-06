<style>
.bton{
    margin-left:10%;
}
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none mr-3">
        <i class="fa fa-bars"></i>
    </button>
    <div><h2>{{ \App\Models\Centre::where('id', auth()->user()->centre_id)->value('centre_name') }}</h2></div>
    
        <a href="{{route('frontend', \App\Models\Centre::where('id',auth()->user()->centre_id)->value('centre_slug'))}}" class="btn btn-primary bton"  target="_blank">
                 GO TO FRONT SCREEN
            </a>
          
    <!-- Topbar Navbar -->
    
    <ul class="navbar-nav ml-auto">


        <!-- Nav Item - Alerts -->
        <!--<li class="nav-item dropdown no-arrow mx-1">-->
        <!--    <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"-->
        <!--        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
        <!--        <i class="fas fa-bell fa-fw"></i>-->
                <!-- Counter - Alerts -->
        <!--        <span class="badge badge-danger badge-counter">1</span>-->
        <!--    </a>-->
            <!-- Dropdown - Alerts -->
        <!--    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"-->
        <!--        aria-labelledby="alertsDropdown">-->
        <!--        <h6 class="dropdown-header">-->
        <!--            Alerts Center-->
        <!--        </h6>-->
                
                
        <!--        <a class="dropdown-item d-flex align-items-center" href="#">-->
        <!--            <div class="mr-3">-->
        <!--                <div class="icon-circle bg-warning">-->
        <!--                    <i class="fas fa-exclamation-triangle text-white"></i>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--            <div>-->
        <!--                <div class="small text-gray-500">Title</div>-->
        <!--                ABC Message-->
        <!--            </div>-->
        <!--        </a>-->
        <!--        <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>-->
        <!--    </div>-->
        </li>

        <!-- Nav Item - Messages -->
        <!--<li class="nav-item dropdown no-arrow mx-1">-->
        <!--    <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"-->
        <!--        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
        <!--        <i class="fas fa-envelope fa-fw"></i>-->
                <!-- Counter - Messages -->
        <!--        <span class="badge badge-danger badge-counter">1</span>-->
        <!--    </a>-->
            <!-- Dropdown - Messages -->
        <!--    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"-->
        <!--        aria-labelledby="messagesDropdown">-->
        <!--        <h6 class="dropdown-header">-->
        <!--            Message Center-->
        <!--        </h6>-->
                
                
        <!--        <a class="dropdown-item d-flex align-items-center" href="#">-->
        <!--            <div class="dropdown-list-image mr-3">-->
        <!--                <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"-->
        <!--                    alt="...">-->
        <!--                <div class="status-indicator bg-success"></div>-->
        <!--            </div>-->
        <!--            <div>-->
        <!--                <div class="text-truncate">Am I a good boy? The reason I ask is because someone-->
        <!--                    told me that people say this to all dogs, even if they aren't good...</div>-->
        <!--                <div class="small text-gray-500">Chicken the Dog · 2w</div>-->
        <!--            </div>-->
        <!--        </a>-->
        <!--        <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>-->
        <!--    </div>-->
        <!--</li>-->

        <a class="dropdown-item">    
        {{ Auth::user()->name}}
        </a>
        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
            
        <li class="nav-item dropdown">
            <a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                <i class="fa-solid fa-power-off"></i>
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
    

    </ul>

</nav>