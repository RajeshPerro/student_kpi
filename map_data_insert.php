<?php
/**
 * Created by PhpStorm.
 * User: rajesh
 * Date: 10/29/15
 * Time: 10:30 AM
 */
session_start();
?>

<html>
<head>
    <title>EDU KPI :: Map Data </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link  rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
    <link  rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link  rel="stylesheet" type="text/css" href="css/style.css">
    <!-- Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
    <script src="js/jquery-1.11.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/authentication.js"></script>
    <script type="javascript" src="js/custome.js"></script>


    <script src="http://www.marghoobsuleman.com/misc/jquery.js"></script>
    <!-- <msdropdown> -->
    <link rel="stylesheet" type="text/css" href="css/msdropdown/dd.css" />
    <script src="js/msdropdown/jquery.dd.min.js"></script>
    <!-- </msdropdown> -->
    <link rel="stylesheet" type="text/css" href="css/msdropdown/flags.css" />
</head>
<body>
<div class="container-fluid">
    <div id="header">

        <!-- Navigation -->
        <nav class="navbar navbar-default padding-top-bottom">
            <div class="container">

                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div class="col-xs-4 col-sm-12">
                        <a class="navbar-brand logo" href="#">
                            <img src="images/ct.png" alt="CT logo" class="img-responsive" width="100" height="100">
                        </a>
                    </div>
                </div>


                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                    <?php include('header.php'); ?>
                </div>

                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>
    </div>
    <div class="container">
        <div class="row">

            <ul class="breadcrumb">
                <li><a href="dashboard.php?user=<?php echo $_SESSION['user']?> &token=<?php echo $_SESSION['token']?>">
                        <span class="glyphicon glyphicon-dashboard"></span>
                        Dashboard</a></li>
                <li class="active">Insert Earning Zone</li>
            </ul>

        </div>
        <div class="row">
            <form action="map_data_controller.php" method="post">
                <table class="table table-responsive    ">
                    <tr>
                        <td>Name of Place:</td>
                        <td><input class="form-control" type="text" name="name" size="30"></td>
                        <td>Address:</td>
                        <td><select name="address" id="countries" class="form-control">
<option value='default' selected="selected">Please Select a Country</option>
<option value="Afghanistan" data-image="images/msdropdown/icons/blank.gif" title="Afghanistan">Afghanistan</option>
    <option value="Åland Islands" data-image="images/msdropdown/icons/blank.gif" title="Åland Islands">Åland Islands</option>
    <option value="Albania" data-image="images/msdropdown/icons/blank.gif" title="Albania">Albania</option>
    <option value="Algeria" data-image="images/msdropdown/icons/blank.gif" title="Algeria">Algeria</option>
    <option value="American Samoa" data-image="images/msdropdown/icons/blank.gif" title="American Samoa">American Samoa</option>
    <option value="Andorra" data-image="images/msdropdown/icons/blank.gif" title="Andorra">Andorra</option>
    <option value="Angola" data-image="images/msdropdown/icons/blank.gif" title="Angola">Angola</option>
    <option value="Anguilla" data-image="images/msdropdown/icons/blank.gif" title="Anguilla">Anguilla</option>
    <option value="Antarctica" data-image="images/msdropdown/icons/blank.gif" title="Antarctica">Antarctica</option>
    <option value="Antigua and Barbuda" data-image="images/msdropdown/icons/blank.gif" title="Antigua and Barbuda">Antigua and Barbuda</option>
    <option value="Argentina" data-image="images/msdropdown/icons/blank.gif" title="Argentina">Argentina</option>
    <option value="Armenia" data-image="images/msdropdown/icons/blank.gif" title="Armenia">Armenia</option>
    <option value="Aruba" data-image="images/msdropdown/icons/blank.gif" title="Aruba">Aruba</option>
    <option value="Australia" data-image="images/msdropdown/icons/blank.gif" title="Australia">Australia</option>
    <option value="Austria" data-image="images/msdropdown/icons/blank.gif" title="Austria">Austria</option>
    <option value="Azerbaijan" data-image="images/msdropdown/icons/blank.gif" title="Azerbaijan">Azerbaijan</option>
    <option value="Bahamas" data-image="images/msdropdown/icons/blank.gif" title="Bahamas">Bahamas</option>
    <option value="Bahrain" data-image="images/msdropdown/icons/blank.gif" title="Bahrain">Bahrain</option>
    <option value="Bangladesh" data-image="images/msdropdown/icons/blank.gif" title="Bangladesh">Bangladesh</option>
    <option value="Barbados" data-image="images/msdropdown/icons/blank.gif" title="Barbados">Barbados</option>
    <option value="Belarus" data-image="images/msdropdown/icons/blank.gif" title="Belarus">Belarus</option>
    <option value="Belgium" data-image="images/msdropdown/icons/blank.gif" title="Belgium">Belgium</option>
    <option value="Belize" data-image="images/msdropdown/icons/blank.gif" title="Belize">Belize</option>
    <option value="Benin" data-image="images/msdropdown/icons/blank.gif" title="Benin">Benin</option>
    <option value="Bermuda" data-image="images/msdropdown/icons/blank.gif" title="Bermuda">Bermuda</option>
    <option value="Bhutan" data-image="images/msdropdown/icons/blank.gif" title="Bhutan">Bhutan</option>
    <option value="Bolivia, Plurinational State of" data-image="images/msdropdown/icons/blank.gif" title="Bolivia, Plurinational State of">Bolivia, Plurinational State of</option>
    <option value="Bonaire, Sint Eustatius and Saba" data-image="images/msdropdown/icons/blank.gif" title="Bonaire, Sint Eustatius and Saba">Bonaire, Sint Eustatius and Saba</option>
    <option value="Bosnia and Herzegovina" data-image="images/msdropdown/icons/blank.gif" title="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
    <option value="Botswana" data-image="images/msdropdown/icons/blank.gif" title="Botswana">Botswana</option>
    <option value="Bouvet Island" data-image="images/msdropdown/icons/blank.gif" title="Bouvet Island">Bouvet Island</option>
    <option value="Brazil" data-image="images/msdropdown/icons/blank.gif" title="Brazil">Brazil</option>
    <option value="British Indian Ocean Territory" data-image="images/msdropdown/icons/blank.gif" title="British Indian Ocean Territory">British Indian Ocean Territory</option>
    <option value="Brunei Darussalam" data-image="images/msdropdown/icons/blank.gif" title="Brunei Darussalam">Brunei Darussalam</option>
    <option value="Bulgaria" data-image="images/msdropdown/icons/blank.gif" title="Bulgaria">Bulgaria</option>
    <option value="Burkina Faso" data-image="images/msdropdown/icons/blank.gif" title="Burkina Faso">Burkina Faso</option>
    <option value="Burundi" data-image="images/msdropdown/icons/blank.gif" title="Burundi">Burundi</option>
    <option value="Cambodia" data-image="images/msdropdown/icons/blank.gif" title="Cambodia">Cambodia</option>
    <option value="Cameroon" data-image="images/msdropdown/icons/blank.gif" title="Cameroon">Cameroon</option>
    <option value="Canada" data-image="images/msdropdown/icons/blank.gif" title="Canada">Canada</option>
    <option value="Cape Verde" data-image="images/msdropdown/icons/blank.gif" title="Cape Verde">Cape Verde</option>
    <option value="Cayman Islands" data-image="images/msdropdown/icons/blank.gif" title="Cayman Islands">Cayman Islands</option>
    <option value="Central African Republic" data-image="images/msdropdown/icons/blank.gif" title="Central African Republic">Central African Republic</option>
    <option value="Chad" data-image="images/msdropdown/icons/blank.gif" title="Chad">Chad</option>
    <option value="Chile" data-image="images/msdropdown/icons/blank.gif" title="Chile">Chile</option>
    <option value="China" data-image="images/msdropdown/icons/blank.gif" title="China">China</option>
    <option value="Christmas Island" data-image="images/msdropdown/icons/blank.gif" title="Christmas Island">Christmas Island</option>
    <option value="Cocos (Keeling) Islands" data-image="images/msdropdown/icons/blank.gif" title="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
    <option value="Colombia" data-image="images/msdropdown/icons/blank.gif" title="Colombia">Colombia</option>
    <option value="Comoros" data-image="images/msdropdown/icons/blank.gif" title="Comoros">Comoros</option>
    <option value="Congo" data-image="images/msdropdown/icons/blank.gif" title="Congo">Congo</option>
    <option value="Congo, the Democratic Republic of the" data-image="images/msdropdown/icons/blank.gif" title="Congo, the Democratic Republic of the">Congo, the Democratic Republic of the</option>
    <option value="Cook Islands" data-image="images/msdropdown/icons/blank.gif" title="Cook Islands">Cook Islands</option>
    <option value="Costa Rica" data-image="images/msdropdown/icons/blank.gif" title="Costa Rica">Costa Rica</option>
    <option value="Côte d'Ivoire" data-image="images/msdropdown/icons/blank.gif" title="Côte d'Ivoire">Côte d'Ivoire</option>
    <option value="Croatia" data-image="images/msdropdown/icons/blank.gif" title="Croatia">Croatia</option>
    <option value="Cuba" data-image="images/msdropdown/icons/blank.gif" title="Cuba">Cuba</option>
    <option value="Curaçao" data-image="images/msdropdown/icons/blank.gif" title="Curaçao">Curaçao</option>
    <option value="Cyprus" data-image="images/msdropdown/icons/blank.gif" title="Cyprus">Cyprus</option>
    <option value="Czech Republic" data-image="images/msdropdown/icons/blank.gif" title="Czech Republic">Czech Republic</option>
    <option value="Denmark" data-image="images/msdropdown/icons/blank.gif" title="Denmark">Denmark</option>
    <option value="Djibouti" data-image="images/msdropdown/icons/blank.gif" title="Djibouti">Djibouti</option>
    <option value="Dominica" data-image="images/msdropdown/icons/blank.gif" title="Dominica">Dominica</option>
    <option value="Dominican Republic" data-image="images/msdropdown/icons/blank.gif" title="Dominican Republic">Dominican Republic</option>
    <option value="Ecuador" data-image="images/msdropdown/icons/blank.gif" title="Ecuador">Ecuador</option>
    <option value="Egypt" data-image="images/msdropdown/icons/blank.gif" title="Egypt">Egypt</option>
    <option value="El Salvador" data-image="images/msdropdown/icons/blank.gif" title="El Salvador">El Salvador</option>
    <option value="Equatorial Guinea" data-image="images/msdropdown/icons/blank.gif" title="Equatorial Guinea">Equatorial Guinea</option>
    <option value="Eritrea" data-image="images/msdropdown/icons/blank.gif" title="Eritrea">Eritrea</option>
    <option value="Estonia" data-image="images/msdropdown/icons/blank.gif" title="Estonia">Estonia</option>
    <option value="Ethiopia" data-image="images/msdropdown/icons/blank.gif" title="Ethiopia">Ethiopia</option>
    <option value="Falkland Islands (Malvinas)" data-image="images/msdropdown/icons/blank.gif" title="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
    <option value="Faroe Islands" data-image="images/msdropdown/icons/blank.gif" title="Faroe Islands">Faroe Islands</option>
    <option value="Fiji" data-image="images/msdropdown/icons/blank.gif" title="Fiji">Fiji</option>
    <option value="Finland" data-image="images/msdropdown/icons/blank.gif" title="Finland">Finland</option>
    <option value="France" data-image="images/msdropdown/icons/blank.gif" title="France">France</option>
    <option value="French Guiana" data-image="images/msdropdown/icons/blank.gif" title="French Guiana">French Guiana</option>
    <option value="French Polynesia" data-image="images/msdropdown/icons/blank.gif" title="French Polynesia">French Polynesia</option>
    <option value="French Southern Territories" data-image="images/msdropdown/icons/blank.gif" title="French Southern Territories">French Southern Territories</option>
    <option value="Gabon" data-image="images/msdropdown/icons/blank.gif" title="Gabon">Gabon</option>
    <option value="Gambia" data-image="images/msdropdown/icons/blank.gif" title="Gambia">Gambia</option>
    <option value="Georgia" data-image="images/msdropdown/icons/blank.gif" title="Georgia">Georgia</option>
    <option value="Germany" data-image="images/msdropdown/icons/blank.gif" title="Germany">Germany</option>
    <option value="Ghana" data-image="images/msdropdown/icons/blank.gif" title="Ghana">Ghana</option>
    <option value="Gibraltar" data-image="images/msdropdown/icons/blank.gif" title="Gibraltar">Gibraltar</option>
    <option value="Greece" data-image="images/msdropdown/icons/blank.gif" title="Greece">Greece</option>
    <option value="Greenland" data-image="images/msdropdown/icons/blank.gif" title="Greenland">Greenland</option>
    <option value="Grenada" data-image="images/msdropdown/icons/blank.gif" title="Grenada">Grenada</option>
    <option value="Guadeloupe" data-image="images/msdropdown/icons/blank.gif" title="Guadeloupe">Guadeloupe</option>
    <option value="Guam" data-image="images/msdropdown/icons/blank.gif" title="Guam">Guam</option>
    <option value="Guatemala" data-image="images/msdropdown/icons/blank.gif" title="Guatemala">Guatemala</option>
    <option value="Guernsey" data-image="images/msdropdown/icons/blank.gif" title="Guernsey">Guernsey</option>
    <option value="Guinea" data-image="images/msdropdown/icons/blank.gif" title="Guinea">Guinea</option>
    <option value="Guinea-Bissau" data-image="images/msdropdown/icons/blank.gif" title="Guinea-Bissau">Guinea-Bissau</option>
    <option value="Guyana" data-image="images/msdropdown/icons/blank.gif" title="Guyana">Guyana</option>
    <option value="Haiti" data-image="images/msdropdown/icons/blank.gif" title="Haiti">Haiti</option>
    <option value="Heard Island and McDonald Islands" data-image="images/msdropdown/icons/blank.gif" title="Heard Island and McDonald Islands">Heard Island and McDonald Islands</option>
    <option value="Holy See (Vatican City State)" data-image="images/msdropdown/icons/blank.gif" title="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
    <option value="Honduras" data-image="images/msdropdown/icons/blank.gif" title="Honduras">Honduras</option>
    <option value="Hong Kong" data-image="images/msdropdown/icons/blank.gif" title="Hong Kong">Hong Kong</option>
    <option value="Hungary" data-image="images/msdropdown/icons/blank.gif" title="Hungary">Hungary</option>
    <option value="Iceland" data-image="images/msdropdown/icons/blank.gif" title="Iceland">Iceland</option>
    <option value="India" data-image="images/msdropdown/icons/blank.gif" title="India">India</option>
    <option value="Indonesia" data-image="images/msdropdown/icons/blank.gif" title="Indonesia">Indonesia</option>
    <option value="Iran, Islamic Republic of" data-image="images/msdropdown/icons/blank.gif" title="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
    <option value="Iraq" data-image="images/msdropdown/icons/blank.gif" title="Iraq">Iraq</option>
    <option value="Ireland" data-image="images/msdropdown/icons/blank.gif" title="Ireland">Ireland</option>
    <option value="Isle of Man" data-image="images/msdropdown/icons/blank.gif" title="Isle of Man">Isle of Man</option>
    <option value="Israel" data-image="images/msdropdown/icons/blank.gif" title="Israel">Israel</option>
    <option value="Italy" data-image="images/msdropdown/icons/blank.gif" title="Italy">Italy</option>
    <option value="Jamaica" data-image="images/msdropdown/icons/blank.gif" title="Jamaica">Jamaica</option>
    <option value="Japan" data-image="images/msdropdown/icons/blank.gif" title="Japan">Japan</option>
    <option value="Jersey" data-image="images/msdropdown/icons/blank.gif" title="Jersey">Jersey</option>
    <option value="Jordan" data-image="images/msdropdown/icons/blank.gif" title="Jordan">Jordan</option>
    <option value="Kazakhstan" data-image="images/msdropdown/icons/blank.gif" title="Kazakhstan">Kazakhstan</option>
    <option value="Kenya" data-image="images/msdropdown/icons/blank.gif" title="Kenya">Kenya</option>
    <option value="Kiribati" data-image="images/msdropdown/icons/blank.gif" title="Kiribati">Kiribati</option>
    <option value="Korea, Democratic People's Republic of" data-image="images/msdropdown/icons/blank.gif" title="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
    <option value="Korea, Republic of" data-image="images/msdropdown/icons/blank.gif" title="Korea, Republic of">Korea, Republic of</option>
    <option value="Kuwait" data-image="images/msdropdown/icons/blank.gif" title="Kuwait">Kuwait</option>
    <option value="Kyrgyzstan" data-image="images/msdropdown/icons/blank.gif" title="Kyrgyzstan">Kyrgyzstan</option>
    <option value="Lao People's Democratic Republic" data-image="images/msdropdown/icons/blank.gif" title="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
    <option value="Latvia" data-image="images/msdropdown/icons/blank.gif" title="Latvia">Latvia</option>
    <option value="Lebanon" data-image="images/msdropdown/icons/blank.gif" title="Lebanon">Lebanon</option>
    <option value="Lesotho" data-image="images/msdropdown/icons/blank.gif" title="Lesotho">Lesotho</option>
    <option value="Liberia" data-image="images/msdropdown/icons/blank.gif" title="Liberia">Liberia</option>
    <option value="Libya" data-image="images/msdropdown/icons/blank.gif" title="Libya">Libya</option>
    <option value="Liechtenstein" data-image="images/msdropdown/icons/blank.gif" title="Liechtenstein">Liechtenstein</option>
    <option value="Lithuania" data-image="images/msdropdown/icons/blank.gif" title="Lithuania">Lithuania</option>
    <option value="Luxembourg" data-image="images/msdropdown/icons/blank.gif" title="Luxembourg">Luxembourg</option>
    <option value="Macao" data-image="images/msdropdown/icons/blank.gif" title="Macao">Macao</option>
    <option value="Macedonia, the former Yugoslav Republic of" data-image="images/msdropdown/icons/blank.gif" title="Macedonia, the former Yugoslav Republic of">Macedonia, the former Yugoslav Republic of</option>
    <option value="Madagascar" data-image="images/msdropdown/icons/blank.gif" title="Madagascar">Madagascar</option>
    <option value="Malawi" data-image="images/msdropdown/icons/blank.gif" title="Malawi">Malawi</option>
    <option value="Malaysia" data-image="images/msdropdown/icons/blank.gif" title="Malaysia">Malaysia</option>
    <option value="Maldives" data-image="images/msdropdown/icons/blank.gif" title="Maldives">Maldives</option>
    <option value="Mali" data-image="images/msdropdown/icons/blank.gif" title="Mali">Mali</option>
    <option value="Malta" data-image="images/msdropdown/icons/blank.gif" title="Malta">Malta</option>
    <option value="Marshall Islands" data-image="images/msdropdown/icons/blank.gif" title="Marshall Islands">Marshall Islands</option>
    <option value="Martinique" data-image="images/msdropdown/icons/blank.gif" title="Martinique">Martinique</option>
    <option value="Mauritania" data-image="images/msdropdown/icons/blank.gif" title="Mauritania">Mauritania</option>
    <option value="Mauritius" data-image="images/msdropdown/icons/blank.gif" title="Mauritius">Mauritius</option>
    <option value="Mayotte" data-image="images/msdropdown/icons/blank.gif" title="Mayotte">Mayotte</option>
    <option value="Mexico" data-image="images/msdropdown/icons/blank.gif" title="Mexico">Mexico</option>
    <option value="Micronesia, Federated States of" data-image="images/msdropdown/icons/blank.gif" title="Micronesia, Federated States of">Micronesia, Federated States of</option>
    <option value="Moldova, Republic of" data-image="images/msdropdown/icons/blank.gif" title="Moldova, Republic of">Moldova, Republic of</option>
    <option value="Monaco" data-image="images/msdropdown/icons/blank.gif" title="Monaco">Monaco</option>
    <option value="Mongolia" data-image="images/msdropdown/icons/blank.gif" title="Mongolia">Mongolia</option>
    <option value="Montenegro" data-image="images/msdropdown/icons/blank.gif" title="Montenegro">Montenegro</option>
    <option value="Montserrat" data-image="images/msdropdown/icons/blank.gif" title="Montserrat">Montserrat</option>
    <option value="Morocco" data-image="images/msdropdown/icons/blank.gif" title="Morocco">Morocco</option>
    <option value="Mozambique" data-image="images/msdropdown/icons/blank.gif" title="Mozambique">Mozambique</option>
    <option value="Myanmar" data-image="images/msdropdown/icons/blank.gif" title="Myanmar">Myanmar</option>
    <option value="Namibia" data-image="images/msdropdown/icons/blank.gif" title="Namibia">Namibia</option>
    <option value="Nauru" data-image="images/msdropdown/icons/blank.gif" title="Nauru">Nauru</option>
    <option value="Nepal" data-image="images/msdropdown/icons/blank.gif" title="Nepal">Nepal</option>
    <option value="Netherlands" data-image="images/msdropdown/icons/blank.gif" title="Netherlands">Netherlands</option>
    <option value="New Caledonia" data-image="images/msdropdown/icons/blank.gif" title="New Caledonia">New Caledonia</option>
    <option value="New Zealand" data-image="images/msdropdown/icons/blank.gif" title="New Zealand">New Zealand</option>
    <option value="Nicaragua" data-image="images/msdropdown/icons/blank.gif" title="Nicaragua">Nicaragua</option>
    <option value="Niger" data-image="images/msdropdown/icons/blank.gif" title="Niger">Niger</option>
    <option value="Nigeria" data-image="images/msdropdown/icons/blank.gif" title="Nigeria">Nigeria</option>
    <option value="Niue" data-image="images/msdropdown/icons/blank.gif" title="Niue">Niue</option>
    <option value="Norfolk Island" data-image="images/msdropdown/icons/blank.gif" title="Norfolk Island">Norfolk Island</option>
    <option value="Northern Mariana Islands" data-image="images/msdropdown/icons/blank.gif" title="Northern Mariana Islands">Northern Mariana Islands</option>
    <option value="Norway" data-image="images/msdropdown/icons/blank.gif" title="Norway">Norway</option>
    <option value="Oman" data-image="images/msdropdown/icons/blank.gif" title="Oman">Oman</option>
    <option value="Pakistan" data-image="images/msdropdown/icons/blank.gif" title="Pakistan">Pakistan</option>
    <option value="Palau" data-image="images/msdropdown/icons/blank.gif" title="Palau">Palau</option>
    <option value="Palestinian Territory, Occupied" data-image="images/msdropdown/icons/blank.gif" title="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
    <option value="Panama" data-image="images/msdropdown/icons/blank.gif" title="Panama">Panama</option>
    <option value="Papua New Guinea" data-image="images/msdropdown/icons/blank.gif" title="Papua New Guinea">Papua New Guinea</option>
    <option value="Paraguay" data-image="images/msdropdown/icons/blank.gif" title="Paraguay">Paraguay</option>
    <option value="Peru" data-image="images/msdropdown/icons/blank.gif" title="Peru">Peru</option>
    <option value="Philippines" data-image="images/msdropdown/icons/blank.gif" title="Philippines">Philippines</option>
    <option value="Pitcairn" data-image="images/msdropdown/icons/blank.gif" title="Pitcairn">Pitcairn</option>
    <option value="Poland" data-image="images/msdropdown/icons/blank.gif" title="Poland">Poland</option>
    <option value="Portugal" data-image="images/msdropdown/icons/blank.gif" title="Portugal">Portugal</option>
    <option value="Puerto Rico" data-image="images/msdropdown/icons/blank.gif" title="Puerto Rico">Puerto Rico</option>
    <option value="Qatar" data-image="images/msdropdown/icons/blank.gif" title="Qatar">Qatar</option>
    <option value="Réunion" data-image="images/msdropdown/icons/blank.gif" title="Réunion">Réunion</option>
    <option value="Romania" data-image="images/msdropdown/icons/blank.gif" title="Romania">Romania</option>
    <option value="Russian Federation" data-image="images/msdropdown/icons/blank.gif" title="Russian Federation">Russian Federation</option>
    <option value="Rwanda" data-image="images/msdropdown/icons/blank.gif" title="Rwanda">Rwanda</option>
    <option value="Saint Barthélemy" data-image="images/msdropdown/icons/blank.gif" title="Saint Barthélemy">Saint Barthélemy</option>
    <option value="Saint Helena, Ascension and Tristan da Cunha" data-image="images/msdropdown/icons/blank.gif" title="Saint Helena, Ascension and Tristan da Cunha">Saint Helena, Ascension and Tristan da Cunha</option>
    <option value="Saint Kitts and Nevis" data-image="images/msdropdown/icons/blank.gif" title="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
    <option value="Saint Lucia" data-image="images/msdropdown/icons/blank.gif" title="Saint Lucia">Saint Lucia</option>
    <option value="Saint Martin (French part)" data-image="images/msdropdown/icons/blank.gif" title="Saint Martin (French part)">Saint Martin (French part)</option>
    <option value="Saint Pierre and Miquelon" data-image="images/msdropdown/icons/blank.gif" title="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
    <option value="Saint Vincent and the Grenadines" data-image="images/msdropdown/icons/blank.gif" title="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
    <option value="Samoa" data-image="images/msdropdown/icons/blank.gif" title="Samoa">Samoa</option>
    <option value="San Marino" data-image="images/msdropdown/icons/blank.gif" title="San Marino">San Marino</option>
    <option value="Sao Tome and Principe" data-image="images/msdropdown/icons/blank.gif" title="Sao Tome and Principe">Sao Tome and Principe</option>
    <option value="Saudi Arabia" data-image="images/msdropdown/icons/blank.gif" title="Saudi Arabia">Saudi Arabia</option>
    <option value="Senegal" data-image="images/msdropdown/icons/blank.gif" title="Senegal">Senegal</option>
    <option value="Serbia" data-image="images/msdropdown/icons/blank.gif" title="Serbia">Serbia</option>
    <option value="Seychelles" data-image="images/msdropdown/icons/blank.gif" title="Seychelles">Seychelles</option>
    <option value="Sierra Leone" data-image="images/msdropdown/icons/blank.gif" title="Sierra Leone">Sierra Leone</option>
    <option value="Singapore" data-image="images/msdropdown/icons/blank.gif" title="Singapore">Singapore</option>
    <option value="Sint Maarten (Dutch part)" data-image="images/msdropdown/icons/blank.gif" title="Sint Maarten (Dutch part)">Sint Maarten (Dutch part)</option>
    <option value="Slovakia" data-image="images/msdropdown/icons/blank.gif" title="Slovakia">Slovakia</option>
    <option value="Slovenia" data-image="images/msdropdown/icons/blank.gif" title="Slovenia">Slovenia</option>
    <option value="Solomon Islands" data-image="images/msdropdown/icons/blank.gif" title="Solomon Islands">Solomon Islands</option>
    <option value="Somalia" data-image="images/msdropdown/icons/blank.gif" title="Somalia">Somalia</option>
    <option value="South Africa" data-image="images/msdropdown/icons/blank.gif" title="South Africa">South Africa</option>
    <option value="South Georgia and the South Sandwich Islands" data-image="images/msdropdown/icons/blank.gif" title="South Georgia and the South Sandwich Islands">South Georgia and the South Sandwich Islands</option>
    <option value="South Sudan" data-image="images/msdropdown/icons/blank.gif" title="South Sudan">South Sudan</option>
    <option value="Spain" data-image="images/msdropdown/icons/blank.gif" title="Spain">Spain</option>
    <option value="Sri Lanka" data-image="images/msdropdown/icons/blank.gif" title="Sri Lanka">Sri Lanka</option>
    <option value="Sudan" data-image="images/msdropdown/icons/blank.gif" title="Sudan">Sudan</option>
    <option value="Suriname" data-image="images/msdropdown/icons/blank.gif" title="Suriname">Suriname</option>
    <option value="Svalbard and Jan Mayen" data-image="images/msdropdown/icons/blank.gif" title="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
    <option value="Swaziland" data-image="images/msdropdown/icons/blank.gif" title="Swaziland">Swaziland</option>
    <option value="Sweden" data-image="images/msdropdown/icons/blank.gif" title="Sweden">Sweden</option>
    <option value="Switzerland" data-image="images/msdropdown/icons/blank.gif" title="Switzerland">Switzerland</option>
    <option value="Syrian Arab Republic" data-image="images/msdropdown/icons/blank.gif" title="Syrian Arab Republic">Syrian Arab Republic</option>
    <option value="Taiwan, Province of China" data-image="images/msdropdown/icons/blank.gif" title="Taiwan, Province of China">Taiwan, Province of China</option>
    <option value="Tajikistan" data-image="images/msdropdown/icons/blank.gif" title="Tajikistan">Tajikistan</option>
    <option value="Tanzania, United Republic of" data-image="images/msdropdown/icons/blank.gif" title="Tanzania, United Republic of">Tanzania, United Republic of</option>
    <option value="Thailand" data-image="images/msdropdown/icons/blank.gif" title="Thailand">Thailand</option>
    <option value="Timor-Leste" data-image="images/msdropdown/icons/blank.gif" title="Timor-Leste">Timor-Leste</option>
    <option value="Togo" data-image="images/msdropdown/icons/blank.gif" title="Togo">Togo</option>
    <option value="Tokelau" data-image="images/msdropdown/icons/blank.gif" title="Tokelau">Tokelau</option>
    <option value="Tonga" data-image="images/msdropdown/icons/blank.gif" title="Tonga">Tonga</option>
    <option value="Trinidad and Tobago" data-image="images/msdropdown/icons/blank.gif" title="Trinidad and Tobago">Trinidad and Tobago</option>
    <option value="Tunisia" data-image="images/msdropdown/icons/blank.gif" title="Tunisia">Tunisia</option>
    <option value="Turkey" data-image="images/msdropdown/icons/blank.gif" title="Turkey">Turkey</option>
    <option value="Turkmenistan" data-image="images/msdropdown/icons/blank.gif" title="Turkmenistan">Turkmenistan</option>
    <option value="Turks and Caicos Islands" data-image="images/msdropdown/icons/blank.gif" title="Turks and Caicos Islands">Turks and Caicos Islands</option>
    <option value="Tuvalu" data-image="images/msdropdown/icons/blank.gif" title="Tuvalu">Tuvalu</option>
    <option value="Uganda" data-image="images/msdropdown/icons/blank.gif" title="Uganda">Uganda</option>
    <option value="Ukraine" data-image="images/msdropdown/icons/blank.gif" title="Ukraine">Ukraine</option>
    <option value="United Arab Emirates" data-image="images/msdropdown/icons/blank.gif" title="United Arab Emirates">United Arab Emirates</option>
    <option value="United Kingdom" data-image="images/msdropdown/icons/blank.gif" title="United Kingdom">United Kingdom</option>
    <option value="United States" data-image="images/msdropdown/icons/blank.gif" title="United States">United States</option>
    <option value="United States Minor Outlying Islands" data-image="images/msdropdown/icons/blank.gif" title="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
    <option value="Uruguay" data-image="images/msdropdown/icons/blank.gif" title="Uruguay">Uruguay</option>
    <option value="Uzbekistan" data-image="images/msdropdown/icons/blank.gif" title="Uzbekistan">Uzbekistan</option>
    <option value="Vanuatu" data-image="images/msdropdown/icons/blank.gif" title="Vanuatu">Vanuatu</option>
    <option value="Venezuela, Bolivarian Republic of" data-image="images/msdropdown/icons/blank.gif" title="Venezuela, Bolivarian Republic of">Venezuela, Bolivarian Republic of</option>
    <option value="Viet Nam" data-image="images/msdropdown/icons/blank.gif" title="Viet Nam">Viet Nam</option>
    <option value="Virgin Islands, British" data-image="images/msdropdown/icons/blank.gif" title="Virgin Islands, British">Virgin Islands, British</option>
    <option value="Virgin Islands, U.S." data-image="images/msdropdown/icons/blank.gif" title="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
    <option value="Wallis and Futuna" data-image="images/msdropdown/icons/blank.gif" title="Wallis and Futuna">Wallis and Futuna</option>
    <option value="Western Sahara" data-image="images/msdropdown/icons/blank.gif" title="Western Sahara">Western Sahara</option>
    <option value="Yemen" data-image="images/msdropdown/icons/blank.gif" title="Yemen">Yemen</option>
    <option value="Zambia" data-image="images/msdropdown/icons/blank.gif" title="Zambia">Zambia</option>
    <option value="Zimbabwe" data-image="images/msdropdown/icons/blank.gif" title="Zimbabwe">Zimbabwe</option>

                            </select></td>
                        <td></td>
                    </tr>
                    <tr id="latlon_info">

                    </tr>
                    <tr>
                        <td>Description:</td>
                        <td><textarea class="form-control" name="description" cols="30" rows="2"></textarea></td>

                    </tr>
                </table>
                <div class="col-xs-12 col-sm-1">

                    <input  class="form-control btn btn-success btn-lg" type="submit" value="Save">
                </div>
            </form>

        </div>
    </div>
</div>
<section id="footer" class="padding-top-bottom">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <p>© 2015 | Powered by Mentor Team, Coderstrust  </p>
                <p>All Rights Reserved</p>
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function(){
        $("#countries").msDropdown();

        $("#countries").change(function(){
            console.log($('#countries').val());
            $.ajax({

                type: "GET",
                url: "address_search.php",
                data: 'address=' + $('#countries').val(),
                success: function(aa){
                    $('#latlon_info').html(aa);
                },
                error: function(x)
                {

                }

            });
        });
    });
</script>
</body>

</html>
