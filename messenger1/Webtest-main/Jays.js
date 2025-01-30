const topics = {
    A: ["Asthma", "Allergies", "Arthritis"],
    B: ["Back_Pain", "Bronchitis", "Burns"],
    C: ["Cancer", "Cold", "Cough"],
    D: ["Diabetes", "Depression", "Dermatitis"],
    E: ["Eczema", "Epilepsy", "Eye Infection"],
    F: ["Fever", "Flu", "Fractures"],
    G: ["Gastritis", "Glaucoma", "Gout"],
    H: ["Hypertension", "Heartburn", "Hernia"],
    I: ["Influenza", "Insomnia", "Irritable Bowel Syndrome"],
    J: ["Jaundice", "Joint Pain", "Juvenile Arthritis"],
    K: ["Kidney Stones", "Knee Pain", "Keratitis"],
    L: ["Laryngitis", "Leukemia", "Lupus"],
    M: ["Migraine", "Meningitis", "Muscle Strain"],
    N: ["Nausea", "Neuralgia", "Nosebleeds"],
    O: ["Osteoporosis", "Otitis Media", "Obesity"],
    P: ["Pneumonia", "Psoriasis", "Pancreatitis"],
    Q: ["Quinsy", "Queasiness", "Quickening (Pregnancy)"],
    R: ["Rheumatism", "Rabies", "Rosacea"],
    S: ["Sinusitis", "Stroke", "Scabies"],
    T: ["Tonsillitis", "Tuberculosis", "Tinnitus"],
    U: ["Ulcers", "Urinary Tract Infection", "Uveitis"],
    V: ["Vertigo", "Viral Infection", "Varicose Veins"],
    W: ["Whooping Cough", "Warts", "Whiplash"],
    X: ["Xerostomia (Dry Mouth)", "Xanthoma", "Xeroderma"],
    Y: ["Yellow Fever", "Yeast Infection", "Yaws"],
    Z: ["Zoster (Shingles)", "Zika Virus", "Zenker's Diverticulum"]
};

const topicDetails = {
    Asthma: `
      <h2>Asthma</h2>
      <p>Asthma is a chronic disease involving the airways in the lungs. The airways become inflamed and narrowed, leading to breathing difficulties.</p>
      <h3>Symptoms:</h3>
      <ul>
        <li>Shortness of breath</li>
        <li>Wheezing</li>
        <li>Coughing, especially at night</li>
        <li>Chest tightness</li>
      </ul>
      <h3>Treatment:</h3>
      <p>Inhalers, medications, and avoiding triggers such as allergens and pollutants.</p>
    `,
    Allergies: `
      <h2>Allergies</h2>
      <p>Allergies are the body's immune response to foreign substances such as pollen, pet dander, or certain foods.</p>
      <h3>Symptoms:</h3>
      <ul>
        <li>Sneezing</li>
        <li>Itchy eyes</li>
        <li>Rashes</li>
        <li>Swelling of the throat or lips</li>
      </ul>
      <h3>Treatment:</h3>
      <p>Antihistamines, corticosteroids, and avoiding allergens.</p>
    `,
    Arthritis: `
      <h2>Arthritis</h2>
      <p>Arthritis refers to inflammation of the joints, causing pain, stiffness, and limited movement.</p>
      <h3>Symptoms:</h3>
      <ul>
        <li>Joint pain and swelling</li>
        <li>Stiffness</li>
        <li>Difficulty moving joints</li>
      </ul>
      <h3>Treatment:</h3>
      <p>Medication, physical therapy, and sometimes joint replacement surgery.</p>
    `,
    Back_Pain: `
      <h2>Back Pain</h2>
      <p>Back pain is a common condition affecting the back's muscles, ligaments, and bones, often caused by strain, injury, or underlying conditions.</p>
      <h3>Symptoms:</h3>
      <ul>
        <li>Sharp or dull pain in the back</li>
        <li>Difficulty moving or bending</li>
        <li>Pain that radiates to the legs</li>
      </ul>
      <h3>Treatment:</h3>
      <p>Rest, physical therapy, pain relief medications, and in some cases, surgery.</p>
    `,
    // Add more topics and their details...
};

function showTopics(letter) {
    const container = document.getElementById("topic-container");
    const topicList = topics[letter] || [];

    if (topicList.length === 0) {
        container.innerHTML = `<p>No topics found for "${letter}".</p>`;
        return;
    }

    let html = `<h2>Topics for Letter: ${letter}</h2><ul>`;
    topicList.forEach(topic => {
        html += `<li><a href="#" onclick="showTopicDetail('${topic}')">${topic}</a></li>`;
    });
    html += `</ul>`;
    container.innerHTML = html;
}

function showTopicDetail(topic) {
    const container = document.getElementById("topic-container");
    const details = topicDetails[topic] || `<p>No details available for "${topic}".</p>`;
    container.innerHTML = details;
}

function showAll() {
    const container = document.getElementById("topic-container");
    let html = "<h2>All Topics</h2>";

    for (const letter in topics) {
        html += `<h3>${letter}</h3><ul>`;
        topics[letter].forEach(topic => {
            html += `<li><a href="#" onclick="showTopicDetail('${topic}')">${topic}</a></li>`;
        });
        html += `</ul>`;
    }

    container.innerHTML = html;
}

function startSymptomCheck() {
    alert("Starting symptom checker...");
}
function nearby() {
  alert("nearbyy healthcare");
}
