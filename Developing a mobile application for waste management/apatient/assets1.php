<?php include 'head.php';

include 'aaside.php'; ?>


<div class="page-wrapper" style="background: rgb(66, 205, 202);">


    <!-- <div class="col-lg-12 ">
                        <div class="card">
                            <div class="card-body">
                                
                                <div class="btn-list">
                                   <a href="assets1.php?user=<?php echo $_SESSION['username']; ?>"><button type="button"
                                        class="btn waves-effect waves-light btn-rounded btn-primary">New Collection</button></a>
                          
                              <a href="assets2.php?user=<?php echo $_SESSION['username']; ?>"><button type="button"
                                        class="btn waves-effect waves-light btn-rounded btn-primary">View Collection</button></a>
                                                        
                            
                                                        
                              
                            
                                       
                                </div>
                            </div>
                        </div>
                    </div>                    -->
    <div class="col-lg-12 d-flex justify-content-center">
        <div class="card">
            <div class="card-body p-2">
                <div class="btn-list">
                    <a href="assets1.php?user=<?php echo $_SESSION['username']; ?>">
                        <button type="button" class="btn waves-effect waves-light btn-rounded btn-primary">New
                            Collection</button>
                    </a>

                    <a href="assets2.php?user=<?php echo $_SESSION['username']; ?>">
                        <button type="button" class="btn waves-effect waves-light btn-rounded btn-primary">View
                            Collection</button>
                    </a>

                    <a href="index.php">
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
                        <h4 class="card-title">All Client</h4>
                    </div>
                    <div class="list-group">
                        <?php
                        $k = 1;
                        while ($hk = mysqli_fetch_array($sq)) {
                            ?>
                            <a href="assets.php?id=<?php echo $hk['id']; ?>" class="list-group-item list-group-item-action">
                                <h5 class="mb-1">Name:
                                    <?php echo $hk['names']; ?>
                                </h5>
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
                                <p class="mb-3">Status:
                                    <?php echo $hk['status']; ?>
                                </p>
                                <p
                                    style="display: inline-block; padding: 10px 20px; background-color: #3498db; color: #ffffff; text-align: center; text-decoration: none; font-size: 16px; border-radius: 5px; cursor: pointer;">
                                    UPDATE COLLECTIONS
                                </p>
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
                                            <th>&nbsp;</th>
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
                                  
                                        <tr>
                                          <td><?php echo $k; ?></td>
                                            <td><a href="assets.php?id=<?php echo $hk['id']; ?>"><?php echo $hk['names']; ?></a></td>
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