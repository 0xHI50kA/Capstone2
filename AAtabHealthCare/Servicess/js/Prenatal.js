let servicesPageContent = [
    {
        immHeading: 'Family Planning, Senior Consultation, Breast And Cervical Screening ',
        immContent: `We provide comprehensive services to support your well-being:

<br>👶 Family Planning - Offering personalized advice for informed reproductive health decisions.
<br>👵 Senior Consultations - Addressing age-related health concerns and promoting a vibrant, active lifestyle for elderly individuals.
<br>👩‍⚕️ Breast & Cervical Screening - Essential for early detection and prevention, ensuring long-term health and peace of mind.
<br>📆 When: Every Tuesday and Friday
<br>⏰ Time: 8:00 AM - 12:00 NN
<br>✅ No appointment needed!
<br>
Your journey to health and peace of mind starts here. `,
        immImage: 'images/pharmacy/checkup.jpg',
    },
    // {
    //     homeVisitHeading: 'Schedule Meetings and Assemblies (PM)',
    //     homeVisitContent: `Come and visit us for meetings and assemblies that are crucial for the well-being of our barangay. Our team is dedicated to organizing and facilitating discussions that contribute to the progress and development of our community. Whether for personal or collective purposes, we ensure that each meeting runs smoothly and efficiently for the benefit of all.`,
    //     homeVisitImage: 'images/pharmacy/scheduling.png',
    // }
];

let immunisationVaccine = document.querySelector('.immuneV');

function renderImmunisation() {
    // Render General Consultation Section
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

    // // Render TB DOTS Section
    // const homeVisit = servicesPageContent[1];
    // immunisationVaccine.innerHTML += `<div>
    //     <div class="row imm">
    //         <div class="immT col-lg-5 col-md-6 col-sm-12 animate">
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
