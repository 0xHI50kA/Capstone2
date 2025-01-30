let servicesPageContent = [
    {
        immHeading: 'Pre-Natal, Post-Partum, New Born and Dental Check-ups (AM)',
        immContent: `Visit us for comprehensive Pre-Natal and Post-Partum care tailored to support mothers through every stage of pregnancy and after childbirth. Our Newborn check-ups ensure your baby receives the best start in life with expert health assessments and guidance. We also offer Dental Check-ups to keep your smile healthy, with preventive care and expert advice on maintaining oral health for all ages.`,
        immImage: 'images/pharmacy/checkup.png',
    },
    {
        homeVisitHeading: 'Adolescent Consultation, Recording and Reporting (PM)',
        homeVisitContent: `Adolescent Consultation provides a safe space for young individuals to discuss their health concerns, from physical to emotional well-being, with our experienced healthcare professionals. We focus on providing guidance, preventive care, and addressing specific health issues during this critical stage of growth. Our Recording and Reporting services ensure accurate tracking of adolescent health progress, helping us provide personalized care and interventions as needed`,
        homeVisitImage: 'images/TV.png',
    },
    {
        scheduleHeading: 'COMMUNITY CLINIC',
        scheduleContent: `<ul>
        <li style="font-size: 20px;text-align:center;"><i class="fa-solid fa-bell"></i><strong> IMPORTANT SCHEDULE</strong></li>
        <li></li>
        <li> <strong>1st Wednesday</strong>: Santo Rosario Barangay</li>
        <li> <strong>2nd Wednesday</strong>: Bakakeng Central Barangay</li>
        <li> <strong>3rd Wednesday</strong>: Bakakeng Norte Barangay</li>
        <li> <strong>4th Wednesday</strong>: Santo Thomas School Area Barangay</li>
        </ul>
    `,
    }
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
            </div>
            <div class="immT col-lg-5 col-md-6 col-sm-12 animate">
                <img src="${immunisation.immImage}" class="img-fluid" alt="Immunisation Image">
            </div>
        </div>
    </div>`;

    // Render TB DOTS Section
    const homeVisit = servicesPageContent[1];
    immunisationVaccine.innerHTML += `<div>
        <div class="row imm">
            <div class="immT col-lg-5 col-md-6 col-sm-12 animate">
                <div class="topV">
                    <p>${homeVisit.homeVisitHeading}</p>
                </div>
                <p>${homeVisit.homeVisitContent}</p>
            </div>
            <div class="immI col-lg-5 col-md-6 col-sm-12 animate">
                <img src="${homeVisit.homeVisitImage}" class="img-fluid" alt="Home Visitation Image">
            </div>
        </div>
    </div>`;

    // Render Important Schedule Section
    const schedule = servicesPageContent[2];
    immunisationVaccine.innerHTML += `<div>
        <div class="row imm">
            <div class="immT col-lg-5 col-md-6 col-sm-12 animate">
                <div class="topV">
                    <p style="font-size: 40px; text-align: center;">${schedule.scheduleHeading}</p>
                </div>
                <p >${schedule.scheduleContent}</p>
            </div>
        </div>
    </div>`;
}

renderImmunisation();
