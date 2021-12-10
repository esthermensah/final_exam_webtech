// const submitforms=document.querySelectorAll('.form-submit');
const formdata = new FormData();
const popup = document.querySelector('.popup');
const popupForm = document.querySelector("#popup-form");

const onEdit = (e) => {
    const submitform = e.target;
    e.preventDefault();
    popup.classList.add('popup-show');
    const bookID = submitform.ID.value;
    formdata.append('ID',bookID);
    fetch('book_select.php', {
        method:'POST',
        body: formdata,
    }).then(resp => {
        return resp.json();
        // return resp.text();
        // console.log(resp);
    }).then(json => {
        // console.log(json);
        updateForm(json[0]);
    });
}


const closePopup = (e) => {
    e.preventDefault();
    popup.classList.remove("popup-show");
    popupForm.reset();
}

const updateForm = (formData) => {
    console.log(formData);
    popupForm.author.value = formData["fname"];
    popupForm.ISBN.value = formData["ISBN"];
    popupForm.pubdate.value = formData["publishDate"];
    popupForm.pub.value = formData["publisher"];
    popupForm.gtype.value = formData["genreType"];
    popupForm.gcat.value = formData["genreCategory"];
    popupForm.number.value = formData["noOfCopies"];
    popupForm.title.value = formData["booktitle"];
    popupForm.genreID.value = formData["genreID"];
    popupForm.bookID.value = formData["bookID"];
    popupForm.authorID.value = formData["authorID"];
   

    
}