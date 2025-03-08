<?php
            $img = file_get_contents("https://ucarecdn.com/695e223a-53b5-4268-b5ef-70c602095115/logosmall.svg");
            $base64_img = base64_encode($img);
            
            

// Example PHP code to create a header for dompdf
$header_html = <<<EOD
<!DOCTYPE html>
<html>
<head>
    <style>

        @page {
                margin: 100px 25px;
            }

            body {
                margin: 0;
                padding: 0;
                font-family: Arial, sans-serif !important;
            }

            header {
                position: fixed;
                top: -100px;
                height: 80px;
                width: 100%;
                color: white;
                text-align: center;
                line-height: 35px;
            }

            .blue-banner {
                position: absolute;
                right: 0;
                color: #000;
                padding: 15px 30px;
                width: 45%;
                text-align: right;
                font-weight: bold;
                clip-path: polygon(10% 0, 100% 0, 100% 100%, 10% 100%, 0 50%);
            }        
                
            .logo {
                position: absolute;
                left: 20px;
                top: 10px;
                width: 120px;
                height: 120px;
                font-weight: bold;
            }

            .horizontal-line {
                position: absolute;
                top: 85px;
                left: 0;
                width: 100%;
                height: 1px;
                background-color: #000;
            }



    .service-contract {
        margin: 20px 0;
    }
    .service-contract h3 {
        text-align: center;
    }

    .terms-container > h3 {
        text-align: center;
    }
    .client-duties strong {
        font-weight: 600;
    }

    .contract-container ol {
        list-style-type: circle;
        padding: 0 30px;
    }

    .during-booking-container {
        margin: 20px 0 10px 0px;
    }
    .weeks-before-container {
        margin: 20px 0 10px 0px;
    }

    .contract-business-contact {
        margin: 20px 0;
        text-align: center;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }
    th, td {
        border: 1px solid black;
        padding: 10px;
        text-align: left;
    }
    th {
        background-color: #f2f2f2;
    }
    h2 {
        margin-bottom: 10px;
    }


    .signature-container {
        display: flex;
        justify-content: space-between;
        margin-top: 30px;
    }
    .signature {
        width: 45%;
        margin-top: 30px;
    }
    .signature-line {
        border-bottom: 1px solid black;
        margin-bottom: 5px;
    }
    </style>
</head>
<body>
    <header class="header-container">
        <!-- Logo and circular text -->
        $img_tag
        <!-- Blue banner -->
        <div class="blue-banner">
            <h2>Sixty7 Framez Contract</h2>
        </div>
        
        <!-- Horizontal line -->
        <div class="horizontal-line"></div>
    </header>


    <div class="contract-container">

        <div class="service-contract">
            <h3>SIXTY7 FRAMEZ PHOTO BOOTHS - SERVICE CONTRACT</h3>
            <p>The following contract and its terms will set forth an agreement between Sixty7 Framez Photo Booths (Provider) and <strong><span id="contract-client-name">{$bookingDetails['firstName']} {$bookingDetails['lastName']}</span></strong> (Client) the parties, for photo booth services and their event outline in the deposit. This written contract sets forth the full, written intention of both parties and supersedes all other written and/or oral agreements between the parties.</p>
        </div>

        <div class="terms-container">
            <h3>TERMS & CONDITIONS</h3>
            
            <div class="section">
                <h5>SERVICE PERIOD</h5>
                <p>The Service Period will be from <strong><span class="contract-time-start">{$bookingDetails['contractStartTime']}</span></strong> - <strong><span class="contract-time-end">{$bookingDetails['contractEndTime']}</span></strong>: on <strong><span class="contract-date">{$bookingDetails['readableDate']}</span></strong>. Provider agrees to have a Sixty7 Framez Photo Booth operational for a minimum of 80% during this period; occasionally, operations may need to be interrupted for maintenance of the Photo Booth or by the clients request.</p>
            </div>
            
            <div class="section">
                <h5>PAYMENT</h5>
                <p>A non-refundable reservation fee in the amount of 50% of the total cost is due upon signing of this contract. The remaining amount is due 15 days in advance of Client's Event.</p>
                <p>If the client uses the equipment for a time period in excess of the service period agreed to in the invoice below, the overage in rental time will be billed to the client at the following rates: $125 per hour.</p>
                <p>Payment for any overage in time must be paid before additional hours are provided. Client agrees that in addition to any and all other legal rights and remedies Provider may have, Client will pay a $50.00 fee for any and all returned payments which Client may write to Provider as payment for any service by Provider or rental of Provider's equipment.</p>
            </div>
            
            <div class="section">
                <h5>ACCESS, SPACE & POWER FOR PHOTO BOOTH</h5>
                <p>The Client shall provide Sixty7 Framez Photo Booths with safe and appropriate working conditions and a solid floor. The Client will arrange an appropriate 8ft x 8ft space and a minimum of 7.5 ft of ceiling clearance for the Photo Booth at the event's venue. Client is responsible for providing power for the Photo Booth (110V, 10 amps, 3 prong outlet). Note: Power Adapter provided by Sixty7 Framez Photo Booth will be added as an ad-on service. Any delay in the performance or damage to the photo booth equipment due to improper power is the responsibility of the client.</p>
            </div>
            
            <div class="section">
                <h5>DATE CHANGES & CANCELLATIONS</h5>
                <p>Any request for a date change must be made in writing at least thirty days in advance of the original event date. Change is subject to photo booth availability and receipt of a new Service Contract. If there is no availability for the alternate date, the non-refundable reservation fee shall be forfeited and event cancelled. If event is cancelled for any reason, the non-refundable reservation fee is forfeited.</p>
            </div>
            
            <div class="section">
                <h5>VENUE LOCATION CHANGES</h5>
                <p>Any request for a venue location change must be made in writing at least 10 days in advance of the original event date. No travel fees for venues within 35 miles of our location. The provider will charge .45 per additional mile as measured by Google Maps driving directions from.</p>
            </div>
            
            
            <div class="section">
                <h5>INDEMNIFICATION</h5>
                <p>Client agrees to, and understands the following:</p>
                <p class="indent">a) Client will indemnify provider against any and all liability related to Client's Event during or after Client's event. Client will indemnify Provider from the time of service and on into the future, against any liability associated with Client.</p>
                <p class="indent">b) Client will indemnify Provider against any and all liability associated with the use of pictures taken within the Sixty7 Framez Photo Booth its representatives, employees or affiliates at Client's event.</p>
            </div>
            
            <div class="section">
                <h5>MODEL/MEDIA USAGE RELEASE OPTION</h5>
                <p>Client agrees to, and understands the following: All guests using Sixty7 Framez Photo Booths hereby give the right and permission to copyright and use, photographic portraits, video, images, or pictures captured by Sixty7 Framez Photo Booth of any photo booth user who may be included intact or in part, made through any and all media now or hereafter known for illustration, art, promotion, advertising, trade, or any other purpose. In addition the client, hereby release, discharge and agree to save harmless Sixty7 Framez Photo Booths, from any liability, that may occur or be produced in the taking of said picture or in any subsequent processing thereof, as well as any publication thereof, including without limitation any claims for libel or invasion of privacy. If you do not agree circle no: NO</p>
            </div>
            
            <div class="section">
                <h5>MISCELLANEOUS TERMS</h5>
                <p>If any provision of these terms shall be unlawful, void, or for any reason unenforceable under Contract Law, then that provision, or portion thereof, shall be deemed separate from the rest of this contract and shall not affect the validity and enforceability of any remaining provisions, or portions thereof. This is the entire agreement between Provider and Client relating to Sixty7 Framez Photo Booths herein and shall not be modified except in writing, signed by both parties. In the event of a conflict between parties, Client agrees to solve any arguments via arbitration. In the event Provider is unable to supply a working photo booth for at least 80% of the Service Period, Client shall be refunded a prorated amount based on the amount of service received.</p>
                <p>If the printer fails to print out photos on site the Provider will be allowed to give a web site to the client where there guests can log onto and order prints free of charge with free shipping as well as the ability to download the digital files for their own use. If for reasons beyond our control the local distributor becomes sick or cannot perform we will ship the booth with instructions directly to the end user so they can set it up at their event and double the rental time period free of charge. If no service is received, Provider's maximum liability will be the return of all payments received from Client. Provider is not responsible for any consequential damages or lost opportunities upon breach of this agreement.</p>
            </div>
            
            <div class="section">
                <h5>DAMAGE TO PROVIDER'S EQUIPMENT</h5>
                <p>Client acknowledges that the client shall be responsible for any damage or loss to the Provider's Equipment caused by: a) Any misuse of the Provider's Equipment by Client or its guests, or b) Any theft or disaster (including but not limited to fire, flood or earthquake).</p>
            </div>
            
            <div class="section client-duties">
                <h5>SUMMARY OF CLIENT DUTIES:</h5>
                <div class="during-booking-container">
                    <h5>During booking:</h5>
                    <ol>
                        <li>Sign the contract.</li>
                        <li>Send the deposit via your preferred method immediately after signing the contract if applicable.</li>
                        <li>Fill out the photo template form at least 3 weeks before the event: http://www.radphotobooth.ca/photo-template/</li>
                    </ol>
                </div>

                <div class="weeks-before-container">
                    <h5>Two weeks before the event to avoid delays:</h5>
                    <ol start="4">
                        <li>Prepare the payment for the balance.</li>
                        <li>Arrange an appropriate 8ft x 8ft space with an outlet at least 10ft away, and a minimum of 7.5′ of ceiling clearance. Please notify the provider if any tables 6ft long will be provided for the Photo Booth at the event's venue.</li>
                    </ol>
                </div>

                
                <p>Your event is NOT booked until the contract is signed and the deposit is received. Reservations are made on on a "first come, first served" basis.</p>
                    
            </div>

            <div class="booking-details">
                <h4>Client Information</h4>
                <table>
                    <tr><td>Name</td><td id="contract-client-name">{$bookingDetails['firstName']} {$bookingDetails['lastName']}</td></tr>
                    <tr><td>Company</td><td id="contract-client-company">{$bookingDetails['companyName']}</td></tr>
                    <tr><td>Type of Event</td><td id="contract-client-event-type">{$bookingDetails['eventType']}</td></tr>
                    <tr><td>Package type</td><td id="contract-client-package-type">{$bookingDetails['packageType']}</td></tr>
                    <tr><td>Event date</td><td id="contract-client-event-date">{$bookingDetails['readableDate']}</td></tr>
                    <tr><td>Event time</td><td id="contract-client-event-time">{$bookingDetails['startTime']}</td></tr>
                    <tr><td>Phone number</td><td id="contract-client-phone">{$bookingDetails['phone']}</td></tr>
                    <tr><td>Email address</td><td id="contract-client-email">{$bookingDetails['email']}</td></tr>
                </table>
                
                <h4>Venue Information</h4>
                <table>
                    <tr><td>Name</td ><td id="contract-venue-name">{$bookingDetails['venueName']}</td></tr>
                    <tr><td>Address</td><td id="contract-venue-address">{$bookingDetails['venueAddress']} {$bookingDetails['venueCity']} {$bookingDetails['venueState']} {$bookingDetails['venueZip']}</td></tr>
                    <tr><td>Contact Person</td><td id="contract-venue-contact-person">{$bookingDetails['venueContact']}</td></tr>
                    <tr><td>Email</td><td id="contract-venue-email">{$bookingDetails['venueEmail']}</td></tr>
                    <tr><td>Phone</td><td id="contract-venue-phone">{$bookingDetails['venuePhone']}</td></tr>
                </table>

            </div>

            
            <div class="section">
                <p><strong>PROVIDER’S STANDARD PRICE LIST:</strong> The charges in this Agreement are based on the Provider’s Standard Price
                    List. This price list is adjusted periodically and future orders shall be charged at the prices in effect at the time
                    when the order is placed</p>
                <p>By executing this contract as the Client, the individual signing, whether in a personal capacity or as an agent or representative, represents and warrants that they are at least twenty-five (25) years of age. Furthermore, if signing as an agent or representative, the signer affirms that they possess the authority to enter into this agreement on behalf of the entity they represent. Should they lack such authority, the signer personally assumes full responsibility and liability under the terms of this contract.</p>
            </div>
        </div>    
        

        <div class="signature-container">
            <div class="signature">
                <div class="signature-line"></div>
                <div class="signature-label">Clients Printed Name</div>
            </div>
            <div class="signature">
                <div class="signature-line"></div>
                <div class="signature-label">Date</div>
            </div>
        </div>

        <div class="signature-container">
            <div class="signature">
                <div class="signature-line"></div>
                <div class="signature-label">Clients Signature Over Printed Name</div>
            </div>
            <div class="signature">
                <div class="signature-line"></div>
                <div class="signature-label">Date</div>
            </div>
        </div>

        <div class="signature-container">
            <div class="signature">
                <div class="signature-line"></div>
                <div class="signature-label">Sixty7 Framez Photo Booths Signature</div>
            </div>
        </div>

        <div class="contract-business-contact">
            <p>Thank you for your business!</p>
            <p>Sixty7 Framez Photo Booths<br>
            Charlotte, NC<br>
            704.619.8698 ph<br>
            www.sixty7framezphotobooths.com</p>
        </div>

    </div>






</body>
</html>
EOD;

// In your actual dompdf implementation, you would do something like:
// $dompdf = new Dompdf();
// $dompdf->loadHtml($header_html . $your_content);
// $dompdf->render();
// $dompdf->stream("document.pdf", array("Attachment" => false));

// For demonstration purposes, just output the HTML
echo $header_html;
?>