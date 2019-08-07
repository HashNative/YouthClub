
<div id="content-wrapper" style="margin-left: 225px; padding: 70px 10px;">

    <div class="container-fluid">

        <div class="row wrapper border-bottom white-bg">
            <div class="col-lg-4 navbar-right">
                <a class="minimalize-styl-2 btn btn btn-outline-secondary " href="<?php echo base_url('umra') ?>"><i class="fa fa-eye"></i> Umra Given History</a>
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

                        <form role="form" action="<?php base_url('loan/create') ?>" method="post">
                            <?php echo validation_errors(); ?>

                            <div class="form-row">

                                <div class="form-group col-md-8">
                                    <label for="membership_no">Membership No</label>
                                    <select id="membership_no" name="membership_no" class="form-control">
                                        <?php foreach ($members_data as $k => $v): ?>
                                            <option value="<?php echo $v['membership_no'].'-'.$v['full_name']; ?>"><?php echo $v['membership_no'].'-'.$v['full_name']; ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="date">Date</label>
                                    <input type="date" class="form-control" id="date" name="date">
                                </div>
                            </div>
                            <div class="form-row">

                                <div class="form- col-md-4">
                                    <label for="amount">Amount</label>
                                    <input type="text" class="form-control" id="amount" name="amount" placeholder="Amount" >
                                </div>

                            </div>

                            <button type="submit" class="btn btn-success">Issue Umra</button>
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
        $("#groups").select2();

        $("#userMainMenu").addClass('active');
        $("#createUserSubNav").addClass('active');

    });
</script>
