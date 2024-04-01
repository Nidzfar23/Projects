<?php include 'head.php'; ?>

<style>
    body {
        background-color: #04b3af;
    }
</style>

<? include 'aaside.php'; ?>

<div class="page-wrapper">

    <div class="page-breadcrumb" style="background: rgb(4, 179, 175);">




        <nav aria-label=" breadcrumb">
            <ol class="breadcrumb m-0 p-0">
                <!-- <li class="breadcrumb-item"><a href="index.php">Dashboard</a> -->
                <li class="breadcrumb-item"
                    style="font-size: 20px; color: black; font-weight: bold; margin-left: auto; margin-right: auto; margin-bottom: 30px;">
                    Collector
                    Dashboard
                </li>
            </ol>
        </nav>


        <!-- <div class="col-5 align-self-center">
                <div class="customize-input float-right">
                    <h5>
                        <?php echo date('Y-m-d'); ?>
                    </h5>
                </div>
            </div> -->

    </div>








    <div class="row" style="background: rgb(4, 179, 175);">
        <div class="col-lg-4 col-md-12">
            <div class="card"
                style="background: rgb(230, 230, 230); height: 100px; width: 85%; margin-left: auto; margin-right: auto;">
                <a href="prescorders.php?user=<?php echo $_SESSION['username']; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-user fa-2x mx-3"></i>Client</h5>
                        <!-- <div id="campaign-v2" class="mt-2" style="height: 15px; width: 15px;"></div> -->

                    </div>
                </a>
            </div>
        </div>


        <div class="col-lg-4 col-md-12">
            <div class="card"
                style="background: rgb(230, 230, 230); height: 100px; width: 85%; margin-left: auto; margin-right: auto;">
                <a href="emergencycases1.php">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-trash-alt fa-2x mx-3"></i>Waste Collections</h5>
                        <!-- <div id="campaign-v2" class="mt-2" style="height: 15px; width: 15px;"></div> -->

                    </div>
                </a>
            </div>
        </div>

        <div class="col-lg-4 col-md-12">
            <div class="card"
                style="background: rgb(230, 230, 230); height: 100px; width: 85%; margin-left: auto; margin-right: auto;">
                <a href="transport1.php?user=<?php echo $_SESSION['username']; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-dollar-sign fa-2x mx-3"></i>Payments</h5>
                        <!-- <div id="campaign-v2" class="mt-2" style="height: 15px; width: 15px;"></div> -->

                    </div>
                </a>
            </div>
        </div>



        <div class="col-lg-4 col-md-12">
            <div class="card"
                style="background: rgb(230, 230, 230); height: 100px; width: 85%; margin-left: auto; margin-right: auto;">
                <a href="logout.php?user=<?php echo $_SESSION['username']; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-sign-out-alt fa-2x mx-3"></i>Logout</h5>
                        <!-- <div id="campaign-v2" class="mt-2" style="height: 15px; width: 15px;"></div> -->

                    </div>
                </a>
            </div>
        </div>


    </div>



    <?php //}        ?>


    <?php include 'footer.php'; ?>