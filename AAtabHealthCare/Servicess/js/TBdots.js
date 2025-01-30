let servicesPageContent = [
    // {
    //     immHeading: 'GENERAL CONSULTAION (AM)',
    //     immContent: `Visit us for a personalized consultation where our experienced doctors will listen to your concerns and provide expert advice tailored to your needs. Whether it's a routine check-up or a specific health issue, we're here to help you stay healthy and informed.`,
    //     immImage: 'images/antenat.png',
    // },
    {
        homeVisitHeading: 'TB DOTS ',
        homeVisitContent: `Struggling with Tuberculosis (TB)? We’re Here to Help.

 DOTS (Directly Observed Therapy Shortcourse) offers the safest and most effective path toward a TB-free life. Our dedicated team is ready to support you every step of the way.

<br>📆 When: Every Tuesday and Friday
<br>⏰ Time: 12:00 NN - 5:00 PM
<br>✅ No appointment needed!
<br>
Together, we can end tuberculosis and build a healthier, stronger community.`,
        homeVisitImage: 'images/pharmacy/TB.png',
    },
];

let immunisationVaccine = document.querySelector('.immuneV');

function renderImmunisation() {
    // // Render Immunisation Section
    // const immunisation = servicesPageContent[0];
    // immunisationVaccine.innerHTML += `<div>
    //     <div class="row imm">
    //         <div class="immT col-lg-5 col-md-6 col-sm-12 animate">
    //             <div class="topV">
    //                 <p>${immunisation.immHeading}</p>
    //             </div>
    //             <p>${immunisation.immContent}</p>
    //         </div>
    //         <div class="immI col-lg-5 col-md-6 col-sm-12 animate">
    //             <img src="${immunisation.immImage}" class="img-fluid" alt="Immunisation Image">
    //         </div>
    //     </div>
    // </div>`;

    // Render Home Visitation Section
    const homeVisit = servicesPageContent[0];
    immunisationVaccine.innerHTML += `<div>
        <div class="row imm">
            <div class="immT  col-lg-5 col-md-6 col-sm-12 animate">
                <div class="topV">
                    <p>${homeVisit.homeVisitHeading}</p>
                </div>
                <p>${homeVisit.homeVisitContent}</p>
                 <a href="about.html" style="display: inline-block; padding: 10px 20px; color: white; background-color: #0078d7; text-decoration: none; border-radius: 5px; text-align: center;">Visit Us</a>
            </div>
            <div class="immT col-lg-5 col-md-6 col-sm-12 animate">
                <img src="${homeVisit.homeVisitImage}" class="img-fluid" alt="Home Visitation Image">
            </div>
        </div>
    </div>`;
}

renderImmunisation();
