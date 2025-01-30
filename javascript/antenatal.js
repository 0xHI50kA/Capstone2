let servicesPageContent = [
    {
        immHeading: 'SORRY WE ARE CLOSED FOR SATURDAYS SUNDAYS AND HOLIDAYS',
        immContent: `We apologize for any inconvenience, but our clinic is closed on Saturdays and Sundays. Please plan your visit accordingly during our weekdays operation hours. We look forward to serving you during the rest of the week.`,
        immImage: 'images/pharmacy/closed.jpg',
    },
    {
        homeVisitHeading: 'EXPERIENCING SYMPTOMS?',
        homeVisitContent: `Not sure if your symptoms are serious? Our Symptoms Checker AI can help you assess your condition and guide you towards the right action. Try it now to stay informed and take the necessary steps to get better. You can also explore health topics to stay updated on various health-related matters and learn more about managing your well-being effectively.`,
    }
];

let immunisationVaccine = document.querySelector('.immuneV');

function renderImmunisation() {
    // Render Closed Section
    const immunisation = servicesPageContent[0];
    immunisationVaccine.innerHTML += `<div>
        <div class="row imm">
            <div class="immT col-lg-5 col-md-6 col-sm-12 animate">
                <div class="topV">
                    <p style="color: red; font-weight: bold;">${immunisation.immHeading}</p>
                </div>
                <p>${immunisation.immContent}</p>
            </div>
            <div class="imm col-lg-5 col-md-6 col-sm-12 animate">
                <img src="${immunisation.immImage}" class="img-fluid" alt="Closed Notice Image">
            </div>
        </div>
    </div>`;

    // Render Symptom Checker Section
    const homeVisit = servicesPageContent[1];
    immunisationVaccine.innerHTML += `<div>
        <div class="row imm">
            <div class="immT col-lg-5 col-md-6 col-sm-12 animate">
                <div class="topV">
                    <p>${homeVisit.homeVisitHeading}</p>
                </div>
                <p>${homeVisit.homeVisitContent}</p>
                <button class="btn btn-primary" onclick="window.location.href='aboutAI.html';">Use Symptom Checker</button>
                <button class="btn btn-primary" onclick="window.location.href='https://www.healthdirect.gov.au/health-topics';">Health Topics</button>
            </div>
        </div>
    </div>`;
}

renderImmunisation();
