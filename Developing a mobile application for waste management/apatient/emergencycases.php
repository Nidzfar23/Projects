<?php include 'head.php';

include 'aside.php'; ?>


<div class="page-wrapper" style="background: rgb(66, 205, 202);">


    <div class="col-lg-12 d-flex justify-content-center">
        <div class="card">
            <div class="card-body p-2">
                <div class="btn-list">
                    <a href="emergencycases1.php?user=<?php echo $_SESSION['username']; ?>">
                        <button type="button" class="btn waves-effect waves-light btn-rounded btn-primary">New
                            Collection</button>
                    </a>

                    <a href="emergencycases.php?user=<?php echo $_SESSION['username']; ?>">
                        <button type="button" class="btn waves-effect waves-light btn-rounded btn-primary">View
                            Collection</button>
                    </a>

                    <a href="collector.php">
                        <button type="button" class="btn waves-effect waves-light btn-rounded btn-primary">></button>
                    </a>
                </div>
            </div>
        </div>
    </div>





    <div class="container-fluid">
        <div class="row">
            <?php
            $u = $_SESSION['username'];
            $sq = mysqli_query($con, "SELECT * FROM wastecollect WHERE collector='$u'");
            ?>

            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Collector Details</h4>
                    </div>
                    <div class="list-group">
                        <?php
                        $k = 1;
                        while ($hk = mysqli_fetch_array($sq)) {
                            ?>
                            <a href="#" class="list-group-item list-group-item-action">
                                <h5 class="mb-1 mt-3">No:
                                    <?php echo $k; ?>
                                </h5>
                                <p class="mb-1">Collector:
                                    <?php echo $hk['collector']; ?>
                                </p>
                                <p class="mb-1">Client:
                                    <?php echo $hk['clientname']; ?>
                                </p>
                                <p class="mb-1">Waste Type:
                                    <?php echo $hk['typeofwaste']; ?>
                                </p>
                                <p class="mb-1">Pay Type:
                                    <?php echo $hk['paytype']; ?>
                                </p>
                                <p class="mb-1">Amount:
                                    <?php echo $hk['amountpaid']; ?>
                                </p>
                                <p class="mb-1">Balance:
                                    <?php echo $hk['balance']; ?>
                                </p>
                                <p class="mb-1">Date:
                                    <?php echo $hk['date']; ?>
                                </p>
                                <!-- Add additional fields if needed -->
                            </a>
                            <?php
                            $k++;
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="row">


            <?php
            $u = $_SESSION['username'];
            $sq = mysqli_query($con, "SELECT * FROM wastecollect WHERE collector='$u'");

            ?>

            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"></h4>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                <tr>
                                    <th>&nbsp;</th>
                                    <th>Collector</th>
                                    <th>Client</th>
                                    <th>Waste Tpye</th>
                                    <th>Pay Type</th>
                                    <th>Amount</th>
                                    <th>Balance</th>
                                    <th>Date</th>
                                </tr>

                                </tr>

                            </thead>


                            <?php $k = 1;
                            while ($hk = mysqli_fetch_array($sq)) {
                                ?>
                                <tbody>
                                    <tr>
                                        <td>
                                            <?php echo $k; ?>
                                        </td>
                                        <td>
                                            <?php echo $hk['collector']; ?>
                                        </td>
                                        <td>
                                            <?php echo $hk['clientname']; ?>
                                        </td>
                                        <td>
                                            <?php echo $hk['typeofwaste']; ?>
                                        </td>
                                        <td>
                                            <?php echo $hk['paytype']; ?>
                                        </td>
                                        <td>
                                            <?php echo $hk['amountpaid']; ?>
                                        </td>
                                        <td>
                                            <?php echo $hk['balance']; ?>
                                        </td>
                                        <td>
                                            <?php echo $hk['date']; ?>
                                        </td>

                                         <td><a href="patie2.php?id=<?php echo $hk['id']; ?>"> Edit </a></td>
                                            <td><a href="dpatie2.php?id=<?php echo $hk['id']; ?>"> Delete </a></td> 
                                    <?php $k++;
                            } ?>
                            </tbody>
                        </table>

                    </div>
                </div>










            </div> -->

        <?php include 'footer.php'; ?>