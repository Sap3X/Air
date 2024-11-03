function updateSubCategory() {
    const mainSelect = document.getElementById('state');
    const subCategorySelect = document.getElementById('airportname');
    const itemSelect = document.getElementById('source');

    subCategorySelect.innerHTML = '<option value="">Select an Airport Name</option>';
    itemSelect.innerHTML = '<option value="">Please select the Airport Name first</option>';

    const selectedCategory = mainSelect.value;
    let subCategories = [];

    if (selectedCategory === 'GA') {
        subCategories = ['Dabolim Airport', 'Manohar International Airport'];
    } else if (selectedCategory === 'KA') {
        subCategories = [
            'Kempegowda International Airport',
            'Mangalore International Airport',
            'Hubli Airport',
            'Belgaum Airport',
            'Mysore Airport',
            'Kalaburagi Airport',
        ];
    } else if (selectedCategory === 'KL') {
        subCategories = [
            'Cochin International Airport',
            'Trivandrum International Airport',
            'Calicut International Airport',
            'Kannur International Airport',
        ];
    } else if (selectedCategory === 'TN') {
        subCategories = [
            'Chennai International Airport',
            'Coimbatore International Airport',
            'Madurai Airport',
            'Tiruchirappalli International Airport',
            'Tuticorin Airport',
            'Salem Airport',
            'Kanniyakumari Airport',
        ];
    } else if (selectedCategory === 'TG') {
        subCategories = ['Rajiv Gandhi International Airport'];
    } else if (selectedCategory === 'DL') {
        subCategories = ['Indira Gandhi International Airport'];
    }

    subCategories.forEach(subCategory => {
        const option = document.createElement('option');
        option.value = subCategory.replace(/\s+/g, '_').toLowerCase();
        option.textContent = subCategory;
        subCategorySelect.appendChild(option);
    });
}

function updateItems() {
    const subCategorySelect = document.getElementById('airportname');
    const itemSelect = document.getElementById('source');

    itemSelect.innerHTML = '<option value="">Select the source</option>';

    const selectedSubCategory = subCategorySelect.value;
    let items = [];

    if (selectedSubCategory === 'dabolim_airport') {
        items = ['Dabolim'];
    }else if (selectedSubCategory === 'manohar_international_airport') {
        items = [' Mopa'];
    }else if (selectedSubCategory === 'kempegowda_international_airport') {
        items = ['Bangalore'];
    }else if (selectedSubCategory === 'mangalore_international_airport') {
        items = ['Mangalore'];
    }else if (selectedSubCategory === 'hubli_airport'){
        items = ['Hubballi'];
    } else if (selectedSubCategory === 'belgaum_airport'){
        items = ['Belagavi(Belgaum)'];
    }else if (selectedSubCategory === 'mysore_airport'){
        items = ['Mysore'];
    }else if (selectedSubCategory === 'kalaburagi_airport'){
        items = ['Kalaburagi(Gulbarga)'];
    }else if (selectedSubCategory === 'cochin_international_airport'){
        items = ['Nedumbassery'];
    }else if (selectedSubCategory === 'trivandrum_international_airport'){
        items = ['Thiruvananthapuram'];
    }else if (selectedSubCategory === 'calicut_international_airport'){
        items = ['Karipur'];
    }else if (selectedSubCategory === 'kannur_international_airport'){
        items = ['Kannur'];
    }else if (selectedSubCategory === 'chennai_international_airport'){
        items = ['Meenambakkam'];
    }else if (selectedSubCategory === 'coimbatore_international_airport'){
        items = ['Coimbatore'];
    }else if (selectedSubCategory === 'madurai_airport'){
        items = ['Madurai'];
    }else if (selectedSubCategory === 'tiruchirappalli_international_airport'){
        items = ['Tiruchirappalli(Trichy)'];
    }else if (selectedSubCategory === 'tuticorin_airport'){
        items = [' Thoothukudi (Tuticorin)'];
    }else if (selectedSubCategory === 'salem_airport'){
        items = ['Salem'];
    }else if (selectedSubCategory === 'kanniyakumari_airport'){
        items = ['Nagercoil'];
    }else if (selectedSubCategory === 'rajiv_gandhi_international_airport'){
        items = ['Shamshabad'];
    }else if (selectedSubCategory === 'indira_gandhi_international_airport'){
        items = ['Palam(New Delhi)'];
    }    

    items.forEach(item => {
        const option = document.createElement('option');
        option.value = item.toLowerCase();
        option.textContent = item;
        itemSelect.appendChild(option);
    });
}