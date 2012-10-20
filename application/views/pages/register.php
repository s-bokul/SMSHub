<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.validate.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

        jQuery.validator.addMethod("names", function(value, element) {
            //var regval = $(element.outerHTML).attr('regex');
            return this.optional(element) || /^[a-zA-Z]+$/.test(value);
        }, "Please Enter Valid Characters");

        $("#signup").validate({
            rules: {
                email: {required:true, email:true},
                firstname: { required:true, maxlength: 32, names:true },
                lastname: { required:true, maxlength: 32, names:true }
            }
        });
    });


</script>

<!-- #BeginEditable "content" -->

<div class="registerpage">

    <h1>Register</h1>

    <div id="newcampform">
        <form id="signup" name="signup" method="post">
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
                <input type="text">
                <p>Mobile phone number (required) - Enter a valid mobile phone number. Please enter your mobile number in international format. For example, if you are registering with 0415000000 it will need to be entered as 61415000000.
                    In order to receive your password instantly, please ensure that this mobile is switched on and within network range.</p>
            </div>

            <div>
                <label>First Name</label>
                <input type="text" name="firstname" id="firstname">
                <label>Last Name</label>
                <input type="text" name="lastname" id="lastname">
                <label>Company Name</label>
                <input type="text">
                <label>Address</label>
                <input type="text">
                <label>Suburbs</label>
                <input type="text">
                <label>State</label>
                <select>
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
                <br>
                <label>Referral Code</label>
                <input type="text">
            </div>

            <div>
                <label>Are you Human</label>
                <input type="text">
            </div>

            <input type="submit" class="registerbtn" value="Register">

        </form>
    </div>

</div><!-- content div ends -->

<!-- #EndEditable -->