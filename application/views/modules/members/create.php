
<div id="content-wrapper" style="margin-left: 225px; padding: 70px 10px;">

    <div class="container-fluid">

        <div class="row wrapper border-bottom white-bg">
            <div class="col-lg-4 navbar-right">
                <a class="minimalize-styl-2 btn btn-primary " href="<?php echo base_url('members') ?>"><i class="fa fa-eye"></i> All Members</a>
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

                        <form role="form" action="<?php base_url('members/create') ?>" method="post">
                            <?php echo validation_errors(); ?>

                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <label for="inputEmail4">Membership No</label>
                                    <input type="text" class="form-control" id="membership_no" name="membership_no" placeholder="Membership No">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Full Name</label>
                                    <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Full Name">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">NIC No</label>
                                    <input type="text" class="form-control" id="NIC" name="NIC" placeholder="NIC">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Address</label>
                                <input type="text" class="form-control" id="address" name="address" placeholder="1234 Main St">
                            </div>
                            <div class="form-row">
                            <div class="form- col-md-4">
                                <label for="inputAddress2">Home</label>
                                <input type="text" class="form-control" id="contact_home" name="contact_home" placeholder="Home Number">
                            </div>
                                <div class="form- col-md-4">
                                    <label for="inputAddress2">Mobile</label>
                                    <input type="text" class="form-control" id="contact_mobile" name="contact_mobile" placeholder="Mobile No">
                                </div>

                                <div class="form- col-md-4">
                                    <label for="dob">Date of Birth</label>
                                    <input type="text" class="form-control" id="dob" name="dob" placeholder="Date of Birth">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="bank">Bank</label>
                                    <input type="text" class="form-control" id="bank" name="bank" placeholder="Bank Name">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="account_no">Account No</label>
                                    <input type="text" class="form-control" id="account_no" name="account_no" placeholder="Account No">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <label for="email">Photo</label>
                                    <input type="email" class="form-control" id="email" name="email">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="bank">Signature</label>
                                    <input type="email" class="form-control" id="bank" name="bank">
                                </div>

                            </div>

                            <div class="form-group" style="background-color: #edf9f4">
                                <div class="container">
                                    <h5>Opening due</h5>

                                    <div class="form-row">
                                        <div class="form-group col-md-2">
                                            <label for="nominee_full_name">Subscription</label>
                                            <input type="text" class="form-control" id="subscription" name="subscription" value="0">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="nominee_full_name">Fine</label>
                                            <input type="text" class="form-control" id="fine" name="fine" value="0">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="nominee_full_name">Umra</label>
                                            <input type="text" class="form-control" id="umra" name="umra" value="0">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="nominee_full_name">Chit</label>
                                            <input type="text" class="form-control" id="chit" name="chit" value="0">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="nominee_full_name">Loan 1</label>
                                            <input type="text" class="form-control" id="loan1" name="loan1" value="0">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="nominee_full_name">Present 1</label>
                                            <input type="text" class="form-control" id="present1" name="present1" value="0">
                                        </div>

                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-2">
                                            <label for="nominee_full_name">Loan 2</label>
                                            <input type="text" class="form-control" id="loan2" name="loan2" value="0">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="nominee_full_name">Present 2</label>
                                            <input type="text" class="form-control" id="present2" name="present2" value="0">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="nominee_full_name">Loan Donation</label>
                                            <input type="text" class="form-control" id="loandonation" name="loandonation" value="0">
                                        </div>


                                    </div>

                                    <div class="form-row">

                                        <div class="form-group col-md-2">
                                            <label for="umraopening"><h5>Umra Opening balance</h5></label>
                                            <input type="text" class="form-control" id="umraopening" name="umraopening" value="0">
                                        </div>


                                    </div>


                                </div>
                            </div>


                            <div class="form-group" style="background-color: #e9ecef">
                                <div class="container">
                                <h5>Nominee</h5>

                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="nominee_full_name">Full Name</label>
                                        <input type="text" class="form-control" id="nominee_full_name" name="nominee_full_name">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="nominee_address">Address</label>
                                        <input type="text" class="form-control" id="nominee_address" name="nominee_address">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="inputState">Sex</label>
                                        <select id="inputState" class="form-control">
                                            <option value="Male" selected>Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="form-row">
                                    <div class="form-group col-md-2">
                                        <label for="relationship">Relationship</label>
                                        <input type="text" class="form-control" id="relationship" name="relationship">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="bank">Signature</label>
                                        <input type="email" class="form-control" id="bank" name="bank">
                                    </div>

                                </div>
                            </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Create Member</button>
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
        $("#membersMainMenu").addClass('active');
    });
</script>
