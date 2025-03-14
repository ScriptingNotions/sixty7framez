<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office" lang="en">
<head>
  <title>Booking Confirmation</title>
  <meta charset="UTF-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <!--[if !mso]>-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!--<![endif]-->
    <meta name="x-apple-disable-message-reformatting" content="" />
    <meta content="target-densitydpi=device-dpi" name="viewport" />
    <meta content="true" name="HandheldFriendly" />
    <meta content="width=device-width" name="viewport" />
    <meta name="format-detection" content="telephone=no, date=no, address=no, email=no, url=no" />
    <meta name="author" content="Arthur Herbert Fonzarelli">
    <meta name="keywords" content="fonzie, cool, ehhhhhhh">
</head>
<body style="margin: 0; padding: 0; font-family: Arial, sans-serif; background-color: #f4f4f4;">
  <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="background-color: #f4f4f4; padding: 20px;">
    <tr>
      <td align="center">
        <table role="presentation" width="600" cellspacing="0" cellpadding="0" border="0" style="background: #ffffff; border-radius: 8px; padding: 20px; box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);">
          <tr>
            <td align="center" style="padding: 20px;">
              <h1 style="font-size: 24px; color: #000;">Thank you for booking your photo booth event with Sixty7Framez!</h1>
            </td>
          </tr>
          <tr>
            <td style="padding: 0 20px;">
              <table role="presentation" width="100%" cellspacing="0" cellpadding="10" border="0">
                <tr>
                  <td width="30%" style="font-weight: bold;">Start:</td>
                  <td><?= $this->bookingDetails["startTime"] ?></td>
                </tr>
                <tr>
                  <td width="30%" style="font-weight: bold;">End:</td>
                  <td><?= $this->bookingDetails["endTime"] ?></td>
                </tr>
                <tr>
                  <td width="30%" style="font-weight: bold;">Receipt:</td>
                  <td><a href="<?= $this->bookingDetails['receipt'] ?>">View receipt</a></td>
                </tr>
              </table>
            </td>
          </tr>
          <tr>
            <td align="center" style="padding: 20px;">
              <a href="<?= $this->bookingDetails["htmlLink"]?>" style="display: inline-block; background-color: #000; color: #fff; padding: 12px 24px; text-decoration: none; border-radius: 25px; font-size: 16px; font-weight: bold;">Add to Calendar</a>
            </td>
          </tr>
          <tr>
            <td align="center" style="padding: 20px; font-size: 14px; color: #777777; background-color: #f9f9f9;">
              Sixty7Framez Photo Booth | 4833 Berewick Town Center Dr, Charlotte, NC 28278<br>
              <a href="mailto:info@sixty7framez.com" style="color: #777777; text-decoration: none;">info@sixty7framez.com</a>
            </td>
          </tr>
          <tr>
            <td>
              <a href="https://www.facebook.com/people/Sixty7-Framez-Photo-Booth-Events/61565025722424/"><img src="<?= $this->getIcon("facebook-fill.svg") ?>" alt="facebook icon"></a></li>
              <a href="https://www.instagram.com/sixty7framez_pb/"><img src="<?= $this->getIcon("instagram-line.svg") ?>" alt="instagram icon"></a></li>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</body>
</html>
