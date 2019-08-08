
<div id="content-wrapper" style="margin-left: 225px; padding: 70px 10px;">

    <div class="container-fluid">

        <div class="row wrapper border-bottom white-bg">
            <div class="col-lg-4 navbar-right">
                <a class="minimalize-styl-2 btn btn-primary " href="<?php echo base_url('chit') ?>"><i class="fa fa-eye"></i> All Members</a>
            </div>

        </div>

        <!-- Main content -->
        <div class="wrapper wrapper-content animated fadeInRight">

            <div class="row">
                <div class="col-lg-12">

                    <?php if($this->session->flashdata('success')): ?>
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <?php echo $this->session->flashdata('success'); ?>
                        </div>
                    <?php elseif($this->session->flashdata('error')): ?>
                        <div class="alert alert-error alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <?php echo $this->session->flashdata('error'); ?>
                        </div>
                    <?php endif; ?>

                    <div class="box">

                        <form role="form" action="<?php base_url('chit/edit') ?>" method="post">
                            <?php echo validation_errors(); ?>

                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <label for="inputEmail4">Membership No</label>
                                    <input type="text" class="form-control" id="membership_no" name="membership_no" placeholder="Membership No" value="<?php echo $chit_data['membership_no'] ?>" autocomplete="off">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Full Name</label>
                                    <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Full Name" value="<?php echo $chit_data['full_name'] ?>" autocomplete="off">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="date">Date</label>
                                    <input type="text" class="form-control" id="date" name="date" placeholder="Date" value="<?php echo $chit_data['date'] ?>" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form- col-md-2">
                                    <label for="chit_no">Chit No</label>
                                    <input type="text" class="form-control" id="chit_no" name="chit_no" placeholder="Chit Number" value="<?php echo $chit_data['chit_no'] ?>" autocomplete="off">
                                </div>
                                <div class="form- col-md-4">
                                    <label for="amount">Amount</label>
                                    <input type="text" class="form-control" id="amount" name="amount" placeholder="Amount" value="<?php echo $chit_data['amount'] ?>" autocomplete="off">
                                </div>

                            </div>

                            <button type="submit" class="btn btn-success">Update Chit details</button>
                        </form>


                    </div>
                </div>

            </div>
        </div>
    </div>


</div>

</div>



<script type="text/javascript">
    $(document).ready(function() {
        $("#paymentMainMenu").addClass('active');
    });
</script>
