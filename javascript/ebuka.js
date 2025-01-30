let chinny = {
    name: 'Synergistic Pharmacy',
    img: 'images/pharmacy/pharmacy2.jpg',
};

let chinnyPro = document.querySelector('.ebuka');

let renderChinny = () => {
    chinnyPro.innerHTML = `
        <div class="row container-fluid dr">
            <div class="col-sm-12 col-lg-5 col-md-12 animate drImage">
                <img src="${chinny.img}" class="img-fluid" alt="${chinny.name}">
            </div>
            <div class="col-sm-12 animate col-lg-5 col-md-12 drDescript">
                <p class="drName">${chinny.name}</p>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2915.7397914911016!2d120.56936766034681!3d16.381957790233148!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3391a055a420ccaf%3A0x28892f855358932c!2sSynergistic%20Pharmacy!5e1!3m2!1sen!2sph!4v1733236939826!5m2!1sen!2sph" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                <div class="mt-3">
                   
                </div>
            </div>
        </div>`;
};

renderChinny();
