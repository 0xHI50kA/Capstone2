let chinny = {
    name: 'Medical clinic',
    img: 'images/pharmacy/clinic1.jpg',
};

let chinnyPro = document.querySelector('.buike');

let renderChinny = () => {
    chinnyPro.innerHTML = `
        <div class="row container-fluid dr">
            <div class="col-sm-12 col-lg-5 col-md-12 animate drImage">
                <img src="${chinny.img}" class="img-fluid" alt="${chinny.name}">
            </div>
            <div class="col-sm-12 animate col-lg-5 col-md-12 drDescript">
                <p class="drName">${chinny.name}</p>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1733.6005440013696!2d120.58821293483258!3d16.394174232665275!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3391a122974aa6d7%3A0x9e8584c48c5f4da6!2sClinic!5e1!3m2!1sen!2sph!4v1733238299536!5m2!1sen!2sph" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                <div class="mt-3">
                    
                </div>
            </div>
        </div>`;
};

renderChinny();
