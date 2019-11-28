<div id="content-wrapper" style="margin-left: 225px; padding: 70px 10px;">

    <div class="container-fluid">

        <div class="row wrapper border-bottom white-bg">
            <div class="col-lg-4 navbar-right">
                <a class="minimalize-styl-2 btn btn btn-outline-secondary " href="<?php echo base_url('loan') ?>"><i class="fa fa-eye"></i> Loan History</a>
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

                        <form role="form" action="<?php base_url('loan/edit/'.$loan_data['id']) ?>" method="post">
                            <?php echo validation_errors(); ?>

                            <div class="form-row">

                                <div class="form-group col-md-8">
                                    <label for="membership_no">Membership No</label>
                                    <select id="membership_no" name="membership_no" class="form-control">
                                        <?php foreach ($members_data as $k => $v): ?>
                                            <option value="<?php echo $v['membership_no'].'-'.$v['full_name']; ?>" <?php if($loan_data['membership_no']==$v['membership_no']){echo 'selected';} ?> ><?php echo $v['membership_no'].'-'.$v['full_name']; ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="loandate">Date</label>
                                    <input type="date" class="form-control" id="loandate" name="loandate" value="<?php echo $loan_data['date']; ?>">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <label for="loantype">Type of Loan</label>
                                    <select id="loantype" name="loantype" class="form-control">
                                        <option value="Loan1" <?php if($loan_data['type']=='Loan1'){echo 'selected';} ?>>Loan 1</option>
                                        <option value="Loan2" <?php if($loan_data['type']=='Loan2'){echo 'selected';} ?>>Loan 2</option>
                                        <option value="LoanDonation"<?php if($loan_data['type']=='LoanDonation'){echo 'selected';} ?> >Loan Donation</option>

                                    </select>
                                </div>
                                <div class="form- col-md-4">
                                    <label for="amount">Amount</label>
                                    <input type="text" class="form-control" id="loanamount" name="loanamount" placeholder="Amount"  value="<?php echo $loan_data['amount'] ?>" onkeyup="addRow()">
                                </div>
                                <div class="form- col-md-4">
                                    <label for="present">Present</label>
                                    <input type="text" class="form-control" id="presentamount" name="presentamount" placeholder="Present" value="<?php echo $loan_data['present'] ?>" onkeyup="addRow()">
                                </div>
                                <div class="form- col-md-2">
                                    <label for="duration">Duration</label>
                                    <input type="text" class="form-control" id="duration" name="duration" placeholder="Duration" autocomplete="off" value="<?php echo $loan_data['duration'] ?>" onkeyup="addRow()" required> Months
                                </div>



                            </div>

                            <p>Divide:</p>
                            <div class="row">
                                <div class="col-md-8">
                                <table class="table table-bordered" id="devided_info_table">
                                    <thead>
                                    <tr>
                                        <th style="width:10%">Payment Date</th>
                                        <th style="width:30%">Amount</th>
                                        <th style="width:30%">Present</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <tr id="row_1">
                                        <td>
                                            <input type="date" name="datedivide[]" id="date_1"class="form-control" required>
                                        </td>
                                        <td>
                                            <input type="text" name="amountdivide[]" id="amount_1" class="form-control">
                                        </td>
                                        <td>
                                            <input type="text" name="presentdivide[]" id="present_1" class="form-control">
                                        </td>

                                    </tr>
                                    </tbody>
                                </table>
                                </div>

                            </div>




                            <div class="form-row">

                                <div class="form-group col-md-4">
                                    <label for="method">Payment Method</label>
                                    <select id="method" name="method" class="form-control">
                                        <option value="Cash">Cash</option>
                                        <option value="cheque" <?php if($loan_data['cheque_no']=='cheque'){echo 'selected';}  ?>>Cheque</option>
                                    </select>
                                </div>
                                <div class="form- col-md-4">
                                    <label for="cheque_no">Cheque No</label>
                                    <input type="text" class="form-control" id="cheque_no" name="cheque_no" value="<?php echo $loan_data['cheque_no'] ?>" placeholder="Cheque No" >
                                </div>

                            </div>



                            <div class="form-group" style="background-color: #e9ecef">
                                <div class="container">
                                    <h4>Witness</h4>

                                    <div class="form-row">

                                        <div class="form-group col-md-4">
                                            <label for="witness1">Witness 1</label>
                                            <select id="witness1" name="witness1" class="form-control">
                                                <?php foreach ($members_data as $k => $v): ?>
                                                    <option value="<?php echo $v['membership_no'] ?>" <?php if($loan_data['witness1']==$v['membership_no']){echo 'selected';} ?>><?php echo $v['membership_no'].'-'.$v['full_name']; ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="witness2">Witness 2</label>
                                            <select id="witness2" name="witness2" class="form-control">
                                                <?php foreach ($members_data as $k => $v): ?>
                                                    <option value="<?php echo $v['membership_no'] ?>" <?php if($loan_data['witness2']==$v['membership_no']){echo 'selected';} ?>><?php echo $v['membership_no'].'-'.$v['full_name']; ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>

                                    </div>

                                </div>
                            </div>

                            <button type="submit" class="btn btn-success">Save Changes</button>
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
        $("#loanMainMenu").addClass('active');
    });

    function addRow() {

        var x = document.getElementById("duration");
        var table = $("#devided_info_table");
        var count_table_tbody_tr = $("#devided_info_table tbody tr").length;
        var row_id = count_table_tbody_tr+1;


        var html =
            '<tr id="row_'+row_id+'">'+
            '<td><input type="date" name="datedivide[]" id="date_'+row_id+'"class="form-control" required></td>'+
            '<td><input type="text" name="amountdivide[]" id="amount_'+row_id+'" class="form-control"></td>'+
            '<td><input type="text" name="presentdivide[]" id="present_'+row_id+'" class="form-control"></td>'+
            '</tr>';

        if(Number(x.value) >= 1) {


            for($i=row_id; $i<=Number(x.value); $i++) {

                html =
                    '<tr id="row_'+$i+'">'+
                    '<td><input type="date" name="datedivide[]" id="date_'+$i+'"class="form-control" required></td>'+
                    '<td><input type="text" name="amountdivide[]" id="amount_'+$i+'" class="form-control"></td>'+
                    '<td><input type="text" name="presentdivide[]" id="present_'+$i+'" class="form-control"></td>'+
                    '</tr>';


                $("#devided_info_table tbody tr:last").after(html);
                // $("#amount_1").val($("#devided_info_table tbody tr").length);
            }

            for($i=row_id-1; $i<=Number(x.value); $i++) {
                var newamount = Number($("#loanamount").val())/Number(x.value);
                var newpresent = Number($("#presentamount").val())/Number(x.value)
                $("#amount_"+$i).val(newamount.toFixed(2));
                $("#present_"+$i).val(newpresent.toFixed(2));

            }
            }
        else {
            for($r=2; $r<=count_table_tbody_tr; $r++) {
                $("#devided_info_table tbody tr#row_"+$r).remove();
            }
          //   $("#devided_info_table tbody").html(html);

            $("#amount_1").val($("#loanamount").val());
            $("#present_1").val($("#presentamount").val());

        }



    }
</script>


