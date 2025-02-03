let servicesPageContent = [
    {
        immHeading: 'INFANT IMMUNIZATION ',
        immContent: `
We're here to support your family's health and well-being Ensuring your little ones get the essential immunizations for a strong and healthy start.

<br>📆 When: Every Monday
<br>⏰ Time: 8:00 AM - 12:00 NN
<br>✅ No appointment needed!
<br>
Our friendly team is ready to care for your child’s health.`,
        immImage: '../Images/immunization.jpg',
    },
    // {
    //     homeVisitHeading: 'HOME VISITATION (PM)',
    //     homeVisitContent: `For patients unable to visit the clinic, we offer 
    //     home visitation services to provide essential healthcare 
    //     and immunisation in the comfort of their homes.`,
    //     homeVisitImage: 'images/pharmacy/download.jpg',
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
                    <p>${immunisation.immHeading}</p>
                </div>
                <p>${immunisation.immContent}</p>
                <a href="about.html" style="display: inline-block; padding: 10px 20px; color: white; background-color: #0078d7; text-decoration: none; border-radius: 5px; text-align: center;">Visit Us</a>

            </div>
            <div class="immI col-lg-5 col-md-6 col-sm-12 animate">
                <img src="${immunisation.immImage}" class="img-fluid" alt="Immunisation Image">
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
    //         <div class="immT col-lg-5 col-md-6 col-sm-12 animate">
    //             <img src="${homeVisit.homeVisitImage}" alt="Home Visitation Image">
    //         </div>
    //     </div>
    // </div>`;
}

renderImmunisation();
