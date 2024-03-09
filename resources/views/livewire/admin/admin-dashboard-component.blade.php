<div>
<style>
    .header1{
        display:none;
    }
    .footer{
        display:none;
    }
    .header h1{
        color:black;
    }
</style>

<div id="dashboardPage">
    <div class="sidebar">
        <div class="sidebar-brand">
            <h1><span id="lab la-sajiloghar">SajiloGhar</span></h1>
        </div>
        <div class="sidebar-menu">
            <ul>
                <li>
                <a href="#" class="active" onclick="showTable();"><span class="las la-igloo"></span>
                    <span>Dashboard</span></a>
                </li>
                <li>
                    <a href="#" onclick="hideTable()"><span class="las la-users"></span>
                    <span>Customers</span></a>
                </li>
                <li>
                    <a href="#" onclick="hideTable()"><span class="las la-broom"></span>
                    <span>Services</span></a>
                </li>
                <li>
                    <a href="#" onclick="hideTable()"><span class="las la-wallet"></span>
                    <span>Service Providers</span></a>
                </li>
            </ul>
        </div>
    </div>

    <div class="main-content active">
        <div class="header">
            <h1>
                <label for="">
                    <span class="las la-bars"></span>
                    Dashboard
                </label>
            </h1>
            <div class="search-wrapper">
                <span class="las la-search"></span>
                <input type="search" placeholder="Search Here" />
            </div>

            <div class="user-wrapper">
                <img src="{{asset('assets/images/logo.png')}}" width="40px" height="30px" alt="">
                <div>
                    <h4>Akhilesh Sharma</h4>
                    <small>Super Admin</small>
                </div>
            </div>
        </div>
        <main>
            <!-- <div class="cards">
                <div class="card-single">
                    <div>
                        <h1>54</h1>
                        <span>Customers</span>
                    </div>
                    <div>
                        <span class="las la-users"></span>
                    </div>
                </div>
                <div class="card-single">
                    <div>
                        <h1>54</h1>
                        <span>Service Providers</span>
                    </div>
                    <div>
                        <span class="las la-users"></span>
                    </div>
                </div>
                <div class="card-single">
                    <div>
                        <h1>54</h1>
                        <span>Services</span>
                    </div>
                    <div>
                        <span class="las la-clipboard"></span>
                    </div>
                </div>
            </div> -->
            <div id="dashsboardTable">
                @include('livewire.admin.admin-users-component')
            </div>
            <div class="dashboard">
                @include('livewire.admin.admin-users-component')
            </div>
        </main>
    </div>
    
    <script>
        function showTable() {
            document.getElementById("dashboardTable").style.display = "table";
        }

        // function showTable1() {
        //     document.getElementById("dashboard").style.display = "table";
        // }


        function hideTable() {
            document.getElementById("dashboardTable").style.display = "none";
};
    </script>
</div>

</div>