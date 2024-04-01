<?php include 'head.php';

include 'aside.php'; ?>


<div class="page-wrapper" style="background: rgb(66, 205, 202);">


    <!-- <div class="col-lg-12 ">
                        <div class="card">
                            <div class="card-body">
                              
                                <div class="btn-list">
                                  <a href="transport1.php?user=<?php echo $_SESSION['username']; ?>"><button type="button"
                                        class="btn waves-effect waves-light btn-rounded btn-primary">New Payment</button></a>
                          
                              <a href="transport1a.php?user=<?php echo $_SESSION['username']; ?>"><button type="button"
                                        class="btn waves-effect waves-light btn-rounded btn-primary">View Payments</button></a>
                                                        
                            
                                                        
                              
                            
                                       
                                </div>
                            </div>
                        </div>
                    </div>                    -->
    <div class="col-lg-12 d-flex justify-content-center">
        <div class="card">
            <div class="card-body p-2">
                <div class="btn-list">
                    <a href="transport1.php?user=<?php echo $_SESSION['username']; ?>">
                        <button type="button" class="btn waves-effect waves-light btn-rounded btn-primary">New
                            Payment</button>
                    </a>

                    <a href="transport1a.php?user=<?php echo $_SESSION['username']; ?>">
                        <button type="button" class="btn waves-effect waves-light btn-rounded btn-primary">View
                            Payments</button>
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
            $sq = mysqli_query($con, "SELECT * FROM clients");
            ?>

            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add Client Payment</h4>
                    </div>
                    <div class="list-group">
                        <?php
                        $k = 1;
                        while ($hk = mysqli_fetch_array($sq)) {
                            ?>
                            <a href="#" class="list-group-item list-group-item-action">

                                <p class="mb-1 mt-3">Name:
                                    <?php echo $hk['names']; ?>
                                </p>


                                <p class="mb-1">Pay Type:
                                    <?php echo $hk['pay_type']; ?>
                                </p>
                                <p class="mb-1">Category:
                                    <?php echo $hk['client_type']; ?>
                                </p>
                                <p class="mb-1">Waste Type:
                                    <?php echo $hk['gabage_type']; ?>
                                </p>
                                <p class="mb-1">Address:
                                    <?php echo $hk['location']; ?>
                                </p>
                                <p class="mb-1">Contact:
                                    <?php echo $hk['contact']; ?>
                                </p>
                                <p class="mb-1">Status:
                                    <?php echo $hk['status']; ?>
                                </p>
                                <a href="transport3.php?id=<?php echo $hk['id']; ?>" class="btn btn-primary">
                                    Update Payment</a>
                            </a>
                            <?php
                            $k++;
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <!--                
                <div class="row">

                   
 <?php
 $sq = mysqli_query($con, "SELECT * FROM clients");
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
                                             <th>No</th>
                                            <th>Name</th>
                                            <th>Pay Type</th>
                                            <th>Category</th>
                                            <th>Waste Type</th> 
                                            <th>Address</th>
                                            <th>Contact</th>
                                            <th>Status</th>
                                          
                                        </tr>
                                       
                                </thead>


                                <?php $k = 1;
                                while ($hk = mysqli_fetch_array($sq)) { ?>
                                <tbody>
                                    <tr>
                                        <td><a href="transport3.php?id=<?php echo $hk['id']; ?>"><?php echo $hk['names']; ?></a></td>
                                            <td><?php echo $hk['pay_type']; ?></td>
                                            <td><?php echo $hk['client_type']; ?></td>
                                            <td><?php echo $hk['gabage_type']; ?></td>
                                            <td><?php echo $hk['location']; ?></td>
                                            <td><?php echo $hk['contact']; ?></td>
                                            <td><?php echo $hk['status']; ?></td>
                                           
                                           
                                            </tr> 
                                        <?php $k++;
                                } ?>
                                </tbody>
                            </table>

                        </div>
                    </div>








                
                    
                </div> -->

        <?php include 'footer.php'; ?>