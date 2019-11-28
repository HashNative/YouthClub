

    <div id="content-wrapper" style="margin-left: 225px; padding: 70px 10px;">

        <div class="container-fluid">

            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Overview</li>
                <li>/ view <a href="<?php echo base_url('reports/annual'); ?>" class="btn btn-secondary btn-sm breadcrumb-item">Annual Report</a></li>
            </ol>

            <!-- Icon Cards
            <div class="row">
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card text-white bg-primary o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fas fa-fw fa-comments"></i>
                            </div>
                            <div class="mr-5">26 New Messages!</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="#">
                            <span class="float-left">View Details</span>
                            <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card text-white bg-warning o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fas fa-fw fa-list"></i>
                            </div>
                            <div class="mr-5">11 New Tasks!</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="#">
                            <span class="float-left">View Details</span>
                            <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card text-white bg-success o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fas fa-fw fa-shopping-cart"></i>
                            </div>
                            <div class="mr-5">123 New Orders!</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="#">
                            <span class="float-left">View Details</span>
                            <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card text-white bg-danger o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fas fa-fw fa-life-ring"></i>
                            </div>
                            <div class="mr-5">13 New Tickets!</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="#">
                            <span class="float-left">View Details</span>
                            <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
                        </a>
                    </div>
                </div>
            </div> -->

            <!-- Monthly report -->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-table"></i>
                    Monthly Transaction - For this month (<a href="<?php echo base_url(); ?>"><?php echo $month; ?>/<?php echo $year; ?></a>)
                    <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#filterModal">Filter</button>

                    <div class="modal inmodal" id="filterModal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Filter Monthly report</h4>
                                </div>
                                <form role="form" action="<?php echo base_url('/dashboard'); ?>" method="post" id="filterForm">
                                    <div class="confirmation-modal-body">
                                        <div class="modal-body">
                                            <label>Select Month to filter: </label><input type="month" class="form-control" id="month" name="month" required>
                                        </div>
                                        <div class="modal-footer d-flex justify-content-around">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" name="confirm">Filter</button>
                                        </div>
                                    </div>


                                </form>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="card-body">
                    <div id="monthly_summary" class="table-responsive">
                        <table id="monthy_report_table" class="table table-bordered table-sm table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead class="thead-dark">
                            <tr>
                                <th>Description</th>
                                <th>Credit</th>
                                <th>Debit</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Total</th>
                                <th id="credit_total">0</th>
                                <th id="debit_total">0</th>
                            </tr>
                            <tr class="table-secondary">
                                <th>Total In Hand</th>
                                <th id="inhand_total">0</th>

                            </tr>
                            </tfoot>

                            <tbody>
                            <tr class="table-primary">
                                <td>Brought Forward</td>
                                <td class="credit"><?php echo $brought_forward; ?></td>
                                <td>0</td>
                            </tr>
                            <tr>
                                <td>Subscription</td>
                                <td class="credit"><?php echo $subscription_pay; ?></td>
                                <td>0</td>
                            </tr>
                            <tr>
                                <td>Fine</td>
                                <td class="credit"><?php echo $fine_pay; ?></td>
                                <td>0</td>
                            </tr>
                            <tr>
                                <td>YFS Chit Received</td>
                                <td class="credit"><?php echo $chit_pay; ?></td>
                                <td>0</td>
                            </tr>
                            <tr>
                                <td>Umra Deposit</td>
                                <td class="credit"><?php echo $umra_pay; ?></td>
                                <td>0</td>
                            </tr>
                            <tr>
                                <td>Loan 1 Received</td>
                                <td class="credit"><?php echo $loan1_pay; ?></td>
                                <td>0</td>
                            </tr>
                            <tr>
                                <td>Present 1 Received</td>
                                <td class="credit"><?php echo $present1_pay; ?></td>
                                <td>0</td>
                            </tr>
                            <tr>
                                <td>Loan 2 Received</td>
                                <td class="credit"><?php echo $loan2_pay; ?></td>
                                <td>0</td>
                            </tr>
                            <tr>
                                <td>Present 2 Received</td>
                                <td class="credit"><?php echo $present2_pay; ?></td>
                                <td>0</td>
                            </tr>
                            <tr>
                                <td>Loan donation Received</td>
                                <td class="credit"><?php echo $loandonation_pay; ?></td>
                                <td>0</td>
                            </tr>
                            <?php foreach ($income_data as $k => $v): ?>
                                <tr>
                                    <td><?php echo $v['income_info']['description']; ?></td>
                                    <td class="credit"><?php echo $v['income_info']['subamount']; ?></td>
                                    <td>0</td>
                                </tr>
                            <?php endforeach; ?>


                            <tr>
                                <td>Loan 1 Given</td>
                                <td>0</td>
                                <td class="debit"><?php echo $loan1_given; ?></td>
                            </tr>
                            <tr>
                                <td>Loan 2 Given</td>
                                <td>0</td>
                                <td class="debit"><?php echo $loan2_given; ?></td>
                            </tr>
                            <tr>
                                <td>Loan Donation Given</td>
                                <td>0</td>
                                <td class="debit"><?php echo $loandonation_given; ?></td>
                            </tr>
                            <tr>
                                <td>YFS Chit Given</td>
                                <td>0</td>
                                <td class="debit"><?php echo $chit_given; ?></td>
                            </tr>

                            <?php foreach ($expense_data as $k => $v): ?>
                                <tr>
                                    <td><?php echo $v['expense_info']['description']; ?></td>
                                    <td>0</td>
                                    <td class="debit"><?php echo $v['expense_info']['subamount']; ?></td>

                                </tr>
                            <?php endforeach; ?>
                            <tr>
                                <td>Umra Given</td>
                                <td>0</td>
                                <td class="debit"><?php echo $umra_given; ?></td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                    <div class="row no-print">
                        <div class="col-12">
                            <a onclick="printTable('monthly_summary')" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                        </div>
                    </div>
                </div>
                <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
            </div>

             


        </div>
        <!-- /.container-fluid -->



        <script language="javascript" type="text/javascript">
            $(document).ready(function () {

                var tds = document.getElementById('monthy_report_table').getElementsByTagName('td');
                var credit_sum = 0;
                var debit_sum = 0;

                for (var i = 0; i < tds.length; i++) {
                    if (tds[i].className == 'credit') {
                        credit_sum += isNaN(tds[i].innerHTML) ? 0 : parseInt(tds[i].innerHTML);
                    }
                    if (tds[i].className == 'debit') {
                        debit_sum += isNaN(tds[i].innerHTML) ? 0 : parseInt(tds[i].innerHTML);
                    }

                }
                document.getElementById('credit_total').innerHTML = credit_sum;
                document.getElementById('debit_total').innerHTML = debit_sum;
                document.getElementById('inhand_total').innerHTML = credit_sum-debit_sum;


            });
        </script>

        <script>
            function printTable(divName){
                var printContents = document.getElementById(divName).innerHTML;
                var originalContents = document.body.innerHTML;
                document.body.innerHTML = printContents;

                window.print();
                document.body.innerHTML = originalContents;
            }
        </script>
