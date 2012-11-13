<script type="text/javascript">

    $(document).ready(function () {
        $('#group_id').change(function () {
            $.get("/userpanel", {
                group_id:$('#group_id').val()
            }, function (response) {
                writeMobile('numbers', response);
            });
            return false;
        });
    });

    function writeMobile(id, response) {
        $('#'+ id).val($('#'+id).val() + response);
        //$('#' + id).attr('value',unescape(response));
    }

</script>
<!-- #BeginEditable "body" -->

<ul class="tab">
    <li><a class="selected" href="#">Saved Campaign</a></li>
    <li><a href="#">Scheduled Campaign</a></li>
    <li><a id="newcamp" href="/userpanel/new_campaign">Start New Campaign</a></li>
</ul>

<div id="newcampform">
    <form>
        <div>
            <label>Campaign Name</label>
            <input type="text">
            <br>
            <label>Campaign Description</label>
            <input type="text">
        </div>

        <div>
            <h3>Specify Message</h3>
            <p>Personalise your message by using these <a href="#">custom fields</a>. It will be replaced with its associated value when the message is sent.To see your available custom fields click  <a href="#">here</a>. Remember, Custom fields only works for your imported contact.</p>
            <textarea></textarea>
            <p>Character Count: 0 (1 part)<br>
                (1 SMS = 153 characters, 2 SMS = 306 characters, ....)</p>
        </div>

        <div>
            <h3>Select Sender Identification</h3>
            <a>Registered Sender Identification</a>

            <ul>
                <?php

                    $count = count($data['sender_ids']);
                    for ($i = 0; $i < $count; ++$i)
                    {
                        echo '<li><input type="radio" name="sender_id" value="'.$data['sender_ids'][$i]['sender_number'].'"';

                        if($data['sender_ids'][$i]['sender_status'] == 1)
                            echo 'checked="checked"';
                        echo '><label>'.$data['sender_ids'][$i]['sender_number'].'</label></li>';
                    }

                ?>

                <li><strong>Custom Sender ID's</strong></li>
                <li>
                    <input type="radio" name="sender_id" value="CusSenderID" >
                    <input type="text" name="custom_name">
                </li>

            </ul>

        </div>

        <div>
            <h3>Add Contacts</h3>
            <label>Add numbers from list</label>
            <select name="group_id" id="group_id">
                <option value="" selected="">--Select List--</option>
            <?php
                $count = count($data['group_details']);
                for ($i = 0; $i < $count; ++$i)
                    echo '<option value="'.$data['group_details'][$i]['id'].'">'.$data['group_details'][$i]['group_name'].'</option> ';

            ?>
            </select>

            <br>
            <br>
            <label>Input numbers</label>
            <textarea name="numbers" id="numbers"></textarea>
            <p>Please enter the mobile numbers in international format. For example, 0415284887 will need to be entered as 61415284887. If you are entering more than 1 mobile number manually please separate the numbers by a comma ",". E.g. 61415284887,61415284321.</p>
            <br>
            <!--<label>Add Numbers from file</label>
            <p><a href="#">Download txt template</a><a href="#">Download csv template</a></p>
            <input type="file"><input type="button" value="Upload"><br>
            <a>(Maximum file size 512kb)</a>-->
        </div>

        <div>
            <h3>Schedule Delivery</h3>
            <select>
                <option>Now</option>
                <option>Date</option>
                <option>Date</option>
                <option>Date</option>
                <option>Date</option>
                <option>Date</option>
                <option>Date</option>
            </select>
        </div>

        <div>
            <input class="sendnowbtn" type="submit" value="Send Now"> &nbsp;<input class="suplist" type="submit" value="Save"><input class="suplist" type="submit" value="Cancel">
        </div>

    </form>
</div>



<!-- #EndEditable -->