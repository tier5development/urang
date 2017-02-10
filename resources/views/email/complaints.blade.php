<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="utf-8"> <!-- utf-8 works for most cases -->
	<meta name="viewport" content="width=device-width"> <!-- Forcing initial-scale shouldn't be necessary -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- Use the latest (edge) version of IE rendering engine -->
	<title></title> <!-- The title tag shows in email notifications, like Android 4.4. -->

	<!-- Web Font / @font-face : BEGIN -->
	<!-- NOTE: If web fonts are not required, lines 9 - 26 can be safely removed. -->
	
	<!-- Desktop Outlook chokes on web font references and defaults to Times New Roman, so we force a safe fallback font. -->
	<!--[if mso]>
		<style>
			* {
				font-family: sans-serif !important;
			}
		</style>
	<![endif]-->
	
	<!-- All other clients get the webfont reference; some will render the font and others will silently fail to the fallbacks. More on that here: http://stylecampaign.com/blog/2015/02/webfont-support-in-email/ -->
	<!--[if !mso]><!-->
		<!-- insert web font reference, eg: <link href='https://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'> -->
	<!--<![endif]-->

	<!-- Web Font / @font-face : END -->
	
  	<!-- CSS Reset -->
    <style>

		/* What it does: Remove spaces around the email design added by some email clients. */
		/* Beware: It can remove the padding / margin and add a background color to the compose a reply window. */
        html,
        body {
	        margin: 0 auto !important;
            padding: 0 !important;
            height: 100% !important;
            width: 100% !important;
        }
        
        /* What it does: Stops email clients resizing small text. */
        * {
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
        }
        
        /* What is does: Centers email on Android 4.4 */
        div[style*="margin: 16px 0"] {
            margin:0 !important;
        }
        
        /* What it does: Stops Outlook from adding extra spacing to tables. */
        table,
        td {
            mso-table-lspace: 0pt !important;
            mso-table-rspace: 0pt !important;
        }
                
        /* What it does: Fixes webkit padding issue. Fix for Yahoo mail table alignment bug. Applies table-layout to the first 2 tables then removes for anything nested deeper. */
        table {
            border-spacing: 0 !important;
            border-collapse: collapse !important;
            table-layout: fixed !important;
            margin: 0 auto !important;
        }
        table table table {
            table-layout: auto; 
        }
        
        /* What it does: Uses a better rendering method when resizing images in IE. */
        img {
            -ms-interpolation-mode:bicubic;
        }
        
        /* What it does: A work-around for iOS meddling in triggered links. */
        .mobile-link--footer a,
        a[x-apple-data-detectors] {
            color:inherit !important;
            text-decoration: underline !important;
        }
      
    </style>
    
    <!-- Progressive Enhancements -->
    <style>
        
        /* What it does: Hover styles for buttons */
        .button-td,
        .button-a {
            transition: all 100ms ease-in;
        }
        .button-td:hover,
        .button-a:hover {
            background: #555555 !important;
            border-color: #555555 !important;
        }

    </style>

</head>
<body width="100%" bgcolor="#222222" style="margin: 0;">
    <center style="width: 100%; background: #222222;">

        <!-- Visually Hidden Preheader Text : BEGIN -->
        <div style="display:none;font-size:1px;line-height:1px;max-height:0px;max-width:0px;opacity:0;overflow:hidden;mso-hide:all;font-family: sans-serif;">
            (Optional) Email From U-rang.
        </div>
        <!-- Visually Hidden Preheader Text : END -->

        <!--    
            Set the email width. Defined in two places:
            1. max-width for all clients except Desktop Windows Outlook, allowing the email to squish on narrow but never go wider than 600px.
            2. MSO tags for Desktop Windows Outlook enforce a 600px width.
        -->
        <div style="max-width: 600px; margin: auto;">
            <!--[if mso]>
            <table cellspacing="0" cellpadding="0" border="0" width="600" align="center">
            <tr>
            <td>
            <![endif]-->


            <?php 
            $complaints = \App\CustomerComplaintsEmail::first();

            ?>

            <!-- Email Header : BEGIN -->
            <table cellspacing="0" cellpadding="0" border="0" align="center" width="100%" style="max-width: 600px;" role="presentation">
				<tr>
					<td style="padding: 20px 0; text-align: center">
						<img src="http://www.u-rang.com/public/new/img/logo-white.png" width="200" height="50" alt="u-rang logo" border="0">
					</td>
				</tr>
            </table>
            <!-- Email Header : END -->
            
            <!-- Email Body : BEGIN -->
            <table cellspacing="0" cellpadding="0" border="0" align="center" width="100%" style="max-width: 600px;" role="presentation">
                
                <!-- Hero Image, Flush : BEGIN -->
                <tr>
					<td bgcolor="#ffffff">
						<img src="{{$complaints->cover_image}}" width="600" height="" alt="alt_text" border="0" align="center" style="width: 100%; max-width: 600px;">
					</td>
                </tr>
                <!-- Hero Image, Flush : END -->

                <!-- 1 Column Text + Button : BEGIN -->
                <tr>
                    <td bgcolor="#ffffff">
                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                        	<tr>
	                            <td style="padding: 40px; font-family: sans-serif; font-size: 15px; mso-height-rule: exactly; line-height: 20px; color: #555555;">
	                            	<section name="customer_details" style="background:#d3d3d3;height: 250px;border-radius: 10px;">
	                            		<div class="container">
	                            			<div class="row">
	                            				<div class="col-xs-5"></div>
	                            				<div class="col-xs-2">
	                            					<img src="http://www.u-rang.com/public/images/cus_icon.png" alt="customer icon" style="height: 60px; width:60px; margin-left: 222px;margin-top: 10px;">	
	                            				</div>
	                            				<div class="col-xs-5"></div>
	                            			</div>
	                            			<div style="margin-left: 142px;">
	                            				<label for="name"><b>Customer Name:</b> {!! $first_name !!} {!! $last_name !!}</label><br><br>
                                                <label for="email"><b>Customer Email:</b> {!! $email !!}</label><br><br>
                                                <label for="no"><b>Phone Number:</b> {!! $phone !!}</label>
	                            			</div>
	                            		</div>
	                            	</section>
	                                <br><br>
	                                <!-- Button : Begin -->
	                                <!-- <table cellspacing="0" cellpadding="0" border="0" align="center" style="margin: auto;">
	                                    <tr>
	                                        <td style="border-radius: 3px; background: #222222; text-align: center;" class="button-td">
	                                            <a href="http://www.google.com" style="background: #222222; border: 15px solid #222222; font-family: sans-serif; font-size: 13px; line-height: 1.1; text-align: center; text-decoration: none; display: block; border-radius: 3px; font-weight: bold;" class="button-a">
				                                    &nbsp;&nbsp;&nbsp;&nbsp;<span style="color:#ffffff">A Button</span>&nbsp;&nbsp;&nbsp;&nbsp;
				                                </a>
	                                        </td>
	                                    </tr>
	                                </table> -->
	                                <!-- Button : END -->
	                                <br>
	                                <!-- Maecenas sed ante pellentesque, posuere leo id, eleifend dolor. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Praesent laoreet malesuada cursus. Maecenas scelerisque congue eros eu posuere. Praesent in felis ut velit pretium lobortis rhoncus ut&nbsp;erat. -->
	                            </td>
								</tr>
                        </table>
                    </td>
                </tr>
                <!-- 1 Column Text + Button : BEGIN -->
               
                <!-- 2 Even Columns : BEGIN -->
                <tr>
                    <td bgcolor="#ffffff" align="center" height="100%" valign="top" width="100%" style="padding-bottom: 40px">
                        <table border="0" cellpadding="0" cellspacing="0" align="center" width="100%" style="max-width:560px;">
                            <tr>
                                <td align="center" valign="top" width="50%">
                                    <table cellspacing="0" cellpadding="0" border="0" width="100%" style="font-size: 14px;text-align: left;">
                                        <tr>
                                            <td style="text-align: center; padding: 0 10px;">
                                                <img src="http://www.u-rang.com/public/images/com_small.png" alt="complaint_logo" style="height: 100px;" class="center-on-narrow">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center;font-family: sans-serif; font-size: 15px; mso-height-rule: exactly; line-height: 20px; color: #555555; padding: 10px 10px 0;" class="stack-column-center">
                                                {!! $complaint !!}
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                <!-- <td align="center" valign="top" width="50%">
                                    <table cellspacing="0" cellpadding="0" border="0" width="100%" style="font-size: 14px;text-align: left;">
                                        <tr>
                                            <td style="text-align: center; padding: 0 10px;">
                                                <img src="http://placehold.it/200" width="200" alt="" style="border: 0;width: 100%;max-width: 200px;" class="center-on-narrow">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center;font-family: sans-serif; font-size: 15px; mso-height-rule: exactly; line-height: 20px; color: #555555; padding: 10px 10px 0;" class="stack-column-center">
                                                Maecenas sed ante pellentesque, posuere leo id, eleifend dolor. Class aptent taciti sociosqu ad litora per conubia nostra, per torquent inceptos&nbsp;himenaeos. 
                                            </td> -->
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <!-- Two Even Columns : END -->

                <!-- Clear Spacer : BEGIN -->
                <tr>
                    <td height="40" style="font-size: 0; line-height: 0;">
	                    &nbsp;
                    </td>
                </tr>
                <!-- Clear Spacer : END -->

                <!-- 1 Column Text + Button : BEGIN -->
                <tr>
                    <td bgcolor="#ffffff">
                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                        	<tr>
	                            <td style="padding: 40px; font-family: sans-serif; font-size: 15px; mso-height-rule: exactly; line-height: 20px; color: #555555;">
	                                {{$complaints->company_info}}
	                            </td>
								</tr>
                        </table>
                    </td>
                </tr>
                <!-- 1 Column Text + Button : BEGIN -->

            </table>
            <!-- Email Body : END -->
          
            <!-- Email Footer : BEGIN -->
            <table cellspacing="0" cellpadding="0" border="0" align="center" width="100%" style="max-width: 680px;" role="presentation">
                <tr>
                    <td style="padding: 40px 10px;width: 100%;font-size: 12px; font-family: sans-serif; mso-height-rule: exactly; line-height:18px; text-align: center; color: #888888;">
                        <!-- <webversion style="color:#cccccc; text-decoration:underline; font-weight: bold;">View as a Web Page</webversion> -->
                        <a href="{{$complaints->website_link}}" target="_blank" style="color: #fff;">Visit our website</a>
                        <br><br>
                        U-rang<br><span class="mobile-link--footer">{{$complaints->address}}</span><br><span class="mobile-link--footer">{{$complaints->phone_no}}</span>
                        <br><br>
                        <unsubscribe style="color:#888888; text-decoration:underline;">{{$complaints->support_email}}</unsubscribe>
                    </td>
                </tr>
            </table>
            <!-- Email Footer : END -->

            <!--[if mso]>
            </td>
            </tr>
            </table>
            <![endif]-->
        </div>
    </center>
</body>
</html>