<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.validate.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

        jQuery.validator.addMethod("names", function(value, element) {
            //var regval = $(element.outerHTML).attr('regex');
            return this.optional(element) || /^[a-zA-Z]+$/.test(value);
        }, "Please Enter Valid Characters");

        $("#signup").validate({
            rules: {
                email: {required:true, email:true, remote:"/register"},
                first_name: { required:true, maxlength: 32, names:true },
                last_name: { required:true, maxlength: 32, names:true },
                mobile_number: { required:true, remote:"/register" }
            },
            messages:{
                email:{ required:"Please Enter Your Email", email:"Invalid Email Address", remote:"Email Already Taken"},
                mobile_number:{ remote:"Mobile Number Already Taken"}
            }
        });

        $("#regbtn").click(function() {
            $('#signup').submit();
        });

        $('.successbox').hide();//Hide the div
        $('.warningbox').hide();
        $('.errormsgbox').hide();

        $(".successbox").fadeIn(2000); //Add a fade in effect that will last for 2000 millisecond
        $(".warningbox").fadeIn(2000);
        $(".errormsgbox").fadeIn(2000);

        $(".successbox").fadeOut(2000); //Add a fade in effect that will last for 2000 millisecond
        $(".warningbox").fadeOut(2000);
        $(".errormsgbox").fadeOut(2000);
    });


</script>

<!-- #BeginEditable "content" -->

<div class="registerpage">

    <h1>Register</h1>

    <div>
        <?php
            $message = json_decode($this->session->flashdata('msg'), 1);
            echo '<div class="'.$message['class'].'" > '.$message['msg'].' </div>';
        ?>
        <?php echo validation_errors('<div class="error">', '</div>'); ?>
        <!--<div class="successbox" > This is a success message Box </div>
        <div class="warningbox" > This is a warning message Box </div>
        <div class="errormsgbox" > This is a Error  message Box </div>-->
    </div>

    <div id="newcampform">

        <?php echo form_open(site_url('/register/save'),array('name'=>'signup','id'=>'signup', 'class'=>'signup'));?>

        <!--<form id="signup" name="signup" method="post">-->
            <div>
                <label>Email Address</label>
                <input type="text" name="email" id="email">
            </div>

            <div>
                <label>Select Country</label>
                <select>
                    <option>Australia</option>
                    <option>other</option>
                </select>
            </div>

            <div>
                <label>Mobile Number</label>
                <input type="text" name="mobile_number" id="mobile_number">
                <p>Mobile phone number (required) - Enter a valid mobile phone number. Please enter your mobile number in international format. For example, if you are registering with 0415000000 it will need to be entered as 61415000000.
                    In order to receive your password instantly, please ensure that this mobile is switched on and within network range.</p>
            </div>

            <div>
                <label>First Name</label>
                <input type="text" name="first_name" id="first_name">
                <label>Last Name</label>
                <input type="text" name="last_name" id="last_name">
                <label>Company Name</label>
                <input type="text" name="company_name" id="company_name">
                <label>Address</label>
                <input type="text" name="address_line_1" id="address_line_1">
                <label>Suburbs</label>
                <input type="text" name="suburb" id="suburb">
                <label>State</label>
                <select name="state_code" id="state_code">
                    <option>Australian Capital Territory</option>
                    <option selected="selected">New South Wales</option>
                    <option>Northern Territory</option>
                    <option>Queensland</option>
                    <option>South Australia</option>
                    <option>Tasmania</option>
                    <option>Victoria</option>
                    <option>Western Australia</option>
                </select>
                <br>
            </div>
            <a href="javascript:void(0)" id="regbtn" class="registerbtn">Register</a>
            <!--<input type="submit" class="registerbtn" value="Register">-->

        <?php echo form_close();?>
    </div>

</div><!-- content div ends -->

<!-- #EndEditable -->