<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Home > Settings > Org Information</a></li>                                
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="col-lg-12">
                <div class="card" style="background: #f1f1fc;">
                    <div class="card-body table-light">
                        <div class="row">
                            <div class="col-md-2">
                                <span id="list">
                                    <a href='javascript:void(0)'> <i class="ri-menu-line"> List View</i></a>
                                </span>&nbsp;&nbsp;
                            </div>
                            <div class="col-md-2">
                                <span id="grid">
                                    <a href='javascript:void(0)'> <i class="ri-grid-line"> Grid View</i></a>
                                </span>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Search by Name" />
                                </div>
                            </div>

                        </div>


                    </div>
                </div>
            </div>
            <?php echo "<pre>";print_r($providers);echo "</pre>"; ?>
            <div class="col-lg-12" id="list-view">
                <div class="card">
                    <div class="card-body">
                        <div class="dropdown float-end">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="mdi mdi-dots-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Sales Report</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Profit</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-straped datatable dt-responsive nowrap" data-bs-page-length="5"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>

                                        <th>Name</th>
                                        <th>Department</th>
                                        <th>Service</th>
                                        <th>Mobile</th>
                                        <th>Email</th>
                                        <th>Secretary</th>
                                        <th>Status</th>
                                        <th style="width: 120px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="table-light">

                                    <?php foreach($providers as $row){?>
                                    <tr>


                                        <td><a href="javascript: void(0);"
                                                class="text-dark fw-bold"><?php echo $row['first_name']; ?></a> </td>
                                        <td>Dept</td>
                                        <td><?php echo $row['services_name'][0] ?></td>                                                                              
                                        <td><?php echo $row['phone_number']; ?></td>
                                        <td><?php echo $row['email']; ?></td>
                                        <td><?php echo empty($row['secretry_name'][0]) ? 'NA' : $row['secretry_name'][0]; ?></td>
                                        <td><span class="badge badge-soft-success font-size-11">Active</span></td> 
                                        
                                        <td id="tooltip-container1">
                                            <a href="javascript:void(0);" class="me-3 text-primary"
                                                data-bs-container="#tooltip-container1" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Edit"><i
                                                    class="mdi mdi-pencil font-size-18"></i></a>
                                            <a href="javascript:void(0);" class="text-danger"
                                                data-bs-container="#tooltip-container1" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Delete"><i
                                                    class="mdi mdi-trash-can font-size-18"></i></a>
                                        </td>
                                    </tr> <?php } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12" id="grid-view" style="display:none">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <?php foreach($available_services as $row){ ?>
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-1 overflow-hidden">
                                                <p class="text-truncate font-size-14 mb-2"><?php echo $row['name']; ?>
                                                </p>
                                                <h4 class="mb-0"><?php echo $row['price']; ?></h4>
                                            </div>
                                            <div class="text-primary ms-auto">
                                            <?php echo $row['availabilities_type']; ?>
                                            </div>
                                        </div>

                                    </div>


                                    <div class="card-body border-top py-3">
                                        <div class="text-truncate">                                           
                                            <span class="text-muted ms-2"> <?php echo "Ortho"; ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>


            <!-- end row -->


            <!-- end row -->


            <!-- end row -->
        </div>

    </div>
    <!-- End Page-content -->

    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <script>
                    document.write(new Date().getFullYear())
                    </script> © Demo
                </div>
                <!-- <div class="col-sm-6">
                <div class="text-sm-end d-none d-sm-block">
                    Cr with <i class="mdi mdi-heart text-danger"></i> by Themesdesign
                </div>
            </div> -->
            </div>
        </div>
    </footer>

</div>