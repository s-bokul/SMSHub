<div id="header">
    <h1 id="logo"><a href="#"><img src="images/logo.jpg" alt=""></a></h1>
    <ul id="usernav">
        <li><a>Welcome <?php $user_info = $this->session->userdata('user_info'); echo $user_info['first_name'];?></a></li>
        <li><a class="tel"><?php  echo $user_info['mobile_number'];?></a></li>
        <li><a class="credit">45 Credits</a></li>
        <li><a class="purchasebtn" href="purchase.html">Purchase</a></li>
        <li><a href="/login/logout">Logout</a></li>
    </ul>

</div>

<div id="headnavcontainer">

    <ul id="headnav">
        <li><a href="/userpanel" class="selected">Campaign</a></li>
        <li><a href="userInbox.html">Inbox</a></li>
        <li><a href="#">Contacts</a>
            <ul>
                <li><a href="/usercontact">Find Contacts</a></li>
                <li><a href="/usercontact/addcontact">Add Contacts</a></li>
                <li><a href="/usercontact/contactlist">Contact List</a></li>
                <li><a href="/usercontact/importcontact">Import Contacts</a></li>
                <li><a href="exportcontact.html">Export Contacts</a></li>
                <li><a href="supressionlist.html">Suppression List</a></li>
                <li><a href="suppresscontact.html">Supression Contacts</a></li>
                <li><a href="transformnumbers.html">Transform Numbers</a></li>
                <li><a href="/usercontact/customfield">Custom Fields</a></li>
                <li><a href="/usercontact/addcustomfield">Add cutom fields</a></li>
            </ul>
        </li>
        <li><a href="history.html">History</a></li>
        <li><a href="/userpanel/account_details">Settings</a></li>
    </ul>

</div>