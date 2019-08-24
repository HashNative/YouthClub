
<div id="content-wrapper" style="margin-left: 225px; padding: 70px 10px;">

    <div class="container-fluid">

        <div class="row wrapper border-bottom white-bg">
            <div class="col-lg-4 navbar-right">
                <a class="minimalize-styl-2 btn btn btn-outline-secondary " href="<?php echo base_url('payment') ?>"><i class="fa fa-eye"></i> Payment History</a>
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

                        <form role="form" action="<?php base_url('payment/create') ?>" method="post">
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

                                <div class="form- col-md-2">
                                    <label for="subscription">Subscription</label>
                                    <input type="text" class="form-control" id="subscription" name="subscription" placeholder="Subscription" value="0" onkeyup="calculateTotal(this)">
                                </div>
                                <div class="form- col-md-2">
                                    <label for="fine">Fine</label>
                                    <input type="text" class="form-control" id="fine" name="fine" placeholder="Fine" value="0"  onkeyup="calculateTotal(this)">
                                </div>
                                <div class="form- col-md-2">
                                    <label for="umra">Umra</label>
                                    <input type="text" class="form-control" id="umra" name="umra" placeholder="Umra" value="0"  onkeyup="calculateTotal(this)">
                                </div>
                                <div class="form- col-md-2">
                                    <label for="chit">Chit</label>
                                    <input type="text" class="form-control" id="chit" name="chit" placeholder="Chit" value="0" onkeyup="calculateTotal(this)" >
                                </div>
                                <div class="form- col-md-2">
                                    <label for="loan1">Loan 1</label>
                                    <input type="text" class="form-control" id="loan1" name="loan1" placeholder="Loan 1" value="0" onkeyup="calculateTotal(this)">
                                </div>
                                <div class="form- col-md-2">
                                    <label for="present1">Present 1</label>
                                    <input type="text" class="form-control" id="present1" name="present1" placeholder="Present1" value="0" onkeyup="calculateTotal(this)">
                                </div>

                </div>
                            <div class="form-row">

                                <div class="form- col-md-2">
                                    <label for="loan2">Loan 2</label>
                                    <input type="text" class="form-control" id="loan2" name="loan2" placeholder="Loan 2"  value="0" onkeyup="calculateTotal(this)">
                                </div>
                                <div class="form- col-md-2">
                                    <label for="present2">Present 2</label>
                                    <input type="text" class="form-control" id="present2" name="present2" placeholder="Present 2"  value="0" onkeyup="calculateTotal(this)">
                                </div>
                                <div class="form- col-md-2">
                                    <label for="loandonation">Loan Donation</label>
                                    <input type="text" class="form-control" id="loandonation" name="loandonation" placeholder="Loan donation"  value="0" onkeyup="calculateTotal(this)">
                                </div>
                                <div class="form- col-md-2">
                                    <label for="extra">Extra</label>
                                    <input type="text" class="form-control" id="extra" name="extra" placeholder="Extra" value="0" onkeyup="calculateTotal(this)">
                                </div>

                            </div>

                            <div class="form-row">

                                <div class="form- col-md-2">
                                    <label for="total">Total</label>
                                    <input type="text" class="form-control" id="total" name="total" placeholder="Total" value="0" >
                                </div>

                            </div>



                            <div class="form-group" style="background-color: #e9ecef">
                                <div class="container">
                                    <h4>Payment</h4>

                                    <div class="form-row">

                                        <div class="form-group col-md-4">
                                            <label for="method">Method</label>
                                            <select id="method" name="method" class="form-control">
                                                <option value="Cash">Cash</option>
                                                <option value="cheque">Cheque</option>
                                            </select>
                                        </div>
                                        <div class="form- col-md-4">
                                            <label for="cheque_no">Cheque No</label>
                                            <input type="text" class="form-control" id="cheque_no" name="cheque_no" placeholder="Cheque No" >
                                        </div>

                                    </div>

                                </div>
                            </div>

                            <button type="submit" class="btn btn-success">Save Payment</button>
                </form>


            </div>
        </div>

    </div>
</div>
</div>


</div>

</div>


<script>

    $(document).ready(function() {
        $("#paymentMainMenu").addClass('active');
    });
    function calculateTotal(field) {
        if(field.value) {
            var totalamount = Number($("#subscription").val())+Number($("#fine").val())+Number($("#umra").val())+Number($("#chit").val())
                +Number($("#loan1").val())+Number($("#loan2").val())+Number($("#loandonation").val())+Number($("#extra").val());
            $("#total").val(totalamount);
        }else{
            field.value=0 ;
            var totalamount = Number($("#subscription").val())+Number($("#fine").val())+Number($("#umra").val())+Number($("#chit").val())
                +Number($("#loan1").val())+Number($("#loan2").val())+Number($("#loandonation").val())+Number($("#extra").val());
            $("#total").val(totalamount);
        }
    }
</script>
