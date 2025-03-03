let servicesPageContent = [
    {
        immHeading: 'GENERAL CONSULTAION(Adult, Child & Infants)',
        immContent: `Join us for a personalized consultation with our experienced doctors who are here to listen to your concerns and offer expert advice tailored to your needs. Whether you need a routine check-up or have a specific health concern, we’re committed to keeping you healthy and informed.

<br>
<br>📆 <span style="color:black;font-weight:bold;">When:</span> Every Tuesday and Friday
<br>⏰<span style="color:black;font-weight:bold;">Time:</span> 8:00 AM - 12:00 NN
<br>
<br>✅ No appointment needed!
<br>
<br>Your Health is our priority. Visit us today!`,
        immImage: '../Images/consult.jpg',
    },
    // {
    //     homeVisitHeading: 'TB DOTS  (PM)',
    //     homeVisitContent: ` Take the First Step to Health! If you or someone you know is dealing with <strong>tuberculosis</strong> (TB), <strong>DOTS (Directly Observed Therapy Shortcourse)</strong> is your safest route to a TB-free life. Our team is here to support you every step of the way. Together, we can end tuberculosis.`,
    //     homeVisitImage: 'images/immuniseBg.png',
    // },
];

let immunisationVaccine = document.querySelector('.immuneV');

function renderImmunisation() {
    // Render Immunisation Section
    const immunisation = servicesPageContent[0];
    immunisationVaccine.innerHTML += `<div>
        <div class="row imm">
            <div class="immT col-lg-5 col-md-6 col-sm-12 animate">
                <div class="topV">
                    <p style="font-size: 40px;">${immunisation.immHeading}</p>
                </div>
                <p style="font-size: 25px;">${immunisation.immContent}</p>
                <a href="../../about.html" style="display: inline-block; padding: 10px 20px; color: white; background-color: #0078d7; text-decoration: none; border-radius: 5px; text-align: center;">Visit Us</a>
            </div>
            <div class="immI col-lg-5 col-md-6 col-sm-12 animate">
                <img src="${immunisation.immImage}" class="img-fluid" style="width: 500px; height: 400px;  border-radius:20px;" alt="Immunisation Image">
            </div>
        </div>
    </div>`;

    // // Render Home Visitation Section
    // const homeVisit = servicesPageContent[1];
    // immunisationVaccine.innerHTML += `<div>
    //     <div class="row imm">
    //         <div class="immT  col-lg-5 col-md-6 col-sm-12 animate">
    //             <div class="topV">
    //                 <p>${homeVisit.homeVisitHeading}</p>
    //             </div>
    //             <p>${homeVisit.homeVisitContent}</p>
    //         </div>
    //         <div class="immI col-lg-5 col-md-6 col-sm-12 animate">
    //             <img src="${homeVisit.homeVisitImage}" class="img-fluid" alt="Home Visitation Image">
    //         </div>
    //     </div>
    // </div>`;
}

renderImmunisation();
