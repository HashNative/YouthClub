
<div id="content-wrapper" style="margin-left: 225px; padding: 70px 10px;">

    <div class="container-fluid">

        <div class="row wrapper border-bottom white-bg">
            <div class="col-lg-4 navbar-right">
                <a class="minimalize-styl-2 btn btn btn-outline-secondary " href="<?php echo base_url('incomeexpense') ?>"><i class="fa fa-eye"></i> Income/Expense History</a>
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

                        <form role="form" action="<?php base_url('incomeexpense/edit') ?>" method="post">
                            <?php echo validation_errors(); ?>

                            <div class="form-row">

                                <div class="form-group col-md-2">
                                    <label for="type">Type</label>
                                    <select id="type" name="type" class="form-control">
                                        <option value="Income">Income</option>
                                        <option value="Expense">Expense</option>
                                        <option value="Fine">Fine</option>


                                    </select>
                                </div>

                                <div class="form-group col-md-8">
                                    <label for="date">Description</label>
                                    <input type="text" class="form-control" id="description" name="description" placeholder="Description/Fine-Ex: 10-Fine for monthly subscription" >
                                </div>

                                <div class="form-group col-md-2">
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
                <button type="submit" class="btn btn-success">Record Transaction</button>
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
        $("#incomeexpenseMainMenu").addClass('active');
    });
</script>
