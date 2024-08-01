const formEls = document.querySelectorAll('form.form-destroyer');

formEls.forEach((formEls)=>{
    formEls.addEventListener('submit',function(event){
        event.preventDefault();
        const userChoice = window.confirm('Are you sure you want to delete' + this.getAttribute('data-category-title')+'?');
        if (userChoice) {
            this.submit();

        }
    });
});
