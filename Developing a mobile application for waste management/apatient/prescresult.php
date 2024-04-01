<?php include 'head.php';

include 'aside.php'; ?>


<div class="page-wrapper" style="background: rgb(66, 205, 202);">


    <!-- <div class="col-lg-12 ">
                <div class="card">
                    <div class="card-body">
                        
                        <div class="btn-list">
                            <a href="prescorders.php?user=<?php echo $_SESSION['username']; ?>"><button type="button"
                                class="btn waves-effect waves-light btn-rounded btn-primary">New Client</button></a>
                    
                             <a href="prescresult.php?user=<?php echo $_SESSION['username']; ?>"><button type="button"
                                class="btn waves-effect waves-light btn-rounded btn-primary">Clients' Book</button></a>
                        </div>
                    </div>
                </div>
            </div>                    -->

    <div class="col-lg-12 d-flex justify-content-center">
        <div class="card">
            <div class="card-body">
                <div class="btn-list">
                    <a href="prescorders.php?user=<?php echo $_SESSION['username']; ?>">
                        <button type="button" class="btn waves-effect waves-light btn-rounded btn-primary">New
                            Client</button>
                    </a>

                    <a href="prescresult.php?user=<?php echo $_SESSION['username']; ?>">
                        <button type="button" class="btn waves-effect waves-light btn-rounded btn-primary">Clients'
                            Book</button>
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
                        <h4 class="card-title">Client</h4>
                    </div>
                    <div class="list-group">
                        <?php
                        $k = 1;
                        while ($hk = mysqli_fetch_array($sq)) {
                            ?>
                            <a href="#" class="list-group-item list-group-item-action">
                                <h5 class="mb-1">No:
                                    <?php echo $k; ?>
                                </h5>
                                <p class="mb-1">Name:
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
                                <p class="mb-5">Date:
                                    <?php echo $hk['date']; ?>
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
                                             <th>No</th>
                                         <th>Name</th>
                                            <th>Pay Type</th>
                                            <th>Category</th>
                                            <th>Waste Type</th> 
                                            <th>Address</th>
                                            <th>Contact</th>
                                            <th>Status</th>
                                            <th>Date</th> 
                                          
                                        </tr>
                                       
                                </thead>


                                <?php $k = 1;
                                while ($hk = mysqli_fetch_array($sq)) { ?>
                                <tbody>
                                    <tr>
                                          <td><?php echo $k; ?></td>
                                            <td><?php echo $hk['names']; ?></td>
                                            <td><?php echo $hk['pay_type']; ?></td>
                                            <td><?php echo $hk['client_type']; ?></td>
                                            <td><?php echo $hk['gabage_type']; ?></td>
                                            <td><?php echo $hk['location']; ?></td>
                                            <td><?php echo $hk['contact']; ?></td>
                                            <td><?php echo $hk['status']; ?></td>
                                            <td><?php echo $hk['date']; ?></td>
                                            
                                            
                                            </tr> 
                                        <?php $k++;
                                } ?>
                                </tbody>
                            </table>

                        </div>
                    </div>








                
                    
                </div> -->

        <?php include 'footer.php'; ?>