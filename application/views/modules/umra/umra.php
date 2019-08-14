

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


        <?php if($umra_data){ ?>
            <div class="row">

                    <div class="col-lg-12">
                        <div class="ibox ">
                            <div class="ibox-title">

                                <div class="ibox-tools">
                                    <a href="<?php echo base_url('umra/create') ?>" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> Issue Umra</a>

                                </div>
                            </div>
                            <div class="ibox-content">

                                <div class="card mb-3">
                                    <div class="card-header">
                                        <i class="fas fa-table"></i>
                                        Umra Given History</div>
                                    <div class="card-body">


                                            <table class="table table-bordered table-sm table-hover" id="dataTable" width="100%" cellspacing="0">
                                                <thead>
                                                <tr>
                                                    <th>Membership No</th>
                                                    <th>Full Name</th>
                                                    <th>Date</th>
                                                    <th>Amount</th>
                                                    <th class="text-right" data-sort-ignore="true">Action</th>
                                                </tr>
                                                </thead>
                                                <tfoot>
                                                <tr>
                                                    <th>Membership No</th>
                                                    <th>Full Name</th>
                                                    <th>Date</th>
                                                    <th>Amount</th>
                                                    <th class="text-right" data-sort-ignore="true">Action</th>
                                                </tr>
                                                </tfoot>
                                                <tbody>
                                                <?php foreach ($umra_data as $k => $v): ?>
                                                    <tr>
                                                        <td><?php echo $v['umra_info']['membership_no']; ?></td>
                                                        <td><?php echo $v['umra_info']['full_name']; ?></td>
                                                        <td><?php echo $v['umra_info']['date']; ?></td>
                                                        <td><?php echo $v['umra_info']['amount']; ?></td>


                                                        <td class="text-right">
                                                            <div class="btn-group">
<!--                                                                <a type="button" class="btn btn-outline-success btn-sm" href="--><?php //echo base_url('umra/edit/'.$v['umra_info']['id']) ?><!--">Edit</a>-->
                                                                <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#deleteModal<?php echo $v['umra_info']['id']; ?>">Delete</button>
                                                            </div>


                                                        </td>

                                                    </tr>

                                                    <div class="modal inmodal" id="deleteModal<?php echo $v['umra_info']['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Do you really want to delete?</h4>
                                                                </div>
                                                                <form role="form" action="<?php echo base_url('umra/delete/'.$v['umra_info']['id']) ?>" method="post" id="issueForm">
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
                        <h2><strong>Issue Umra</strong></h2>
                    </div>
                    <div class="row justify-content-center">
                        <a href="<?php echo base_url('umra/create') ?>" class="btn btn-primary btn-md"><i class="fa fa-plus"></i> Issue Umra</a>
                    </div>
                </div>
            </div>
        <?php }?>

        <?php if($umra_payment_data){ ?>
            <div class="row">

                <div class="col-lg-12">
                    <div class="ibox ">

                        <div class="ibox-content">

                            <div class="card mb-3">
                                <div class="card-header">
                                    <i class="fas fa-table"></i>
                                    Umra Payment History</div>
                                <div class="card-body">


                                    <table class="table table-bordered table-sm table-hover" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                        <tr>
                                            <th>Membership No</th>
                                            <th>Full Name</th>
                                            <th>Date</th>
                                            <th>Amount</th>
                                        </tr>
                                        </thead>
                                        <tfoot>
                                        <tr>
                                            <th>Membership No</th>
                                            <th>Full Name</th>
                                            <th>Date</th>
                                            <th>Amount</th>
                                        </tr>
                                        </tfoot>
                                        <tbody>
                                        <?php foreach ($umra_payment_data as $k => $v): ?>
                                            <tr>
                                                <td><?php echo $v['umra_payment_info']['membership_no']; ?></td>
                                                <td><?php echo $v['umra_payment_info']['full_name']; ?></td>
                                                <td><?php echo $v['umra_payment_info']['date']; ?></td>
                                                <td><?php echo $v['umra_payment_info']['umra']; ?></td>



                                            </tr>


                                        <?php endforeach; ?>



                                        </tbody>
                                    </table>

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
                        <h2><strong>Get Payment for Umra</strong></h2>
                    </div>
                    <div class="row justify-content-center">
                        <a href="<?php echo base_url('payment/create') ?>" class="btn btn-primary btn-md"><i class="fa fa-plus"></i> Go to payment</a>
                    </div>
                </div>
            </div>
        <?php }?>


        <?php if($umra_account_data){ ?>
            <div class="row">

                <div class="col-lg-12">
                    <div class="ibox ">

                        <div class="ibox-content">

                            <div class="card mb-3">
                                <div class="card-header">
                                    <i class="fas fa-table"></i>
                                    Umra Account</div>
                                <div class="card-body">


                                    <table id="account_table" class="table table-bordered table-sm table-hover" id="dataTable" width="100%" cellspacing="0">
                                        <thead class="thead-dark">
                                        <tr>
                                            <th>Membership No</th>
                                            <th>Full Name</th>
                                            <th>Opening</th>
                                            <th>Received</th>
                                            <th>Given</th>
                                            <th>Balance</th>

                                        </tr>
                                        </thead>
                                        <tfoot>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                            <th id="opening_total">Balance</th>
                                            <th id="paid_total">Balance</th>
                                            <th id="given_total">Balance</th>
                                            <th id="balance_total">Balance</th>

                                        </tr>
                                        </tfoot>

                                        <tbody>
                                        <?php foreach ($umra_account_data as $k => $v): ?>
                                            <tr>
                                                <td><?php echo $v['umra_account_info']['membership_no']; ?></td>
                                                <td><?php echo $v['umra_account_info']['full_name']; ?></td>
                                                <td class="opening"><?php echo $v['umra_account_info']['umra_opening']; ?></td>
                                                <td class="paid"><?php echo $v['umra_account_info']['paidumra']; ?></td>
                                                <td class="given"><?php echo $v['umra_account_info']['umraloan']; ?></td>
                                                <td class="balance"><?php echo $v['umra_account_info']['umra_opening']+$v['umra_account_info']['paidumra']-$v['umra_account_info']['umraloan']; ?></td>



                                            </tr>


                                        <?php endforeach; ?>



                                        </tbody>
                                    </table>

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
                        <h2><strong>Get Payment for Umra</strong></h2>
                    </div>
                    <div class="row justify-content-center">
                        <a href="<?php echo base_url('payment/create') ?>" class="btn btn-primary btn-md"><i class="fa fa-plus"></i> Go to payment</a>
                    </div>
                </div>
            </div>
        <?php }?>





    </div>

</div>
<!-- /.content-wrapper -->


<script language="javascript" type="text/javascript">
    $(document).ready(function () {
        $("#umraMainMenu").addClass('active');
        var tds = document.getElementById('account_table').getElementsByTagName('td');
        var opening_sum = 0;
        var paid_sum = 0;
        var given_sum = 0;
        var balance_sum = 0;
        for (var i = 0; i < tds.length; i++) {
            if (tds[i].className == 'opening') {
                opening_sum += isNaN(tds[i].innerHTML) ? 0 : parseInt(tds[i].innerHTML);
            }
            if (tds[i].className == 'paid') {
                paid_sum += isNaN(tds[i].innerHTML) ? 0 : parseInt(tds[i].innerHTML);
            }
            if (tds[i].className == 'given') {
                given_sum += isNaN(tds[i].innerHTML) ? 0 : parseInt(tds[i].innerHTML);
            }
            if (tds[i].className == 'balance') {
                balance_sum += isNaN(tds[i].innerHTML) ? 0 : parseInt(tds[i].innerHTML);
            }
        }
        document.getElementById('opening_total').innerHTML = opening_sum;
        document.getElementById('paid_total').innerHTML = paid_sum;
        document.getElementById('given_total').innerHTML = given_sum;
        document.getElementById('balance_total').innerHTML = balance_sum;


    });
</script>

