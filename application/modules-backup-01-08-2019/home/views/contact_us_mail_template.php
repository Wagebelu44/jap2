<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="initial-scale=1.0" />
    <meta name="format-detection" content="telephone=no" />
    <title></title>
    <style type="text/css">
        body {
            width: 100%;
            margin: 0;
            padding: 0;
            -webkit-font-smoothing: antialiased;
        }

        .button {
            background: repeating-linear-gradient(#00ACED , #037ca8 ) !important;  

            color: #fff !important;
            text-decoration: none;

            padding: 15px;
        }

        .button:focus,
        .button:hover {
            color: #fff !important;
            box-shadow: 0px 1px 2px #333;
        }


        @media only screen and (max-width: 600px) {
            table[class="table-row"] {
                float: none !important;
                width: 98% !important;
                padding-left: 20px !important;
                padding-right: 20px !important;
            }
            table[class="table-row-fixed"] {
                float: none !important;
                width: 98% !important;
            }
            table[class="table-col"], table[class="table-col-border"] {
                float: none !important;
                width: 100% !important;
                padding-left: 0 !important;
                padding-right: 0 !important;
                table-layout: fixed;
            }
            td[class="table-col-td"] {
                width: 100% !important;
            }
            table[class="table-col-border"] + table[class="table-col-border"] {
                padding-top: 12px;
                margin-top: 12px;
                border-top: 1px solid #E8E8E8;
            }
            table[class="table-col"] + table[class="table-col"] {
                margin-top: 15px;
            }
            td[class="table-row-td"] {
                padding-left: 0 !important;
                padding-right: 0 !important;
            }
            table[class="navbar-row"] , td[class="navbar-row-td"] {
                width: 100% !important;
            }
            img {
                max-width: 100% !important;
                display: inline !important;
            }
            img[class="pull-right"] {
                float: right;
                margin-left: 11px;
                max-width: 125px !important;
                padding-bottom: 0 !important;
            }
            img[class="pull-left"] {
                float: left;
                margin-right: 11px;
                max-width: 125px !important;
                padding-bottom: 0 !important;
            }
            table[class="table-space"], table[class="header-row"] {
                float: none !important;
                width: 98% !important;
            }
            td[class="header-row-td"] {
                width: 100% !important;
            }
        }
        @media only screen and (max-width: 480px) {
            table[class="table-row"] {
                padding-left: 16px !important;
                padding-right: 16px !important;
            }
        }
        @media only screen and (max-width: 320px) {
            table[class="table-row"] {
                padding-left: 12px !important;
                padding-right: 12px !important;
            }
        }
        @media only screen and (max-width: 458px) {
            td[class="table-td-wrap"] {
                width: 100% !important;
            }
        }
    </style>
</head>
<body style="font-family: Arial, sans-serif; font-size:13px; color: #444444; min-height: 200px;" bgcolor="#E4E6E9" leftmargin="0" topmargin="0" marginheight="0" marginwidth="0">
    <table width="100%" height="100%" bgcolor="#E4E6E9" cellspacing="0" cellpadding="0" border="0">
        <tr>
            <td width="100%" align="center" valign="top" bgcolor="#E4E6E9" style="background-color:#E4E6E9; min-height: 200px;">
                <table>
                    <tr>
                        <td class="table-td-wrap" align="center" width="558" style="overflow: hidden">
                            <table class="table-row" width="550" bgcolor="#FFFFFF" style="table-layout: fixed; background-color: #ffffff;" cellspacing="0" cellpadding="0" border="0">
                                <tbody>
                                    <tr>
                                        <td class="table-row-td" style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal; padding-left: 36px; padding-right: 36px;" valign="top" align="left">
                                            <table class="table-col" align="left" width="478" cellspacing="0" cellpadding="0" border="0" style="table-layout: fixed;">
                                                <tbody>
                                                    <tr>
                                                        <td class="table-col-td" width="478" style="font-family: Arial, sans-serif; line-height: 19px; padding-top: 15px; color: #444444; font-size: 13px; font-weight: normal; width: 478px;" valign="top" align="left">
                                                            <table class="header-row" width="478" cellspacing="0" cellpadding="0" border="0" style="table-layout: fixed;">
                                                                <tbody>
                                                                    <tr style="border-bottom: 1px solid silver; padding-top: 15px">
                                                                        <td class="header-row-td"align="center">
                                                                            <a title="JAP (Gift Cards)" href="<?php echo base_url(); ?>">
                                                                                <img src="<?php echo base_url(); ?>admin_assets/img/logo.png" style='width: 120px;background:transparent;'>
                                                                            </a>
                                                                            <hr style="margin-top: 10px; margin-bottom: 10px;"> 
                                                                        </td>
                                                                    </tr>
                                                                    <tr>

                                                                    </tr>
                                                                </tbody>
                                                            </table>

                                                            <p style="color:#444444">
                                                                <span> <b> Name: </b> <?php echo $data["name"];?></span><br>
                                                            </p>
                                                            <p style="color:#444444">
                                                                <span> <b> Email: </b> <?php echo $data["email"];?></span><br>
                                                            </p>

                                                            <p style="color:#444444">
                                                                <b> Message: </b> <?php echo $data["message"]; ?>
                                                            </p>


                                                            <p style="color:#444444"> <b> Regards,<br>
                                                            JAP Support </b> </p>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table-row-fixed" width="550" max-width="100%" bgcolor="#FFFFFF" style="table-layout: fixed; background-color: #ffffff;" cellspacing="0" cellpadding="0" border="0">
                                <tbody width="550">
                                    <tr width="550">
                                        <td class="table-row-fixed-td" style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal; padding-left: 1px; padding-right: 1px; width:550px" valign="top" align="left">
                                            <table class="table-col" align="left" width="550px" cellspacing="0" cellpadding="0" border="0" style="table-layout: fixed;">
                                                <tbody width="550px">
                                                    <tr width="550px">
                                                        <td class="table-col-td" width="550" style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal;" valign="top" align="left">
                                                            <table width="550" cellspacing="0" cellpadding="0" border="0" style="table-layout: fixed;">
                                                                <tbody width="550">
                                                                    <trwidth="550">
                                                                    <td width="550" align="center" bgcolor="#f5f5f5" style="font-family: Arial, sans-serif; line-height: 24px; color: #bbbbbb; font-size: 13px; font-weight: normal; text-align: center; padding: 9px; border-width: 1px 0px 0px; border-style: solid; border-color: #e3e3e3; background-color: #092b64;" valign="top">
                                                                        <a href="#" style="color: #fff; text-decoration: none; background-color: transparent;">Copyright &copy; <?php echo date("Y"); ?> JAP.</a>
                                                                        <br>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>