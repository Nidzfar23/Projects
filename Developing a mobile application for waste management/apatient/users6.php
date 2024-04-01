<?php include 'head.php';

// include 'aaside.php';  ?>


<div class="page-wrapper" style="background: rgb(66, 205, 202);">


    <!-- <div class="col-lg-12 ">
        <div class="card">
            <div class="card-body">

                <div class="btn-list">

                    <a href="user4.php?user=<?php echo $_SESSION['username']; ?>"><button type="button"
                            class="btn waves-effect waves-light btn-rounded btn-primary">Add Category</button></a>

                    <a href="users6.php?user=<?php echo $_SESSION['username']; ?>"><button type="button"
                            class="btn waves-effect waves-light btn-rounded btn-primary">View Category</button></a>






                </div>
            </div>
        </div>
    </div> -->

    <div class="col-lg-12 d-flex justify-content-center">
        <div class="card">
            <div class="card-body p-3">
                <div class="btn-list">
                    <a href="user4.php?user=<?php echo $_SESSION['username']; ?>">
                        <button type="button" class="btn waves-effect waves-light btn-rounded btn-primary">Add
                            Category</button>
                    </a>

                    <a href="users6.php?user=<?php echo $_SESSION['username']; ?>">
                        <button type="button" class="btn waves-effect waves-light btn-rounded btn-primary">View
                            Category</button>
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
            $sq = mysqli_query($con, "SELECT * FROM gabbage_type");
            ?>

            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">All Categoties</h4>
                    </div>
                    <div class="list-group">
                        <?php
                        while ($hk = mysqli_fetch_array($sq)) {
                            ?>
                            <a href="#" class="list-group-item list-group-item-action">
                                <h5 class="mb-1">Category Name:
                                    <?php echo ucfirst($hk['name']); ?>
                                </h5>
                                <p class="mb-1">Amount Per Month:
                                    <?php echo ucfirst($hk['chargespm']); ?>
                                </p>
                                <p class="mb-1">Amount Per Collection:
                                    <?php echo ucfirst($hk['chargespd']); ?>
                                </p>
                                <a href="users7.php?id=<?php echo $hk['id']; ?>" class="btn btn-primary">Update Category</a>
                                <a href="deletecat.php?id=<?php echo $hk['id']; ?>" class="btn btn-danger">Delete
                                    Category</a>
                            </a>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>


        <!-- <div class="row">

            <?php
            $sq = mysqli_query($con, "SELECT * FROM gabbage_type");
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
                                    <th>Category Name</th>
                                    <th>Amount Per Month</th>
                                    <th>Amount Per Collection</th>

                                    <th>Update Category</th>
                                    <th>Delete Category </th>

                                </tr>

                            </thead>


                            <?php $k = 1;
                            while ($hk = mysqli_fetch_array($sq)) { ?>
                                <tbody>
                                    <tr>

                                    <tr>
                                        <td>
                                            <?php echo $k; ?>
                                        </td>
                                        <td>
                                            <?php echo ucfirst($hk['name']); ?>
                                        </td>
                                        <td>
                                            <?php echo ucfirst($hk['chargespm']); ?>
                                        </td>
                                        <td>
                                            <?php echo ucfirst($hk['chargespd']); ?>
                                        </td>


                                        <td><a href="users7.php?id=<?php echo $hk['id']; ?>"> Update Category </a></td>
                                        <td><a href="deletecat.php?id=<?php echo $hk['id']; ?>"> Delete </a></td>


                                    </tr>
                                    <?php $k++;
                            } ?>
                            </tbody>
                        </table>

                    </div>
                </div>










            </div> -->

        <?php include 'footer.php'; ?>