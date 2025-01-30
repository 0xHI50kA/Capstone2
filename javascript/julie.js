let chinny = {
    name: 'Dr. Arvelius Retuta Medical Clinic',
    img: 'images/pharmacy/clinic3.jpg',
};

let chinnyPro = document.querySelector('.julie');

let renderChinny = () => {
    chinnyPro.innerHTML = `
        <div class="row container-fluid dr">
            <div class="col-sm-12 col-lg-5 col-md-12 animate drImage">
                <img src="${chinny.img}" class="img-fluid" alt="${chinny.name}">
            </div>
            <div class="col-sm-12 animate col-lg-5 col-md-12 drDescript">
                <p class="drName">${chinny.name}</p>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d11662.744022973131!2d120.5529624223709!3d16.385552683626926!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3391a15669262885%3A0x8b8d612b9253df9d!2sDr.%20Arvelius%20Retuta%20Medical%20Clinic!5e1!3m2!1sen!2sph!4v1733238928567!5m2!1sen!2sph" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                <div class="mt-3">
                  
                </div>
            </div>
        </div>`;
};

renderChinny();
