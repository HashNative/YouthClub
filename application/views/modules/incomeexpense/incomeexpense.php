

<div id="content-wrapper" style="margin-left: 225px; padding: 70px 10px;">

    <div class="container-fluid">

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


        <?php if($incomeexpense_data){ ?>
            <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox ">
                            <div class="ibox-title">

                                <div class="ibox-tools">
                                    <a href="<?php echo base_url('incomeexpense/create') ?>" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> Record Income / Expense</a>

                                </div>
                            </div>
                            <div class="ibox-content">

                                <div class="card mb-3">
                                    <div class="card-header">
                                        <i class="fas fa-table"></i>
                                        Income/Expense History</div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-sm table-hover" id="dataTable" width="100%" cellspacing="0">
                                                <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Description</th>
                                                    <th>Type</th>
                                                    <th>Amount</th>
                                                    <th class="text-right" data-sort-ignore="true">Action</th>
                                                </tr>
                                                </thead>
                                                <tfoot>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Description</th>
                                                    <th>Type</th>
                                                    <th>Amount</th>
                                                    <th class="text-right" data-sort-ignore="true">Action</th>
                                                </tr>
                                                </tfoot>
                                                <tbody>
                                                <?php foreach ($incomeexpense_data as $k => $v): ?>
                                                    <tr>
                                                        <td><?php echo $v['incomeexpense_info']['date']; ?></td>
                                                        <td><?php echo $v['incomeexpense_info']['description']; ?></td>
                                                        <td><?php echo $v['incomeexpense_info']['type']; ?></td>
                                                        <td><?php echo $v['incomeexpense_info']['amount']; ?></td>


                                                        <td class="text-right">
                                                            <div class="btn-group">
<!--                                                                <a type="button" class="btn btn-outline-success btn-sm" href="--><?php //echo base_url('incomeexpense/edit/'.$v['chit_info']['id']) ?><!--">Edit</a>-->
                                                                <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#deleteModal<?php echo $v['incomeexpense_info']['id']; ?>">Delete</button>
                                                            </div>


                                                        </td>

                                                    </tr>

                                                    <div class="modal inmodal" id="deleteModal<?php echo $v['incomeexpense_info']['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Do you really want to delete?</h4>
                                                                </div>
                                                                <form role="form" action="<?php echo base_url('incomeexpense/delete/'.$v['incomeexpense_info']['id']) ?>" method="post" id="issueForm">
                                                                    <div class="confirmation-modal-body">
                                                                        <div class="modal-footer d-flex justify-content-around">
                                                                            <button type="button" class="btn btn-white" data-dismiss="modal">No</button>
                                                                            <button type="submit" class="btn btn-primary" name="confirm" value="Confirm">Yes</button>
                                                                        </div>
                                                                    </div>


                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>

                                                <?php endforeach; ?>



                                            </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                                </div>





                            </div>
                        </div>
                    </div>
            </div>
        <?php }else{ ?>
            <div class="row justify-content-center">
                <div class="col-sm-6 align-item-center">
                    <div class="row justify-content-center">
                        <img src="https://plugin.intuitcdn.net/improved-inventory/2.4.29/images/aedd71ce8d4a14e839494d68e8de5cce.svg">
                    </div>
                    <div class="row justify-content-center">
                    <h2><strong>Record Transaction</strong></h2>
                    </div>
                    <div class="row justify-content-center">
                        <a href="<?php echo base_url('incomeexpense/create') ?>" class="btn btn-primary btn-md"><i class="fa fa-plus"></i> Record Transaction</a>
                    </div>
                </div>
            </div>
        <?php }?>





    </div>

</div>
<!-- /.content-wrapper -->

<script type="text/javascript">
    $(document).ready(function() {
        $("#incomeexpenseMainMenu").addClass('active');
    });
</script>
