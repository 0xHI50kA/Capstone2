let chinny = {
    name: 'Ka Mark\'s Pharmacy',
    img: 'images/pharmacy/pharmacy3.jpg',
};

let chinnyPro = document.querySelector('.freeman');

let renderChinny = () => {
    chinnyPro.innerHTML = `
        <div class="row container-fluid dr">
            <div class="col-sm-12 col-lg-5 col-md-12 animate drImage">
                <img src="${chinny.img}" class="img-fluid" alt="${chinny.name}">
            </div>
            <div class="col-sm-12 animate col-lg-5 col-md-12 drDescript">
                <p class="drName">${chinny.name}</p>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2915.7234008467144!2d120.56689850986004!3d16.38305337768967!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3391a05504a58acb%3A0x141b6276f0726a2b!2sKa%20Mark&#39;s%20Pharmacy!5e1!3m2!1sen!2sph!4v1733237140597!5m2!1sen!2sph" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                <div class="mt-3">
                   
                </div>
            </div>
        </div>`;
};

renderChinny();
