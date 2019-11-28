<div id="content-wrapper" style="margin-left: 225px; padding: 70px 10px;">


    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <!-- Main content -->
                    <div class="invoice p-3 mb-3">
                        <!-- title row -->
                        <div id="due">
                            <div class="row">
                                <div class="col-12">

                                    <div class="row">
                                        <div class="col-md-3" align="center">
                                            <img src="<?php echo base_url('assets/img/yfslogo.png'); ?>" width="110"
                                                 height="120">
                                        </div>
                                        <div class="col-md-9 callout callout-info" align="center">
                                            <h3>YOUNG FLOWERS SOCIAL SERVICE DEVELOPMENT SOCIETY</h3>
                                            <h4>AMPARAI ROAD, SAMMANTHURAI </h4>
                                            <h3>Regd.No:STR/DS/SS/85/2005</h3>
                                        </div>
                                    </div>
                                    <br>
                                    <div style="padding: 0px 140px">
                                        <h5>Monthly meeting invitation to:</h5>
                                        <h5>
                                            <i class="fas fa-globe"></i> <?php echo $members_data['full_name']; ?>
                                        </h5>
                                    </div>

                                </div>
                                <!-- /.col -->
                            </div>
                            <br>
                            <!-- info row -->
                            <div class="row invoice-info">
                                <div class="col-12">
                                    <h5>
                                    <textarea cols="110"  id="text" name="text" placeholder="Invitation" style="border: none" >The monthly meeting of our society will be held on 28-01-2020 at 8 PM at the residence of the member XYZ</textarea>
                                    </h5>
                                </div>
                                <!-- /.col -->
                            </div>
                            <br>
                            <!-- /.row -->

                            <!-- Table row -->
                            <div class="row justify-content-center">
                                <div class="col-8 table-responsive">
                                    <h5> Please settle the following payments:</h5>

                                    <table id="duetable" class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>Description</th>
                                            <th align="right">Amount</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>Monthly Subscription</td>
                                            <td align="right" class="amounts"><?php echo $subscription_due; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Fine</td>
                                            <td align="right" class="amounts"><?php echo $fine_due; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Umra</td>
                                            <td align="right" class="amounts"><?php echo $umra_due; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Chit</td>
                                            <td align="right" class="amounts"><?php echo $chit_due; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Loan 1 (Monthly)</td>
                                            <td align="right" class="amounts"><?php echo $loan1_due; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Present 1</td>
                                            <td align="right" class="amounts"><?php echo $present1_due; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Loan 2 (Long Term)</td>
                                            <td align="right" class="amounts"><?php echo $loan2_due; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Present 2</td>
                                            <td align="right" class="amounts"><?php echo $present2_due; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Loan 3 (donation)</td>
                                            <td align="right" class="amounts"><?php echo $loandonation_due; ?></td>
                                        </tr>


                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.col -->
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <h5>
                                        <textarea id="note" name="note"  cols="110" placeholder="Invitation" style="border: none" >Note:</textarea>
                                    </h5>
                                </div>
                            </div>
                            <br><br><br>
                            <div class="row">
                                <div class="col-md-6" align="center"><strong>Secretary</strong></div>
                                <div class="col-md-6" align="center"><strong>Treasurer</strong></div>

                            </div>

                        </div>
                        <!-- this row will not appear when printing -->
                        <br><br><br><br>
                        <div class="row no-print">
                            <div class="col-12">
                                <a onclick="printDiv('due')" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                            </div>
                        </div>
                    </div>
                    <!-- /.invoice -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
</div>


<!-- /.content-wrapper -->


<script language="javascript" type="text/javascript">
    $(document).ready(function () {
        $("#membersMainMenu").addClass('active');
        var tds = document.getElementById('duetable').getElementsByTagName('td');
        var sum = 0;
        for (var i = 0; i < tds.length; i++) {
            if (tds[i].className == 'amounts') {
                sum += isNaN(tds[i].innerHTML) ? 0 : parseInt(tds[i].innerHTML);
            }
        }
        document.getElementById('duetable').innerHTML += '<tr><td><strong>Total</strong></td><td align="right"><strong>' + sum + '</strong></td></tr>';


    });
</script>

<script>
    function printDiv(divName){
        var text =document.getElementById("text").value; 
        var note = document.getElementById("note").value;
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        document.getElementById("text").value=text;
        document.getElementById("note").value=note;
        window.print();
       document.body.innerHTML = originalContents;
    }
</script>





