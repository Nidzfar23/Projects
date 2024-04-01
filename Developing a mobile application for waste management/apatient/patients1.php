<?php include 'head.php';

include 'aaside.php'; ?>


<div class="page-wrapper" style="background: rgb(66, 205, 202);">



    <div class="col-lg-12 d-flex justify-content-center">
        <div class="card">
            <div class="card-body">
                <div class="btn-list">
                    <a href="patients.php?user=<?php echo $_SESSION['username']; ?>">
                        <button type="button" class="btn waves-effect waves-light btn-rounded btn-primary">Add
                            Client</button>
                    </a>

                    <a href="patients1.php?user=<?php echo $_SESSION['username']; ?>">
                        <button type="button" class="btn waves-effect waves-light btn-rounded btn-primary">View
                            Clients</button>
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
                        while ($hk = mysqli_fetch_array($sq)) {
                            ?>
                            <a href="#" class="list-group-item list-group-item-action">

                                <p class="mb-1">User Name:

                                    <?php echo ucfirst($hk['names']); ?>
                                </p>
                                <p class="mb-1">Payment Type:
                                    <?php echo $hk['pay_type']; ?>
                                </p>
                                <p class="mb-1">Client Type:
                                    <?php echo $hk['client_type']; ?>
                                </p>
                                <p class="mb-1">Waste Type:
                                    <?php echo $hk['gabage_type']; ?>
                                </p>
                                <p class="mb-1">Contacts:
                                    <?php echo $hk['contact']; ?>
                                </p>
                                <p class="mb-1">Address:
                                    <?php echo $hk['location']; ?>
                                </p>
                                <p class="mb-1">Date:
                                    <?php echo $hk['date']; ?>
                                </p>
                                <p class="mb-1">Account Status:
                                    <?php echo $hk['status']; ?>
                                </p>
                                <a href="update_client.php?id=<?php echo $hk['id']; ?>" class="btn btn-primary">Update
                                    User
                                    Account</a>
                                <a href="deleteuser1.php?id=<?php echo $hk['id']; ?>" class="btn btn-danger">Delete</a>
                            </a>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <?php include 'footer.php'; ?>